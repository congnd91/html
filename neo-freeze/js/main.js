(function ($) {
    $(document).on('ready', function () {


        function autoHeight() {
            $('.footer-wrap').css('margin-top', $(document).height() - ($('.page').height()) - $('.footer-wrap').height() - $('.header').height());
        }

        autoHeight();
        $(window).resize(function () {
            autoHeight();
        });



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
        db.closeCookie = function () {
            $('.close-cookie').on('click', function () {
                $('.cookie-notify').hide();
            });
        }
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        db.productSlider = function () {
            var owl_home = $('.owl-product');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    mouseDrag: true,
                    items: 1,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
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

        db.showApp = function () {

            $('.app-item').on('click', function () {
                $('body').toggleClass("show-app-detail");
            });
            $('.app-close').on('click', function () {
                $('body').toggleClass("show-app-detail");
            });



        }

        db.fAQ = function () {

            $('.faq-item .fi-caption').on('click', function () {

                var content = $(this).next();
                if ($(content).is(":visible")) {


                    $(content).slideUp();
                    $(this).parent().removeClass("active");

                } else {
                    $(content).slideDown();
                    $(this).parent().addClass("active");

                }

            });

        }

        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });
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
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
                });
            }

        }







        db.sliderAbout = function () {
            setTimeout(function () {
                var owl_miles = $('.owl-miles');
                if ($(owl_miles).length) {
                    $(owl_miles).owlCarousel({
                        loop: false,
                        margin: 0,
                        nav: true,
                        autoplay: false,
                        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                        responsive: {
                            0: {
                                items: 1,
                            },
                            576: {
                                items: 2,
                            },
                            768: {
                                items: 3,
                            },
                            991: {
                                items: 4,
                            }
                        },
                        onRefreshed: callback
                    });
                }

                function callback() {
                    var maxHeight = 0;
                    $('.mi-box').each(function () {
                        var thisH = $(this).height();
                        if (thisH > maxHeight) {
                            maxHeight = thisH;
                        }
                    });
                    $('.mi-box').css("min-height", maxHeight + 30 + "px");
                    console.log(maxHeight);
                }
            }, 1000);
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
            if ($('.sr-item').length) {
                $('.sr-item').matchHeight();
            }
            if ($('.product-item').length) {
                $('.product-item').matchHeight();
            }


            $('.mega-col').matchHeight();
        }

        db.preLoad();
        db.homeSlider();
        db.productSlider();
        db.showSearch();
        db.fAQ();
        db.gender();
        db.showApp();




        db.menuLeft();
        db.sliderAbout();
        db.menuResponsive();
        db.matchHeight();


        db.sliderProduct();
        db.closeCookie();

    });
})(jQuery);
