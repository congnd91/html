(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.matchHeight = function () {
            if ($('.news-item').length) {
                $('.news-item h3').matchHeight();
                $('.news-item p').matchHeight();
            }
        }
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    smartSpeed: 700
                });
            }
        }
        db.relatedSlider = function () {
            var owl_related = $('.owl-related');
            if ($(owl_related).length) {
                $(owl_related).owlCarousel({
                    loop: true,
                    margin: 20,
                    nav: true,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    smartSpeed: 700,
                    responsive: {

                        0: {
                            items: 1,
                        },

                        576: {
                            items: 2,
                        },

                        992: {
                            items: 3,

                        },
                        1200: {
                            items: 4,

                        }
                    },

                });
            }
        }


        db.applicationSlider = function () {
            var owl_application = $('.owl-application');
            if ($(owl_application).length) {
                $(owl_application).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    smartSpeed: 700
                });
            }
        }
        db.menuMobile = function () {
            $('.menu-icon').click(function () {

                $("body").addClass("show-menu");
            });
            $('.mm-close').click(function () {
                $("body").removeClass("show-menu");
            });

            $('.menu-mobile ul li.has-child a').click(function (e) {
                var subMenu = $(this).parent().find(".sub-menu");

                if ($(subMenu).is(":visible")) {
                    $(subMenu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(subMenu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;


            });


        }

        db.toTop = function () {

            $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("body-scrolling");
                    $('.totop').fadeIn();
                } else {
                    $('body').removeClass("body-scrolling");
                    $('.totop').fadeOut();
                }
            });

            $(".totop").click(function () {

                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });




        }

        db.preLoad();
        db.menuMobile();
        db.homeSlider();
        db.relatedSlider();
        db.applicationSlider();
        db.matchHeight();
        db.toTop();
    });
})(jQuery);
