(function ($) {
    $(document).on('ready', function () {
        $(function () {
            $('.bxslider').bxSlider({
                mode: 'fade',
                auto: true,
                speed: 1000,
                prevText: '<i class="fas fa-long-arrow-alt-left"></i>',
                nextText: '<i class="fas fa-long-arrow-alt-right"></i>',




            });
        });


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

            $('.slider-item').css("min-height", $('.hero-home').height());
            $('.bx-viewport').css("min-height", $('.hero-home').height());



        }).trigger('resize');


        var owl_service = $('.owl-service')
        $(owl_service).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            center: true,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                    center: false

                },
                565: {
                    items: 1,
                    center: false

                },
                768: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });


        var owl_tt = $('.owl-tt')
        $(owl_tt).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            center: true,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
            items: 1,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
        });









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
    });
})(jQuery);
