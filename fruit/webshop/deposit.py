from flask import render_template

from . import app, tryton

Country = tryton.pool.get('country.country')
Payment = tryton.pool.get('account.payment')
Sale = tryton.pool.get('sale.sale')


@app.route('/<lang_code>/deposit')
@tryton.transaction()
def deposit():
    return render_template('deposit.html')
