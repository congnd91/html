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
        db.homeServices = function () {
            var owl_services = $('.owl-services');
            if ($(owl_services).length) {
                $(owl_services).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    nav: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],



                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 1,
                            nav: true,
                            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                        },
                        992: {
                            items: 3,
                            margin: 30,
                            nav: false,
                            loop: false
                        }
                    }
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
        db.homeServices();


    });
})(jQuery);
