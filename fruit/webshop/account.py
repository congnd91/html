from urllib.parse import urljoin

from flask import render_template, redirect, url_for, request, abort
from flask_babel import lazy_gettext, pgettext
from flask_login import fresh_login_required
from wtforms import fields
from wtforms.fields import html5 as fields_html5
from wtforms.validators import DataRequired, Email

from . import app, tryton
from . import util
from .compat import HTTPStatus

Address = tryton.pool.get('party.address')
ContactMechanism = tryton.pool.get('party.contact_mechanism')
Country = tryton.pool.get('country.country')
Lang = tryton.pool.get('ir.lang')
MarketingEmail = tryton.pool.get('marketing.email')
WebUser = tryton.pool.get('web.user')


class PartyForm(util.Form):
    name = fields.StringField(
        lazy_gettext("Full Name"), validators=[DataRequired()])
    nickname = fields.StringField(lazy_gettext("Nickname"))
    lang = fields.SelectField(
        lazy_gettext("Language"),
        coerce=lambda a: None if str(a) == 'None' else int(a))

    def __init__(self, *args, **kwargs):
        super(PartyForm, self).__init__(*args, **kwargs)

        self.lang.choices = [(None, '')] + [
            (l.id, l.name) for l in Lang.search([
                    'OR',
                    ('translatable', '=', True),
                    ('code', '=', 'en'),
                    ])]


class UserForm(util.Form):

    email = fields.StringField(
        lazy_gettext("E-Mail"), validators=[DataRequired(), Email()])
    party = fields.FormField(PartyForm, lazy_gettext("Party"))


class AddressForm(util.Form):

    party_name = fields.StringField(lazy_gettext("Name"))
    street = fields.TextAreaField(
        lazy_gettext("Street"), validators=[DataRequired()])
    zip = fields.StringField(
        lazy_gettext("Zip"), validators=[DataRequired()])
    city = fields.StringField(
        lazy_gettext("City"), validators=[DataRequired()])
    country = fields.SelectField(
        lazy_gettext('Country'),
        coerce=lambda a: None if (str(a) == 'None' or not a) else int(a),
        validators=[DataRequired()])

    delivery = fields.BooleanField(
        lazy_gettext("Use for Shipping"))
    invoice = fields.BooleanField(
        lazy_gettext("Use for Invoicing"))

    def __init__(self, *args, **kwargs):
        super(AddressForm, self).__init__(*args, **kwargs)

        codes = app.config.get('COUNTRIES', [])
        countries = Country.search([('code', 'in', codes)])
        countries.sort(key=lambda x: codes.index(x.code))
        self.country.choices = [('', '')] + [(c.id, c.name) for c in countries]


class ContactForm(util.Form):

    type = fields.SelectField(
        lazy_gettext("Type"),
        choices=[
            ('phone', lazy_gettext("Phone")),
            ('mobile', lazy_gettext("Mobile")),
            ])
    value = fields_html5.TelField(validators=[DataRequired(), util.tel_valid])


@app.route('/account')
@app.route('/<lang_code>/account')
@tryton.transaction()
@fresh_login_required
def account():
    web_user = util.get_session_user()
    party = web_user.party

    if party.stripe_customers:
        customer = party.stripe_customers[0]
        payments = dict(customer.sources())
        payments.update(customer.payment_methods())
        payments = list(payments.items())
    else:
        payments = []
    payments.sort(key=lambda p: p[1])

    deposit_url = url_for('deposit')
    deposit_url = urljoin(request.host_url, deposit_url)
    for address in party.addresses:
        if address.country:
            default_country = address.country
            break
    else:
        default_country = None

    return render_template('account.html',
        web_user=web_user,
        party=party,
        payments=payments,
        stripe_key=util.get_stripe_account().publishable_key,
        default_country=default_country,
        deposit_url=deposit_url,
        pgettext=pgettext,
        )


@app.route('/<lang_code>/account/user', methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def account_user():
    web_user = util.get_session_user()
    current_email = web_user.email

    form = UserForm(obj=web_user)
    if form.validate_on_submit():
        form.populate_obj(web_user)

        if current_email != web_user.email:
            web_user.email_valid = False
            # Remove old email and add new one as contact mechanism
            to_save = [
                ContactMechanism(
                    party=web_user.party,
                    type='email',
                    value=web_user.email),
                ]
            for contact in web_user.party.contact_mechanisms:
                if contact.type == 'email' and contact.value == current_email:
                    contact.active = False
                    to_save.append(contact)
            ContactMechanism.save(to_save)

            # Re-subscribe to existing mailing list
            marketing_emails = MarketingEmail.search([
                    ('email', '=', current_email),
                    ])
            for marketing_email in marketing_emails:
                marketing_email.list_.request_unsubscribe(current_email)
                marketing_email.list_.request_subscribe(web_user.email)

        # Save first the Many2One otherwise modification will be lost
        web_user.party.save()
        web_user.save()
        if current_email != web_user.email:
            WebUser.validate_email([web_user])

        return redirect(util.get_redirect_target() or url_for('account'))

    return render_template('account_user.html',
        form=form)


@app.route('/<lang_code>/account/payment/<payment>', methods={'POST'})
@tryton.transaction()
@fresh_login_required
def account_delete_payment(payment):
    party = util.get_session_party()
    if payment and party.stripe_customers:
        customer = party.stripe_customers[0].retrieve()
        util.delete_stripe_payment(customer, payment)
    return redirect(util.get_redirect_target() or url_for('account'))


@app.route('/<lang_code>/account/address/<record("party.address"):address>',
    methods={'GET', 'POST'})
@app.route('/<lang_code>/account/address', methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def account_address(address=None):
    party = util.get_session_party()
    if address is None:
        address = Address(party=party)
        address.country = util.get_remote_country()
    elif address.party != party:
        abort(HTTPStatus.FORBIDDEN)
    form = AddressForm(obj=address)
    if form.validate_on_submit():
        form.populate_obj(address)
        # Ensure subdivision is empty
        address.subdivision = None
        address.save()
        sale = util.get_session_sale()
        if sale and (form.delivery.data or form.invoice.data):
            if form.delivery.data:
                sale.shipment_address = address
            if form.invoice.data:
                sale.invoice_address = address
            util.fix_carrier(sale)
            sale.save()
        return redirect(util.get_redirect_target() or url_for('account'))
    return render_template('account_address.html', form=form, id=address.id)


@app.route('/<lang_code>/account/address/'
    '<record("party.address"):address>/delete',
    methods={'POST'})
@tryton.transaction()
@fresh_login_required
def account_address_delete(address):
    party = util.get_session_party()
    if address.party != party:
        abort(HTTPStatus.FORBIDDEN)
    address.active = False
    address.save()
    return redirect(util.get_redirect_target() or url_for('account'))


@app.route('/<lang_code>/account/contact/'
    '<record("party.contact_mechanism"):contact>',
    methods={'GET', 'POST'})
@app.route('/<lang_code>/account/contact', methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def account_contact(contact=None):
    party = util.get_session_party()
    if contact is None:
        contact = ContactMechanism(party=party)
    elif contact.party != party:
        abort(HTTPStatus.FORBIDDEN)
    form = ContactForm(obj=contact)
    if form.validate_on_submit():
        form.populate_obj(contact)
        contact.save()
        return redirect(util.get_redirect_target() or url_for('account'))
    return render_template('account_contact.html',
        form=form, id=contact.id,
        countries=app.config.get('COUNTRIES', []))


@app.route('/<lang_code>/account/contact/'
    '<record("party.contact_mechanism"):contact>/delete',
    methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def account_contact_delete(contact):
    party = util.get_session_party()
    if contact.party != party:
        abort(HTTPStatus.FORBIDDEN)
    contact.active = False
    contact.save()
    return redirect(util.get_redirect_target() or url_for('account'))
