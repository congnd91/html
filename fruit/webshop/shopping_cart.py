from flask import render_template

from . import app, tryton


@app.route('/<lang_code>/_shopping_cart/')
@tryton.transaction()
def shopping_cart():
    return render_template('shopping_cart.html')


@app.route('/<lang_code>/_shopping_cart/navbar')
@tryton.transaction()
def shopping_cart_navbar():
    return render_template('shopping_cart_navbar.html')
