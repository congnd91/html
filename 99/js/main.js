(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        /** slider**/
        var owl_intro = $('.owl-intro')
        $(owl_intro).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            items: 1,



        });


        var owl_cate = $('.owl-cate')
        $(owl_cate).owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            autoplay: false,
            autoplayTimeout: 5000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],



            responsive: {
                // breakpoint from 0 up
                0: {
                    items: 2,
                    nav: true,
                },
                // breakpoint from 480 up
                480: {
                    items: 2,
                    nav: true,
                },
                // breakpoint from 768 up
                768: {
                    items: 3,
                    nav: true,
                },
                992: {
                    items: 5,

                },
                1200: {
                    items: 5,
                }
            }

        });



        /**Menu**/
        $('.menu-icon-mobile').on('click', function () {
            $('body').toggleClass("open-menu");
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
            return false;
        });

        /**dropdown***/


        $('.my-dropdown span').click(function () {
            $('.my-dropdown').removeClass("show");

            if ($(this).next().is(":visible")) {
                $(this).parent().removeClass("show");
            } else {
                $(this).parent().addClass("show");
            }


        });

        $('.my-dropdown ul li').click(function () {
            $('.my-dropdown').removeClass("show");




        });








    });
})(jQuery);
