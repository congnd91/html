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

            $('.close-menu').on('click', function (e) {
                e.stopPropagation();
                $('body').removeClass("open-menu");
            });
            $('.menu-overlay').on('click', function (e) {
                e.stopPropagation();
                $('body').removeClass("open-menu");
            });


        }

        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: true,
                    smartSpeed: 1000,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    items: 1,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

                    // animateOut: 'fadeOut'
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
        db.menuResponsive();
        db.homeSlider();


    });
})(jQuery);
