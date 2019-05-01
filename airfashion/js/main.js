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


        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
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
        db.gender();
        db.fAQ();
        db.matchHeight();
        db.sliderProduct();
        db.closeCookie();

    });
})(jQuery);
