from flask import abort, redirect

from . import app, tryton
from .compat import HTTPStatus


Package = tryton.pool.get('stock.package')


@app.route('/package/track/<reference>')
@tryton.transaction()
def track(reference):
    url = None
    try:
        package, = Package.search([
                ('shipping_reference', '=', reference),
                ])
        url = package.tracking_url
    except ValueError:
        pass
    if url:
        return redirect(url)
    else:
        abort(HTTPStatus.NOT_FOUND)
