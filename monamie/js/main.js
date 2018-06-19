(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
            });
        }
        db.sliderHome = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    margin: 0,
                    items: 1,
                    animateOut: 'fadeOut',
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                });
            }
        }

        db.accordion = function () {
            $(".accordion-caption").click(function () {

                var content = $(this).next(".accordion-content");


                if ($(content).is(":visible")) {
                    $(content).slideUp();
                    $(this).removeClass("active");
                } else {
                    $(content).slideDown();
                    $(this).addClass("active");
                }


            });
        }

        db.sliderFade = function () {
            var owl_fade = $('.owl-fade');
            if ($(owl_fade).length) {
                $(owl_fade).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    margin: 0,
                    items: 1,
                    animateOut: 'fadeOut',

                });
            }
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
        db.sliderStar = function () {
            var owl_fade = $('.owl-star');
            if ($(owl_fade).length) {
                $(owl_fade).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    margin: 0,
                    items: 1,

                });
            }
        }
        db.sliderPopular = function () {
            var owl_popular = $('.owl-popular');
            if ($(owl_popular).length) {
                $(owl_popular).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    margin: 30,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 3,
                        },
                        1199: {
                            items: 4,
                        }
                    }
                });
            }
        }
        db.sliderVideo = function () {
            var owl_popular = $('.owl-video');
            if ($(owl_popular).length) {
                $(owl_popular).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    margin: 30,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 2,
                        },
                        1199: {
                            items: 3,
                        }
                    }
                });
            }
        }

        db.sliderProduct = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true
                });
            }

        }

        db.niceScroll = function () {

            if ($('.md-brand-group-scroll').length) {
                $('.md-brand-group-scroll').niceScroll({
                    autohidemode: 'leave'
                });
            }
        }
        db.Scroll = function () {


            $(".main-menu").stick_in_parent();

        }

        db.preLoad();
        db.menuResponsive();
        db.sliderPopular();
        db.sliderVideo();
        db.sliderHome();
        db.sliderFade();
        db.niceScroll();
        db.sliderProduct();
        db.sliderStar();
        db.toTop();
        db.accordion();
        db.Scroll();
    });
})(jQuery);
