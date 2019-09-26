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

        db.menuCateMobile = function () {
            $('.box-cate-menu .bc-caption').on('click', function (e) {

                var menu = $(this).parent().find(".list-menu");

                if ($(menu).is(":visible")) {
                    $(menu).slideUp();

                } else {
                    $(menu).slideDown();

                }
                return false;
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
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
                });
            }

        }

        db.sectionSlider = function () {
            var owl_section = $('.owl-section');
            if ($(owl_section).length) {
                $(owl_section).owlCarousel({
                    loop: false,
                    margin: 0,
                    mouseDrag: false,
                    nav: false,
                    margin: 30,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 1,

                        },

                        768: {
                            items: 2,

                        },
                        992: {
                            items: 3,

                        }
                    }


                });
            }
        }

        db.partnerSlider = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: false,
                    margin: 0,
                    mouseDrag: false,
                    nav: false,
                    margin: 30,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 2,

                        },
                        576: {
                            items: 3,

                        },
                        768: {
                            items: 4,

                        },
                        992: {
                            items: 6,

                        }
                    }


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
                    slidesToShow: 7,

                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>',

                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
    },

                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
    },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
    }

  ]

                });
            }
        }
        db.searchAdvanced = function () {
            $(".btn-advanced").click(function () {
                var search = $('.advanced-search');

                if ($(search).is(":visible")) {
                    $(search).slideUp();
                } else {
                    $(search).slideDown();
                }
                return false;
            });

            $(".show-advance-search-mobile span").click(function () {
                $("body").toggleClass("show-search");
            });

            $(".close-search-mobile").click(function () {
                $("body").toggleClass("show-search");
            });
        }


        db.magazineSlider = function () {
            var owl_magazine = $('.owl-magazine');
            if ($(owl_magazine).length) {
                $(owl_magazine).owlCarousel({
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









        db.toTop = function () {
            // $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    ///$('.totop').fadeIn();
                } else {
                    // $('.totop').fadeOut();
                }
            });


            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }
        db.scrollToRegister = function () {

            $(".btn-register-fanchise").click(function () {
                $("html, body").animate({
                    scrollTop: $('#form-register').offset().top - 50
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


        db.grid = function () {
            if ($('.grid-templates').length) {
                var $grid = $('.grid-templates').isotope({
                    itemSelector: '.grid-item'
                    // filter: '.t1'
                });
                // filter items on button click

            }
        }


        db.preLoad();

        db.menuResponsive();
        db.homeSlider();
        db.sectionSlider();
        db.partnerSlider();
        db.searchAdvanced();
        db.magazineSlider();
        db.menuCateMobile();
        db.sliderProduct();
        db.scrollToRegister();


        db.sliderProduct();
        db.toTop();
        db.textPlaceHolder();
        db.matchHeight();
        db.fAQ();
        db.grid();

        db.closeCookie();

    });
})(jQuery);
