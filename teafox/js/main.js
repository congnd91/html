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
    });
})(jQuery);
