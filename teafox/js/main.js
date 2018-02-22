(function ($) {
    $(document).on('ready', function () {


        $('.lavamenu').lavalamp({
            easing: 'easeOutBack',
            delayOn: 50,
            delayOff: 100,

        });  
        var a = $('.lavamenu').children('.lavalamp-item').eq(1);
        $('.lavamenu').data('lavalampActive', a).lavalamp('update');
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




        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        $('.user-cart > span').click(function (event) {

            event.stopPropagation();
            if ($('.box-cart').is(":visible"))

            {
                $('.box-cart').hide();
            } else {
                $('.box-cart').show();
            }

        });

        $('.box-cart').click(function (event) {
            event.stopPropagation();


        });

        $('body').click(function () {
            {
                $('.box-cart').hide();

            }
        });

        /** **/
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
        /** slider**/

        if ($('.slider-for').length) {

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
                dots: false,
                centerMode: false,
                focusOnSelect: true
            });

        }



    });
})(jQuery);
