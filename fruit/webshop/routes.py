import os
import random

from flask import (render_template, send_from_directory, request, abort,
    redirect)
from flask.helpers import safe_join
from flask_wtf.csrf import CSRFError
from werkzeug.exceptions import NotFound

from . import app, tryton, cache, util
from .compat import HTTPStatus

Product = tryton.pool.get('product.product')
PriceList = tryton.pool.get('product.price_list')


@app.errorhandler(CSRFError)
@tryton.transaction()
def handle_csrf_error(e):
    return render_template('csrf_error.html', reason=e.description), 400


@app.route('/robots.txt')
@cache.cached(timeout=24 * 60 * 60)
@tryton.transaction()
def static_from_root():
    return render_template('robots.txt')


@app.route('/images/<type>/<code>/<size>/<name>.jpg')
def static_image(type, code, name, size):
    index = int(request.args.get('index', 0))
    if type not in {'product', 'category'}:
        abort(HTTPStatus.NOT_FOUND)
    try:
        return send_from_directory(
            app.static_folder,
            '%s-images/%s/%s%s.jpg' % (type, size, code, index or ''))
    except NotFound:
        if not index:
            if type == 'product':
                return redirect(
                    util.static_url_for(
                        'static', filename='images/default-%s.jpg' % size))
            else:
                return redirect(
                    util.static_url_for(
                        'static',
                        filename='images/all-categories-%s.jpg' % size))
        else:
            return ''


@app.route('/static/product-images/<name>')
@app.route('/static/category-images/<name>')
def images(name):
    abort(HTTPStatus.FORBIDDEN)


if not app.debug:

    @app.url_defaults
    def hashed_url_for_image_file(endpoint, values):
        if endpoint == 'static_image':
            type = values.get('type')
            code = values.get('code')
            size = values.get('size')
            index = values.get('index')
            if type and code and size:
                filename = '%s-images/%s/%s%s.jpg' % (
                    type, size, code, index or '')
                filepath = safe_join(app.static_folder, filename)
                try:
                    values['t'] = int(os.path.getmtime(filepath))
                except OSError:
                    pass


@app.route('/_warmup')
@tryton.transaction()
def warmup():
    util.get_shipping_distribution()
    products = Product.search([
            ('salable', '=', True),
            ('type', '=', 'goods'),
            ('webshop_categories', '!=', None),
            ], order=[])
    products = Product.browse(
        random.sample(products, 20))
    util.get_all_sale_prices(products)
    return '', HTTPStatus.NO_CONTENT
