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


        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.page').on('click', function () {
                $('body').removeClass("open-menu");
            });

            $('.has-menu a').on('click', function (e) {
                var menu = $(this).parent().find(" > ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });




            $('.mega-menu ul li:first-child').find(".mega-sub").show();
            $('.mega-menu ul li').hover(function () {
                    $('.mega-menu ul li').removeClass("active");
                    $(".mega-sub").hide();
                    $(this).addClass("active");
                    $(this).find(".mega-sub").show();

                },


                function () {});


            /* $('.mega-sub  > .mega-sub-cols > .mega-col > .col-item:first-child').find(".mega-sub1").show();
 $('.mega-sub > .mega-sub-cols > .mega-col > .col-item').hover(function () {
         $('.mega-sub > .mega-sub-cols > .mega-col > .col-item').removeClass("active");
         $(".mega-sub1").hide();
         $(this).addClass("active");
         $(this).find(".mega-sub1").show();


     },


     function () {});*/



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

        db.newsHomeSlider = function () {


            var owl_news = $('.owl-news');
            if ($(owl_news).length) {
                $(owl_news).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    smartSpeed: 1000,

                    autoplay: true,
                    items: 1,
                    autoplayTimeout: 5000
                    //      animateOut: 'fadeOut'

                    // changed: callback

                });
            }

            owl_news.on('changed.owl.carousel', function (event) {
                /*      $('.video-youtube')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');*/


            });






        }

        db.scrollIntro = function () {


            $(window).scroll(function () {

                if ($(this).scrollTop() >= 150) {

                    $('.intro.fixed').addClass("hide-intro");

                } else {
                    // $('.intro.fixed').removeClass("hide-intro");
                }
            });




        }

        db.showSearch = function () {
            $('.search-icon').on('click', function () {
                $('.search-wrap').toggleClass("show");
            });
            $('.close-search').on('click', function () {
                $('.search-wrap').toggleClass("show");
            });
        }
        db.addCompare = function () {

            $('body').on('click', function () {
                $('.pd-button-wrap').removeClass("show");

            });

            $('.pd-button-wrap').on('click', function (e) {
                alert("sss");
            });

            $('a.pd-btn').on('click', function (e) {
                e.stopPropagation();
                $('.pd-button-wrap').removeClass("show");
                $(this).parent().addClass("show");
                return false;
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
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
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

            if ($('.product-item').length) {
                $('.product-item').matchHeight();
            }
            $('.mega-col').matchHeight();

        }





        db.tabProductDetail = function () {
            $(".detail-nav li").click(function () {
                var value = $(this).attr("data-tab");

                $(".detail-nav li").removeClass("active");
                $(this).addClass("active");
                $('.pd-content').removeClass("active");
                $(value).addClass("active");
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
                    scrollTop: $(id).offset().top - 180
                }, 1000);


            });
        }

        db.scrollFixBar = function () {

            if ($(".detail-bar").length) {

                $(".detail-bar").stick_in_parent({
                    offset_top: 100,
                });
            }
            if ($(".pc-row.head").length) {

                $(".pc-row.head").stick_in_parent({

                    offset_top: 120,

                });
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



        db.preLoad();


        db.hoverMenu();
        db.menuResponsive();
        db.homeSlider();
        db.newsHomeSlider();
        db.scrollIntro();
        db.showSearch();
        db.tabProductDetail();
        db.sliderProduct();
        db.gender();
        db.matchHeight();
        db.scrollFixBar();
        db.closeCookie();
        db.fAQ();
        db.scroll();


        new WOW().init();

        db.addCompare();


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
