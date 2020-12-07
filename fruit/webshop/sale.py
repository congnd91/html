from flask import abort, render_template, request, redirect, url_for, session
from flask_babel import lazy_gettext
from flask_login import fresh_login_required
from trytond.transaction import Transaction
from wtforms import fields
from wtforms.validators import DataRequired

from . import app, tryton, util
from .category import search_product, filters, countries
from .compat import HTTPStatus

PER_PAGE = 5
Agent = tryton.pool.get('commission.agent')
Carrier = tryton.pool.get('carrier')
CarrierSelection = tryton.pool.get('carrier.selection')
Category = tryton.pool.get('product.webshop.category')
CouponNumber = tryton.pool.get('sale.promotion.coupon.number')
Date = tryton.pool.get('ir.date')
Payment = tryton.pool.get('account.payment')
Product = tryton.pool.get('product.product')
Promotion = tryton.pool.get('sale.promotion')
Sale = tryton.pool.get('sale.sale')
SaleLine = tryton.pool.get('sale.line')


class CouponForm(util.Form):
    coupon = fields.TextField(lazy_gettext("Coupon"),
        validators=[DataRequired()])


class SaleForm(util.Form):
    shipment_address = fields.SelectField(
        lazy_gettext("Shipping Address"), coerce=int,
        validators=[DataRequired(), util.AddressComplete()])
    invoice_address = fields.SelectField(
        lazy_gettext("Invoicing Address"), coerce=int,
        validators=[DataRequired(), util.AddressComplete()])
    carrier = fields.SelectField(
        lazy_gettext("Carrier"), coerce=int,
        validators=[DataRequired(), util.CarrierValid()])

    def __init__(self, *args, **kwargs):
        super(SaleForm, self).__init__(*args, **kwargs)
        sale = kwargs.get('obj')
        if sale:
            addresses = [
                (a.id, util.address_line(a)) for a in sale.party.addresses]
            if not sale.shipment_address.active:
                addresses.append(
                    (sale.shipment_address.id,
                        util.address_line(sale.shipment_address)))
            if (not sale.invoice_address.active
                    and sale.invoice_address != sale.shipment_address):
                addresses.append(
                    (sale.invoice_address.id,
                        util.address_line(sale.invoice_address)))
            self.shipment_address.choices = addresses
            self.invoice_address.choices = addresses

            pattern = {
                'party_categories': list(map(int, sale.party.categories)),
                }
            carriers = CarrierSelection.get_carriers(pattern)
            self.carrier.choices = [(c.id, util.carrier_line(c, order=sale))
                for c in Carrier.search([
                        ('carrier_product.salable', '=', True),
                        ('id', 'in', list(map(int, carriers))),
                        ])]


@app.route('/<lang_code>/sales')
@tryton.transaction()
@fresh_login_required
def sales():
    today = Date.today()
    party = util.get_session_party()
    domain = [
        ('party', '=', party.id),
        ]
    try:
        page = int(request.args.get('page', 1))
    except ValueError:
        abort(HTTPStatus.BAD_REQUEST)
    if page < 1:
        abort(HTTPStatus.BAD_REQUEST)
    state = request.args.get('state', 'open')
    if state == 'open':
        domain.append(('state', 'in', ['quotation', 'confirmed']))
    else:
        domain.append(('state', 'in', ['processing', 'done']))
    count = Sale.search(domain, order=[], count=True)
    sales = Sale.search(
        domain, order=[('sale_date', 'DESC')],
        offset=(page - 1) * PER_PAGE,
        limit=PER_PAGE)
    if not sales and page != 1:
        abort(HTTPStatus.NOT_FOUND)
    pagination = util.Pagination(page, PER_PAGE, count)
    return render_template('sales.html',
        pagination=pagination,
        sales=sales, state=state, today=today)


@app.route('/sale/<record("sale.sale"):sale>', methods={'GET', 'POST'})
@app.route(
    '/<lang_code>/sale/<record("sale.sale"):sale>', methods={'GET', 'POST'})
@tryton.transaction()
@fresh_login_required
def sale(sale):
    party = util.get_session_party()
    if sale.party != party:
        abort(HTTPStatus.FORBIDDEN)

    mode = request.args.get('mode', 'list')
    categories = Category.search([
            ('products', '!=', None),
            ])
    category = request.args.get('category')
    if category:
        category = Category(int(category))
    if not categories:
        abort(HTTPStatus.NOT_FOUND)
    products = search_product(
        names=request.args.getlist('name'),
        category=category,
        made_in=request.args.getlist('made_in'),
        organic=request.args.get('organic'),
        available=request.args.getlist('available'),
        season=request.args.getlist('season'),
        order_by=request.args.getlist('order_by') or ['name'],
        )

    form = SaleForm(obj=sale)
    if form.validate_on_submit():
        if not util.sale_modify_allowed(sale):
            abort(HTTPStatus.FORBIDDEN)
        Sale.draft([sale])
        if sale.state != 'draft':
            abort(HTTPStatus.FORBIDDEN)
        form.populate_obj(sale)
        util.update_cache(sale)
        sale.save()
        if not sale.is_subscription:
            util.set_session_sale(sale)
    return render_template('sale.html',
        form=form,
        order=sale,
        mode=mode,
        categories=categories,
        category=category,
        products=products,
        countries=countries(),
        filters=filters)


@app.route(
    '/<lang_code>/sale/<record("sale.sale"):sale>/cancel', methods={'POST'})
@tryton.transaction()
def sale_cancel(sale):
    party = util.get_session_party()
    if sale.party != party:
        abort(HTTPStatus.FORBIDDEN)
    if not util.sale_cancel_allowed(sale):
        abort(HTTPStatus.FORBIDDEN)
    Sale.draft([sale])
    if sale.state != 'draft':
        abort(HTTPStatus.FORBIDDEN)
    Sale.cancel([sale])
    if sale.state != 'cancel':
        abort(HTTPStatus.FORBIDDEN)
    return redirect(util.get_redirect_target() or url_for('index'))


@app.route('/<lang_code>/sale/line', methods={'POST'})
@app.route(
    '/<lang_code>/sale/<record("sale.sale"):sale>/line', methods={'POST'})
@app.route(
    '/<lang_code>/sale/<record("sale.sale"):sale>'
    '/line/<record("sale.line"):line>',
    methods={'POST'})
@tryton.transaction()
def sale_line(sale=None, line=None):
    party = util.get_session_party()
    if not sale:
        sale = util.get_session_sale()
        if not sale or sale.state not in {'draft', 'quotation'}:
            sale = create_sale()
            party = sale.party
    if sale.party != party:
        abort(HTTPStatus.FORBIDDEN)
    if line and line.sale != sale:
        abort(HTTPStatus.FORBIDDEN)
    if not util.sale_modify_allowed(sale):
        abort(HTTPStatus.FORBIDDEN)

    Sale.draft([sale])
    if sale.state != 'draft':
        abort(HTTPStatus.FORBIDDEN)
    sale.lock()
    quantity = abs(float(request.form.get('quantity', 1)))
    anchor = None
    if not quantity:
        if line:
            SaleLine.delete([line])
    else:
        if line is None:
            product = Product(int(request.form['product']))
            for line in sale.lines:
                if line.product == product:
                    line.quantity += quantity
                    break
            else:
                if not product.webshop_categories:
                    abort(HTTPStatus.FORBIDDEN)
                line = SaleLine()
                line.sale = sale
                line.type = 'line'
                line.product = product
                line.quantity = quantity
                line.on_change_product()
        else:
            line.quantity = quantity
        line.on_change_quantity()
        line.save()
        if line.product:
            anchor = line.product.id
    util.update_cache(sale)
    if not sale.is_subscription:
        util.set_session_sale(sale)
    if request.headers.get('X-Requested-With') == 'XMLHttpRequest':
        return '', HTTPStatus.OK
    else:
        return redirect(util.get_redirect_target()
            or url_for('category', _anchor=anchor))


@app.route('/sale/coupon', methods={'POST'})
@tryton.transaction()
def coupon():
    form = CouponForm()
    if form.validate_on_submit():
        sale = util.get_session_sale()
        if not sale or sale.state != 'draft':
            abort(HTTPStatus.FORBIDDEN)
        promotions = set(
             Promotion.search(Promotion._promotions_domain(sale)))
        with Transaction().set_context(party=sale.party.id):
            coupons = CouponNumber.search([
                    ('coupon.promotion.company', '=', sale.company.id),
                    ('rec_name', 'ilike', form.coupon.data),
                    ], limit=1)
        coupons = [c for c in coupons if c.coupon.promotion in promotions]
        sale.coupons += tuple(coupons)
        sale.save()
        util.update_cache(sale)
    return redirect(util.get_redirect_target() or url_for('category'))


@app.route('/sale/coupon/clear', methods={'POST'})
@tryton.transaction()
def coupon_clear():
    sale = util.get_session_sale()
    if not sale or sale.state != 'draft':
        abort(HTTPStatus.FORBIDDEN)
    sale.coupons = None
    util.update_cache(sale)
    sale.save()
    return redirect(util.get_redirect_target() or url_for('category'))


def create_sale():
    sale = Sale()
    sale.company = util.get_company()
    sale.warehouse = Sale.default_warehouse()
    sale.party = util.get_session_party()
    if not sale.party:
        sale.party = util.create_party()

    sale.sale_date = util.sale_date(sale.company)

    if 'agent' in session and util.sale_count(sale.party) <= 0:
        try:
            agent, = Agent.search([
                    ('id', '=', session['agent']),
                    ('type_', '=', 'agent'),
                    ('company', '=', sale.company.id),
                    ])
        except ValueError:
            pass
        else:
            sale.agent = agent

    sale.on_change_party()
    sale.save()
    util.set_session_sale(sale)
    return sale
