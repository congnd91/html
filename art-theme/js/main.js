(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }

        db.menuMobile = function () {
            $('.menu-icon').click(function () {

                $('body').toggleClass("open-menu");
            });
        }

        db.search = function () {
            $('.search-mobile .icon').click(function () {

                $('.search-mobile').toggleClass("show");
            });
        }

        db.user = function () {
            $('.user > a').click(function () {

                $('.user').toggleClass("show");
                return false;
            });
        }

        db.preLoad();
        db.menuMobile();
        db.search();
        db.user();

    });
})(jQuery);
