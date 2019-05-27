(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });
        }
        db.menuResponsive = function () {

            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.page').on('click', function () {
                $('body').removeClass("open-menu");
            });
            $('.menu-res-inner ul li.has-menu a').on('click', function (e) {
                var menu = $(this).parent().find(" > ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });
        }


        db.menuLeft = function () {
            $('.sb-menu li.has-child > a').on('click', function (e) {
                var menu = $(this).parent().find(".sb-sub");

                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");

                } else {

                    $(menu).slideDown();
                    $(this).parent().addClass("active");

                }
                return false;

            });

        }


        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    autoplayTimeout: 7000,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        new WOW({
            offset: 100,
            mobile: true
        }).init()
        db.toTop = function () {
            $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.totop').fadeIn();
                } else {
                    $('.totop').fadeOut();
                }
            });
            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }

        db.matchHeight = function () {
            if ($('.bbi-content').length) {
                $('.bbi-content').matchHeight();
            }

        };

        db.fAQ = function () {

            $('.faq-item .fi-caption').on('click', function () {

                var content = $(this).next();
                if ($(content).is(":visible")) {


                    $(content).slideUp();
                    $(this).parent().removeClass("active");

                } else {
                    $(content).slideDown();
                    $(this).parent().addClass("active");

                }

            });

        }


        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.homeSlider();
        db.matchHeight();
        db.menuLeft();
        db.fAQ();
    });
})(jQuery);
