(function() {
    'use strict';

    window.setParameter = function (key, value) {
        var urlparts = document.location.search.substr(1).split('&');
        for (var i = urlparts.length; i-- > 0;) {
            if (urlparts[i].lastIndexOf(key, 0) !== -1) {
                urlparts.splice(i, 1);
            }
        }
        if (value) {
            urlparts.push(key + '=' + value);
        }
        var search = urlparts.length > 0 ? '?' + urlparts.join('&') : '';
        if (history) {
            history.replaceState(null, '', document.location.pathname + search);
        }
    };

    function toLocaleStringSupportsLocales() {
        var number = 0;
        try {
            number.toLocaleString('i');
        } catch (e) {
            return e.name === 'RangeError';
        }
        return false;
    }

    function setCookie(name, value, path) {
        document.cookie = name + '=' + escape(value) +
            (path ? ';path=' + path : '');
    }

    function openShoppingCart() {
        setParameter('showCart', 1);
        refreshShoppingCart();
        $('.section-fixed').removeClass('d-none');
        $('html').css('overflow','hidden');
        setTimeout(function() {
            $('.section-fixed').addClass('active');
            $('.section-fixed .shopping-cart').addClass('active');
        }, 250);
    }
    function closeShoppingCart() {
        setParameter('showCart');
        $('.section-fixed').removeClass('active');
        $('.section-fixed .shopping-cart').removeClass('active');
        setTimeout(function() {
            $('html').css('overflow','auto');
            $('.section-fixed').addClass('d-none');
        }, 500);
    }
    function refreshShoppingCart() {
        var shopping_cart = $('#shopping_cart');
        shopping_cart.load(shopping_cart.data('load'), function() {
            convertDOM(this);
        });

        var shopping_cart_navbar = $('.btn-navbar-basket');
        shopping_cart_navbar.load(shopping_cart_navbar.data('load'), function() {
            convertDOM(this);
        });
    }

    function convertDropdown(index, element) {
        var dropdown = $(element);
        var input = dropdown.find('input[type="number"]');

        input.hide();

        dropdown.append(
            '<button class="dropdown-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' +
            '<span>0</span>' +
            '<i class="fa fa-angle-down"></i>' +
            '</button>' +
            '<div class="dropdown-menu"></div>');

        var dropdownMenu = dropdown.find('.dropdown-menu');
        var value = dropdown.find('.dropdown-arrow > span');
        var quantity = input.data('default-quantity');
        var quantity_prices = input.data('quantity-prices') || [];
        var reductions = {};
        quantity_prices.forEach(function(element) {
            var quantity = element[0];
            reductions[quantity] = element[3];
        });

        function localeString(value, lang) {
            value = parseFloat(value, 10);
            if (toLocaleStringSupportsLocales()) {
                return value.toLocaleString(lang);
            } else {
                return value.toLocaleString();
            }
        }
        function inputLocaleString(input) {
            var value = input.val();
            return localeString(value, input[0].lang);
        }

        function updatePriceReduction(evt) {
            var input = $(evt.target);
            var price = 0,
                second_price = 0,
                reduction = 0,
                product = input.data('product'),
                quantity = input.val();
            for (var i=0; i < quantity_prices.length; i++) {
                var qty = quantity_prices[i][0];
                if (qty > quantity) {
                    break;
                }
                price = quantity_prices[i][1];
                reduction = quantity_prices[i][4];
                second_price = quantity_prices[i][5];
            }
            var parent_ = input.parents(
                '.product-row-wrapper,.product-grid-item,.product-details')
                .first();
            parent_.find('.product-price[data-product=' + product + ']')
                .text(price);
            parent_.find('.product-reduction[data-product=' + product + ']')
                .text(reduction);
            parent_.find('.product-second-price[data-product=' + product + ']')
                .text(second_price);
        }
        input.change(updatePriceReduction);

        input.change(function() {
            var el = $(this);
            var value = el.closest('.dropdown-quantity').find('.dropdown-arrow > span');
            value.text(inputLocaleString(el));
        });
        input.change();

        function update(evt) {
            evt.preventDefault();
            var el= $(evt.target);
            var dropdown = el.closest('.dropdown-quantity');
            var input = dropdown.find('input[type="number"]');
            var value = dropdown.find('.dropdown-arrow > span');
            var quantity = el.data('value');
            input.val(quantity).change();
        }
        for (var i=1 ; i < 10 + 1 ; i++) {
            var option = $('<a/>', {
                'class': 'dropdown-item',
                'href': '#',
            });
            option.append($('<span/>').text(
                localeString(quantity * i, input[0].lang)));
            if (reductions[quantity * i]) {
                option.append($('<span/>', {
                    'class': 'product-reduction',
                }).text(reductions[quantity * i]));
            }
            option.data('value', quantity * i);
            option.click(update);
            dropdownMenu.append(option);
        }
        dropdownMenu.append('<a class="dropdown-divider"></a>');
        var more = $('<a/>', {
            'class': 'dropdown-item',
            'href': '#',
        });
        more.text(input.data("more-text"));
        more.click(function(evt) {
            evt.preventDefault();
            var el = $(this);
            var dropdown = el.closest('.dropdown-quantity');
            var arrow = dropdown.find('.dropdown-arrow');
            var input = dropdown.find('input[type="number"]');
            arrow.hide();
            input.show();
            input.focus();
        });
        dropdownMenu.append(more);

        input.focusout(function() {
            var el = $(this);
            var dropdown = el.closest('.dropdown-quantity');
            var arrow = dropdown.find('.dropdown-arrow');
            el.hide();
            arrow.show();
        });
    }

    function convertSubmitChange(index, element) {
        var el = $(element);
        var content = el;
        if (el.prop('tagName').toLowerCase() == 'button') {
            el.hide();
            content= el.parents('form');
        }
        content.find('input,select').change(function() {
            $(this).parents('form').find(':submit').click();
        });
    }

    function convertDOM(element) {
        var el = $(element);
        el.find('.dropdown-quantity').each(convertDropdown);
        el.find('form *[data-submit-on-change]').each(
            convertSubmitChange);
    }

    function displayChoiceValue() {
        $(document).find('*[data-choice-value]').each(function() {
            var el = $(this);
            function setValue(element) {
                var value = $(element).val();
                if (el.data('choice-val')) {
                    el.val(el.data('choice-val')[value] || '');
                }
                if (el.data('choice-text')) {
                    el.text(el.data('choice-text')[value] || '');
                }
            }
            $(document).find('*[name=' + el.data('choice-value') + ']')
                .change(function() {
                    setValue(this);
                }).each(function() {
                    if ($(this).prop('checked')) {
                        setValue(this);
                    }
                });
        });
    }

    $.ajaxSetup({
        headers: {
            'X-Requested-From': window.location.href,
        }
    });

    $(document).ready(function() {
        convertDOM(document);
    });
    $(document).ready(displayChoiceValue);
    $(document).ready(function() {

        // Navbar
        $('#search-mobile').change(function() {
            if ($(this).is(':checked')) {
                $('#search-input').focus();
            }
        });

        // Desactivate buttons on product box image
        $(document).on('click', "a .btn-quickview", function(e) {
            e.preventDefault();
        });
        $(document).on('click', "a .product-like", function(e){
            e.preventDefault();
        });
        $(document).on('click', "a .product-img-squares > li", function(e){
            e.preventDefault();
        });

        // Topbars
        $(document).on('click', ".topbar-marketing .btn-close", function(e) {
            e.preventDefault();
            var id = $(this).data('target');
            $('#' + id).toggleClass("d-none");
            setCookie(id, 'closed', '/');
        });
        $(document).on('click', ".topbar-notification .btn-close", function(e) {
            e.preventDefault();
            $('.topbar-notification').toggleClass("d-none");
        });

        // Shopping cart
        $(document).on('click', '.navbar .btn-navbar-basket', function(e) {
            e.preventDefault();
            openShoppingCart();
        });
        $(document).on('click', '.shopping-cart__header a', function() {
            closeShoppingCart();
            return false;
        });
        $(document).on('click', '.section-fixed', function(e) {
            if($(e.target).hasClass('section-fixed')) {
                closeShoppingCart();
            }
        });

        // Modal
        $('#modal-quickview').on('shown.bs.modal', function (e) {
            var related = $(e.relatedTarget),
                el = $(this);
            el.find('.modal-body > div').load(related.data('content'), function() {
                convertDOM(this);
            });
        });
        $('#modal-quickview').on('hidden.bs.modal', function() {
            var el = $(this);
            el.find('.modal-body > div').children().remove();
        });

        $(document).on('click', '[data-update-quantity]', function(evt) {
            var el = $(this);
            $(el.data('target') + ' input[name="quantity"]')
                .val(el.data('update-quantity'))
                .change();
        });

        $(document).on('submit', 'form', function(e) {
            var form = $(this);
            if (form.data('submitted')) {
                form.find('input,button').attr('disabled', true);
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            form.data('submitted', true);
            return true;
        });

        var ajaxFunction = {
            'openShoppingCart': openShoppingCart,
            'refreshShoppingCart': refreshShoppingCart,
        };

        $(document).on('submit', 'form[data-submit-ajax]', function(e) {
            e.preventDefault();

            var form = $(this);

            var jqxhr = $.ajax({
                'type': form.attr('method') || 'POST',
                'url': form.attr('action'),
                'data': form.serialize(),
            });

            jqxhr.then(function() {
                form.data('submit-ajax').split(',').forEach(function(fn) {
                    ajaxFunction[fn]();
                });
            }, function(data) {
                if (~(data.getResponseHeader('content-type') || []).indexOf('text/html')) {
                    document.open();
                    document.write(data.responseText); // jshint ignore:line
                } else {
                    alert(data.statusText);
                }
            }).always(function() {
                form.data('submitted', false);
            });
        });

        $(document).on('click', 'form button[data-submit-text]', function(evt) {
            var button = $(this);
            var resetHTML = button.data('reset-text') || button.html();
            var submitText = button.data('submit-text');
            if (submitText) {
                setTimeout(function() {
                    button.text(submitText);
                }, 0);
                setTimeout(function() {
                    button.empty();
                    button.append(resetHTML);
                }, 3000);
            }
            return true;
        });

        $(document).on('click', '[data-preview-img],[data-preview-video]', function(e) {
            e.preventDefault();
            var el = $(this);
            var preview = $('#' + el.data('preview-id'));
            if (el.data('preview-img')) {
                preview.find('iframe').attr('src', '');
                preview.children(':has(iframe)').addClass('d-none');
                preview.find('.img-wrapper.simple-img').removeClass('d-none');
                preview.find('picture > img').attr('src', el.data('preview-img'));
                preview.find('picture > source').attr('srcset', el.data('preview-img-srcset'));
            } else if (el.data('preview-video')) {
                preview.find('.img-wrapper.simple-img').addClass('d-none');
                var ratio = el.data('preview-video-ratio');
                preview.find('.embed-responsive')
                    .removeClass('embed-responsive-16by9 embed-responsive-4by3')
                    .addClass('embed-responsive-' + ratio);
                preview.find('iframe').attr(
                    'src', el.data('preview-video'));
                preview.children(':has(iframe)').removeClass('d-none');
            }
        });

        $(document).on('click', '[data-video]', function(e) {
            e.preventDefault();
            var el = $(this);
            var frame = $('<iframe/>', {
                'src': el.data('video'),
                'allow': 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture',
                'allowfullscreen': true,
            });
            el.empty().append(frame);
        });

        $(document).on('click', '[data-product-detail]', function() {
            dataLayer.push({
                'ecommerce': {
                    'detail': {
                        'products': [$(this).data('product-detail')],
                    }
                }
            });
        });

        $(document).on('click', '[data-update-cart]', function() {
            var el = $(this);
            var product = el.data('update-cart');
            var quantity = 1;
            if (el.data('quantity-new')) {
                quantity = el.parents('form')
                    .find('[name=' + el.data('quantity-new') + ']').val() || 0;
            }
            quantity -= el.data('quantity-old') || 0;
            product.price = el.data('price') * Math.abs(quantity);
            if (quantity < 0) {
                dataLayer.push({
                    'event': 'removeFromCart',
                    'ecommerce': {
                        'remove': {
                            'products': [product],
                        },
                    },
                });
            } else if (quantity > 0) {
                dataLayer.push({
                    'event': 'addToCart',
                    'ecommerce': {
                        'add': {
                            'products': [product],
                        },
                    },
                });
            }
        });

        // Open anchor in collapse
        if (window.location.hash) {
            var target = $(window.location.hash);
            if (target.hasClass('collapse')) {
                target.collapse('show');
                window.location.hash = window.location.hash;
            }
        }
    });

}());

var async = async || [];
$(document).ready(function() {
    while (async.length) {
        var task = async.shift();
        task();
    }
});
