from collections import namedtuple, OrderedDict

from flask import (
    render_template, redirect, url_for, request, abort, make_response)
from flask_babel import lazy_gettext, gettext
from flask_login import fresh_login_required, login_required
from wtforms import fields, widgets
from wtforms.validators import DataRequired
from wtforms.widgets import HTMLString

from . import app, tryton, util
from .account import AddressForm as AddressNewForm
from .account import ContactForm as ContactNewForm
from .compat import HTTPStatus
from .subscription import create_sale

Carrier = tryton.pool.get('carrier')
CarrierSelection = tryton.pool.get('carrier.selection')
Currency = tryton.pool.get('currency.currency')
Date = tryton.pool.get('ir.date')
Item = namedtuple(
    'Item', 'product description quantity unit total_amount'.split())
Location = tryton.pool.get('stock.location')
Payment = tryton.pool.get('account.payment')
Sale = tryton.pool.get('sale.sale')
Subscription = tryton.pool.get('sale.subscription.box')


class ContactForm(util.Form):
    def __init__(self, *args, **kwargs):
        super(ContactForm, self).__init__(*args, **kwargs)
        self.order = kwargs.get('obj')

    def validate(self):
        result = super(ContactForm, self).validate()
        if not util.get_phone(self.order.party):
            result = False
        return result


class AddressForm(util.Form):
    shipment_address = util.CustomRadioField(
        lazy_gettext("Shipping Address"), coerce=int,
        validators=[DataRequired(), util.AddressComplete()])
    invoice_address = util.CustomRadioField(
        lazy_gettext("Invoicing Address"), coerce=int,
        validators=[DataRequired(), util.AddressComplete()])

    def __init__(self, *args, **kwargs):
        super(AddressForm, self).__init__(*args, **kwargs)
        sale = kwargs.get('obj')
        if sale:
            addresses = [
                (a.id, util.address_line(a)) for a in sale.party.addresses]
            self.shipment_address.choices = addresses
            self.invoice_address.choices = addresses


class DeliveryForm(util.Form):
    warehouse = fields.IntegerField(lazy_gettext("Warehouse"))
    shipment_address = fields.IntegerField(
        lazy_gettext("Shipping Address"))
    shipping_date_base = fields.DateField(
        lazy_gettext("Shipping Date Base"))
    carrier = util.CustomRadioField(
        lazy_gettext("Carrier"), coerce=int,
        validators=[DataRequired(), util.CarrierValid()])
    shipping_day = util.CustomRadioField(
        lazy_gettext("Shipping Day"),
        coerce=lambda a: None if str(a) == 'None' else a,
        validators=[
            DataRequired(),
            util.ShippingDayValid(
                date='shipping_date_base', address='shipment_address')])

    def __init__(self, *args, **kwargs):
        super(DeliveryForm, self).__init__(*args, **kwargs)
        self.order = kwargs.get('obj')
        if self.order:
            pattern = {
                'party_categories': list(
                    map(int, self.order.party.categories)),
                }
            warehouse = self.order.warehouse
            if (warehouse
                    and warehouse.address
                    and warehouse.address.country):
                pattern['from_country'] = warehouse.address.country.id
            if (self.order.shipment_address
                    and self.order.shipment_address.country):
                pattern['to_country'] = self.order.shipment_address.country.id
            carriers = CarrierSelection.get_carriers(pattern)
            self.carrier.choices = [
                (c.id, util.carrier_line(c, order=self.order))
                for c in Carrier.search([
                        ('carrier_product.salable', '=', True),
                        ('id', 'in', list(map(int, carriers))),
                        ])]
            self._update_shipping_day()

    def validate(self):
        if (not self.order.carrier
                or self.order.carrier.id != self.carrier.data):
            self.populate_obj(self.order)
            self.order.save()
            self._update_shipping_day()
            return False
        return super(DeliveryForm, self).validate()

    def _update_shipping_day(self):
        selection = Sale.fields_get(
            ['shipping_day'])['shipping_day']['selection']
        self.shipping_day.choices = [v for v in selection if v[0]]
        if isinstance(self.order, Sale):
            sale = Sale(self.order.id)
            choices = []
            delivery_dates = {}
            warning_delay = {}
            for k, v in self.shipping_day.choices:
                sale.shipping_day = k
                sale.shipping_date = sale.get_shipping_date('shipping_date')
                sale.delivery_date = sale.get_delivery_date('delivery_date')
                val = util.format_date(
                    sale.shipping_day_date, format='%A %d, %B')
                delivery_dates[k] = util.format_date(
                    sale.delivery_date, format='%A %d, %B')
                choices.append((sale.shipping_date, k, val))
                delay = sale.delivery_date - sale.shipping_date
                if delay.days > 2:
                    warning_delay[k] = gettext(
                        "Order at your own risk! "
                        "In case of a delivery time longer than %(days)s days "
                        "we do not provide quality guarantee for the products "
                        "(except of course for the dried products).",
                        days=2)
                else:
                    warning_delay[k] = ''
            self.shipping_day.choices = [
                (k, v) for d, k, v in sorted(choices)]
            self.shipping_day.delivery_dates = delivery_dates
            self.shipping_day.warning_delay = warning_delay

    def guaranteed_carriers(self):
        carriers = Carrier.browse([c[0] for c in self.carrier.choices])
        return [c for c in carriers if c.guaranteed]


class _UncheckedRequiredRadioInput(widgets.Input):
    input_type = 'radio'

    def __call__(self, field, **kwargs):
        kwargs.setdefault('class', '')
        kwargs['class'] += ' custom-control-input'
        kwargs['required'] = True
        return super(_UncheckedRequiredRadioInput, self).__call__(
            field, **kwargs)


class PaymentForm(util.Form):
    stripe_customer_payment = util.CustomRadioField(
        lazy_gettext("Payment"),
        coerce=lambda a: None if str(a) == 'None' else a,
        option_widget=_UncheckedRequiredRadioInput())

    def __init__(self, *args, **kwargs):
        super(PaymentForm, self).__init__(*args, **kwargs)
        self.order = kwargs.get('obj')
        if self.order:
            payments = []
            for payment, name in sorted(
                    self.order.get_stripe_customer_payments(),
                    key=lambda p: p[1]):
                if payment:
                    payments.append(
                        (payment, util.StripeSourceWidget(name)))
            if isinstance(self.order, Sale):
                # Check default source if it is not the first sale
                if Sale.search([
                            ('party', '=', self.order.party.id),
                            ('id', '!=', self.order.id),
                            ('state', '!=', 'cancel'),
                            ], limit=1):
                    self.stripe_customer_payment.option_widget = (
                        util.CustomRadioInput())
                available_deposit = util.available_deposit(self.order.party)
                with util.apply_promotion(self.order):
                    extra_amount = self.order.extra_amount
                if available_deposit >= extra_amount >= 0:
                    payments = [(None, gettext('Deposit'))]
                else:
                    redirect = HTMLString(
                        ' <span class="custom-control-info">%s</span>' % (
                            gettext(
                                '(you will be redirected to SOFORT platform)'))
                        )
                    payments.append((None, gettext('SOFORT') + redirect))
            self.stripe_customer_payment.choices = payments


@app.route('/checkout/sale/<record("sale.sale"):order>')
@app.route(
    '/<lang_code>/checkout/sale/<record("sale.sale"):order>',
    methods={'GET', 'POST'})
def checkout_sale(order):
    return checkout(order)


@app.route(
    '/<lang_code>/checkout/subscription/'
    '<record("sale.subscription.box"):order>',
    methods={'GET', 'POST'})
def checkout_subscription(order):
    return checkout(order)


@tryton.transaction(readonly=False)
@fresh_login_required
def checkout(order):
    party = util.get_session_party()

    if order.state not in {'draft', 'quotation'}:
        if isinstance(order, Sale):
            return redirect(url_for('checkout_sale_end', order=order))
        elif isinstance(order, Subscription):
            return redirect(url_for('checkout_subscription_end', order=order))
        return redirect(url_for('index'))

    if order.party != party:
        abort(HTTPStatus.FORBIDDEN)

    step = request.args.get('step')

    if isinstance(order, Sale):
        if order.state == 'draft':
            if util.sale_valid(order):
                util.compute_shipment_cost(order)
            sale_date = util.sale_date(order.company)
            if order.sale_date != sale_date:
                order.sale_date = sale_date
                order.save()
            if not order.lines:
                return redirect(url_for('index'))
        else:
            step = 'payment'
    elif isinstance(order, Subscription):
        pass

    steps = OrderedDict([
            ('contact', (ContactForm, ContactNewForm)),
            ('address', (AddressForm, AddressNewForm)),
            ('delivery', (DeliveryForm, None)),
            ('payment', (PaymentForm, None)),
            ])
    deposit = None

    def get_forms(step):
        form, form_new = steps.get(step, (None, None))
        if form:
            form = form(obj=order)
        if form_new:
            form_new = form_new()
        return form, form_new

    def next_step(step):
        keys = list(steps.keys())
        if not step:
            step = keys[0]
        i = keys.index(step) + 1

        for s in keys[:i]:
            f, _ = get_forms(s)
            if not f.validate():
                break
        else:
            try:
                s = keys[i]
            except IndexError:
                s = None
        return s

    form, form_new = get_forms(step)
    if form and form.validate_on_submit():
        carrier_old = order.carrier
        form.populate_obj(order)
        if isinstance(order, Sale):
            util.fix_carrier(order)
            if order.carrier != carrier_old:
                util.compute_shipment_cost(order)
            if step == 'address':
                # Re-compute the prices
                for line in order.lines:
                    line.sale = order  # Ensure to use the modified sale
                    line.on_change_product()
                order.lines = order.lines  # Force changes
        order.save()
        step = next_step(step)
        if step:
            return redirect(url_for(
                    request.endpoint, order=order, step=step, _anchor=step))
        if isinstance(order, Sale):
            sale = order
            available_deposit = max(util.available_deposit(sale.party), 0)
            with util.apply_promotion(sale):
                amount = sale.extra_amount
            for p in sale.payments:
                if p.state != 'failed':
                    amount -= p.amount
            if (sale.stripe_customer_payment
                    or available_deposit >= amount >= 0):
                Sale.quote([sale])
                payment = sale.make_payment()
                if payment:
                    Payment.stripe_charge([payment], off_session=False)
                util.set_session_sale(None)
                next_ = url_for('checkout_sale_end', order=order)
                if payment and payment.stripe_payment_intent:
                    return redirect(url_for(
                            'payment_confirm', payment=payment, next=next_))
                else:
                    return redirect(next_)
            else:
                step = 'payment'
                deposit = amount
        elif isinstance(order, Subscription):
            Subscription.run([order])
            create_sale(order)
            return redirect(url_for('checkout_subscription_end', order=order))
    elif not step:
        step = next_step(step)
        return redirect(url_for(
                request.endpoint, order=order, step=step, _anchor=step))

    dataLayer = [{
            'event': 'checkout',
            'ecommerce': {
                'checkout': {
                    'actionField': {
                        'step': list(steps.keys()).index(step) + 1,
                        'option': step,
                        },
                    'products': _products_data(order),
                    },
                },
            }]

    items = []
    render_kw = dict(
        steps=steps,
        steps_list=list(steps),
        step=step,
        order=order,
        items=items,
        form=form,
        form_new=form_new,
        stripe_key=util.get_stripe_account().publishable_key,
        countries=app.config.get('COUNTRIES', []),
        extra_percentage=Sale.extra_percentage(),
        dataLayer=dataLayer,
        )
    if isinstance(order, Sale):
        sale = order
        total_amount = sale.total_amount
        sub_total = sale.sub_total
        shipping_cost = sale.total_shipping_cost
        for line in order.lines:
            if not line.shipment_cost:
                items.append(Item(
                        product=line.product,
                        description=line.description,
                        quantity=line.quantity,
                        unit=line.unit,
                        total_amount=line.total_amount))
        if sale.invoice_address and sale.invoice_address.country:
            default_country = sale.invoice_address.country
        elif sale.shipment_address and sale.shipment_address.country:
            default_country = sale.shipment_address.country
        else:
            default_country = None

        with util.apply_promotion(sale):
            discount_amount = sale.total_amount - total_amount
            available_deposit = max(util.available_deposit(sale.party), 0)
            deposit_amount = min(available_deposit, sale.extra_amount)
            total_amount = sale.total_amount
            amount = sale.extra_amount
            for p in sale.payments:
                if p.state != 'failed':
                    amount -= p.amount
            if (order.state == 'quotation'
                    and available_deposit >= amount >= 0):
                return redirect(url_for('checkout_sale_end', order=order))
            content = render_template('checkout.html',
                sub_total=sub_total,
                shipping_cost=shipping_cost,
                discount_amount=discount_amount,
                available_deposit=available_deposit,
                deposit_amount=deposit_amount,
                total_amount=total_amount,
                currency=sale.currency,
                deposit=deposit,
                default_country=default_country,
                **render_kw)
    elif isinstance(order, Subscription):
        subscription = order
        currency = subscription.company.currency
        if subscription.carrier:
            cost, cur = util.compute_carrier_cost(
                subscription.carrier, order=order)
            shipping_cost = Currency.compute(cur, cost, currency)
        else:
            shipping_cost = None
        price = currency.round(util.get_sale_price(subscription.box))
        items.append(Item(
                product=subscription.box,
                description=subscription.box.rec_name,
                quantity=1,
                unit=subscription.box.default_uom,
                total_amount=price))
        total_amount = price + (shipping_cost or 0)
        content = render_template('checkout.html',
            currency=subscription.company.currency,
            shipping_cost=shipping_cost,
            total_amount=total_amount,
            **render_kw)
    response = make_response(content)
    response.cache_control.no_cache = True
    response.cache_control.no_store = True
    return response


@app.route('/<lang_code>/checkout/sale/<record("sale.sale"):order>/end')
def checkout_sale_end(order):
    return checkout_end(order)


@app.route(
    '/<lang_code>/checkout/subscription/'
    '<record("sale.subscription.box"):order>/end')
def checkout_subscription_end(order):
    return checkout_end(order)


@tryton.transaction()
@login_required
def checkout_end(order):
    party = util.get_session_party()
    if order.party != party:
        abort(HTTPStatus.FORBIDDEN)

    if isinstance(order, Sale):
        revenue = str(order.total_amount)
        tax = str(order.tax_amount)
        shipping = str(order.total_shipping_cost)
    elif isinstance(order, Subscription):
        revenue = None
        tax = None
        shipping, _ = util.compute_carrier_cost(order.carrier, order=order)
        shipping = str(shipping)
    dataLayer = [{
            'ecommerce': {
                'purchase': {
                    'actionField': {
                        'id': order.id,
                        'revenue': revenue,
                        'tax': tax,
                        'shipping': shipping,
                        },
                    'products': _products_data(order),
                    },
                },
            }]
    return render_template(
        'checkout_end.html', order=order, dataLayer=dataLayer)


def _products_data(order):
    if isinstance(order, Sale):
        products = [{
                'name': (line.product.name if line.product
                    else line.description),
                'id': (line.product.code[:100]
                    if line.product and line.product.code else None),
                'price': str(line.total_amount),
                } for line in order.lines]
    else:
        products = [{
                'name': order.box.name,
                'id': order.box.code[:100] if order.box.code else None,
                }]
    return products
