(function ($) {
    $(document).on('ready', function () {
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        /**Menu**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
            setTimeout(scrollToTop, 0);
        });

        /**slider home**/
        $(window).bind('resize', function () {

            $('.slider-item').css("min-height", $('.hero-home').height());
            $('.bx-viewport').css("min-height", $('.hero-home').height());

        }).trigger('resize');

        if ($('.bxslider ').length) {
            $(function () {
                $('.bxslider').bxSlider({
                    mode: 'fade',
                    auto: true,
                    speed: 1000,
                    prevText: '<i class="fas fa-long-arrow-alt-left"></i>',
                    nextText: '<i class="fas fa-long-arrow-alt-right"></i>',

                });
            });
        }

        var owl_service = $('.owl-service');
        if ($(owl_service).length) {
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
        }

        var owl_tt = $('.owl-tt')
        if ($(owl_tt).length) {
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
        }


        var owl_say = $('.owl-say')
        if ($(owl_say).length) {
            $(owl_say).owlCarousel({
                loop: false,
                margin: 0,
                nav: true,
                autoplay: true,
                center: true,
                navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
                items: 1,

            });
        }

    });
})(jQuery);
