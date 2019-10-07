(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
        }
        db.matchHeight = function () {
            if ($('.roadmap-item').length) {
                $('.roadmap-item').matchHeight();
            }
            if ($('.about-col').length) {
                $('.about-col').matchHeight();
            }
        }
        db.preLoad();
        db.menuResponsive();
        db.matchHeight();
        new WOW({
            offset: 100,
            mobile: true
        }).init()
    });
})(jQuery);
