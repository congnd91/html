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

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });

            $('.menu').navpoints({
                offset: 70
            });





        }



        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    //      animateOut: 'fadeOut'
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
        db.scrollMenu();
        db.menuResponsive();
        db.homeSlider();


    });
})(jQuery);
