(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.page').on('click', function () {
                $('body').removeClass("open-menu");
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
        }


        db.sliderTransformation = function () {
            var owl_transformation = $('.owl-transformation');
            if ($(owl_transformation).length) {
                $(owl_transformation).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: false,
                    autoplay: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

                    responsive: {

                        0: {
                            items: 2,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 2,

                        },
                        991: {
                            items: 3,

                        }
                    },

                });
            }

        }









        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();
        db.sliderTransformation();


    });
})(jQuery);
