(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
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

            $('.mega-menu ul li:first-child').find(".mega-sub").show();
            $('.mega-menu ul li').hover(function () {
                    $('.mega-menu ul li').removeClass("active");
                    $(".mega-sub").hide();
                    $(this).addClass("active");
                    $(this).find(".mega-sub").show();
                },
                function () {});
            $('.menu > ul > li.has-mega').hover(function () {
                    $("body").addClass("show-overlay");
                },
                function () {
                    $("body").removeClass("show-overlay");
                });
        }
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: false,
                    nav: true,
                    autoplay: false,
                    items: 1,

                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.homeProductSlider = function () {
            var owl_home = $('.owl-product-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    mouseDrag: false,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        db.showSearch = function () {

            $('.page').on('click', function () {
                $('.search-wrap').removeClass("show");
            });

            $('.search-icon').on('click', function (e) {

                e.stopPropagation();
                $('.search-wrap').toggleClass("show");
            });

            $('.search-wrap .search-box').on('click', function (e) {
                e.stopPropagation();
            });

        }
        db.sliderListProduct = function () {

            var owl_list = $('.owl-list');
            if ($(owl_list).length) {
                $(owl_list).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 1,

                        },
                        768: {
                            items: 2,
                            margin: 20
                        },
                        991: {
                            items: 3,
                            margin: 60
                        }
                    },

                });
            }



        }
        db.menuLeft = function () {
            $('.ml-ul > li > a.has-child > div').on('click', function (event) {
                event.preventDefault();
                var child = $(this).parents("a").next();
                var child_ul = $(this).parents(".ml-ul");
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).parents("a").removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).parents("a").addClass("active");
                }
            });
            $('.ml-caption').on('click', function () {
                var lv1 = $('.lv1');
                if ($(lv1).is(":visible")) {
                    $(lv1).slideUp();
                } else {
                    $(lv1).slideDown();
                }
            });

            $('.menu-left-caption').on('click', function () {
                var menu = $('.menu-left');
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).addClass("active");

                }
            });
        }
        db.matchHeight = function () {
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }
            if ($('.pp-item').length) {
                $('.pp-item').matchHeight();
            }
            //  if ($('.sr-item').length) {
            // $('.sr-item').matchHeight();
            // }



            if ($('.product-item').length) {
                $('.product-item').matchHeight();
            }

            if ($('.sr-des').length) {
                $('.sr-des ').niceScroll();
            }

            $('.mega-col').matchHeight();
        }






        db.preLoad();
        db.homeSlider();
        db.sliderListProduct();
        db.menuResponsive();


        new WOW().init();
    });
})(jQuery);
