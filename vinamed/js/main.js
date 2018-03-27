(function ($) {
    $(document).on('ready', function () {
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        /**Menu**/
        $('.menu-icon').on('click', function () {
            $('.menu').toggleClass("show");

        });




        var owl_hero = $('.owl-hero');
        if ($(owl_hero).length) {
            $(owl_hero).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: true,
                items: 1,
                center: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

            });
        }


    });
})(jQuery);
