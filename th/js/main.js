(function ($) {
    $(document).on('ready', function () {
        /**Menu**/
        $('.menu-icon').on('click', function () {
            $('.menu').toggleClass("open-menu");
        });
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        $(window).bind('resize', function () {
            $('.home-video').css("min-height", $(window).height());
        }).trigger('resize');
        var owl_one = $('.owl-one');
        if ($(owl_one).length) {
            $(owl_one).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: true,
                navText: ['<i class="icon icon-arrow-left3"></i>', '<i class="icon icon-arrow-right3"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        center: false
                    },
                    565: {
                        items: 2,
                        center: false
                    },
                    768: {
                        items: 3
                    }
                }
            });
        }
    });
})(jQuery);
