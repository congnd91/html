from flask import render_template, request, redirect, abort

from . import app, tryton
from . import util
from .compat import HTTPStatus

BoxTemplate = tryton.pool.get('product.box.template')
Product = tryton.pool.get('product.product')


@app.route('/<lang_code>/product/<record("product.product"):product>')
@app.route('/<lang_code>/product/<record("product.product"):product>/<name>')
@tryton.transaction()
def product(product, name=None):
    if not product.webshop_categories:
        abort(HTTPStatus.NOT_FOUND)
    if util.slugify(product.name) != name:
        return redirect(util.url_for_product(product))
    price, quantity_prices = util.get_all_sale_price(product)
    reference_price = util.get_sale_price_reference(product)
    sale = util.get_session_sale()
    if sale:
        currency = sale.currency
    else:
        currency = util.get_company().currency
    dataLayer = [{
            'ecommerce': {
                'detail': {
                    'products': [{
                        'name': product.name,
                        'id': product.code[:100] if product.code else None,
                        'price': str(price),
                        }],
                    },
                },
            }]
    return render_template('product.html',
        product=product,
        currency=currency,
        price=price,
        quantity_prices=quantity_prices,
        reference_price=reference_price,
        dataLayer=dataLayer)


@app.route('/<lang_code>/modal/product/<record("product.product"):product>')
@tryton.transaction()
def product_modal(product):
    price = util.get_sale_price(product)
    reference_price = util.get_sale_price_reference(product)
    sale = util.get_session_sale()
    if sale:
        currency = sale.currency
    else:
        currency = util.get_company().currency
    return render_template('product_modal.html',
        product=product,
        currency=currency,
        price=price,
        reference_price=reference_price,
        page=request.args.get('page'))
