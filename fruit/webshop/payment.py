from decimal import Decimal

import stripe

from flask import (
    request, json, abort, jsonify, render_template, redirect, url_for)
from flask_login import login_required, fresh_login_required

from . import app, tryton
from . import util
from .compat import HTTPStatus

Customer = tryton.pool.get('account.payment.stripe.customer')
Currency = tryton.pool.get('currency.currency')
Journal = tryton.pool.get('account.payment.journal')
Payment = tryton.pool.get('account.payment')
PaymentGroup = tryton.pool.get('account.payment.group')
Sale = tryton.pool.get('sale.sale')


@app.route('/payment/setup_intent', methods={'POST'})
@tryton.transaction()
@login_required
def payment_setup_intent():
    stripe_account = util.get_stripe_account()
    party = util.get_session_party()
    try:
        if party.stripe_customers:
            customer = party.stripe_customers[0]
            if customer.stripe_setup_intent_id:
                return customer.stripe_setup_intent.client_secret
        else:
            cu = stripe.Customer.create(
                api_key=stripe_account.secret_key,
                description=party.rec_name,
                email=party.email)
            customer = Customer(
                party=party,
                stripe_account=stripe_account,
                stripe_customer_id=cu.id)
        setup_intent = stripe.SetupIntent.create(
            api_key=stripe_account.secret_key,
            customer=customer.stripe_customer_id)
    except stripe.error.StripeError as e:
        return (
            jsonify(e.user_message), HTTPStatus.INTERNAL_SERVER_ERROR)
    customer.stripe_setup_intent_id = setup_intent.id
    customer.save()
    return setup_intent.client_secret


@app.route('/payment/setup_intent/update', methods={'POST'})
@tryton.transaction()
@login_required
def payment_setup_intent_update():
    party = util.get_session_party()
    customer = party.stripe_customers[0]
    setup_intent = customer.stripe_setup_intent
    customer.stripe_intent_update()
    if setup_intent:
        update_customer_payment(customer, setup_intent.payment_method)
    return ('', HTTPStatus.NO_CONTENT)


@app.route('/payment/confirm/<record("account.payment"):payment>',
    methods={'GET'})
@app.route('/<lang_code>/payment/confirm/<record("account.payment"):payment>',
    methods={'GET'})
@tryton.transaction()
@fresh_login_required
def payment_confirm(payment):
    party = util.get_session_party()
    if payment.party != party:
        abort(HTTPStatus.FORBIDDEN)
    payment_intent = payment.stripe_payment_intent
    if not payment_intent:
        abort(HTTPStatus.FORBIDDEN)
    if isinstance(payment.origin, Sale):
        end_url = url_for('checkout_sale_end', order=payment.origin)
    else:
        end_url = url_for('payment_confirm_end')
    if payment_intent.status == 'succeeded':
        return redirect(end_url)
    return render_template('payment_confirm.html',
        payment=payment,
        stripe_key=util.get_stripe_account().publishable_key,
        end_url=end_url)


@app.route('/<lang_code>/payment/confirm/end')
@tryton.transaction()
def payment_confirm_end():
    return render_template('payment_confirm_end.html')


@app.route('/payment/cancel/<record("account.payment"):payment>',
    methods={'POST'})
@tryton.transaction()
@fresh_login_required
def payment_cancel(payment):
    party = util.get_session_party()
    if payment.party != party:
        abort(HTTPStatus.FORBIDDEN)
    payment_intent = payment.stripe_payment_intent
    if not payment_intent:
        abort(HTTPStatus.FORBIDDEN)
    if payment_intent.status in {'processing', 'succeeded'}:
        abort(HTTPStatus.FORBIDDEN)
    if payment_intent.status != 'canceled':
        payment_intent.cancel()
        Payment.fail([payment])
    if isinstance(payment.origin, Sale):
        return redirect(url_for(
                'checkout_sale', order=payment.origin, step='payment'))
    return redirect(url_for('index'))


@app.route('/payment/source/register', methods={'POST'})
@tryton.transaction()
def payment_source_register():
    stripe_account = util.get_stripe_account()
    source = json.loads(request.form['source'])
    source = stripe.Source.retrieve(
        source['id'], api_key=stripe_account.secret_key)
    party = util.get_session_party()
    if not party:
        abort(HTTPStatus.BAD_REQUEST)
    if source.type == 'sepa_debit' and not party.sepa_debit_allowed:
        abort(HTTPStatus.FORBIDDEN)
    try:
        if party.stripe_customers:
            customer = party.stripe_customers[0]
            cu = customer.retrieve()
            cu.sources.create(source=source['id'])
            cu.save()
        else:
            cu = stripe.Customer.create(
                api_key=stripe_account.secret_key,
                source=source['id'])
            customer = Customer(
                party=party,
                stripe_account=stripe_account,
                stripe_customer_id=cu.id)
    except stripe.error.StripeError as e:
        return (
            jsonify(e.user_message), HTTPStatus.INTERNAL_SERVER_ERROR)
    customer.save()
    Customer._sources_cache.clear()
    update_customer_payment(customer, source['id'])
    return ('', HTTPStatus.NO_CONTENT)


@app.route('/payment/register', methods={'POST'})
@tryton.transaction()
def payment_register():
    source = json.loads(request.form['source'])
    party = util.get_session_party()
    if not party:
        abort(HTTPStatus.BAD_REQUEST)
    currency, = Currency.search([
            ('code', '=', source['currency'].upper()),
            ])
    payment = Payment()
    payment.company = util.get_company()
    payment.kind = 'receivable'
    payment.party = party
    payment.origin = request.args.get('origin', None)
    if not payment.origin:
        payment.account = util.get_deposit_account()
    payment.amount = Decimal(source['amount']) / (10 ** currency.digits)
    payment.journal = util.get_stripe_journal()
    payment.stripe_token = source['id']
    payment.stripe_chargeable = source['status'] == 'chargeable'
    if isinstance(payment.origin, Sale):
        Sale.quote([payment.origin])
    payment.save()
    Payment.approve([payment])
    group = PaymentGroup(
        company=payment.company, journal=payment.journal, kind=payment.kind)
    group.save()
    Payment.process([payment], lambda: group)
    return ('', HTTPStatus.NO_CONTENT)


@app.route('/payment/wait', methods={'GET'})
@tryton.transaction()
def payment_wait():
    return render_template('payment_wait.html',
        stripe_key=util.get_stripe_account().publishable_key,
        source=request.args.get('source'),
        client_secret=request.args.get('client_secret'),
        next=util.get_redirect_target())


def update_customer_payment(customer, payment):
    sales = util.get_session_sales()
    current_sale = util.get_session_sale()
    for sale in sales:
        if not sale.stripe_customer:
            sale.stripe_customer = customer
        if (sale.stripe_customer == customer
                and (not sale.stripe_customer_payment
                    or sale == current_sale)):
            sale.stripe_customer_payment = payment
    Sale.save(sales)
    subscription = util.get_session_subscription()
    if subscription:
        if not subscription.stripe_customer:
            subscription.stripe_customer = customer
        if not subscription.stripe_customer_payment:
            subscription.stripe_customer_payment = payment
        subscription.save()
