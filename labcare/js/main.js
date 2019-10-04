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
                    autoplay: false,
                    items: 1,
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.serviceSlider = function () {
            var owl_service = $('.owl-service');
            if ($(owl_service).length) {
                $(owl_service).owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    autoplay: false,
                    items: 1,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 1,
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
                    },
                });
            }
        }

        db.partnerSlider = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    autoplay: false,
                    items: 2,
                    responsive: {
                        0: {
                            items: 2,
                        },
                        576: {
                            items: 2,
                        },
                        768: {
                            items: 4,
                        },
                        991: {
                            items: 5,
                        },
                        1199: {
                            items: 6,
                        }
                    },
                });
            }
        }
        db.stepSlider = function () {
            var owl_step = $('.owl-step');
            if ($(owl_step).length) {
                $(owl_step).owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 1,
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
                    },
                });
            }
        }
        db.matchHeight = function () {
            if ($('.si-des h3').length) {
                $('.si-des h3').matchHeight();
            }
            if ($('.about-col').length) {
                $('.about-col').matchHeight();
            }
        }
        db.preLoad();
        db.matchHeight();
        db.homeSlider();
        db.serviceSlider();
        db.stepSlider();
        db.partnerSlider();
        db.menuResponsive();
        db.matchHeight();
    });
})(jQuery);
