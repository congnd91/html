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

        db.approachSlider = function () {
            var owl_approach = $('.owl-approach');
            if ($(owl_approach).length) {
                $(owl_approach).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    items: 1,

                    navText: ["<span></span>", "<span></span>"]

                });
            }
        }

        db.newsSlider = function () {
            var owl_news = $('.owl-news');
            if ($(owl_news).length) {
                $(owl_news).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    items: 1,

                    navText: ["<span></span>", "<span></span>"]

                });
            }
        }
        db.partnerSlider = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    items: 1,

                    navText: ["<span></span>", "<span></span>"]

                });
            }
        }


        db.preLoad();
        db.approachSlider();
        db.newsSlider();
        db.partnerSlider();
        db.menuResponsive();

        new WOW({
            offset: 100,
            mobile: true
        }).init()


    });
})(jQuery);
