! function (i) {
    "use strict";
    var r = i.document,
        e = r.body,
        n = r.documentElement,
        o = i.requestAnimationFrame || i.mozRequestAnimationFrame || i.webkitRequestAnimationFrame || function (t) {
            i.setTimeout(t, 15)
        },
        c = "",
        s = 500,
        u = i,
        a = u.scrollTop || i.pageYOffset,
        f = 0,
        l = function (t, o, e, n) {
            return n < e ? o : t + (f - t) * ((l = e / n) < .5 ? 4 * l * l * l : (l - 1) * (2 * l - 2) * (2 * l - 2) + 1);
            var l
        },
        m = function () {
            var t = Date.now() - c;
            u === i ? i.scroll(0, l(a, f, t, s)) : u.scrollTop = l(a, f, t, s), t <= s && o(m)
        },
        t = function () {};
    t.prototype = {
        scrollTo: function (t, o, e) {
            var n, l;
            c = Date.now(), s = o || 500, a = (u = e || i).scrollTop || i.pageYOffset, l = {}, f = "number" == typeof (n = t) ? n : "string" == typeof n && !!(l = r.querySelector(n)) && l.getBoundingClientRect().top + i.pageYOffset, m()
        },
        scrollTop: function (t, o) {
            this.scrollTo(0, t, o)
        },
        scrollBottom: function (t, o) {
            this.scrollTo(Math.max.apply(null, [e.clientHeight, e.scrollHeight, n.scrollHeight, n.clientHeight]) - i.innerHeight, t, o)
        }
    }, i.smoothScroll = new t
}(window);


document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    if (!anchor.classList.contains('preventsmooth')) {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            smoothScroll.scrollTo(this.getAttribute('href'), 1000);
        });
    }

});

function calendar(id, year, month) {
    var Dlast = new Date(year, month + 1, 0).getDate(),
        D = new Date(year, month, Dlast),
        DNlast = new Date(D.getFullYear(), D.getMonth(), Dlast).getDay(),
        DNfirst = new Date(D.getFullYear(), D.getMonth(), 1).getDay(),
        calendar = '<tr>',
        month = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
    if (DNfirst != 0) {
        for (var i = 1; i < DNfirst; i++) calendar += '<td>';
    } else {
        for (var i = 0; i < 6; i++) calendar += '<td>';
    }
    for (var i = 1; i <= Dlast; i++) {
        if (i == new Date().getDate() && D.getFullYear() == new Date().getFullYear() && D.getMonth() == new Date().getMonth()) {
            calendar += '<td class="today">' + i;
        } else {
            calendar += '<td>' + i;
        }
        if (new Date(D.getFullYear(), D.getMonth(), i).getDay() == 0) {
            calendar += '<tr>';
        }
    }
    for (var i = DNlast; i < 7; i++) calendar += '<td> ';
    document.querySelector('#' + id + ' tbody').innerHTML = calendar;
    document.querySelector('#' + id + ' thead td:nth-child(2)').innerHTML = month[D.getMonth()] + ' ' + D.getFullYear();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.month = D.getMonth();
    document.querySelector('#' + id + ' thead td:nth-child(2)').dataset.year = D.getFullYear();
    if (document.querySelectorAll('#' + id + ' tbody tr').length < 6) {
        document.querySelector('#' + id + ' tbody').innerHTML += '<tr><td> <td> <td> <td> <td> <td> <td> ';
    }
}
calendar("calendar", new Date().getFullYear() + 543, new Date().getMonth());
document.querySelector('#calendar thead tr:nth-child(1) td:nth-child(1)').onclick = function () {
    calendar("calendar", document.querySelector('#calendar thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar thead td:nth-child(2)').dataset.month) - 1);
}
document.querySelector('#calendar thead tr:nth-child(1) td:nth-child(3)').onclick = function () {
    calendar("calendar", document.querySelector('#calendar thead td:nth-child(2)').dataset.year, parseFloat(document.querySelector('#calendar thead td:nth-child(2)').dataset.month) + 1);
};
document.querySelector('.burger').addEventListener('click', function () {
    document.querySelector('.menu').classList.toggle('toggled');
})


var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://ipapi.co/json/', true);
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            var city = document.querySelectorAll('.cityname');
            var response = JSON.parse(xhr.responseText);
            city.forEach(function (elem) {
                elem.innerHTML = response.city;
            })
        }
    }
};
xhr.send(null);


//  modal gallery 
(function (global, factory) {
    if (typeof define === "function" && define.amd) {
        define(['exports'], factory)
    } else if (typeof exports !== "undefined") {
        factory(exports)
    } else {
        var mod = {
            exports: {}
        };
        factory(mod.exports);
        global.VanillaModal = mod.exports
    }
})(this, function (exports) {
    'use strict';
    Object.defineProperty(exports, "__esModule", {
        value: !0
    });

    function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
            throw new TypeError("Cannot call a class as a function")
        }
    }
    var _createClass = function () {
        function defineProperties(target, props) {
            for (var i = 0; i < props.length; i++) {
                var descriptor = props[i];
                descriptor.enumerable = descriptor.enumerable || !1;
                descriptor.configurable = !0;
                if ("value" in descriptor) descriptor.writable = !0;
                Object.defineProperty(target, descriptor.key, descriptor)
            }
        }
        return function (Constructor, protoProps, staticProps) {
            if (protoProps) defineProperties(Constructor.prototype, protoProps);
            if (staticProps) defineProperties(Constructor, staticProps);
            return Constructor
        }
    }();
    var _extends = Object.assign || function (target) {
        for (var i = 1; i < arguments.length; i++) {
            var source = arguments[i];
            for (var key in source) {
                if (Object.prototype.hasOwnProperty.call(source, key)) {
                    target[key] = source[key]
                }
            }
        }
        return target
    };
    var defaults = {
        modal: '.modal',
        modalInner: '.modal-inner',
        modalContent: '.modal-content',
        open: '[data-modal-open]',
        close: '[data-modal-close]',
        page: 'body',
        class: 'modal-visible',
        loadClass: 'vanilla-modal',
        clickOutside: !0,
        closeKeys: [27],
        transitions: !0,
        transitionEnd: null,
        onBeforeOpen: null,
        onBeforeClose: null,
        onOpen: null,
        onClose: null
    };

    function throwError(message) {
        console.error('VanillaModal: ' + message)
    }

    function find(arr, callback) {
        return function (key) {
            var filteredArray = arr.filter(callback);
            return filteredArray[0] ? filteredArray[0][key] : undefined
        }
    }

    function transitionEndVendorSniff() {
        var el = document.createElement('div');
        var transitions = [{
            key: 'transition',
            value: 'transitionend'
        }, {
            key: 'OTransition',
            value: 'otransitionend'
        }, {
            key: 'MozTransition',
            value: 'transitionend'
        }, {
            key: 'WebkitTransition',
            value: 'webkitTransitionEnd'
        }];
        return find(transitions, function (_ref) {
            var key = _ref.key;
            return typeof el.style[key] !== 'undefined'
        })('value')
    }

    function isPopulatedArray(arr) {
        return Object.prototype.toString.call(arr) === '[object Array]' && arr.length
    }

    function getNode(selector, parent) {
        var targetNode = parent || document;
        var node = targetNode.querySelector(selector);
        if (!node) {
            throwError(selector + ' not found in document.')
        }
        return node
    }

    function addClass(el, className) {
        if (!(el instanceof HTMLElement)) {
            throwError('Not a valid HTML element.')
        }
        el.setAttribute('class', el.className.split(' ').filter(function (cn) {
            return cn !== className
        }).concat(className).join(' '))
    }

    function removeClass(el, className) {
        if (!(el instanceof HTMLElement)) {
            throwError('Not a valid HTML element.')
        }
        el.setAttribute('class', el.className.split(' ').filter(function (cn) {
            return cn !== className
        }).join(' '))
    }

    function getElementContext(e) {
        if (e && typeof e.hash === 'string') {
            return document.querySelector(e.hash)
        } else if (typeof e === 'string') {
            return document.querySelector(e)
        }
        throwError('No selector supplied to open()');
        return null
    }

    function applyUserSettings(settings) {
        return _extends({}, defaults, settings, {
            transitionEnd: transitionEndVendorSniff()
        })
    }

    function matches(e, selector) {
        var allMatches = (e.target.document || e.target.ownerDocument).querySelectorAll(selector);
        for (var i = 0; i < allMatches.length; i += 1) {
            var node = e.target;
            while (node && node !== document.body) {
                if (node === allMatches[i]) {
                    return node
                }
                node = node.parentNode
            }
        }
        return null
    }
    var VanillaModal = function () {
        function VanillaModal(settings) {
            _classCallCheck(this, VanillaModal);
            this.isOpen = !1;
            this.current = null;
            this.isListening = !1;
            this.settings = applyUserSettings(settings);
            this.dom = this.getDomNodes();
            this.open = this.open.bind(this);
            this.close = this.close.bind(this);
            this.closeKeyHandler = this.closeKeyHandler.bind(this);
            this.outsideClickHandler = this.outsideClickHandler.bind(this);
            this.delegateOpen = this.delegateOpen.bind(this);
            this.delegateClose = this.delegateClose.bind(this);
            this.listen = this.listen.bind(this);
            this.destroy = this.destroy.bind(this);
            this.addLoadedCssClass();
            this.listen()
        }
        _createClass(VanillaModal, [{
            key: 'getDomNodes',
            value: function getDomNodes() {
                var _settings = this.settings,
                    modal = _settings.modal,
                    page = _settings.page,
                    modalInner = _settings.modalInner,
                    modalContent = _settings.modalContent;
                return {
                    modal: getNode(modal),
                    page: getNode(page),
                    modalInner: getNode(modalInner, getNode(modal)),
                    modalContent: getNode(modalContent, getNode(modal))
                }
            }
        }, {
            key: 'addLoadedCssClass',
            value: function addLoadedCssClass() {
                addClass(this.dom.page, this.settings.loadClass)
            }
        }, {
            key: 'setOpenId',
            value: function setOpenId(id) {
                var page = this.dom.page;
                page.setAttribute('data-current-modal', id || 'anonymous')
            }
        }, {
            key: 'removeOpenId',
            value: function removeOpenId() {
                var page = this.dom.page;
                page.removeAttribute('data-current-modal')
            }
        }, {
            key: 'open',
            value: function open(allMatches, e) {
                var page = this.dom.page;
                var _settings2 = this.settings,
                    onBeforeOpen = _settings2.onBeforeOpen,
                    onOpen = _settings2.onOpen;
                this.closeModal(e);
                if (!(this.current instanceof HTMLElement === !1)) {
                    throwError('VanillaModal target must exist on page.');
                    return
                }
                this.releaseNode(this.current);
                this.current = getElementContext(allMatches);
                if (typeof onBeforeOpen === 'function') {
                    onBeforeOpen.call(this, e)
                }
                this.captureNode(this.current);
                addClass(page, this.settings.class);
                this.setOpenId(this.current.id);
                this.isOpen = !0;
                if (typeof onOpen === 'function') {
                    onOpen.call(this, e)
                }
            }
        }, {
            key: 'detectTransition',
            value: function detectTransition() {
                var modal = this.dom.modal;
                var css = window.getComputedStyle(modal, null);
                return Boolean(['transitionDuration', 'oTransitionDuration',
                    'MozTransitionDuration', 'webkitTransitionDuration'
                ].filter(function (i) {
                    return typeof css[i] === 'string' && parseFloat(css[i]) >
                        0
                }).length)
            }
        }, {
            key: 'close',
            value: function close(e) {
                var _settings3 = this.settings,
                    transitions = _settings3.transitions,
                    transitionEnd = _settings3.transitionEnd,
                    onBeforeClose = _settings3.onBeforeClose;
                var hasTransition = this.detectTransition();
                if (this.isOpen) {
                    this.isOpen = !1;
                    if (typeof onBeforeClose === 'function') {
                        onBeforeClose.call(this, e)
                    }
                    removeClass(this.dom.page, this.settings.class);
                    if (transitions && transitionEnd && hasTransition) {
                        this.closeModalWithTransition(e)
                    } else {
                        this.closeModal(e)
                    }
                }
            }
        }, {
            key: 'closeModal',
            value: function closeModal(e) {
                var onClose = this.settings.onClose;
                this.removeOpenId(this.dom.page);
                this.releaseNode(this.current);
                this.isOpen = !1;
                this.current = null;
                if (typeof onClose === 'function') {
                    onClose.call(this, e)
                }
            }
        }, {
            key: 'closeModalWithTransition',
            value: function closeModalWithTransition(e) {
                var _this = this;
                var modal = this.dom.modal;
                var transitionEnd = this.settings.transitionEnd;
                var closeTransitionHandler = function closeTransitionHandler() {
                    modal.removeEventListener(transitionEnd, closeTransitionHandler);
                    _this.closeModal(e)
                };
                modal.addEventListener(transitionEnd, closeTransitionHandler)
            }
        }, {
            key: 'captureNode',
            value: function captureNode(node) {
                var modalContent = this.dom.modalContent;
                while (node.childNodes.length) {
                    modalContent.appendChild(node.childNodes[0])
                }
            }
        }, {
            key: 'releaseNode',
            value: function releaseNode(node) {
                var modalContent = this.dom.modalContent;
                while (modalContent.childNodes.length) {
                    node.appendChild(modalContent.childNodes[0])
                }
            }
        }, {
            key: 'closeKeyHandler',
            value: function closeKeyHandler(e) {
                var closeKeys = this.settings.closeKeys;
                if (isPopulatedArray(closeKeys) && closeKeys.indexOf(e.which) > -1 &&
                    this.isOpen === !0) {
                    e.preventDefault();
                    this.close(e)
                }
            }
        }, {
            key: 'outsideClickHandler',
            value: function outsideClickHandler(e) {
                var clickOutside = this.settings.clickOutside;
                var modalInner = this.dom.modalInner;
                if (clickOutside) {
                    var node = e.target;
                    while (node && node !== document.body) {
                        if (node === modalInner) {
                            return
                        }
                        node = node.parentNode
                    }
                    this.close(e)
                }
            }
        }, {
            key: 'delegateOpen',
            value: function delegateOpen(e) {
                var open = this.settings.open;
                var matchedNode = matches(e, open);
                if (matchedNode) {
                    e.preventDefault();
                    this.open(matchedNode, e)
                }
            }
        }, {
            key: 'delegateClose',
            value: function delegateClose(e) {
                var close = this.settings.close;
                if (matches(e, close)) {
                    e.preventDefault();
                    this.close(e)
                }
            }
        }, {
            key: 'listen',
            value: function listen() {
                var modal = this.dom.modal;
                if (!this.isListening) {
                    modal.addEventListener('click', this.outsideClickHandler, !1);
                    document.addEventListener('keydown', this.closeKeyHandler, !1);
                    document.addEventListener('click', this.delegateOpen, !1);
                    document.addEventListener('click', this.delegateClose, !1);
                    this.isListening = !0
                } else {
                    throwError('Event listeners already applied.')
                }
            }
        }, {
            key: 'destroy',
            value: function destroy() {
                var modal = this.dom.modal;
                if (this.isListening) {
                    this.close();
                    modal.removeEventListener('click', this.outsideClickHandler);
                    document.removeEventListener('keydown', this.closeKeyHandler);
                    document.removeEventListener('click', this.delegateOpen);
                    document.removeEventListener('click', this.delegateClose);
                    this.isListening = !1
                } else {
                    throwError('Event listeners already removed.')
                }
            }
        }]);
        return VanillaModal
    }();
    exports.default = VanillaModal
})

var vanillaModal = new VanillaModal.default();