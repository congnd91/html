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
        db.menuLeft = function () {

            $('.menu-left-caption').on('click', function () {
                var menu = $(".colleft");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();

                } else {
                    $(menu).slideDown();

                }
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
        db.scrollMenu();
        db.homeSlider();
        db.productSlider();
        db.menuLeft();
        db.fAQ();
        db.gender();
        db.showApp();





        db.sliderAbout();
        db.menuResponsive();
        db.matchHeight();
        db.closeCookie();

    });
})(jQuery);
