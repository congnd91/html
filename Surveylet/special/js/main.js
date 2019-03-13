(function ($) {
    $(document).on('ready', function () {
        "use strict";
        var db = new Object();

        $('.marquee').marquee({
            //duration in milliseconds of the marquee
            duration: 25000,
            pauseOnHover: true,
            //gap in pixels between the tickers
            gap: 10,
            //time in milliseconds before the marquee will start animating
            delayBeforeStart: 0,
            //'left' or 'right'
            direction: 'left',
            //true or false - should the marquee be duplicated to show an effect of continues flow
            //   duplicated: true
        });


        /**list function**/
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.toolTip = function () {
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        }
        db.menu = function () {
            $('.icon-menu').on('click', function () {
                $('body').toggleClass("open-menu");
            });
            $('.close-menu').on('click', function () {
                $('body').toggleClass("open-menu");
            });
            $('.menu-res li.menu-item-has-children').on('click', function (event) {
                event.stopPropagation();
                var submenu = $(this).find(" > ul");
                if ($(submenu).is(":visible")) {
                    $(submenu).slideUp();
                    $(this).removeClass("open-submenu-active");
                } else {
                    $(submenu).slideDown();
                    $(this).addClass("open-submenu-active");
                }
            });
            $('.menu-res li.menu-item-has-children > a').on('click', function () {
                //  return false;
            });
            $('.icon-search').on('click', function () {
                $('body').toggleClass("open-search");
            });
            $('.close-search').on('click', function () {
                $('body').toggleClass("open-search");
            });
        }
        db.search = function () {
            var search = $('.search-frame');
            $('.search-icon').on('click', function () {
                if ($(search).hasClass("show-search")) {
                    $(search).removeClass("show-search");
                } else {
                    $(search).addClass("show-search");
                    setTimeout(function () {
                        $('.txt-search').focus();
                    }, 300);
                }
            });
        }
        db.sliderBT = function () {
            var owl_np = $('.owl-bt');
            if ($(owl_np).length) {
                $(owl_np).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                });
            }
        }
        db.sliderProduct = function () {
            var owl_product = $('.owl-product');
            if ($(owl_product).length) {
                $(owl_product).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                });
            }
        }
        db.gridMode = function () {
            var grid = $('.grid');
            if ($(grid).length) {
                $(grid).isotope({
                    itemSelector: '.grid-item',
                });
            }
        }
        db.matchHeight = function () {
            var col_item = $('.col-item');
            if ($(col_item).length) {
                $(col_item).matchHeight();
            }
        }


        /**call function**/
        db.preLoad();
        db.toolTip();
        db.menu();
        db.search();
        db.sliderBT();
        db.sliderProduct();
        db.gridMode();
        db.matchHeight();
    });
})(jQuery);
