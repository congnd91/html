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

            $('body').on('click', function (e) {
                var search = $(".search-box-mobile");
                if ($(search).is(":visible")) {
                    $(search).hide();
                }
            });

            $('.search-box-mobile').on('click', function (e) {
                e.stopPropagation();
            });
            $('.search-icon-mobile').on('click', function (e) {
                e.stopPropagation();
                var search = $(".search-box-mobile");
                if ($(search).is(":visible")) {
                    $(search).hide();
                } else {
                    $(search).show();
                    $(".search-box-mobile input").focus();
                }
            });

            $('.close-menu').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });

        }

        db.aboutSlider = function () {
            var owl_about = $('.owl-about');
            if ($(owl_about).length) {
                $(owl_about).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }


        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.aboutSlider();

    });
})(jQuery);
