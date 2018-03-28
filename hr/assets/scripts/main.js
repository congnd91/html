(function ($) {
    $(document).on('ready', function () {
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        $(document).ready(function () {
            $('.fullpage').fullpage({

                responsiveWidth: 900,
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

        $(window).bind('resize', function () {
            if ($(window).width() <= 480) {
                $('.box-items-scroll').css("max-height", $(window).height() - 150);
            } else {
                $('.box-items-scroll').css("max-height", $(window).height() - 200);
            }
        }).trigger('resize');

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
