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

        $('.cs-item').on('click', function () {
            $('.cs-item').removeClass("active");
            $(this).addClass("active")

        });
        $('.side-arrow').on('click', function () {
            $('body').toggleClass("open-side");

        });
        $('.accodion-caption .arr').on('click', function () {
            var content = $(this).parents('.accodion-caption').next();

            if ($(content).is(":visible")) {

                $(content).slideUp();
                $(this).parents('.accodion-caption').removeClass("active");

            } else {
                $(content).slideDown();
                $(this).parents('.accodion-caption').addClass("active");
            }


        });






        var owl_intro = $('.owl-intro');
        if ($(owl_intro).length) {
            $(owl_intro).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                responsive: {

                    400: {
                        items: 1
                    },

                    480: {
                        items: 2
                    },

                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }

            });
        }

        var owl_home = $('.owl-home');
        if ($(owl_home).length) {
            $(owl_home).owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                autoplay: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                items: 1,

            });
        }

        $('.caption-scroll').hoverscroll({
            width: 'auto',
            width: 'auto'
        });



    });
})(jQuery);
