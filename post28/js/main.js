(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.icon-menu').on('click', function () {

                $("body").toggleClass("open-menu");
            });
        }


        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("is-scroll");
                } else {
                    $('body').removeClass("is-scroll");
                }
            });
        }

        db.sliderHero = function () {
            var owl_hero = $('.owl-hero');
            if ($(owl_hero).length) {
                $(owl_hero).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1

                });
            }
        }

        db.sliderPartner = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 4,
                        },


                        1191: {
                            items: 5,

                        }
                    },

                });
            }
        }

        db.niceScroll = function () {
            $('.ss-tab-content').niceScroll();
            $('.question-content').niceScroll();

        }


        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();

        db.sliderHero();

        db.sliderPartner();

        db.niceScroll();




    });
})(jQuery);
