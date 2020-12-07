import mimetypes
from io import BytesIO

from flask import render_template, abort, send_file, request
from flask_login import fresh_login_required

from . import app, tryton
from . import util
from .compat import HTTPStatus

PER_PAGE = 20
Invoice = tryton.pool.get('account.invoice')


@app.route('/invoices')
@app.route('/<lang_code>/invoices')
@tryton.transaction()
@fresh_login_required
def invoices():
    party = util.get_session_party()
    domain = [
        ('party', '=', party.id),
        ('state', 'in', ['posted', 'paid']),
        ('type', '=', 'out'),
        ]
    try:
        page = int(request.args.get('page', 1))
    except ValueError:
        abort(HTTPStatus.BAD_REQUEST)
    if page < 1:
        abort(HTTPStatus.BAD_REQUEST)
    count = Invoice.search(domain, order=[], count=True)
    invoices = Invoice.search(
        domain, order=[('invoice_date', 'DESC')],
        offset=(page - 1) * PER_PAGE,
        limit=PER_PAGE)
    if not invoices and page != 1:
        abort(HTTPStatus.NOT_FOUND)
    pagination = util.Pagination(page, PER_PAGE, count)
    return render_template('invoices.html',
        pagination=pagination,
        invoices=invoices)


@app.route('/invoice/<int:invoice>')
@tryton.transaction()
@fresh_login_required
def invoice_download(invoice):
    invoice = Invoice(invoice)
    party = util.get_session_party()
    if invoice.party != party:
        abort(HTTPStatus.FORBIDDEN)
    if not invoice.invoice_report_cache:
        return ('', HTTPStatus.NO_CONTENT)
    data = BytesIO(invoice.invoice_report_cache)
    name = "%s.%s" % (invoice.number, invoice.invoice_report_format)
    mimetype = mimetypes.guess_type(name)[0]
    return send_file(
        data, mimetype=mimetype, as_attachment=True, attachment_filename=name)
