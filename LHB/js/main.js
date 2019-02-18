(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        $(window).bind('resize', function () {


            $(".menu li a").click(function () {
                var check = $(".mobile-check")
                if ($(check).is(":visible")) {} else {

                    $(".menu").stop(true, true).slideUp();
                }
            });

        }).trigger('resize');
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                var menu = $('.menu');
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                } else {
                    $(menu).slideDown();
                }
            });
        }
        db.matchHeight = function () {
            if ($('.item-one').length) {
                $('.item-one').matchHeight();
            }
            if ($('.item-two').length) {
                $('.item-two').matchHeight();
            }
        }

        db.sliderBanner = function () {
            var owl_banner = $('.owl-banner');
            if ($(owl_banner).length) {
                $(owl_banner).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: true,
                    nav: false,
                    autoplay: true,
                    items: 1,

                });
            }
        }
        db.sliderOne = function () {
            var owl_one = $('.owl-one');
            if ($(owl_one).length) {
                $(owl_one).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: true,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 3
                        }
                    },
                });
            }
        }
        db.sliderTwo = function () {
            var owl_two = $('.owl-two');
            if ($(owl_two).length) {
                $(owl_two).owlCarousel({
                    loop: true,
                    margin: 20,
                    mouseDrag: true,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: {

                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 3
                        }
                    },
                });
            }
        }
        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });
        }
        db.scroll = function () {
            $(".menu li a").click(function () {
                $(".menu li").removeClass("active");
                var that = this;
                var id = $(that).attr("data-id");
                $(that).parent().addClass("active");
                $('html,body').animate({
                    scrollTop: $(id).offset().top - 120
                }, 1000);
            });
        }
        db.preLoad();
        db.menuResponsive();
        db.matchHeight();
        db.sliderBanner();
        db.sliderOne();
        db.sliderTwo();
        db.gender();
        db.scroll();
        new WOW().init();
    });
})(jQuery);
