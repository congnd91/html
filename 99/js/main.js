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

        var owl_box4 = $('.owl-box4')
        $(owl_box4).owlCarousel({
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 5000,
            items: 1,

            responsive: {
                // breakpoint from 0 up
                0: {

                    nav: false,
                    dots: false
                },
                // breakpoint from 480 up
                480: {

                    nav: false,
                    dots: false
                },
                // breakpoint from 768 up
                768: {

                    nav: false,
                    dots: false
                },
                992: {

                    nav: false,
                    dots: true

                }
            }



        });

        var dot = $('.box4-slider .owl-dot');
        dot.each(function () {
            var index = $(this).index() + 1;

            $(this).html(index);

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

        $('.b57m-icon').click(function () {

            if ($('.b57-popup').is(':visible')) {
                $(this).parent().removeClass("active");
            } else {
                $(this).parent().addClass("active");
            }


        });

        $('.b57-popup ul li a').click(function () {


            $('.b57m-bar').removeClass("active");



        });
        $('.check-tick').click(function () {


            $('.check-tick').removeClass("active");
            $(this).addClass("active");



        });

        $('.btn-link-swith').click(function () {


            var text = $(this).text();


            if (text == "已回覆")

            {
                $(this).text("回覆");
                $(this).addClass("red")
            } else if (text == "回覆") {
                $(this).text("已回覆");
                $(this).removeClass("red")
            } else if (text == "已聯絡") {
                $(this).text("未聯絡");
                $(this).addClass("red")
            } else if (text == "未聯絡") {
                $(this).text("已聯絡");
                $(this).removeClass("red")
            }

            return false;

        });





        //analytics page
        if ($('.datetimepicker').length) {
            $(function () {
                $('.datetimepicker').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        }

        //slick

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


            focusOnSelect: true
        });









    });
})(jQuery);
