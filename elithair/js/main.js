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
                var menu = $('.menu-mobile');

                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                } else {
                    $(menu).slideDown();
                }
            });



        }
        db.question = function () {

            $('body').on('click', function (e) {
                $('.question-item').removeClass("show");
            });
            $('.question-item').on('click', function (e) {

                $('.question-item').removeClass("show");
                e.stopPropagation();
                $(this).toggleClass("show");
            });

            $('.qi-content').on('click', function (e) {
                e.stopPropagation();
            });
            $('.close-qi-content').on('click', function (e) {
                e.stopPropagation();
                $('.question-item').removeClass("show");
            });
            $('.scroll-faq').on('click', function (e) {
                $('body').toggleClass("open-menu");
                $('html,body').animate({
                    scrollTop: $(".section-faq").offset().top
                }, 2000);
                return false;
            });






        }

        new WOW({
            offset: 100,
            mobile: true
        }).init()


        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.question();

    });
})(jQuery);
