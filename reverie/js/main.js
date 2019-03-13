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

        db.menuFooter = function () {


            $('.footer-col.cap h3').on('click', function (e) {
                var menu = $(this).parent().find("ul");

                if ($(menu).is(":visible")) {
                    $(menu).slideUp();

                } else {
                    $(menu).slideDown();

                }
            });



        }
        db.video = function () {


            $('.video-icon').on('click', function (e) {
                $('body').toggleClass("show-video");
            });

            $('.close-video').on('click', function (e) {
                $('body').toggleClass("show-video");
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


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
                });
            }

        }

        db.sliderAbout = function () {
            if ($('.slider-about-for').length) {
                $('.slider-about-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    infinite: false,
                    asNavFor: '.slider-about-nav'
                });
                $('.slider-about-nav').slick({
                    slidesToShow: 10,
                    slidesToScroll: 10,
                    arrows: false,
                    infinite: false,
                    asNavFor: '.slider-about-for',
                    focusOnSelect: true,

                });
            }

        }

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

        db.textPlaceHolder = function () {

            $('.c-text')
                .on('focus', function () {
                    $(this).parents(".c-field").find('.placeholder').hide();
                })
                .on('blur', function () {
                    if (!$(this).val())
                        $(this).parents(".c-field").find('.placeholder').show();
                });
            $('.c-area')
                .on('focus', function () {
                    $(this).parents(".c-field").find('.placeholder').hide();
                })
                .on('blur', function () {
                    if (!$(this).val())
                        $(this).parents(".c-field").find('.placeholder').show();
                });
        }



        db.matchHeight = function () {
            if ($('.sc-item').length) {
                $('.sc-item').matchHeight();
            }
            if ($('.st-item').length) {
                $('.st-item').matchHeight();
            }


            if ($('.sr-item').length) {
                $('.sr-item').matchHeight();
            }
            if ($('.product-item').length) {
                $('.product-item').matchHeight();
            }


            $('.mega-col').matchHeight();
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







        db.closeCookie = function () {
            $('.close-cookie').on('click', function () {
                $('.cookie-notify').hide();
            });
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



        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });
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



        db.preLoad();
        db.scrollMenu();
        db.homeSlider();
        db.menuFooter();
        db.video();
        db.sliderProduct();
        db.toTop();
        db.textPlaceHolder();
        db.matchHeight();
        db.fAQ();
        db.sliderAbout();



        db.showSearch();

        db.gender();
        db.showApp();
        db.menuLeft();

        db.menuResponsive();
        db.closeCookie();

    });
})(jQuery);
