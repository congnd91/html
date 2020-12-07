import datetime
import json
import pytz
import random
import re
import unicodedata
import sys
from dateutil.relativedelta import relativedelta, MO, TU, WE, TH, FR, SA, SU
from contextlib import contextmanager
from collections import defaultdict
from decimal import Decimal
from math import ceil
from urllib.parse import urlparse, urljoin, parse_qsl, urlunparse
from urllib.parse import urlencode
from itertools import groupby

import phonenumbers
import stripe

from flask import session, request, url_for, abort, flash
from flask_babel import lazy_gettext, gettext, get_locale, format_timedelta
from flask_cdn import url_for as _static_url_for
from flask_login import current_user
from flask_wtf import FlaskForm
from geoip2.database import Reader
from geoip2.errors import AddressNotFoundError
from phonenumbers import NumberParseException, PhoneNumberFormat
from trytond.config import config
from trytond.transaction import Transaction
from wtforms import fields, widgets
from wtforms.validators import StopValidation
from wtforms.widgets import HTMLString, html_params

from . import app, tryton, cache
from .compat import HTTPStatus

Account = tryton.pool.get('account.account')
Address = tryton.pool.get('party.address')
Carrier = tryton.pool.get('carrier')
CarrierSelection = tryton.pool.get('carrier.selection')
Category = tryton.pool.get('product.webshop.category')
Company = tryton.pool.get('company.company')
Country = tryton.pool.get('country.country')
Currency = tryton.pool.get('currency.currency')
Date = tryton.pool.get('ir.date')
Email = tryton.pool.get('marketing.email')
Journal = tryton.pool.get('account.payment.journal')
Lang = tryton.pool.get('ir.lang')
Location = tryton.pool.get('stock.location')
Party = tryton.pool.get('party.party')
Product = tryton.pool.get('product.product')
Sale = tryton.pool.get('sale.sale')
SaleLine = tryton.pool.get('sale.line')
SaleConfiguration = tryton.pool.get('sale.configuration')
ShippingDateExcluded = tryton.pool.get('sale.shipping_date.excluded')
Subscription = tryton.pool.get('sale.subscription.box')
StripeCustomer = tryton.pool.get('account.payment.stripe.customer')
Tax = tryton.pool.get('account.tax')
UOM = tryton.pool.get('product.uom')
WebUser = tryton.pool.get('web.user')

WEEKDAY = {
    'monday': MO,
    'tuesday': TU,
    'wednesday': WE,
    'thursday': TH,
    'friday': FR,
    'saturday': SA,
    'sunday': SU,
    }
SALE_CLOSING_DAY = WEEKDAY[config.get(
    'jurassic', 'sale_closing_day', default='thursday')]
CLOSING_TIME = datetime.time(20, 00)
CLOSING_TIME_DELAY = datetime.timedelta(minutes=10)
SHIPPING_WEEKDAYS = [d.weekday for d in [MO, TU, WE]]


def is_warmup():
    return request.endpoint == 'warmup'


def closing_day():
    return {
        'monday': gettext("Monday"),
        'tuesday': gettext("Tuesday"),
        'wednesday': gettext("Wednesday"),
        'thursday': gettext("Thursday"),
        'friday': gettext("Friday"),
        'saturday': gettext("Saturday"),
        'sunday': gettext("Sunday"),
        }[config.get('jurassic', 'sale_closing_day', default='thursday')]


def shipping_days():
    days = []
    for day, name in Sale.fields_get(
            ['shipping_day'])['shipping_day']['selection']:
        if day:
            days.append(name)
    return days


def get_countries():
    codes = app.config.get('COUNTRIES', [])
    return Country.search([('code', 'in', codes)])


def clear_session():
    for k in ['party', 'sale']:
        if k in session:
            session.pop(k)


def get_remote_country():
    try:
        reader = Reader(app.config.get('GEOIP2_DATABASE'))
    except (IOError, TypeError):
        return
    try:
        response = reader.country(request.remote_addr)
    except AddressNotFoundError:
        return None
    if response.country.iso_code in app.config.get('COUNTRIES', []):
        country, = Country.search([
                ('code', '=', response.country.iso_code),
                ])
        return country
    return None


def get_company():
    return Company(app.config['COMPANY'])


def get_session_user():
    if current_user and current_user.get_id():
        return WebUser(current_user.id)
    return None


def get_session_party():
    if 'party' in session:
        party = Party(session['party'])
        try:
            party.name
        except Exception:  # party could not exist
            del session['party']
        else:
            return party
    web_user = get_session_user()
    if web_user:
        party = web_user.party
        if party:
            session['party'] = party.id
        return party
    return None


def create_party():
    try:
        lang = Lang.get(str(get_locale()))
    except ValueError:
        lang = None
    party = Party()
    party.active = False
    config = SaleConfiguration(1)
    party.sale_price_list = config.get_multivalue('sale_price_list')
    party.lang = lang
    party.save()
    session['party'] = party.id
    return party


def get_session_sale():
    sale = None
    party = get_session_party()
    if 'sale' in session:
        sale = Sale(session['sale'])
        try:
            if sale.state != 'draft' or sale.is_subscription:
                sale = None
        except Exception:  # sale could no more exist
            sale = None
        if sale and sale.party != party:
            sale = None
    if not sale and party:
        sales = get_session_sales()
        for sale in sales:
            if not sale.is_subscription:
                session['sale'] = sale.id
                return sale
        else:
            sale = None
    return sale


def set_session_sale(sale):
    if not sale:
        if 'sale' in session:
            session.pop('sale')
        return
    party = get_session_party()
    if sale.party != party:
        abort(HTTPStatus.FORBIDDEN)
    session['sale'] = sale.id


def get_session_sales():
    party = get_session_party()
    if not party:
        return []
    sales = Sale.search([
            ('party', '=', party.id),
            ('state', '=', 'draft'),
            ('sale_date', '!=', None),
            ],
        order=[('sale_date', 'ASC')])
    return sales


def sale_count(party):
    sales = Sale.search([
            ('party', '=', party.id),
            ('state', 'in', ['confirmed', 'processing', 'done']),
            ])
    return len(sales)


def sale_modify_allowed(sale):
    return sale.state in {'draft', 'quotation', 'confirmed'}


def update_cache(sale):
    if sale.state in Sale._states_cached and sale_modify_allowed(sale):
        sale.untaxed_amount_cache = None
        sale.tax_amount_cache = None
        sale.total_amount_cache = None
        sale.save()
        Sale.store_cache([sale])


def sale_processing_date(sale):
    timezone = None
    if sale.company.timezone:
        timezone = pytz.timezone(sale.company.timezone)
    today = Date.today(timezone)
    config = SaleConfiguration(1)
    closing_time = datetime.datetime.combine(
        today + relativedelta(weekday=SALE_CLOSING_DAY),
        CLOSING_TIME).replace(tzinfo=timezone)
    if sale.is_subscription:
        return closing_time
    elif sale.state in {'quotation', 'confirmed'}:
        return min(
            timezone.fromutc(sale.write_date or sale.create_date)
            + (config.sale_process_after or datetime.timedelta()),
            closing_time)
    else:
        return closing_time


def sale_cancel_allowed(sale):
    return sale.state in {'draft', 'quotation', 'confirmed'}


def merge_sales(session_sale=None):
    party = get_session_party()
    if not party:
        return
    if session_sale is None:
        session_sale = get_session_sale()
    sales_all = Sale.search([
            ('party', '=', party.id),
            ('state', '=', 'draft'),
            ('sale_date', '!=', None),
            ('origin', '=', None),
            ],
        order=[('sale_date', 'ASC')])
    new_sales = []
    for _, sales in groupby(sales_all, lambda s: (s.sale_date, s.price_list)):
        sales = list(sales)
        sale = sales[0]
        if len(sales) > 1:
            other_sales = sales[1:]

            if session_sale in other_sales:
                session_sale = sale

            lines = [l for s in sales for l in s.lines
                if not l.shipment_cost]
            lines_to_delete = [l for s in sales for l in s.lines
                if l.shipment_cost]
            lines_to_save = []

            def key(line):
                return line.product, line.unit
            lines.sort(key=key)
            for product, plines in groupby(lines, key):
                plines = list(plines)
                line = plines[0]
                line.sale = sale
                line.quantity += sum(l.quantity for l in plines[1:])
                line.on_change_quantity()
                lines_to_delete.extend(plines[1:])
                lines_to_save.append(line)
            SaleLine.save(lines_to_save)
            SaleLine.delete(lines_to_delete)
            Sale.cancel(other_sales)
        new_sales.append(sale)

    if len(sales_all) != len(new_sales):
        flash(gettext(
                "Your previous cart has been added to your current cart."))
        compute_shipment_cost(new_sales)
        set_session_sale(session_sale)


def get_session_subscription():
    sale = get_session_sale()
    if sale and sale.is_subscription:
        return sale.origin
    party = get_session_party()
    if party:
        for subscription in party.subscriptions:
            if subscription.state != 'canceled':
                return subscription


def get_source_format(name):
    if name.startswith('*'):
        return 'bank-account', gettext("Bank Account"), name, ''
    else:
        try:
            alt, number, expire = name.rsplit(' ', 2)
        except ValueError:
            return '', '', '???', ''
        return alt.lower().replace(' ', '-'), alt, number, expire


class StripeSourceWidget(object):
    def __init__(self, name):
        self.name = name

    def __str__(self):
        return self()

    def __unicode__(self):
        return self()

    def __html__(self):
        return self()

    def __call__(self):
        img, alt, number, expire = get_source_format(self.name)
        try:
            img_url = static_url_for(
                'static', filename='images/payments/%s.png' % img)
        except IOError:
            img_url = ''
        object_attributes = html_params(
            class_='item-img-small',
            data=img_url,
            type='image/png')
        img_attributes = html_params(
            class_='item-img-small',
            src=static_url_for(
                'static', filename='images/payments/credit.png'),
            alt=alt)
        if expire:
            expired = ''
            try:
                if (datetime.datetime.strptime(expire, '%m/%Y')
                        < datetime.datetime.now()):
                    expired = ' expired'
            except ValueError:
                pass
            expire = ('<span class="expired-date' + expired + '">'
                + gettext('Expire %(date)s', date=expire))
        if img == 'bank-account':
            prefix = gettext("Direct Debit on account ending with")
        else:
            prefix = gettext("<strong>Credit Card</strong> ending with")
        return HTMLString('<div class="payment-method"><object %s>'
            '<img %s/></object><p>%s %s %s</p></div>' % (
                object_attributes, img_attributes, prefix, number, expire))


def get_stripe_journal():
    stripe_journal, = Journal.search([
            ('process_method', '=', 'stripe'),
            ('company', '=', app.config['COMPANY']),
            ])
    return stripe_journal


def get_stripe_account():
    stripe_journal = get_stripe_journal()
    return stripe_journal.stripe_account


def get_sofort_countries():
    return Country.search([
            ('code', 'in', ['AT', 'BE', 'DE', 'IT', 'NL', 'ES']),
            ])


def delete_stripe_payment(customer, payment):
    try:
        customer.sources.retrieve(payment).detach()
    except Exception:
        stripe.PaymentMethod.detach(
            payment,
            api_key=get_stripe_account().secret_key)
    StripeCustomer._sources_cache.clear()
    StripeCustomer._payment_methods_cache.clear()

    subscriptions = Subscription.search(['OR',
            ('stripe_customer_source', '=', payment),
            ('stripe_customer_payment_method', '=', payment),
            ])
    to_pause = []
    for subscription in subscriptions:
        payments = subscription.get_stripe_customer_payments()
        for payment, _ in payments:
            if payment:
                subscription.stripe_customer_payment = payment
                break
        else:
            subscription.stripe_customer_payment = None
            if subscription.state == 'running':
                to_pause.append(subscription)
    if to_pause:
        Subscription.pause(to_pause)
        flash(gettext("Your subscription has been paused."))
    Subscription.save(subscriptions)

    sales = Sale.search([
            ['OR',
                ('stripe_customer_source', '=', payment),
                ('stripe_customer_payment_method', '=', payment),
                ],
            ('state', 'in', ['draft', 'quotation']),
            ])
    to_draft = []
    for sale in sales:
        sale.stripe_customer_source = None
        sale.stripe_customer_payment_method = None
        if sale.state == 'quotation':
            to_draft.append(sale)
    if to_draft:
        Sale.draft(to_draft)
        flash(gettext("You must checkout again the sales."))
    Sale.save(sales)


def get_deposit_account():
    account, = Account.search([
            ('company', '=', app.config['COMPANY']),
            ('type.deposit', '=', True),
            ('type.statement', '=', 'off-balance'),
            ('closed', '=', False),
            ], limit=1)
    return account


def available_deposit(party):
    deposit = party.deposit
    sales = Sale.search([
            ('party', '=', party.id),
            ('state', 'in', ['quotation', 'confirmed', 'processing']),
            ('invoice_state', '!=', 'paid'),
            ('payments', '=', None),
            ])
    for sale in sales:
        if any(i.move for i in sale.invoices):
            continue
        deposit -= sale.extra_amount
    return deposit


def get_sale_products(sale):
    if not sale:
        return []
    return [l.product for l in sale.lines if l.product]


def get_price_list():
    party = get_session_party()
    if party and party.sale_price_list:
        return party.sale_price_list
    sale = get_session_sale()
    if sale and sale.price_list:
        return sale.price_list
    config = SaleConfiguration(1)
    return config.sale_price_list


def get_sale_price(product, price_list=None, quantity=0):
    return get_sale_prices(
        [product], price_list=price_list, quantity=quantity)[product.id]


def get_sale_prices(products, price_list=None, quantity=0):
    prices = {}
    if not price_list:
        price_list = get_price_list()
    sale = get_session_sale()
    sale_date = None
    if sale:
        currency = sale.currency
        if sale.sale_date:
            sale_date = sale.sale_date
    if sale_date is None:
        company = get_company()
        currency = company.currency
        timezone = None
        if company.timezone:
            timezone = pytz.timezone(company.timezone)
        sale_date = Date.today(timezone)

    def product_sale_uom(product):
        return product.sale_uom
    products = Product.browse(sorted(products, key=product_sale_uom))
    for uom, sub_products in groupby(products, key=product_sale_uom):
        prices.update(
            _get_sale_prices(
                list(sub_products), quantity, uom,
                price_list, currency, sale_date))
    return prices


def _get_sale_prices(products, quantity, uom, price_list, currency, sale_date):
    prices = {}
    id2keys = {}
    is_warmup_ = is_warmup()
    for product in products:
        key = '|'.join(map(str,
                [product, quantity, uom, price_list, currency, sale_date]))
        price = cache.get(key)
        if price is None or is_warmup_:
            id2keys[product.id] = key
        else:
            prices[product.id] = price

    with Transaction().set_context(
            taxes=[],
            uom=uom.id,
            price_list=price_list.id if price_list else None,
            currency=currency.id,
            sale_date=sale_date):
        for product_id, price in Product.get_sale_price(
                Product.browse(id2keys.keys()), quantity=quantity).items():
            prices[product_id] = price
            cache.set(id2keys[product_id], price)
    return prices


def get_all_sale_price(product, price_list=None):
    base_prices, quantity_prices = get_all_sale_prices([product], price_list)
    return base_prices[product.id], quantity_prices.get(product.id, [])


def get_all_sale_prices(products, price_list=None):
    def key(product):
        return product.default_order_quantity or 1

    base_prices = {}
    last_prices = {}
    quantity_prices = defaultdict(list)
    products = sorted(products, key=key)
    for order_quantity, products in groupby(products, key=key):
        products = list(products)
        reference_prices = get_sale_prices_reference(products, price_list)
        base_prices.update(get_sale_prices(products, price_list))
        last_prices.update(base_prices)
        for product in products:
            price = base_prices[product.id]
            reduction = 1 - (price / reference_prices[product.id])
            second_price = _sale_second_price(price, product.id)[0]
            quantity_prices[product.id].append(
                (0, price, 0, 0, reduction, second_price))
        for i in range(1, 11):
            quantity = order_quantity * i
            prices = get_sale_prices(products, price_list, quantity)
            for product_id, price in prices.items():
                if price < last_prices[product_id]:
                    percentage = 1 - (price / base_prices[product_id])
                    amount = Decimal(quantity) * price
                    reduction = 1 - (price / reference_prices[product_id])
                    second_price = _sale_second_price(price, product_id)[0]
                    quantity_prices[product_id].append(
                        (quantity, price, amount, percentage, reduction,
                            second_price))
                    last_prices[product_id] = price
    return base_prices, quantity_prices


def get_all_sale_line_prices(lines, price_list=None):
    return get_all_sale_prices(
        [l.product for l in lines if l.product], price_list=price_list)


def get_sale_price_reference(product):
    return get_sale_prices_reference([product])[product.id]


def get_sale_prices_reference(
        products, price_list=None, default_quantity=False):
    if not price_list:
        price_list = get_price_list()
    if (price_list and price_list.parent
            and price_list.tax_included == price_list.parent.tax_included):
        price_list = price_list.parent
    return get_sale_prices(products, price_list=price_list)


def format_quantity_prices(quantity_prices, currency):
    formatted = []
    for quantity, price, amount, percentage, reduction, second_price \
            in quantity_prices:
        formatted.append((
                quantity,
                format_currency(price, currency),
                format_currency(amount, currency),
                gettext("-%(percentage)i%%", percentage=percentage * 100),
                gettext("(-%(reduction)i%%)", reduction=reduction * 100),
                (format_currency(second_price, currency)
                    if second_price else ''),
                ))
    return formatted


def get_reductions(quantity_prices):
    for quantity in quantity_prices:
        if quantity[0]:
            yield quantity


def sale_second_price(price, product):
    return _sale_second_price(price, product.id)


@cache.memoize()
def _sale_second_price(price, product_id):
    product = Product(product_id)
    second_price, second_uom = None, None
    if product.sale_second_uom:
        second_price = product.sale_second_uom_compute_price(price)
        second_uom = product.sale_second_uom
    elif product.sale_uom.rate != 1:
        root = uom_root(product.sale_uom.id)
        if root:
            second_uom = UOM(root)
            second_price = UOM.compute_price(
                product.sale_uom, price, second_uom)
    return second_price, second_uom.symbol if second_uom else None


@cache.memoize()
def uom_root(uom_id):
    uom = UOM(uom_id)
    try:
        root, = UOM.search([
                ('category', '=', uom.category.id),
                ('rate', '=', 1),
                ], limit=1)
    except ValueError:
        return None
    return root.id


@cache.memoize()
def footer_categories(lang):
    categories = Category.search([
            ('homepage_category', '=', True),
            ('products', '!=', None),
            ])
    return [{
            'id': c.id,
            'name': c.name,
            } for c in categories]


@cache.memoize()
def categories(lang):
    categories = Category.search([
            ('products', '!=', None),
            ])
    return [{
            'id': c.id,
            'name': c.name,
            } for c in categories]


@cache.memoize(timeout=60 * 15)
def loved_products():
    categories = Category.search([
            ('homepage_category', '=', True),
            ('products', '!=', None),
            ])
    try:
        loved_products = Product.browse(
            random.sample(random.choice(categories).products, 2))
    except (ValueError, IndexError):
        loved_products = []
    return [p.id for p in loved_products]


def product_data(product, price=None):
    data = {
        'name': product.name,
        'id': product.code[:100] if product.code else None,
        }
    if price is not None:
        data['price'] = str(price)
    return json.dumps(data)


def get_boxes():
    return Product.search([('box', '=', True)])


def get_phone(party):
    for contact in party.contact_mechanisms:
        if contact.type in {'phone', 'mobile'}:
            return contact


def is_empty_address(address):
    return (not address.street
        or not address.zip
        or not address.city
        or not address.country)


def address_line(address):
    return ' - '.join(address.full_address.splitlines())


def sale_valid(sales=None):
    """Ensure the sale is valid for edition.
    If not sale is provided then all the draft sales of the party are checked.
    """
    party = get_session_party()
    if sales is None:
        sales = Sale.search([
                ('party', '=', party.id),
                ('state', '=', 'draft'),
                ])
    elif isinstance(sales, Sale):
        sales = [sales]

    changed = set()
    for sale in sales:
        if not sale.invoice_address or not sale.invoice_address.active:
            sale.invoice_address = party.address_get('invoice')
            changed.add(sale)
        if not sale.shipment_address or not sale.shipment_address.active:
            sale.shipment_address = party.address_get('delivery')
            changed.add(sale)
        if fix_carrier(sale):
            if sale.state != 'draft':
                changed.add(sale)
        if not sale.stripe_customer:
            if sale.party.stripe_customers:
                sale.stripe_customer = sale.party.stripe_customers[0]
                sale.on_change_stripe_customer()
    Sale.save(sales)
    return not changed


def compute_shipment_cost(sales):
    if isinstance(sales, Sale):
        sales = [sales]
    removed = []
    for sale in sales:
        removed.extend(sale.set_shipment_cost())
    SaleLine.delete(removed)
    Sale.save(sales)


def compute_carrier_cost(carrier, order=None):
    if order:
        context = order._get_carrier_context()
    else:
        context = {}
    with Transaction().set_context(context):
        cost, currency_id = carrier.get_sale_price()
    currency = Currency(currency_id)
    # TODO apply tax rule
    taxes = Tax.compute(
        carrier.carrier_product.customer_taxes_used, cost, 1)
    for tax in taxes:
        cost += tax['amount']
    return currency.round(cost), currency


def fix_carrier(sale):
    sale.available_carriers = sale.on_change_with_available_carriers()
    if sale.carrier not in sale.available_carriers:
        if sale.available_carriers:
            sale.carrier = sale.available_carriers[0]
        else:
            sale.carrier = None
        return True
    return False


def carrier_line(carrier, order=None):
    cost, currency = compute_carrier_cost(carrier, order=order)
    return '%s (%s)' % (
        carrier.carrier_product.name, format_currency(cost, currency))


@contextmanager
def apply_promotion(sale):
    if sale.state != 'draft':
        yield
        return
    for line in sale.lines:
        if line.type != 'line':
            continue
        if line.draft_unit_price is None:
            line.draft_unit_price = line.unit_price
    sale.apply_promotion()
    sale.save()
    yield
    for line in sale.lines:
        if line.type != 'line':
            continue
        if line.draft_unit_price is not None:
            line.unit_price = line.draft_unit_price
            line.draft_unit_price = None
    sale.lines = sale.lines
    sale.save()


def subscription_validate(subscriptions=None):
    """Ensure the subscription is valid for edition.
    If not subscriptions is provided then all non canceled subscription of the
    party are checked.
    """
    if subscriptions is None:
        party = get_session_party()
        subscriptions = Subscription.search([
                ('party', '=', party.id),
                ('state', '!=', 'canceled'),
                ])
    elif isinstance(subscriptions, Subscription):
        subscriptions = [subscriptions]

    for subscription in subscriptions:
        if not subscription.invoice_address.active:
            subscription.invoice_address = party.address_get('invoice')
        if not subscription.shipment_address.active:
            subscription.shipment_address = party.address_get('delivery')
            # Carrier available may change with the shipment_address
            subscription.available_carriers = (
                subscription.on_change_with_available_carriers())
        if subscription.carrier not in subscription.available_carriers:
            if subscription.available_carriers:
                subscription.carrier = subscription.available_carriers[0]
            else:
                subscription.carrier = None
    Subscription.save(subscriptions)


class Form(FlaskForm):
    class Meta(FlaskForm.Meta):
        def render_field(self, field, render_kw):
            if field.errors:
                render_kw = render_kw.copy()
                render_kw['class'] = render_kw.get('class', '') + ' is-invalid'
            return super(Form.Meta, self).render_field(field, render_kw)


class FieldListId(fields.FieldList):

    def populate_obj(self, obj, name):
        records = getattr(obj, name, [])
        id2record = {r.id: r for r in records}

        _fake = type(str('_fake'), (object, ), {})
        output = []
        for field in self.entries:
            if field.form.id.data not in id2record:
                continue
            data = id2record[field.form.id.data]
            fake_obj = _fake()
            fake_obj.data = data
            field.populate_obj(fake_obj, 'data')
            output.append(data)
        setattr(obj, name, output)


class CustomRadioListWidget(widgets.ListWidget):

    def __call__(self, field, **kwargs):
        kwargs.setdefault('id', field.id)
        sub_kwargs = {}
        for name in list(kwargs.keys()):
            if name.startswith('subfield_'):
                sub_kwargs[name[len('subfield_'):]] = kwargs.pop(name)
        custom = {
            'class': 'custom-control custom-radio',
            }
        html = ['<%s %s>' % (self.html_tag, html_params(**kwargs))]
        for subfield in field:
            html.append('<li %s><div %s>%s %s</div></li>' % (
                    html_params(**sub_kwargs), html_params(**custom),
                    subfield(), subfield.label))
        html.append('</%s>' % self.html_tag)
        return HTMLString(''.join(html))


class CustomRadioInput(widgets.RadioInput):

    def __call__(self, field, **kwargs):
        kwargs.setdefault('class', '')
        kwargs['class'] += ' custom-control-input'
        return super(CustomRadioInput, self).__call__(field, **kwargs)


class CustomRadioField(fields.RadioField):

    widget = CustomRadioListWidget()
    option_widget = CustomRadioInput()

    def __iter__(self):
        for opt in super(CustomRadioField, self).__iter__():
            opt.label = fields.Label(
                opt.id, opt.label.text)(class_='custom-control-label')
            yield opt


class CarrierValid(object):
    field_flag = ('required',)

    def __init__(self, shipment_address='shipment_address', message=None):
        self.shipment_address = shipment_address
        self.message = message

    def __call__(self, form, field):
        shipment_address_id = getattr(form, self.shipment_address).data
        warehouse_id = Sale.default_warehouse()
        pattern = {
            'from_country': None,
            'to_country': None,
            }
        if warehouse_id:
            warehouse = Location(warehouse_id)
            if warehouse.address and warehouse.address.country:
                pattern['from_country'] = warehouse.address.country.id
        if shipment_address_id:
            shipment_address = Address(shipment_address_id)
            if shipment_address.country:
                pattern['to_country'] = shipment_address.country.id
        party = get_session_party()
        pattern['party_categories'] = list(map(int, party.categories))
        carriers = CarrierSelection.get_carriers(pattern)
        if field.data:
            carrier = Carrier(field.data)
            if carrier not in carriers:
                if self.message is None:
                    message = lazy_gettext(
                        "The carrier is not valid for the shipment address.")
                else:
                    message = self.message

                field.errors[:] = []
                raise StopValidation(message)


@cache.memoize(timeout=60 * 10, forced_update=is_warmup)
def get_shipping_distribution():
    return Sale.shipping_distribution()


class ShippingDayValid(object):
    field_flag = ('required',)

    def __init__(self, carrier='carrier', date='date', address='address',
            warehouse='warehouse', message=None):
        self.carrier = carrier
        self.date = date
        self.address = address
        self.warehouse = warehouse
        self.message = message

    def __call__(self, form, field):
        config = SaleConfiguration(1)
        day = field.data
        carrier_id = getattr(form, self.carrier).data
        choices = [c for c in field.choices if c[0]]
        day_names = dict(Sale.fields_get(
                ['shipping_day'])['shipping_day']['selection'])
        if carrier_id:
            carrier = Carrier(carrier_id)
            address_id = getattr(form, self.address).data
            if address_id:
                address = Address(address_id)
            else:
                address = None
            delivery_time = carrier.get_delivery_time(address)

            def below_delivery_time(choice):
                shipping_day, _ = choice
                maximum = getattr(
                    config, 'max_carrier_delivery_time_%s' % shipping_day)
                return not maximum or delivery_time <= maximum

            choices = list(filter(below_delivery_time, choices))
            if day not in dict(choices):
                if self.message is None:
                    message = lazy_gettext(
                        "Only %(days)s are allowed "
                        "with the carrier: %(carrier)s.",
                        days=', '.join(
                            day_names[d] for d, _ in choices),
                        carrier=carrier.carrier_product.name)
                else:
                    message = self.message
                field.errors[:] = []
                raise StopValidation(message)
        else:
            carrier = None
        if not self.date:
            return
        date = getattr(form, self.date).data
        if not date:
            return
        warehouse = getattr(form, self.warehouse).data
        if warehouse:
            warehouse = Location(warehouse)
            from_ = warehouse.address
        else:
            from_ = None
        shipping_distribution = get_shipping_distribution()

        def valid(shipping_day, delta=0):
            shipping_date = Sale.compute_shiping_date(
                date, from_=from_, carrier=carrier, shipping_day=shipping_day)
            if shipping_date.weekday() not in SHIPPING_WEEKDAYS:
                return False
            maximum = getattr(config, 'max_%s' % shipping_day)
            if maximum is None:
                maximum = sys.maxsize
            return shipping_distribution[shipping_date] + delta <= maximum

        if (not valid(day)
                and len(choices) > 1
                and any(valid(d, 1) for d, _ in choices if d != day)):
            if self.message is None:
                message = lazy_gettext(
                    "%(day)s is already full, please select another day.",
                    day=day_names[day])
            else:
                message = self.message
            field.errors[:] = []
            raise StopValidation(message)


class AddressComplete(object):
    field_flag = ('required',)

    def __init__(self, message=None):
        self.message = message

    def __call__(self, form, field):
        if field.data:
            address = Address(field.data)
            if (not address.street
                    or not address.zip
                    or not address.city
                    or not address.country):
                if self.message is None:
                    message = lazy_gettext("This address is not complete.")
                else:
                    message = self.message

                field.errors[:] = []
                raise StopValidation(message)


def tel_valid(form, field):
    if field.data and phonenumbers:
        valid = True
        tel = None
        for country in [None] + app.config.get('COUNTRIES', []):
            try:
                tel = phonenumbers.parse(field.data, country)
            except NumberParseException:
                pass
            else:
                break
        if not (tel and phonenumbers.is_valid_number(tel)):
            valid = False
        if not valid:
            raise StopValidation(
                lazy_gettext("Invalid phone number."))
        field.data = phonenumbers.format_number(
            tel, PhoneNumberFormat.INTERNATIONAL)


def tel_country_code(value):
    try:
        number = phonenumbers.parse(value)
    except NumberParseException:
        return value
    return '%s +%s' % (
        phonenumbers.region_code_for_country_code(number.country_code),
        number.country_code)


def tel_national_number(value):
    try:
        number = phonenumbers.parse(value)
    except NumberParseException:
        return value
    return phonenumbers.format_number(
        number, phonenumbers.PhoneNumberFormat.NATIONAL)


def request_full_path(params=None):
    if 'X-Requested-From' in request.headers:
        path = request.headers['X-Requested-From']
    else:
        path = request.path
        if request.query_string:
            path += '?' + request.query_string.decode('utf-8')
    if params:
        url_parts = list(urlparse(path))
        query = dict(parse_qsl(url_parts[4]))
        query.update(params)
        url_parts[4] = urlencode(query)
        path = urlunparse(url_parts)
    return path


def canonical_url():
    def meaningful(item):
        name, value = item
        if name == 'agent':
            return False
        if name == 'page' and value == '1':
            return False
        return True
    url = request.url
    url_parts = list(urlparse(url))
    query = filter(meaningful, parse_qsl(url_parts[4]))
    url_parts[4] = urlencode(sorted(query))
    return urlunparse(url_parts)


def is_safe_url(target):
    ref_url = urlparse(request.host_url)
    test_url = urlparse(urljoin(request.host_url, target))
    return (test_url.scheme in {'http', 'https'}
        and ref_url.netloc == test_url.netloc)


def get_redirect_target():
    target = request.values.get('next')
    if target and is_safe_url(target):
        return target


@app.context_processor
def inject_request_full_path():
    return {
        'request_full_path': request_full_path,
        }


_slugify_strip_re = re.compile(r'[^\w\s-]')
_slugify_hyphenate_re = re.compile(r'[-\s]+')


def slugify(value):
    if not isinstance(value, str):
        value = str(value)
    value = (unicodedata.normalize('NFKD', value)
        .encode('ascii', 'ignore')
        .decode('utf-8'))
    value = str(_slugify_strip_re.sub('', value).strip().lower())
    return _slugify_hyphenate_re.sub('-', value)


def url_for_product(product, **kwargs):
    return _url_for_product(product, Transaction().language, **kwargs)


def url_for_product_language(product, language, **kwargs):
    return _url_for_product(product, language, **kwargs)


def cdn_url_for(endpoint, **values):
    if app.config['CDN_DEBUG'] or not app.config['CDN_DOMAIN']:
        return url_for(endpoint, **values)
    app.inject_url_defaults(endpoint, values)
    try:
        scheme = values.pop('_scheme')
    except KeyError:
        scheme = 'http'
        cdn_https = app.config['CDN_HTTPS']
        if cdn_https is True or (cdn_https is None and request.is_secure):
            scheme = 'https'

    urls = app.url_map.bind(app.config['CDN_DOMAIN'], url_scheme=scheme)
    return urls.build(endpoint, values=values, force_external=True)


def static_url_for(endpoint, **values):
    if app.config['CDN_DOMAIN']:
        return _static_url_for(endpoint, **values)
    else:
        return url_for(endpoint, **values)


@cache.memoize()
def _url_for_product(product, language, **kwargs):
    with Transaction().set_context(language=language):
        product = Product(product)
    return url_for(
        'product', lang_code=language, product=product,
        name=slugify(product.name), **kwargs)


def url_for_product_box(product, **kwargs):
    return _url_for_product_box(product, Transaction().language, **kwargs)


@cache.memoize()
def _url_for_product_box(product, language, **kwargs):
    if not isinstance(product, Product):
        product = Product(product)
    return url_for(
        'product_box', product=product, name=slugify(product.name),
        **kwargs)


def url_for_product_image(product, index=None, size=800, **kwargs):
    return _url_for_product_image(
        product, Transaction().language, index=index, size=size, **kwargs)


@cache.memoize()
def _url_for_product_image(
        product, language, index=None, size=800, **kwargs):
    if not isinstance(product, Product):
        product = Product(product)
    if product and product.code:
        try:
            return cdn_url_for(
                'static_image', type='product', code=product.code,
                name=slugify(product.name), index=index, size=size, **kwargs)
        except IOError:
            pass
    if product.type == 'goods' and not index:
        return static_url_for(
            'static', filename='images/default-%s.jpg' % size, **kwargs)
    else:
        return ''


def url_for_category(category, **kwargs):
    return _url_for_category(category, Transaction().language, **kwargs)


def url_for_category_language(category, language, **kwargs):
    return _url_for_category(category, language, **kwargs)


@cache.memoize()
def _url_for_category(category, language, **kwargs):
    if category is not None:
        with Transaction().set_context(language=language):
            category = Category(category)
            name = slugify(category.name)
    else:
        category = None
        name = None
    return url_for(
        'category', lang_code=language, category=category, name=name, **kwargs)


def url_for_category_image(category, size=800, **kwargs):
    return _url_for_category_image(
        category, Transaction().language, size=size, **kwargs)


@cache.memoize()
def _url_for_category_image(category, language, size, **kwargs):
    if not isinstance(category, Category):
        category = Category(category)
    if category.code:
        try:
            return cdn_url_for(
                'static_image', type='category', code=category.code,
                name=slugify(category.name), size=size, **kwargs)
        except IOError:
            pass
    return static_url_for(
        'static', filename='images/all-categories-%s.jpg' % size, **kwargs)


@cache.memoize()
def url_for_testimony(name, **kwargs):
    try:
        return static_url_for(
            'static', filename='testimonies/50/%s.jpg' % name, **kwargs)
    except IOError:
        pass
    return static_url_for('static', filename='images/empty.png', **kwargs)


def category_name(category):
    if isinstance(category, Category):
        return category.name
    elif category:
        return category['name']
    else:
        return gettext("All the Fruits, Nuts, Dates, etc")


def add_args(replace=False, **new):
    args = {k: v for k, v in list(new.items()) if v is not None}
    for name in request.args:
        values = request.args.getlist(name)[:]
        if name in new:
            value = new[name]
            if value is not None:
                value = str(value)
            if not replace and new[name]:
                if value not in values:
                    values.append(value)
            else:
                values = value
        if values is not None:
            args[name] = values
    return args


def dict_update(dct, **kwargs):
    dct = dct.copy()
    dct.update(kwargs)
    return dct


# from http://flask.pocoo.org/snippets/44/
class Pagination(object):

    def __init__(self, page, per_page, total_count):
        self.page = page
        self.per_page = per_page
        self.total_count = total_count

    @property
    def pages(self):
        return int(ceil(self.total_count / float(self.per_page)))

    @property
    def has_prev(self):
        return self.page > 1

    @property
    def has_next(self):
        return self.page < self.pages

    def iter_pages(self, left_edge=2, left_current=2,
                   right_current=5, right_edge=2):
        last = 0
        for num in range(1, self.pages + 1):
            if (num <= left_edge
                    or (num > self.page - left_current - 1
                        and num < self.page + right_current)
                    or num > self.pages - right_edge):
                if last + 1 != num:
                    yield None
                yield num
                last = num


def sale_subscription_date(company, today=None):
    timezone = None
    if company.timezone:
        timezone = pytz.timezone(company.timezone)
    if not today:
        today = Date.today(timezone)
    now = datetime.datetime.now(timezone)
    week_date = today
    year, week, _ = week_date.isocalendar()
    sale_date = Subscription.get_sale_date(year, week)
    while (not sale_date
            or (sale_date < today
                or (sale_date == today and now.time() > CLOSING_TIME))):
        week_date += relativedelta(weeks=1)
        year, week, _ = week_date.isocalendar()
        sale_date = Subscription.get_sale_date(year, week)
    return sale_date


def sale_date(company=None, today=None):
    if company is None:
        company = get_company()
    timezone = None
    if company.timezone:
        timezone = pytz.timezone(company.timezone)
    if not today:
        today = Date.today(timezone)
    now = datetime.datetime.now(timezone)
    sale_date = now.date()
    while (sale_date < today
            or (sale_date == today
                and (now - CLOSING_TIME_DELAY).time() > CLOSING_TIME)):
        sale_date += relativedelta(days=1)
    return sale_date


def sale_closing_date():
    company = get_company()
    timezone = None
    if company.timezone:
        timezone = pytz.timezone(company.timezone)
    date = today = Date.today(timezone)
    now = datetime.datetime.now(timezone)
    sale_date = None
    while (not sale_date
            or (sale_date < today
                or (sale_date == today and now.time() > CLOSING_TIME))):
        sale_date = Subscription.get_sale_date(
            date.year, date.isocalendar()[1])
        date += relativedelta(weeks=1)
    return sale_date


def sale_closing_timedelta():
    company = get_company()
    timezone = None
    if company.timezone:
        timezone = pytz.timezone(company.timezone)
    closing = datetime.datetime.combine(
        sale_closing_date(), CLOSING_TIME).replace(tzinfo=timezone)
    now = datetime.datetime.now(timezone)
    return datetime.timedelta(seconds=int((closing - now).total_seconds()))


def available_carriers(country):
    pattern = {
        'party_category': [],
        }
    warehouse = Sale.default_warehouse()
    if warehouse:
        warehouse = Location(warehouse)
        if warehouse.address and warehouse.address.country:
            pattern['from_country'] = warehouse.address.country.id
    if country:
        pattern['to_country'] = country.id
    return CarrierSelection.get_carriers(pattern)


def default_carrier(country):
    carriers = available_carriers(country)
    if carriers:
        return carriers[0]


def default_country():
    country = None
    party = get_session_party()
    if party:
        shipment_address = party.address_get(type='delivery')
        if shipment_address:
            country = shipment_address.country
    if not country:
        country = get_remote_country()
    if not country:
        warehouse = Sale.default_warehouse()
        if warehouse:
            warehouse = Location(warehouse)
            if warehouse and warehouse.address:
                country = warehouse.address.country
    return country


def next_delivery_date(product):
    carrier = None
    address = None
    from_ = None
    sale = get_session_sale()
    if sale:
        carrier = sale.carrier
        address = sale.shipment_address
        warehouse = sale.warehouse
        date = sale.sale_date
    else:
        warehouse = Sale.default_warehouse()
        if warehouse:
            warehouse = Location(warehouse)
        date = sale_date()
    if warehouse:
        from_ = warehouse.address
    if not carrier:
        carrier = default_carrier(default_country())

    shipping_date = Sale.compute_shiping_date(
        product.compute_shipping_date(date=date),
        from_=from_, carrier=carrier)
    if shipping_date != datetime.date.max:
        return Sale.get_delivery_date_from(
            shipping_date, to=address, carrier=carrier)


def is_active(pattern):
    if re.search(pattern, request.path):
        return 'active'
    return ''


def format_currency(value, currency=None, symbol=True, grouping=True):
    if currency is None:
        currency = get_company().currency
    lang = Lang.get(str(get_locale()))
    return lang.currency(value, currency, symbol=symbol, grouping=grouping)


def format_number(value, digits=2, grouping=True):
    lang = Lang.get(str(get_locale()))
    return lang.format(
        '%.' + str(digits) + 'f', value, grouping=grouping)


def format_date(value, format=None):
    lang = Lang.get(str(get_locale()))
    return lang.strftime(value, format)


format_timedelta = format_timedelta


def groupbyattr(iterable, name):
    return groupby(iterable, lambda r: getattr(r, name))


def season2class(value):
    return {'low': 'yellow', 'high': 'green'}.get(value, '')


def is_subscribed(email):
    return bool(Email.search([('email', '=', email)]))


def banner(size=None):
    name = 'background%s' % random.randint(1, 5)
    if size:
        name += '-%s' % size
    return static_url_for(
        'static',
        filename='images/forms/%s.jpg' % name)
