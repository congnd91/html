$(document).ready(function () {
    $('.js-example-basic-single').select2();
});
(function ($) {
    $(document).on('ready', function () {

        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });



        var db = new Object();
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
            });
        }

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("is-scroll");
                } else {
                    $('body').removeClass("is-scroll");
                }
            });
        }

        db.scrollMenu();
        db.menuResponsive();




    });
})(jQuery);
