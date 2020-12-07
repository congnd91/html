import io
import os
import random
from collections import OrderedDict

from flask import render_template
from trytond.transaction import Transaction

from . import app, tryton, cache
from . import util

Category = tryton.pool.get('product.webshop.category')
Country = tryton.pool.get('country.country')
Product = tryton.pool.get('product.product')
SaleConfiguration = tryton.pool.get('sale.configuration')
Subscription = tryton.pool.get('sale.subscription.box')
QuestionCategory = tryton.pool.get('webshop.question.category')


def selfies():
    try:
        lst = os.listdir(os.path.join(app.static_folder, 'selfies', '180'))
    except OSError:
        return []
    random.shuffle(lst)
    return lst


def testimonies():
    directory = os.path.join(app.static_folder, 'testimonies')
    try:
        files = os.listdir(directory)
    except OSError:
        files = []
    files = [f for f in files if f.endswith('.txt')]
    testimonies = {}
    for name in files:
        try:
            with io.open(os.path.join(directory, name), 'r') as fp:
                data = fp.read().splitlines()
                try:
                    testimony = {
                        'name': data[0],
                        'locality': data[1],
                        'stars': int(data[2]),
                        'text': '\n'.join(data[3:]),
                        }
                except (IndexError, ValueError):
                    continue
                testimonies[os.path.splitext(name)[0]] = testimony
        except IOError:
            pass
    items = list(testimonies.items())
    random.shuffle(items)
    return OrderedDict(items)


@cache.memoize(timeout=60 * 30)
def _homepage_categories(lang):
    categories = Category.search([
            ('homepage', '=', True),
            ('products', '!=', None),
            ], limit=4)
    return [{
            'id': c.id,
            'name': c.name,
            'products': [p.id for p in random.sample(
                    c.products, min(4, len(c.products)))],
            } for c in categories]


@app.route('/')
@app.route('/<lang_code>/')
@tryton.transaction()
def index():
    sale = util.get_session_sale()
    categories = _homepage_categories(Transaction().language)
    products = Product.browse({p for c in categories for p in c['products']})
    id2product = {p.id: p for p in products}
    question_categories = QuestionCategory.search([])
    return render_template('index.html',
        homepage_categories=categories,
        products=products,
        id2product=id2product,
        sale=sale,
        get_selfies=selfies,
        question_categories=question_categories,
        get_testimonies=testimonies)
