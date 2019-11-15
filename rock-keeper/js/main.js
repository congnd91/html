(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(600).fadeOut(400, function () {
                $('body').fadeIn();
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
                    nav: false,

                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'

                });
            }

        }
        db.showSearch = function () {
            $('.search').on('click', function () {
                $('.search-wrap').toggleClass("show");
            });
            $('.close-search').on('click', function () {
                $('.search-wrap').toggleClass("show");
            });
        }

        db.scrollToMiddle = function () {
            $(".arrow-down").click(function () {
                $('html, body').animate({
                    scrollTop: $(".middle").offset().top
                }, 800);


            });
        }


        db.scrollAbout = function () {


            $(".about-bar ul li").click(function () {

                $(".about-bar ul li").removeClass("active");
                var that = this;
                var id = $(that).attr("data-id");
                $(that).addClass("active");


                $('html,body').animate({
                    scrollTop: $(id).offset().top - 110

                }, 1000);


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
                    slidesToShow: 6,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
                });
            }

        }








        db.scroll = function () {


            $(".totop").click(function () {


                $('html,body').animate({
                    scrollTop: 0
                }, 1000);


            });
        }



        db.matchHeight = function () {

            if ($('.news-item').length) {

                $('.news-item').matchHeight();
            }


        }


        db.milestoneSlider = function () {
            var owl_milestone = $('.owl-milestone');
            if ($(owl_milestone).length) {
                $(owl_milestone).owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 1,
                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 3,
                        }
                    },
                });
            }
        }

        db.scrollFixBar = function () {


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

                    $(".about-bar").trigger("sticky_kit:detach");


                } else {

                    make_sticky();
                }

            }).trigger('resize');

            function make_sticky() {

                if ($(".about-bar").length) {

                    $(".about-bar").stick_in_parent({
                        offset_top: 160

                    });
                }
            }







        }




        db.preLoad();
        db.menuResponsive();
        db.homeSlider();
        db.showSearch();
        db.closeCookie();
        db.scrollToMiddle();
        db.matchHeight();
        db.sliderProduct();
        db.scroll();
        db.scrollAbout();
        db.milestoneSlider();
        db.scrollFixBar();



        new WOW().init();




    });
})(jQuery);
