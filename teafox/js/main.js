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
        /** slider**/
        var owl_contest = $('.owl-contest')
        $(owl_contest).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 6000,
            items: 1,
            animateOut: 'fadeOutDown',
            animateIn: 'fadeInDown',
        });

        $('.open-test-right').click(function () {
            $('body').addClass("show-test-right");
        });
        $('.close-test-right').click(function () {
            $('body').removeClass("show-test-right");
        });

        //show test-button
        //$('.box-answer').click(function () {
        //    $('body').addClass("show-test-bottom");
        //});
        //$('.close-test-bottom').click(function () {
        //    $('body').removeClass("show-test-bottom");
        //});

        //menu user

        $('.user-info').click(function () {
            $('.user-panel').toggleClass("show-user-menu");
        });

    });
})(jQuery);
