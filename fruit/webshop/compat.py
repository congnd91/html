try:
    from http import HTTPStatus
except ImportError:
    try:
        from http import client as HTTPStatus
    except ImportError:
        import http.client as HTTPStatus

__all__ = [HTTPStatus]
