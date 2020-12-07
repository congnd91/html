from flask import redirect, url_for, flash, g, request, render_template
from flask_babel import lazy_gettext, gettext

from wtforms import fields
from wtforms.validators import DataRequired, Email as EmailValidator

from . import app, tryton, util

Email = tryton.pool.get('marketing.email')
EmailList = tryton.pool.get('marketing.email.list')


class SubscribeForm(util.Form):
    email = fields.TextField(lazy_gettext("Email"),
        validators=[DataRequired(), EmailValidator()])


class UnsubscribeForm(util.Form):
    email = fields.TextField(lazy_gettext("Email"),
        validators=[DataRequired(), EmailValidator()])


@app.route('/<lang_code>/mailing/request_subscribe', methods={'POST'})
@tryton.transaction()
def mailing_request_subscribe():
    form = SubscribeForm()
    if form.validate_on_submit():
        email = form.email.data.strip()
        email_lists = EmailList.search([
                ('language.code', '=', g.lang_code),
                ])
        for email_list in email_lists:
            email_list.request_subscribe(email)
        if email_lists:
            flash(gettext("A subscription email has been sent."))
    else:
        error = '\n'.join(e for l in form.errors.values() for e in l)
        flash(error, 'error')
    return redirect(url_for('index'))


@app.route('/<lang_code>/mailing/request_unsubscribe', methods={'GET', 'POST'})
@tryton.transaction()
def mailing_request_unsubscribe():
    form = UnsubscribeForm()
    if form.validate_on_submit():
        email = form.email.data.strip()
        email_lists = EmailList.search([
                ('language.code', '=', g.lang_code),
                ], limit=1)
        for email_list in email_lists:
            email_list.request_unsubscribe(email)
        if email_lists:
            flash(gettext("An email to unsubscribe has been sent."))
            return redirect(url_for('index'))
    return render_template('mailing_unsubscribe.html', form=form)


@app.route('/mailing/subscribe', methods={'GET', 'POST'})
@tryton.transaction(readonly=False)
def mailing_subscribe():
    if Email.subscribe([request.values['token']]):
        flash(gettext("Your subscription has been registered."))
    return redirect(url_for('index'))


@app.route('/mailing/unsubscribe', methods={'GET', 'POST'})
@tryton.transaction(readonly=False)
def mailing_unsubscribe():
    if Email.unsubscribe([request.values['token']]):
        flash(gettext("Your subscription has been canceled."))
    return redirect(url_for('index'))
