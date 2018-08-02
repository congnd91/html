(function ($) {
    $(document).on('ready', function () {
        $('.lavamenu').lavalamp({
            easing: 'easeOutBack',
            delayOn: 50,
            delayOff: 100,
        });  

        setTimeout(function () {
            var a = $('.lavamenu').children('.lavalamp-item').eq(4);
            $('.lavamenu').data('lavalampActive', a).lavalamp('update');
        }, 1000);

        /**Menu**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
            setTimeout(scrollToTop, 0);
        });
        $('.menu-res li.menu-item-has-children').on('click', function (event) {
            event.stopPropagation();
            var submenu = $(this).find(" > ul");
            if ($(submenu).is(":visible")) {
                $(submenu).slideUp();
                $(this).removeClass("open-submenu-active");
            } else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });
        $('.menu-res li.menu-item-has-children > a').on('click', function () {
            //  return false;
        });
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        $(window).bind('resize', function () {
            if ($(window).width() <= 480) {
                $('.box-items-scroll').css("max-height", $(window).height() - 150);
            } else {
                $('.box-items-scroll').css("max-height", $(window).height() - 200);
            }
        }).trigger('resize');
        $(".box-items-scroll").niceScroll({
            cursorcolor: "#00F"
        });
        //menuleft

        $('.menu-left > li').on('click', function () {

            var chid = $(this).find("ul");
            if ($(chid).is(":visible"))

            {
                $(chid).slideUp();
            } else {
                $(chid).slideDown();

            }
        });

        $('.tt-check span').click(function () {
            $(this).toggleClass("active");

        });

        var owl_home = $('.owl-home');
        if ($(owl_home).length) {
            $(owl_home).owlCarousel({
                loop: true,
                animateOut: 'fadeOut',

                margin: 0,
                nav: false,
                margin: 0,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: true,

                items: 1,

            });
        }
        var owl_trend = $('.owl-trend');
        if ($(owl_trend).length) {
            $(owl_trend).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                margin: 0,
                navText: ['<i class="icon icon-arrow-left3"></i>', '<i class="icon icon-arrow-right3"></i>'],
                autoplay: true,

                items: 1,

            });
        }



        var owl_spkm = $('.owl-spkm');
        if ($(owl_spkm).length) {
            $(owl_spkm).owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                margin: 20,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                autoplay: false,
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
                    992: {
                        items: 3,

                    },
                    1200: {
                        items: 4,

                    },

                },

            });
        }
    });
})(jQuery);
