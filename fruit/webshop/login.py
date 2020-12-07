import time

from wtforms import fields
from wtforms.validators import DataRequired, EqualTo, Email

from flask import (render_template, redirect, request, url_for, session, flash,
    abort, g)
from flask_login import (LoginManager, UserMixin, login_user, logout_user,
    login_required, current_user, login_url, confirm_login,
    fresh_login_required)
from flask_babel import lazy_gettext, gettext
from . import app, tryton
from . import util
from .compat import HTTPStatus

from trytond.exceptions import UserError
from trytond.transaction import Transaction

login_manager = LoginManager()
login_manager.init_app(app)
login_manager.login_view = 'login'
login_manager.login_message = lazy_gettext(
    "Please log in to access this page.")
login_manager.refresh_view = 'login_refresh'
login_manager.needs_refresh_message = lazy_gettext(
    "Please reauthenticate to access this page.")
# Force to convert lazy string as some versions are not jsonifiable
login_manager.localize_callback = str

WebUser = tryton.pool.get('web.user')
Party = tryton.pool.get('party.party')
Sale = tryton.pool.get('sale.sale')
ContactMechanism = tryton.pool.get('party.contact_mechanism')
EmailList = tryton.pool.get('marketing.email.list')


class LoginRefreshForm(util.Form):

    password = fields.PasswordField(lazy_gettext('Password'),
        validators=[DataRequired()])


class ForgotForm(util.Form):

    email = fields.TextField(lazy_gettext("E-Mail"),
        validators=[DataRequired(), Email()])


class LoginForm(LoginRefreshForm, ForgotForm):

    remember = fields.BooleanField(lazy_gettext("Remember me"))


class RegistrationForm(LoginForm):

    name = fields.StringField(lazy_gettext("Your Full Name"),
        validators=[DataRequired()])
    nickname = fields.StringField(lazy_gettext("Your Nickname"))
    password2 = fields.PasswordField(lazy_gettext("Re-enter Password"),
        validators=[
            DataRequired(),
            EqualTo('password',
                message=lazy_gettext("Passwords must match"))])
    mailing_subscribe = fields.BooleanField(
        lazy_gettext("Keep me informed of the news and special offers"),
        default=True)


class ResetForm(LoginForm):

    token = fields.HiddenField(lazy_gettext('Token'),
        validators=[DataRequired()])
    password2 = fields.PasswordField(lazy_gettext("Re-enter Password"),
        validators=[
            DataRequired(),
            EqualTo('password',
                message=lazy_gettext("Passwords must match"))])


class ChangeForm(LoginRefreshForm):

    new_password = fields.PasswordField(lazy_gettext("New Password"),
        validators=[DataRequired()])
    new_password2 = fields.PasswordField(lazy_gettext("Re-enter Password"),
        validators=[
            DataRequired(),
            EqualTo('new_password',
                message=lazy_gettext("Passwords must match"))])


class User(UserMixin):

    def __init__(self, user):
        self.id = user.id
        self.email = user.email
        self.name = user.party.nickname if user.party else user.email
        self.email_valid = user.email_valid
        self._active = user.active

    @classmethod
    def get(cls, userid):
        try:
            return cls(WebUser(int(userid)))
        except UserError:  # In case the user has been deleted
            return None

    @property
    def is_active(self):
        return self._active

    @staticmethod
    @login_manager.user_loader
    def load_user(userid):
        return User.get(userid)


@app.route('/login', methods={'GET', 'POST'})
@app.route('/<lang_code>/login', methods={'GET', 'POST'})
@tryton.transaction()
def login():
    if current_user and current_user.is_authenticated:
        return redirect(util.get_redirect_target() or url_for('index'))
    form = LoginForm()
    if form.validate_on_submit():
        # Keep in sync with reset_password
        party = util.get_session_party()
        sales = util.get_session_sales()
        sale = util.get_session_sale()
        web_user = WebUser.authenticate(form.email.data, form.password.data)
        if web_user and web_user.party:
            user = User(web_user)
            util.clear_session()
            if login_user(user, remember=form.remember.data):
                if web_user.party != party and sales:
                    reset_agent = util.sale_count(web_user.party) >= 1
                    for sale in sales:
                        sale.party = web_user.party
                        if reset_agent:
                            sale.agent = None
                        sale.on_change_party()
                        # Re-compute the prices
                        for line in sale.lines:
                            line.sale = sale  # Ensure to use the modified sale
                            line.on_change_product()
                        sale.lines = sale.lines  # Force changes
                    Sale.save(sales)
                util.merge_sales(sale)
                flash(gettext("You are logged as %(name)s", name=user.name))
                return redirect(util.get_redirect_target() or url_for('index'))
        flash(gettext("Wrong email or password"), 'error')
    return render_template('login.html', form=form)


@app.route('/<lang_code>/login_refresh', methods={'GET', 'POST'})
@tryton.transaction()
def login_refresh():
    if not current_user or not current_user.is_authenticated:
        return redirect(login_url('login'))
    form = LoginRefreshForm()
    if form.validate_on_submit():
        web_user = WebUser.authenticate(current_user.email, form.password.data)
        if web_user:
            confirm_login()
            return redirect(util.get_redirect_target() or url_for('index'))
    return render_template('login_refresh.html', form=form)


@app.route('/logout')
@tryton.transaction()
@login_required
def logout():
    logout_user()
    util.clear_session()
    flash(gettext("You are logged out"))
    return redirect(url_for('index'))


@app.route('/validate_email')
@tryton.transaction(readonly=False)
def validate_email():
    if WebUser.validate_email_token([request.args.get('token')]):
        flash(gettext("Your E-mail is validated"))
    return redirect(url_for('index'))


@app.route('/<lang_code>/register', methods={'GET', 'POST'})
@tryton.transaction()
def register():
    if current_user and current_user.is_authenticated:
        logout_user()
        util.clear_session()
    form = RegistrationForm()
    if form.validate_on_submit():
        Transaction().atexit(time.sleep, 1)
        web_user = WebUser()
        if WebUser.search([
                    ('email', '=', form.email.data.lower()),
                    ]):
            flash(gettext("Account already exists"))
            return redirect(url_for('login'))
        web_user.email = form.email.data
        web_user.password = form.password.data
        if 'party' in session:
            party = util.get_session_party()
        else:
            party = util.create_party()
        party.name = form.name.data
        party.nickname = form.nickname.data
        party.active = True
        party.contact_mechanisms = [ContactMechanism(
                type='email', value=form.email.data)]
        party.save()
        web_user.party = party
        web_user.save()
        WebUser.validate_email([web_user])

        flash_text = []
        if form.mailing_subscribe.data:
            email_lists = EmailList.search([
                    ('language.code', '=', g.lang_code),
                    ])
            for email_list in email_lists:
                email_list.request_subscribe(form.email.data)
            if email_lists:
                flash_text.append(gettext(
                        "An activation and subscription emails "
                        "have been sent."))
        else:
            flash_text.append(gettext("An activation email has been sent"))

        user = User(web_user)
        if login_user(user, remember=form.remember.data):
            flash_text.append(
                gettext("You are registered as %(name)s", name=user.name))
            flash('\n'.join(flash_text))
            return redirect(util.get_redirect_target() or url_for('index'))
    return render_template('register.html', form=form)


@app.route('/resend_activation_link', methods={'POST'})
@tryton.transaction()
def resend_activation_link():
    if not current_user:
        abort(HTTPStatus.FORBIDDEN)
    user = WebUser(current_user.id)
    WebUser.validate_email([user])
    return ('', HTTPStatus.NO_CONTENT)


@app.route('/<lang_code>/forgot_password', methods={'GET', 'POST'})
@tryton.transaction()
def forgot_password():
    form = ForgotForm()
    if form.validate_on_submit():
        web_users = WebUser.search([
                ('email', '=', form.email.data),
                ])
        WebUser.reset_password(web_users)
        flash(gettext("An email to reset your password has been sent"))
        return redirect(url_for('index'))
    return render_template('forgot_password.html', form=form)


@app.route('/reset_password', methods={'GET', 'POST'})
@tryton.transaction()
def reset_password(email=None, token=None):
    if current_user and current_user.is_authenticated:
        logout_user()
        util.clear_session()
    form = ResetForm(request.values)
    if form.validate_on_submit():
        # Keep in sync with login
        party = util.get_session_party()
        sales = util.get_session_sales()
        sale = util.get_session_sale()
        email = form.email.data
        if WebUser.set_password_token(
                email, form.token.data, form.password.data):
            web_user, = WebUser.search([('email', '=', email)])
            user = User(web_user)
            util.clear_session()
            if login_user(user, remember=form.remember.data):
                if web_user.party != party and sales:
                    reset_agent = util.sale_count(web_user.party) >= 1
                    for sale in sales:
                        sale.party = web_user.party
                        if reset_agent:
                            sale.agent = None
                        sale.on_change_party()
                        # Re-compute the prices
                        for line in sale.lines:
                            line.sale = sale  # Ensure to use the modified sale
                            line.on_change_product()
                        sale.lines = sale.lines  # Force changes
                    Sale.save(sales)
                util.merge_sales(sale)
                flash(gettext("You are logged as %(name)s", name=user.name))
                return redirect(url_for('index'))
        flash(gettext("Invalid token"), 'error')
    return render_template('reset_password.html', form=form)


@app.route('/<lang_code>/change_password', methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def change_password():
    if not current_user or not current_user.email:
        return redirect(login_url('login'))
    form = ChangeForm(request.values)
    if form.validate_on_submit():
        web_user = WebUser.authenticate(current_user.email, form.password.data)
        if web_user:
            web_user.password = form.new_password.data
            web_user.save()
            flash(gettext("Password changed"))
            return redirect(util.get_redirect_target() or url_for('index'))
        flash(gettext("Wrong password"), 'error')
    return render_template('change_password.html', form=form)
