(function ($) {
    $(document).on('ready', function () {



        $(window).bind('resize', function () {
            setHeightSlider();
        }).trigger('resize');

        function setHeightSlider() {

            $('.slider-item').css("min-height", $(".vl-form-search").outerHeight() + 100 + "px");


        }


        if ($('#price-range').length) {

            $("#price-range").slider({
                range: true,
                min: 48.5,
                max: 156,
                step: 0.1,
                values: [48.5, 156],
                slide: function (e, ui) {
                    $('.price-value').html(ui.values[0] + ' - ' + ui.values[1] + ' USD');
                }
            });

        }
        if ($('#duration-range').length) {
            $("#duration-range").slider({
                range: true,
                min: 80,
                max: 90,
                step: 1,
                values: [80, 90],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.slider-time').html(hours1 + 'h ' + minutes1 + ' min');

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.slider-time2').html(hours2 + 'h ' + minutes2 + ' min');
                }
            });
        }
        if ($('#take-range').length) {
            $("#take-range").slider({
                range: true,
                min: 370,
                max: 1330,
                step: 15,
                values: [370, 1330],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.take-range-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.take-range-time2').html(hours2 + ':' + minutes2);
                }
            });
        }
        if ($('#landing-range').length) {

            $("#landing-range").slider({
                range: true,
                min: 490,
                max: 1390,
                step: 15,
                values: [490, 1390],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.landing-range-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.landing-range-time2').html(hours2 + ':' + minutes2);
                }
            });
        }

        //return
        if ($('#take-range-return').length) {
            $("#take-range-return").slider({
                range: true,
                min: 370,
                max: 1330,
                step: 15,
                values: [370, 1330],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.take-range-time-return').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.take-range-time2-return').html(hours2 + ':' + minutes2);
                }
            });
        }

        if ($('#landing-range-return').length) {

            $("#landing-range-return").slider({
                range: true,
                min: 490,
                max: 1390,
                step: 15,
                values: [490, 1390],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.landing-range-time-return').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.landing-range-time2-return').html(hours2 + ':' + minutes2);
                }
            });
        }
        //mobile

        if ($('#price-range1').length) {

            $("#price-range1").slider({
                range: true,
                min: 48.5,
                max: 156,
                step: 0.1,
                values: [48.5, 156],
                slide: function (e, ui) {
                    $('.price-value1').html(ui.values[0] + ' - ' + ui.values[1] + ' USD');
                }
            });

        }
        if ($('#duration-range1').length) {
            $("#duration-range1").slider({
                range: true,
                min: 80,
                max: 90,
                step: 1,
                values: [80, 90],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.slider-time').html(hours1 + 'h ' + minutes1 + ' min');

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.slider-time2').html(hours2 + 'h ' + minutes2 + ' min');
                }
            });
        }
        if ($('#take-range1').length) {
            $("#take-range1").slider({
                range: true,
                min: 370,
                max: 1330,
                step: 15,
                values: [370, 1330],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.take-range-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.take-range-time2').html(hours2 + ':' + minutes2);
                }
            });
        }
        if ($('#landing-range1').length) {

            $("#landing-range1").slider({
                range: true,
                min: 490,
                max: 1390,
                step: 15,
                values: [490, 1390],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.landing-range-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.landing-range-time2').html(hours2 + ':' + minutes2);
                }
            });
        }


        if ($('#take-range1-return').length) {
            $("#take-range1-return").slider({
                range: true,
                min: 370,
                max: 1330,
                step: 15,
                values: [370, 1330],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.take-range-time-return').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.take-range-time2-return').html(hours2 + ':' + minutes2);
                }
            });
        }
        if ($('#landing-range1-return').length) {

            $("#landing-range1-return").slider({
                range: true,
                min: 490,
                max: 1390,
                step: 15,
                values: [490, 1390],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';



                    $('.landing-range-time-return').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';


                    $('.landing-range-time2-return').html(hours2 + ':' + minutes2);
                }
            });
        }




        $('.bxslider').bxSlider({
            auto: true,
            mode: "fade",
            speed: 2500,
            pause: 4000,
            autoControls: true
        });

        $(".scroll-testimonial").click(function () {
            $('html, body').animate({
                scrollTop: $(".trust-box").offset().top
            }, 2000);
        });

        $(".lv-search-location input").click(function (e) {
            e.stopPropagation();
            $('.lv-search-location').addClass("show");
        });

        $("body").click(function () {
            $('.lv-search-location').removeClass("show");
        });


        $(function () {
            $('#datetimepicker_start').datetimepicker({
                allowInputToggle: true,
                format: 'DD-MM-YYYY'

            });
        });


        $(function () {
            $('#datetimepicker_end').datetimepicker({

                allowInputToggle: true,
                format: 'DD-MM-YYYY'

            });
        });

        $(function () {
            $('.dateofbirth').datetimepicker({

                allowInputToggle: true,
                format: 'DD-MM-YYYY'

            });
        });

        $(function () {
            $('.datetimepicker_birthday').datetimepicker();
        });




        /******oneway*/
        $('.show-search').on('click', function () {

            if ($('.s-box-inline').hasClass("show")) {
                $('.bar-mobile span').removeClass("active");

                $('.s-box-inline').removeClass("show");
            } else

            {

                $('.bar-mobile span').removeClass("active");
                $(this).addClass("active");
                $('.s-box-inline').addClass("show");
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);

            }
        });


        $('.show-filter').on('click', function () {
            $('.s-box-inline').removeClass("show");
            $('body').addClass("show-mask show-filter");

            $('.bar-mobile span').removeClass("active");
            $(this).addClass("active");
        });

        $('.close-filter').on('click', function () {
            $('body').removeClass("show-mask show-filter");
            $('.bar-mobile span').removeClass("active");
        });

        $('.show-order').on('click', function () {
            $('.s-box-inline').removeClass("show");
            $('body').addClass("show-mask show-order");

            $('.bar-mobile span').removeClass("active");
            $(this).addClass("active");
        });

        $('.close-order').on('click', function () {
            $('body').removeClass("show-mask show-order");
            $('.bar-mobile span').removeClass("active");
        });


        $('.onway-item .detail-link').on('click', function () {


            var detail = $(this).parents('.onway-item').find(".onway-detail");
            var sp = $(this).parents('.onway-item').find(".io-sb");
            if ($(detail).is(":visible")) {
                $(detail).slideUp();
                // $(this).removeClass("open-submenu-active");
            } else {
                $(detail).slideDown();
                //$(this).detail("open-submenu-active");
            }

            if ($(sp).is(":visible")) {
                $(sp).removeClass("io-sb-show");

            } else {
                $(sp).addClass("io-sb-show");

            }
        });

        $('.my-passengers-select').on('click', function (e) {

            e.stopPropagation()
            if ($('.my-passengers').hasClass("show-pop-pass")) {
                $('.my-passengers').removeClass("show-pop-pass");
            } else {
                $('.my-passengers').addClass("show-pop-pass");
            }
        });

        $('.pop-pass').on('click', function (e) {

            e.stopPropagation()
        });

        $('body').on('click', function () {

            if ($('.my-passengers').hasClass("show-pop-pass")) {
                $('.my-passengers').removeClass("show-pop-pass");
            }

        });



        if ($('#ex1').length) {
            $('#ex1').slider();
            $("#ex1").on("slide", function (slideEvt) {
                console.log(slideEvt.value[0]);
                $(".ex1-value span").text(slideEvt.value[0] + ":" + slideEvt.value[1]);
            });
        }


        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        //$(window).bind('scroll', function () {
        //    if ($(window).scrollTop() > 250) {
        //        $('.menu').addClass('fixed');
        //    } else {
        //        $('.menu').removeClass('fixed');
        //    }
        //});

        $('.s-box-caption span.s-oneway').on('click', function () {

            if ($('.s-box').hasClass("one-way")) {} else {
                $('.s-box').addClass("one-way");
                $('.s-box').removeClass("round-trip");
                $(".active-tab").removeClass("active-tab");
                $(this).addClass("active-tab");
            }
        });

        $('.s-box-caption span.s-roundtrip').on('click', function () {

            if ($('.s-box').hasClass("round-trip")) {

            } else {
                $('.s-box').addClass("round-trip");
                $('.s-box').removeClass("one-way");
                $(".active-tab").removeClass("active-tab");
                $(this).addClass("active-tab");
            }
        });



        /**Menu Mobile**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
        });


        $('.back-top').fadeOut();
        $(window).scroll(function () {
            if ($(this).scrollTop()) {
                $('.back-top').fadeIn();
            } else {
                $('.back-top').fadeOut();
            }

        });

        $(".back-top").click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);

        });

        /**Trend Affix**/
        $('.b-filter').affix({
            offset: {
                top: 900,
                bottom: function () {
                    return (this.bottom = $('.footer').outerHeight(true) + 50);
                }
            }
        })



        $('.menu-res li.menu-item-has-children').on('click', function () {

            var submenu = $(this).find("ul");
            if ($(submenu).is(":visible")) {
                $(submenu).slideUp();
                $(this).removeClass("open-submenu-active");
            } else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });

        $('.menu-res li.menu-item-has-children > a').on('click', function () {
            return false;
        });
        /******show global-nav*/


        $('.global-nav-icon').on('click', function () {

            if ($(".global-nav-hidden").is(":visible")) {

                $(this).removeClass("active");
                $(".global-nav-hidden").slideUp();
                // $(this).removeClass("show-searchbox");
            } else {

                $(this).addClass("active");
                $(".global-nav-hidden").slideDown();
                //  $(this).addClass("show-searchbox");

                var carousel = $('#owl-demo').data('owlCarousel');
                carousel._width = $('#owl-demo').width();
                carousel.invalidate('width');
                carousel.refresh();
            }

        });









        /**Search Box**/
        $('body').on('click', function () {
            if ($('.search-icon').hasClass("show-search")) {
                $('.search-icon').toggleClass("show-search");
            }
        });
        $('.icon-search').on('click', function () {

            if ($(".searchbox").is(":visible")) {

                $(".searchbox").stop(true, true).slideUp();
                $(this).removeClass("show-searchbox");
            } else {


                $(".searchbox").stop(true, true).slideDown();
                $(this).addClass("show-searchbox");
            }

        });

        var owl_vl_detail = $('.owl-vl-detail').owlCarousel({
            items: 1,

            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            loop: true,
            autoplay: false,
            nav: true,
            autoplayTimeout: 2000,


        })

        dotcount = 1;
        $(".product-slider-wrapper .owl-dot").each(function () {
            $(this).addClass("dotnumber" + dotcount);
            $(this).attr("data-info", dotcount);
            dotcount = dotcount + 1;
        });
        // 2) ASSIGN EACH 'SLIDE' A NUMBER
        slidecount = 1;
        $(".product-slider-wrapper .owl-item").not(".cloned").each(function () {
            $(this).addClass("slidenumber" + slidecount);
            slidecount = slidecount + 1;
        });
        // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
        $(".product-slider-wrapper .owl-dot").each(function () {
            grab = $(this).data("info");
            slidegrab = $(".slidenumber" + grab + " img").attr("data-src");
            console.log(slidegrab);
            $(this).css("background-image", "url(" + slidegrab + ")");
        });
        // THIS FINAL BIT CAN BE REMOVED AND OVERRIDEN WITH YOUR OWN CSS OR FUNCTION, I JUST HAVE IT
        // TO MAKE IT ALL NEAT
        amount = $(".owl-dot").length;
        gotowidth = 100 / amount;
        $(".product-slider-wrapper .owl-dot").css("width", gotowidth + "%");
        newwidth = $(".owl-dot").width();
        $(".product-slider-wrapper .owl-dot").css("height", newwidth + "px");



        /**owl-demo slider**/
        var owl = $('#owl-demo').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                350: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 5
                },
                991: {
                    items: 7
                },
                1000: {
                    items: 9
                }
            }
        })


        /**owl-demo slider**/
        var owl = $('#owl-partner').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 2
                },
                350: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 4
                },
                991: {
                    items: 5
                },
                1000: {
                    items: 6
                }
            }
        })


        //faq
        $('.btn-callback').click(function () {


            $('.box-state-fail').toggleClass("show");




        });




        //faq
        $('.faq-caption').click(function () {

            if ($(this).hasClass("acc-active")) {
                $(this).removeClass("acc-active");
                $(this).next().hide();
            } else {


                $('acc-active').removeClass('acc-active');
                $(this).addClass("acc-active");
                $('.faq-content').hide();
                $(this).next().show();
            }

        });

        //fixed menu

        $(window).scroll(function () {
            if ($(this).scrollTop() >= 150) {
                $('body').addClass("fixed-menu-bar");
            } else {
                $('body').removeClass("fixed-menu-bar");
            }

        });
    });
})(jQuery);
