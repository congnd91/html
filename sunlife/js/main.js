(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }

        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });

            $('.close-menu').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.hbr-caption').on('click', function () {
                $('.hb-right').addClass("show");
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
        db.menuResponsive();
        db.question();

    });
})(jQuery);
