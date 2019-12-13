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


            $('.bottom-col h3').on('click', function (e) {
                var menu = $(this).next();

                if ($(menu).is(":visible")) {
                    $(menu).hide();

                    $(this).removeClass("active");
                } else {
                    $(menu).show();

                    $(this).addClass("active");
                }
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
        db.dtSlider = function () {
            var owl_dt = $('.owl-dt');
            if ($(owl_dt).length) {
                $(owl_dt).owlCarousel({
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


        db.accordion = function () {
            $('.bfc-caption').on('click', function (event) {

                var child = $(this).next(".bfc-content");

                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).addClass("active");
                }
            });


        }
        db.switchView = function () {
            $('.view-grid').on('click', function () {

                $('.box-view-list').removeClass("active");
                $('.view-list').removeClass("active");
                $('.box-view-gird').addClass("active");
                $(this).addClass("active");
            });

            $('.view-list').on('click', function () {
                $('.box-view-gird').removeClass("active");
                $('.view-grid').removeClass("active");

                $('.box-view-list').addClass("active");
                $(this).addClass("active");
            });


        }

        db.siteMap = function () {
            $('.sitemap').on('click', function () {
                $(this).toggleClass("show");
            });

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
                    loop: true,
                    margin: 20,
                    nav: true,
                    autoplay: false,

                    responsive: {
                        0: {
                            center: true,
                            items: 2

                        },
                        576: {


                            items: 2

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
        db.sliderProduct = function () {
            if ($('.slick-product').length) {
                $('.slick-product').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 3,
                    slidesToScroll: 1,

                    responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1,
                            }
                    },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                    },
                        {

                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: true,
                                centerPadding: '50px',
                            }
                    }

                ]
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
            if ($('.product-item').length) {
                $('.product-item').matchHeight();

            }
            if ($('.pp-item').length) {
                $('.pp-item').matchHeight();
            }
            //  if ($('.sr-item').length) {
            // $('.sr-item').matchHeight();
            // }



        }

        db.scrollFixBar = function () {





            function isMobileWidth() {
                return $('#mobile-indicator').is(':visible');
            }


            $(window).bind('resize', function () {


                if (isMobileWidth()) {

                    $(".pd-bar").trigger("sticky_kit:detach");


                } else {

                    make_sticky();
                }

            }).trigger('resize');

            function make_sticky() {

                if ($(".pd-bar").length) {

                    $(".pd-bar").stick_in_parent({
                        offset_top: 50,
                    });
                }
            }






        }







        db.preLoad();
        db.homeSlider();
        db.dtSlider();
        db.sliderProduct();
        db.menuResponsive();
        db.accordion();
        db.switchView();
        db.matchHeight();
        db.siteMap();
        db.scrollFixBar();

        new WOW().init();
    });
})(jQuery);
