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


        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'

                });
            }

        }




        db.matchHeight = function () {
            if ($('.ls-item ul').length) {
                $('.ls-item ul').matchHeight();
            }
            if ($('.project-row .project-col').length) {
                $('.project-row .project-col').matchHeight();
            }
        }
        db.preLoad();
        db.matchHeight();
        db.homeSlider();
        db.menuResponsive();

    });
})(jQuery);
