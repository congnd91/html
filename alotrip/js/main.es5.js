'use strict';

(function ($) {
    $(document).on('ready', function () {

        $(function () {
            $('#datetimepicker_start').datetimepicker();
        });
        $(function () {
            $('#datetimepicker_end').datetimepicker();
        });

        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });

        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 250) {
                $('.menu').addClass('fixed');
            } else {
                $('.menu').removeClass('fixed');
            }
        });

        /**Menu Mobile**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
        });

        $('.back-top').fadeOut();
        $(window).scroll(function () {
            if ($(this).scrollTop()) {
                $('.back-top').fadeIn();
            } else {
                $('.back-top').fadeOut();
            }
        });

        $(".back-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 1000);
        });

        $('.menu-res li.menu-item-has-children').on('click', function () {

            var submenu = $(this).find("ul");
            if ($(submenu).is(":visible")) {
                $(submenu).slideUp();
                $(this).removeClass("open-submenu-active");
            } else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });

        $('.menu-res li.menu-item-has-children > a').on('click', function () {
            return false;
        });

        /**Search Box**/
        $('body').on('click', function () {
            if ($('.search-icon').hasClass("show-search")) {
                $('.search-icon').toggleClass("show-search");
            }
        });
        $('.icon-search').on('click', function () {

            if ($(".searchbox").is(":visible")) {

                $(".searchbox").stop(true, true).slideUp();
                $(this).removeClass("show-searchbox");
            } else {

                $(".searchbox").stop(true, true).slideDown();
                $(this).addClass("show-searchbox");
            }
        });
        if ($('.bx-homeslider').length) {
            $('.bx-homeslider').bxSlider({
                mode: 'fade',
                captions: true
            });
        }

        /**Sportlight slider**/
        $('#owl-demo').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                350: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 5
                },
                991: {
                    items: 7
                },
                1000: {
                    items: 9
                }
            }
        });

        $('#owl-member').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            navSpeed: 1500

        });

        /**Sportlight slider**/
        $('.owl-dailies').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            mouseDrag: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });

        /**Review slider**/
        $('.owl-review').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            mouseDrag: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });

        /**Review slider**/
        $('.owl-special').owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            items: 1,
            mouseDrag: false
        });

        /**Match Height Review Item**/
        if ($('.reviews-item').length) {
            $('.reviews-item').matchHeight();
        }
    });
})(jQuery);

