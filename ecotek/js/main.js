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

            $('.menu-mobile ul li.has-menu a').on('click', function (e) {
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

        db.menuLeftMobile = function () {
            $('.br-menu-caption').on('click', function (e) {

                var menu = $(this).next();
                if ($(menu).is(":visible")) {
                    $(menu).hide();

                } else {

                    $(menu).show();
                }

            });
        }
        db.bankInfo = function () {
            $('.bank-info').on('click', function (e) {

                $('.bank-info-box').toggleClass("active");
                return false;

            });

            $('.search-icon').on('click', function (e) {

                $('.search-mobile').toggleClass("active");
                return false;

            });
        }


        db.sliderServiceDetail = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    focusOnSelect: true,
                    arrows: false

                });
            }

        }






        db.menuRight = function () {
            $('.br-menu ul li.has-menu .arrow').on('click', function (e) {

                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();

                } else {

                    $(menu).slideDown();
                }

            });
        }




        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.productSlider = function () {
            var owl_product = $('.owl-product');
            if ($(owl_product).length) {
                $(owl_product).owlCarousel({
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
                    nav: true,
                    autoplay: true,
                    items: 1,
                    responsive: {
                        0: {
                            items: 1,
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
                    autoplay: true,
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
            if ($('.sc-des').length) {
                $('.sc-des').matchHeight();
            }
        }
        db.preLoad();
        db.matchHeight();
        db.homeSlider();
        db.menuRight();
        db.menuLeftMobile();
        db.sliderServiceDetail();
        db.bankInfo();

        db.productSlider();
        db.stepSlider();
        db.partnerSlider();
        db.menuResponsive();
        db.matchHeight();


    });
})(jQuery);
