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
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
            });
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
        db.chat = function () {
            $('.chatbox-caption-show').on('click', function () {
                $('.chatbox').addClass("show");
            });
            $('.chatbox-caption-hide').on('click', function () {
                $('.chatbox').removeClass("show");
            });
        }
        db.hoverMenu = function () {
            /*$('.menu-inner ul li').hover(function () {

                    $(".mega-menu").stop(true, true).slideUp(400);

                    var mega = $(this).find(".mega-menu");

                    if ($(mega).is(":not(:visible)")) {

                        setTimeout(function () {
                            $(mega).stop(true, true).slideDown(400);
                        }, 400);

                        $('body').addClass("show-overlay");
                    }
                },
                function () {
                    // $(this).find(".mega-menu").stop(true, true).slideUp(400);
                    $('body').removeClass("show-overlay");
                });*/




            $('.menu-inner ul li').hover(function () {
                    var mega = $(this).find(".mega-menu");
                    if ($(mega).is(":not(:visible)")) {
                        $(mega).stop().slideDown(400);
                        $('body').addClass("show-overlay")
                    }


                },
                function () {
                    var mega = $(this).find(".mega-menu");

                    $(mega).stop().slideUp(400);

                    $('body').removeClass("show-overlay")

                });


        }

        db.search = function () {
            $('.search-form input').focus(function () {
                $('.search-box').addClass("show");
            });

            $('.search-form input').blur(function () {
                $('.search-box').removeClass("show");
            });
        }
        db.menuLeft = function () {
            $('.ml-ul > li > a > div >span').on('click', function (event) {

                event.preventDefault();


                var child = $(this).parents("a").next();
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
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true
                });
            }

        }

        db.matchHeight = function () {
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }

        }

        db.newsDetail = function () {
            $('.news-item').on('click', function () {
                $("body").addClass("show-news-detail");
            });
            $('.close-nd').on('click', function () {
                $("body").removeClass("show-news-detail");
            });


        }

        db.videoControl = function () {
            $('.vb-control a').on('click', function () {

                var id = $(this).attr("data-id");
                $('.video-box-content').hide();
                $(id).show();
                $('.vb-control a').removeClass("current");
                $(this).addClass("current");


                return false;
            });



        }


        db.sliderMiles = function () {
            var owl_miles = $('.owl-miles');
            if ($(owl_miles).length) {
                $(owl_miles).owlCarousel({
                    loop: true,
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
                    }


                });
            }

        }

        db.scroll = function () {





            $(".detail-bar ul li").click(function () {

                $(".detail-bar ul li").removeClass("active");
                var that = this;
                var id = $(that).attr("data-id");
                $(that).addClass("active");


                $('html,body').animate({
                    scrollTop: $(id).offset().top - 160
                }, 1000);


            });
        }

        db.scrollFixBar = function () {

            if ($(".detail-bar").length) {

                $(".detail-bar").stick_in_parent();
            }


            function isMobileWidth() {
                return $('#mobile-indicator').is(':visible');
            }

            var url = window.location.href.split('#')[1];

            if (isMobileWidth()) {

                $("html, body").delay(500).animate({
                    scrollTop: $("#" + url).offset().top - 100
                }, 1000);
            }

            $(window).bind('resize', function () {



                if (isMobileWidth()) {

                    $(".pp-left").trigger("sticky_kit:detach");




                } else {

                    make_sticky();
                }

            }).trigger('resize');

            function make_sticky() {
                if ($(".pp-left").length) {

                    $(".pp-left").stick_in_parent({

                        offset_top: 100
                    });
                }
            }



        }

        db.homeSlider = function () {


            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'

                });
            }

        }


        db.fixedHeader = function () {

            $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("body-scrolling");
                    $('.totop').fadeIn();
                } else {
                    $('body').removeClass("body-scrolling");
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
            });

        }



        db.preLoad();
        db.hoverMenu();
        db.videoControl();
        db.homeSlider();
        db.search();
        db.menuLeft();
        db.menuAccordion();
        db.menuResponsive();
        db.chat();
        db.accordion();
        db.sliderProduct();
        db.matchHeight();
        db.newsDetail();
        db.sliderMiles();
        db.scroll();
        db.scrollFixBar();
        db.fixedHeader();
        db.gender();
    });
})(jQuery);
