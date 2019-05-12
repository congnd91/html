(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
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
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.page').on('click', function () {
                $('body').removeClass("open-menu");
            });
            $('.menu-res-inner ul li.has-menu a').on('click', function (e) {
                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });
        }
        db.partnerSlider = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: true,
                    margin: 20,
                    //mouseDrag: false,
                    nav: true,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        576: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        991: {
                            items: 4,
                        },
                        1199: {
                            items: 5,
                        }
                    },
                });
            }
        }
        db.testimonialSlider = function () {
            var owl_testimonial = $('.owl-testimonial');
            if ($(owl_testimonial).length) {
                $(owl_testimonial).owlCarousel({
                    loop: true,
                    margin: 20,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 1,
                });
            }
        }
        new WOW({
            offset: 100,
            mobile: true
        }).init()
        db.toTop = function () {
            $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.totop').fadeIn();
                } else {
                    $('.totop').fadeOut();
                }
            });
            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }
        db.matchHeight = function () {
            if ($('.se-step').length) {
                $('.se-step').matchHeight();
            }
        };
        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.partnerSlider();
        db.testimonialSlider();
        db.matchHeight();
    });
})(jQuery);
