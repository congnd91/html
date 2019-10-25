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

        db.matchHeight = function () {
            if ($('.si-des h3').length) {
                $('.si-des h3').matchHeight();
            }
            if ($('.sc-des').length) {
                $('.sc-des').matchHeight();
            }
        }
        db.preLoad();
        db.matchHeight();
        db.approachSlider();
        db.menuResponsive();


    });
})(jQuery);
