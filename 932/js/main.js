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
                $('.youtube-video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
                $('body').toggleClass("show-video");
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
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut',
                    navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"]
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
                    speed: 10,
                    infinite: false,
                    asNavFor: '.slider-about-nav'
                });
                $('.slider-about-nav').slick({
                    slidesToShow: 10,
                    slidesToScroll: 10,
                    speed: 10,
                    arrows: false,
                    infinite: false,
                    asNavFor: '.slider-about-for',
                    focusOnSelect: true,
                    vertical: false,
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                vertical: true,
                            }
                       }
                    ]
                });


                $('.slider-about-nav .slick-slide').mouseover(function () {
                    $(this).click();
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
        db.scrollToListProduct = function () {
            $(".scroll-to-product-list").click(function () {
                $("html, body").animate({
                    scrollTop: $('.list-product').offset().top - 100
                }, 1500);
                return false;
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
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }
            if ($('.no-des h3').length) {
                $('.no-des h3').matchHeight();
            }
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
        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.homeSlider();
        db.menuFooter();
        db.video();
        db.sliderProduct();
        db.toTop();
        db.textPlaceHolder();
        db.matchHeight();
        db.fAQ();
        db.sliderAbout();
        db.closeCookie();
        db.scrollToListProduct();
    });
})(jQuery);
