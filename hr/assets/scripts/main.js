(function ($) {
    $(document).on('ready', function () {
        /**preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });

        /**fullpage scroller**/
        $(document).ready(function () {
            $('.fullpage').fullpage({
                responsiveWidth: 992,
            });
        });
        /**menu mobile**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
        });

        var inPageOffest = $('.control-step2-fixed.inpage').offset().top - $(window).height();
        $(window).scroll(function () {
            var scrollTop = $(this).scrollTop() - $('control-step2-fixed.inpage').outerHeight() - 100;
            if (scrollTop >= inPageOffest) {
                $('body').addClass("no-fixed");
            } else {
                $('body').removeClass("no-fixed");
            }
        });

        /**-form**/
        $("#register-form").validate();

        $('.answer').on('click', function () {
            $(this).toggleClass("current");
        });





    });
})(jQuery);
