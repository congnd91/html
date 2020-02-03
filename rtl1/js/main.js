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
                    loop: true,
                    margin: 50,
                    nav: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 3,
                            nav: false
                        },
                        1000: {
                            items: 5,
                            nav: true,
                            loop: false
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
