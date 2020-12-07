import calendar
import datetime as dt
import logging
import logging.config
import os
from collections import OrderedDict

from flask import Flask, request, g, url_for, abort, session
from flask_caching import Cache
from flask_cdn import CDN
from flask_babel import Babel, get_locale, lazy_gettext
from flask_tryton import Tryton
from flask_wtf.csrf import CSRFProtect
from werkzeug.exceptions import NotFound, MethodNotAllowed
from werkzeug.routing import RequestRedirect
try:
    from werkzeug.middleware.proxy_fix import ProxyFix

    def NumProxyFix(app, num_proxies=1):
        return ProxyFix(app,
            x_for=num_proxies, x_proto=num_proxies, x_host=num_proxies,
            x_port=num_proxies, x_prefix=num_proxies)
except ImportError:
    from werkzeug.contrib.fixers import ProxyFix as NumProxyFix

from .compat import HTTPStatus

app = Flask(__name__, static_folder='static')
app.config.from_envvar('JURASSIC_WEBSHOP')
app.jinja_env.lstrip_blocks = True
app.jinja_env.trim_blocks = True

for key in [
        'TRYTON_CONFIG', 'TRYTON_DATABASE', 'SECRET_KEY',
        'GOOGLE_TAG_MANAGER',
        'ROBOTS_NOINDEX']:
    if app.config.get(key) is None:
        app.config[key] = os.environ.get(key)

if os.environ.get('JURASSIC_WEBSHOP_LOGGING'):
    logging.config.fileConfig(os.environ['JURASSIC_WEBSHOP_LOGGING'])
    logging.getLogger(__name__).info(
        "using %s as logging configuration file",
        os.environ['JURASSIC_WEBSHOP_LOGGING'])
    app.logger.propagate = True

setattr(app, 'wsgi_app', NumProxyFix(app.wsgi_app))
csrf = CSRFProtect(app)
babel = Babel(app)
tryton = Tryton(app)

from trytond.transaction import Transaction  # noqa: E402


cache_config = {
    'CACHE_TYPE': 'simple',
    'CACHE_THRESHOLD': 2**16,
    'CACHE_DEFAULT_TIMEOUT': 60 * 60 * 24,
    }
if app.config.get('MEMCACHED'):
    cache_config['CACHE_TYPE'] = 'memcached'
    cache_config['CACHE_MEMCACHED_SERVERS'] = (
        app.config.get('MEMCACHED', '').split(','))
cache = Cache(app, config=cache_config)
app.config['CDN_DOMAIN'] = os.environ.get('CDN_DOMAIN')
app.config['CDN_HTTPS'] = True
CDN(app)

from . import util  # noqa: F401

Company = tryton.pool.get('company.company')
Date = tryton.pool.get('ir.date')
Lang = tryton.pool.get('ir.lang')
Category = tryton.pool.get('product.webshop.category')
MarketingMessage = tryton.pool.get('webshop.marketing.message')
Product = tryton.pool.get('product.product')


@app.context_processor
def inject_sale():
    if Transaction().database:
        sale_ = util.get_session_sale()
        if sale_:
            sale_lines = [l for l in sale_.lines if not l.shipment_cost]
        else:
            sale_lines = []
        return {
            'party': util.get_session_party(),
            'company': util.get_company(),
            'sale': sale_,
            'sale_lines': sale_lines,
            'sales': util.get_session_sales(),
            'subscription': util.get_session_subscription(),
            'get_sale_price': util.get_sale_price,
            'get_sale_price_reference': util.get_sale_price_reference,
            'currency': Company(app.config['COMPANY']).currency,
            'set': set,
            'min': min,
            }
    else:
        return {}


@app.context_processor
def inject_categories():
    if Transaction().database:
        footer_categories = util.footer_categories(Transaction().language)
        categories = util.categories(Transaction().language)
        loved_products = Product.browse(util.loved_products())
        return {
            'footer_categories': footer_categories,
            'categories': categories,
            'loved_products': loved_products,
            }
    else:
        return {}


@app.context_processor
def inject_why():
    from .util import static_url_for
    why = [
        (static_url_for('static', filename='images/why_shop_farmer.png'),
            lazy_gettext('Support 30+ small<br>farmers worldwide')),
        (static_url_for('static', filename='images/why_shop_customers.png'),
            lazy_gettext('3500 happy<br>customers since 2017')),
        (static_url_for('static', filename='images/why_shop_bio.png'),
            lazy_gettext('Organic certified<br>and wild fruits')),
        (static_url_for('static', filename='images/why_shop_hapiness.png'),
            lazy_gettext('100% happiness<br>guarantee')),
        (static_url_for('static', filename='images/why_shop_payment.png'),
            lazy_gettext('100% safe and<br>secure checkout')),
        ]

    return {
        'why': why,
        'why_short': [why[0], why[4], why[3]],
        }


@app.context_processor
def inject_marketing_messages():
    @cache.memoize(timeout=60 * 60)
    def get_marketing_messages(language):
        with Transaction().set_context(language=language):
            return MarketingMessage.get_messages()

    return dict(
        marketing_messages=get_marketing_messages(str(get_locale()))
        )


@app.context_processor
def robots_behaviour():
    return {
        'google_tag_manager': app.config.get('GOOGLE_TAG_MANAGER'),
        'robots_noindex': int(app.config.get('ROBOTS_NOINDEX') or 0),
        }


@app.context_processor
def utility_processor():
    return dict(util=util)


@app.context_processor
def calendar_processor():
    return dict(calendar=calendar, dt=dt)


@tryton.default_context
def context():
    availability_date = util.sale_date(util.get_company())
    ctx = {
        'company': app.config['COMPANY'],
        'user': app.config['USER'],
        'language': str(get_locale()),
        'address_with_party': True,
        'availability_date': availability_date,
        }
    return ctx


@babel.localeselector
def localeselector():
    translations = [str(t) for t in babel.list_translations()]
    if g.get('lang_code'):
        if g.lang_code not in translations:
            abort(HTTPStatus.NOT_FOUND)
        return g.lang_code
    if Transaction().database:
        current_party = util.get_session_party()
        if current_party:
            lang = current_party.get_multivalue(
                'lang', company=app.config['COMPANY'])
            if lang:
                return lang.code
    return request.accept_languages.best_match(translations)


@app.url_defaults
def add_language_code(endpoint, values):
    if 'lang_code' in values:
        return
    if app.url_map.is_endpoint_expecting(endpoint, 'lang_code'):
        values.setdefault('lang_code', str(get_locale()))


@app.url_value_preprocessor
def pull_lang_code(endpoint, values):
    if values is None:
        values = {}
    g.lang_code = values.pop('lang_code', None)


@app.before_request
def set_agent_session():
    if 'agent' in request.args:
        try:
            session['agent'] = int(request.args['agent'])
        except ValueError:
            pass


def get_endpoint_arguments(host, path, method='GET'):
    "Match a request and return the endpoint and arguments."
    adapter = app.url_map.bind(host)
    try:
        return adapter.match(path, method=method)
    except RequestRedirect as e:
        return get_endpoint_arguments(e.new_url, method)
    except (MethodNotAllowed, NotFound):
        return None


@app.context_processor
def inject_babel():
    def url_lang(lang_code, **kwargs):
        match = get_endpoint_arguments(
            request.host, request.path, request.method)
        if match:
            endpoint = match[0]
            args = OrderedDict(request.args)
            args.update(match[1])
            args['lang_code'] = lang_code
            args.update(kwargs)
            return url_for(endpoint, **args)
        else:
            return request.url
    return {
        'get_locale': get_locale,
        'list_translations': babel.list_translations,
        'url_lang': url_lang,
        }


from . import index  # noqa: F401
from . import category  # noqa: F401
from . import mailing  # noqa: F401
from . import login  # noqa: F401
from . import account  # noqa: F401
from . import subscription  # noqa: F401
from . import deposit  # noqa: F401
from . import product  # noqa: F401
from . import shopping_cart  # noqa: F401
from . import checkout  # noqa: F401
from . import payment  # noqa: F401
from . import sale  # noqa: F401
from . import invoice  # noqa: F401
from . import package  # noqa: F401
from . import routes  # noqa: F401
