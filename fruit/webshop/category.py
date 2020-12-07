import datetime
import calendar
import csv
import sys
from io import BytesIO, StringIO

from flask import render_template, request, url_for, Response, redirect, abort
from flask_babel import gettext

from . import app, tryton, cache
from . import util
from .compat import HTTPStatus

PER_PAGE = 4 * 5

Category = tryton.pool.get('product.webshop.category')
Country = tryton.pool.get('country.country')
Product = tryton.pool.get('product.product')


@app.route(
    '/<lang_code>/category/all')
@app.route(
    '/<lang_code>/category/<record("product.webshop.category"):category>')
@app.route(
    '/<lang_code>/category'
    '/<record("product.webshop.category"):category>/<name>')
@tryton.transaction()
def category(category=None, name=None):
    if category and util.slugify(category.name) != name:
        return redirect(util.url_for_category(category, **request.args))
    try:
        page = int(request.args.get('page', 1))
    except ValueError:
        abort(HTTPStatus.BAD_REQUEST)
    if page < 1:
        abort(HTTPStatus.BAD_REQUEST)
    search_args = dict(
        names=request.args.getlist('name'),
        category=category.id if category else None,
        made_in=request.args.getlist('made_in'),
        organic=request.args.get('organic'),
        available=request.args.getlist('available'),
        season=request.args.getlist('season'),
        )
    count = search_product(**search_args, order_by=[], count=True)
    products = search_product(
        **search_args,
        order_by=request.args.getlist('order_by') or ['name'],
        offset=(page - 1) * PER_PAGE,
        limit=PER_PAGE)

    sale = util.get_session_sale()
    if sale:
        currency = sale.currency
    else:
        currency = util.get_company().currency
    sale_prices, quantity_prices = util.get_all_sale_prices(products)
    dataLayer = [{
            'ecommerce': {
                'currencyCode': currency.code,
                'impressions': [{
                        'name': p.name,
                        'id': str(p.id),
                        'price': str(sale_prices[p.id]),
                        'position': i,
                        } for i, p in enumerate(products, 1)],
                },
            }]
    pagination = util.Pagination(page, PER_PAGE, count)
    return render_template('category.html',
        pagination=pagination,
        category=category,
        products=products,
        countries=countries(),
        filters=filters,
        sale_prices=sale_prices,
        quantity_prices=quantity_prices,
        dataLayer=dataLayer)


@app.route('/<lang_code>/category/all/facebook.csv')
@app.route('/<lang_code>/category'
    '/<record("product.webshop.category"):category>/facebook.csv')
@cache.cached(timeout=60 * 60)
@tryton.transaction()
def facebook(category=None):
    if sys.version_info < (3,):
        data = BytesIO()
        encode = lambda s: s.encode('utf-8')  # noqa: E731
    else:
        data = StringIO()
        encode = lambda s: s  # noqa: E731
    products = search_product(category=category, available=[True, False])
    reference_prices = util.get_sale_prices_reference(products)
    sale_prices = util.get_sale_prices(products)
    company = util.get_company()
    currency = company.currency

    shipping = []
    codes = app.config.get('COUNTRIES', [])
    countries = Country.search([('code', 'in', codes)])
    for country in countries:
        carriers = util.available_carriers(country)
        for carrier in carriers:
            price, currency = util.compute_carrier_cost(carrier)
            shipping.append(
                '%(country)s::%(carrier)s:%(price)s %(currency)s' % {
                    'country': country.code,
                    'carrier': carrier.carrier_product.name,
                    'price': price,
                    'currency': currency.code,
                    })
    shipping = ','.join(shipping)

    fieldnames = [
        # Required
        'id', 'availability', 'condition', 'description', 'image_link', 'link',
        'title', 'price', 'brand',
        # Optional
        'product_type', 'sale_price', 'shipping',
        'custom_label_0', 'custom_label_1',
        ]
    writer = csv.DictWriter(data, fieldnames=fieldnames)
    writer.writeheader()
    for product in products:
        if product.available and product.available_quantity != 'out':
            availability = 'in stock'
        else:
            availability = 'out of stock'
        writer.writerow({
                'id': encode(product.code[:100]),
                'availability': availability,
                'condition': 'new',
                'description': encode(
                    (product.description or product.name
                        )[:5000]),
                'image_link': encode(util.url_for_product_image(
                    product, _external=True)),
                'link': encode(util.url_for_product(product, _external=True)),
                'title': encode(product.name),
                'price': encode('%s %s' % (
                        currency.round(
                            reference_prices[product.id]), currency.code)),
                'brand': "Jurassic Fruit",
                'product_type': encode(
                    product.webshop_categories[0].rec_name),
                'sale_price': encode('%s %s' % (
                        currency.round(
                            sale_prices[product.id]), currency.code)),
                'shipping': shipping,
                'custom_label_0': (
                    gettext("Organic") if product.organic else ""),
                'custom_label_1': (
                    gettext("From %(country)s", country=product.made_in.name)
                    if product.made_in else ""),
                })
    return Response(data.getvalue(), mimetype='text/csv')


def search_product(
        names=None, category=None, made_in=None, organic=None, available=None,
        season=None, order_by=None, offset=0, limit=None, count=False):
    domain = [
        ('salable', '=', True),
        ('type', '=', 'goods'),
        ]
    if names:
        if len(names) == 1:
            name, = names
            domain.append(('name', 'ilike', '%' + name + '%'))
        else:
            domain_name = ['OR']
            for name in names:
                domain_name.append(('name', 'ilike', '%' + name + '%'))
            domain.append(domain_name)
    if category:
        domain.append(('webshop_categories', '=', int(category)))
    else:
        domain.append(('webshop_categories', '!=', None))
    if made_in:
        domain.append(('made_in', 'in', made_in))
    if organic:
        domain.append(('organic', '=', True))
    available = set(map(bool, available or [True]))
    if len(available) == 1:
        available, = available
        available_domain = []
        domain.append(available_domain)
        available_domain.append(('available', '=', available))
        available_domain.append(
            ('available_quantity', '!=' if available else '=', 'out'))
        if not available:
            available_domain.insert(0, 'OR')
    if season:
        season = [s if s else None for s in season]
        month = datetime.date.today().month
        name = 'season_%s' % calendar.month_name[month].lower()
        domain.append((name, 'in', season))

    if order_by:
        order = [(c, 'ASC') for c in order_by]
    else:
        order = None
    return Product.search(
        domain, order=order, offset=offset, limit=limit, count=count)


def filters(sale=None, category=None):
    def url(name, value):
        args = {}
        for key in request.args:
            if key in {'sale', 'category'}:
                continue
            values = request.args.getlist(key)[:]
            if key == name:
                values.remove(value)
            if values:
                args[key] = values
        return url_for(request.endpoint, sale=sale, category=category, **args)

    for key in request.args:
        values = request.args.getlist(key)
        for value in values:
            if key == 'name':
                name = value
            elif key == 'made_in':
                name = Country(int(value)).rec_name
            elif key == 'organic' and value:
                name = gettext("Bio")
            elif key == 'available':
                if value:
                    name = gettext("Available")
                else:
                    name = gettext("Unavailable")
            elif key == 'season':
                if not value:
                    name = gettext("Out of season")
                else:
                    name = {
                        'low': gettext("Low season"),
                        'high': gettext("High season"),
                        }.get(value, value)
            elif key == 'order_by':
                column = {
                    'name': gettext("Name"),
                    }.get(value, value)
                name = gettext("Sort by: %(column)s", column=column)
            else:
                continue
            yield name, key, url(key, value)


@cache.cached(timeout=24 * 60 * 60)
def countries():
    products = Product.search([('made_in', '!=', None)])
    return [{'id': c.id, 'rec_name': c.rec_name} for c in sorted(
            set(p.made_in for p in products), key=lambda c: c.rec_name)]
