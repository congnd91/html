(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuAccordion = function () {
            $('.acc-caption').on('click', function () {
                var content = $(this).next(".acc-content");
                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp();
                } else {
                    $(content).stop(true, true).slideDown();
                    $(this).addClass("open");
                }
            });
        }
        db.closeCookie = function () {
            $('.close-cookie').on('click', function () {
                $('.cookie-notify').hide();
            });
        }
        $(window).bind('resize', function () {
            $('.menu-res').css("max-height", $(window).height() - 20);
        }).trigger('resize');
        db.menuResponsive = function () {
            $('.menu-icon').click(function () {
                var menu = $('.menu-res');
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $('body').removeClass("open-menu");
                } else {
                    $(menu).slideDown();
                    $('body').addClass("open-menu");
                }
            });
            $('.menu-res-inner ul li.has-child > a').click(function () {
                var child = $(this).parent().find(" > ul");
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });
            $('.ml-content > ul > li.has-child > a > span').click(function () {
                var child = $(this).parents("li").find(" > ul");
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).parents("li").removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).parents("li").addClass("active");
                }
                return false;
            });
            $('.sub-menu > li.has-child > a > span').click(function () {
                var child = $(this).parents(".sub-menu").find(" > li > ul");
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).parents(".sub-menu").find(" > li.has-child").removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).parents(".sub-menu").find(" > li.has-child").addClass("active");
                }
                return false;
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
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.relatedProduct = function () {
            var owl_related = $('.owl-related');
            if ($(owl_related).length) {
                $(owl_related).owlCarousel({
                    loop: false,
                    margin: 20,
                    nav: true,
                    autoplay: true,
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
                        992: {
                            items: 3,
                        },
                        1200: {
                            items: 4,
                        }
                    },
                });
            }
        }
        db.matchHeight = function () {
            if ($('.product-item').length) {
                $('.product-item').matchHeight();
            }
            if ($('.hf-item').length) {
                $('.hf-item').matchHeight();
            }
            if ($('.nh-item').length) {
                $('.nh-item').matchHeight();
            }
        }
        db.accordion = function () {
            $('.faq-acc-caption').on('click', function () {
                var content = $(this).next();
                if ($(content).is(":visible")) {
                    $(content).stop(true, true).slideUp();
                    $(this).removeClass("active");
                } else {
                    $(content).stop(true, true).slideDown();
                    $(this).addClass("active");
                }
            });
        }
        db.menuLeft = function () {
            $('.ml-ul > li > a > div >span').on('click', function (event) {
                event.preventDefault();
                var child = $(this).parents("a").next();
                var child_ul = $(this).parents(".ml-ul");
                $('.lv2.ml-ul').not($(child_ul)).slideUp();
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
        }
        db.sliderProduct = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: false,
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
        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });
        }
        db.preLoad();
        db.menuResponsive();
        db.relatedProduct();
        db.homeSlider();
        db.sliderProduct();
        db.showSearch();
        db.matchHeight();
        db.toTop();
        db.gender();
        db.closeCookie();
        new WOW().init();
        //   db.menuLeft();
        //  db.menuAccordion();
        // db.menuResponsive();;
        //  db.accordion();
        //  db.sliderMiles();
        //  db.scroll();
        // db.scrollFixBar();
        //  db.fixedHeader();
    });
})(jQuery);
