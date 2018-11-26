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

            $('.mega-menu ul li:first-child').find(".mega-sub").show();
            $('.mega-menu ul li').hover(function () {
                    $('.mega-menu ul li').removeClass("active");
                    $(".mega-sub").hide();
                    $(this).addClass("active");
                    $(this).find(".mega-sub").show();

                },


                function () {});


        }
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
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

                    autoplay: false,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }


        db.showSearch = function () {
            $('.search-icon').on('click', function () {
                $('.search-wrap').toggleClass("show");
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
            $('.search-form').click(function (event) {
                event.stopPropagation();
                $('.search-box').addClass("show");
            });

            $('body').click(function () {

                $('.search-box').removeClass("show");
            });
            $('.search-form button').click(function (event) {
                $('.search-box').removeClass("show");

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
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;"></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;"></button>'
                });
            }

        }

        db.matchHeight = function () {
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }
            if ($('.pp-item').length) {
                $('.pp-item').matchHeight();
            }
            $('.mega-col').matchHeight();
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
            setTimeout(function () {
                var owl_miles = $('.owl-miles');
                if ($(owl_miles).length) {
                    $(owl_miles).owlCarousel({
                        loop: false,
                        margin: 0,
                        nav: true,
                        autoplay: false,
                        navText: ['<i class="fas fa-angle-left"></i> <span>往前</span>', '<i class="fas fa-angle-right"></i><span>往後</span>'],

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
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });

        }
        db.qq = function () {
            $('.qq').on('click', function () {
                $(this).toggleClass("show");
            });

        }

        db.preLoad();
        db.homeSlider();
        db.homeProductSlider();
        db.showSearch();




        db.search();
        db.menuLeft();
        db.menuAccordion();
        db.menuResponsive();
        db.chat();
        db.accordion();
        db.sliderProduct();
        db.matchHeight();
        db.sliderMiles();
        db.scroll();
        db.scrollFixBar();
        db.fixedHeader();
        db.gender();
        db.qq();
    });
})(jQuery);
