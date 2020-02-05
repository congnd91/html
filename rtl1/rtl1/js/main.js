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


        db.stepSlider = function () {
            var owl_partner = $('.owl-step3');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: false,
                    responsive: {
                        0: {
                            items: 2,

                        },
                        700: {
                            items: 2,

                        },
                        1200: {
                            items: 3,

                        },
                        1350: {
                            items: 5,

                        }
                    }

                });
            }
        }


        db.preLoad();

        db.stepSlider();
        db.menuResponsive();

        new WOW({
            offset: 100,
            mobile: true
        }).init();

        $('.nav-tabs > li > a').hover(function () {
            $(this).tab('show');
        });


    });
})(jQuery);
