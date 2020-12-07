# encoding: utf-8
import datetime
from collections import namedtuple

import pytz
from dateutil.relativedelta import relativedelta
from flask import redirect, url_for, render_template
from flask_babel import lazy_gettext
from flask_login import login_required, current_user
from wtforms import fields
from wtforms.validators import DataRequired
from trytond.transaction import Transaction

from . import app, tryton, util

# EPOCH is on a monday
EPOCH = datetime.date(2001, 1, 1)
FREQUENCY_LENGTH = {
    'weekly': 1,
    'bi-weekly': 2,
    }

Address = tryton.pool.get('party.address')
Carrier = tryton.pool.get('carrier')
CarrierSelection = tryton.pool.get('carrier.selection')
Currency = tryton.pool.get('currency.currency')
Date = tryton.pool.get('ir.date')
Delivery = namedtuple('Delivery', 'date address product sale'.split())
Location = tryton.pool.get('stock.location')
Party = tryton.pool.get('party.party')
Sale = tryton.pool.get('sale.sale')
SaleConfiguration = tryton.pool.get('sale.configuration')
Subscription = tryton.pool.get('sale.subscription.box')
Tax = tryton.pool.get('account.tax')


class DataRequiredRun(DataRequired):
    def __call__(self, form, field):
        subscription = util.get_session_subscription()
        if (form.run.data
                or (subscription.state == 'running' and form.save.data)):
            super(DataRequiredRun, self).__call__(form, field)


class SubscribeForm(util.Form):
    box = fields.SelectField(lazy_gettext("Box"),
        coerce=lambda a: None if (str(a) == 'None' or not a) else int(a),
        validators=[DataRequired()])
    frequency = fields.SelectField(
        lazy_gettext("Frequency"))

    def __init__(self, *args, **kwargs):
        super(SubscribeForm, self).__init__(*args, **kwargs)
        currency = util.get_company().currency
        boxes = [('', '')]
        data = []
        max_name, max_category, max_price, max_weight = 0, 0, 0, 0
        for box in util.get_boxes():
            price = currency.round(util.get_sale_price(box))
            price_formatted = util.format_currency(price, currency)
            name = box.name
            category = box.box_category.name
            data.append((box, name, category, price, price_formatted))
            max_name = max(max_name, len(name))
            max_category = max(max_category, len(category))
            max_price = max(max_price, len(price_formatted))
            max_weight = max(max_weight, box.weight or 0)
        data.sort(key=lambda d: d[3])
        max_weight = len(util.format_number(max_weight or 0))
        nbsp = ' '
        sep = ' | '
        for box, name, category, _, price in data:
            name = name.ljust(max_name, nbsp)
            category = category.ljust(max_category, nbsp)
            price = price.rjust(max_price, nbsp)
            if box.weight:
                weight = (sep
                    + util.format_number(box.weight).rjust(max_weight)
                    + nbsp + box.weight_uom.symbol)
            else:
                weight = ''
            boxes.append((box.id, sep.join((name, category, price)) + weight))
        self.box.choices = boxes

        self.frequency.choices = Subscription.fields_get(
            ['frequency'])['frequency']['selection']


class SubscriptionButtonForm(util.Form):
    run = fields.SubmitField(lazy_gettext("Run your subscription"))
    pause = fields.SubmitField(lazy_gettext("Pause your subscription"))
    cancel = fields.SubmitField(lazy_gettext("Cancel your subscription"))
    rush_delivery = fields.SubmitField(lazy_gettext("Add a delivery"))

    def process_button(self, subscription):
        if self.pause.data:
            Subscription.pause([subscription])
            create_sale(subscription)
        elif self.cancel.data:
            Subscription.cancel([subscription])
            create_sale(subscription)
        elif self.rush_delivery.data:
            today = Date.today()
            monday = today - datetime.timedelta(today.weekday())
            new_modulo = (((monday - EPOCH).days // 7)
                % FREQUENCY_LENGTH[subscription.frequency])
            week_date = today
            year, week, _ = week_date.isocalendar()
            sale_date = Subscription.get_sale_date(year, week)
            while not sale_date or sale_date <= today:
                week_date += relativedelta(weeks=1)
                year, week, _ = week_date.isocalendar()
                sale_date = Subscription.get_sale_date(year, week)
                new_modulo = ((new_modulo + 1)
                    % FREQUENCY_LENGTH[subscription.frequency])
            subscription.frequency_modulo = new_modulo
            subscription.save()
            create_sale(subscription)
        elif self.run.data:
            self.populate_obj(subscription)
            subscription.save()
            sales = util.get_session_sales()
            for sale in sales:
                if sale.is_subscription:
                    sale.stripe_customer_payment = (
                        subscription.stripe_customer_payment)
            Sale.save(sales)
            Subscription.run([subscription])
            create_sale(subscription)


class SubscriptionForm(SubscribeForm, SubscriptionButtonForm):
    invoice_address = fields.SelectField(
        lazy_gettext("Invoice Address"), coerce=int,
        validators=[DataRequired()])
    shipment_address = fields.SelectField(
        lazy_gettext("Shipment Address"), coerce=int,
        validators=[DataRequired()])
    carrier = fields.SelectField(
        lazy_gettext("Carrier"),
        coerce=lambda a: None if str(a) == 'None' else int(a),
        validators=[DataRequired(), util.CarrierValid()])
    shipping_day = fields.SelectField(
        lazy_gettext("Shipping Day"),
        validators=[
            DataRequired(),
            util.ShippingDayValid(date=None, address='shipment_address')])
    stripe_customer_payment = util.CustomRadioField(
        lazy_gettext("Payment Method"),
        validators=[DataRequiredRun()])

    save = fields.SubmitField(lazy_gettext("Save"))
    unregister_payment = fields.SubmitField(lazy_gettext("Unregister"))

    @property
    def phone(self):
        party = util.get_session_party()
        phone = util.get_phone(party)
        if phone:
            return phone.value

    def __init__(self, *args, **kwargs):
        super(SubscriptionForm, self).__init__(*args, **kwargs)
        subscription = kwargs.get('obj')
        party = util.get_session_party()

        addresses = [(a.id, util.address_line(a)) for a in party.addresses]
        self.invoice_address.choices = addresses
        self.shipment_address.choices = addresses

        pattern = {
            'party_categories': list(map(int, party.categories)),
            }
        carriers = CarrierSelection.get_carriers(pattern)
        self.carrier.choices = [(None, "")] + [(c.id, c.carrier_product.name)
            for c in Carrier.search([
                    ('carrier_product.salable', '=', True),
                    ('id', 'in', list(map(int, carriers))),
                    ])]

        self.shipping_day.choices = Sale.fields_get(
            ['shipping_day'])['shipping_day']['selection']

        if subscription:
            payments = []
            for payment, name in subscription.get_stripe_customer_payments():
                if payment:
                    payments.append((payment, util.StripeSourceWidget(name)))
            self.stripe_customer_payment.choices = payments

    def populate_obj(self, obj):
        for name, field in self._fields.items():
            if not isinstance(field, fields.SubmitField):
                field.populate_obj(obj, name)

    def process_button(self, subscription):
        super(SubscriptionForm, self).process_button(subscription)
        if self.unregister_payment.data:
            customer = subscription.stripe_customer.retrieve()
            payment = self.stripe_customer_payment.data
            if payment:
                util.delete_stripe_payment(customer, payment)
            # Refresh the choice because it was filled before the deletion
            self.stripe_customer_payment.choices = (
                subscription.get_stripe_customer_payments())
        elif self.save.data:
            self.populate_obj(subscription)
            subscription.save()
            sales = util.get_session_sales()
            for sale in sales:
                if sale.is_subscription:
                    sale.stripe_customer_payment = (
                        subscription.stripe_customer_payment)
            Sale.save(sales)


@app.route('/subscription', methods={'GET', 'POST'})
@app.route('/<lang_code>/subscription', methods={'GET', 'POST'})
@tryton.transaction()
@login_required
def subscription():
    subscription = util.get_session_subscription()
    party = util.get_session_party()
    if not subscription:
        return redirect(url_for('subscribe', _anchor='choose-plan'))
    if subscription.state == 'draft':
        return redirect(url_for('checkout_subscription', order=subscription))
    form = SubscriptionForm(obj=subscription)
    active = 'deliveries'
    if form.validate_on_submit():
        form.process_button(subscription)
        if form.rush_delivery.data:
            active = 'deliveries'
        else:
            active = 'settings'
    elif form.errors:
        active = 'settings'
    deliveries = []
    sales = Sale.search([
            ('party', '=', party.id),
            ('state', 'in', ['draft', 'quotation', 'confirmed']),
            ('origin', 'like', 'sale.subscription.box,%'),
            ])
    for sale in sales:
        deliveries.append(Delivery(
                date=sale.delivery_date,
                address=sale.shipment_address,
                product=sale.origin.box,
                sale=sale,
                ))
    timezone = None
    if subscription.company.timezone:
        timezone = pytz.timezone(subscription.company.timezone)
    today = Date.today(timezone)
    today_sale_date = util.sale_subscription_date(subscription.company)
    if deliveries:
        date = deliveries[-1].date
        first_sale_date = deliveries[0].sale.sale_date or today
        allow_rush = first_sale_date > today_sale_date
    else:
        allow_rush = today_sale_date > today
        date = util.sale_subscription_date(
            subscription.company,
            today=today_sale_date + relativedelta(days=1))
    if allow_rush:
        now = datetime.datetime.now(timezone)
        if (today_sale_date < today
                or (today_sale_date == today
                    and (now - util.CLOSING_TIME_DELAY).time()
                    > util.CLOSING_TIME)):
            allow_rush = False
        if subscription.state == 'pause':
            allow_rush = False
    if subscription.state == 'running':
        for i in range(3 - len(deliveries)):
            date = subscription.on_change_with_next_shipping_date(
                'next_shipping_date', today=date)
            if subscription.carrier:
                date += subscription.carrier.get_delivery_time(
                    subscription.shipment_address)
            deliveries.append(Delivery(
                    date=date,
                    address=subscription.shipment_address,
                    product=subscription.box,
                    sale=None,
                    ))
    return render_template('subscription.html',
        subscription=subscription,
        form=form, active=active,
        deliveries=deliveries,
        allow_rush=allow_rush,
        stripe_key=util.get_stripe_account().publishable_key)


@app.route('/<lang_code>/subscribe', methods={'GET', 'POST'})
@tryton.transaction()
def subscribe():
    party = util.get_session_party()
    if party:
        for subscription in party.subscriptions:
            if subscription.state in {'running', 'pause'}:
                return redirect(url_for('subscription'))
    form = SubscribeForm()
    if form.validate_on_submit():
        if not current_user.is_authenticated:
            return app.login_manager.unauthorized()
        if party is None:
            party = util.create_party()
        inv_address = party.address_get('invoice')
        del_address = party.address_get('delivery')

        subscription = Subscription()
        subscription.warehouse = Subscription.default_warehouse()
        subscription.party = party
        if party.stripe_customers:
            subscription.stripe_customer = party.stripe_customers[0]
            payment_methods = subscription.stripe_customer.payment_methods()
            if payment_methods:
                subscription.stripe_customer_payment_method = (
                    payment_methods[0][0])
            else:
                sources = subscription.stripe_customer.sources()
                if sources:
                    subscription.stripe_customer_source = sources[0][0]
        subscription.invoice_address = inv_address
        subscription.shipment_address = del_address
        subscription.box = form.box.data
        subscription.frequency = form.frequency.data
        carriers = subscription.on_change_with_available_carriers()
        if carriers:
            subscription.carrier = carriers[0]
        subscription.save()
        create_sale(subscription)
        return redirect(url_for('checkout_subscription', order=subscription))

    country = util.default_country()
    carrier = util.default_carrier(country)
    costs = {}
    if carrier:
        with Transaction().set_context(subscription=False):
            costs['no_subscription'] = util.compute_carrier_cost(carrier)
        with Transaction().set_context(subscription=True):
            costs['subscription'] = util.compute_carrier_cost(carrier)
    return render_template('subscribe.html',
        form=form,
        country=country,
        costs=costs)


def create_sale(subscription):
    sales = Sale.search([
            ('origin', '=', str(subscription)),
            ('state', 'in', ['draft', 'quotation']),
            ])
    if sales:
        Sale.delete(sales)

    if subscription.state != 'running':
        return

    timezone = None
    if subscription.company.timezone:
        timezone = pytz.timezone(subscription.company.timezone)
    today = Date.today(timezone)
    now = datetime.datetime.now(timezone)
    week_date = today
    year, week, _ = week_date.isocalendar()
    sale_date = Subscription.get_sale_date(year, week)
    while (not sale_date
            or (sale_date < today
                or (sale_date == today and now.time() > util.CLOSING_TIME))):
        week_date += relativedelta(weeks=1)
        year, week, _ = week_date.isocalendar()
        sale_date = Subscription.get_sale_date(year, week)
        if subscription.frequency:
            new_modulo = ((subscription.frequency_modulo + 1)
                % FREQUENCY_LENGTH[subscription.frequency])
        else:
            new_modulo = None
        subscription.frequency_modulo = new_modulo
        subscription.save()

    sales = Subscription.create_sale(
        subscription.company, year, week, [subscription])
    if sales:
        sale, = sales
        util.set_session_sale(sale)
        return sale
