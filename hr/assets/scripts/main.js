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
        /**register-form**/
        $("#register-form").validate();
    });
})(jQuery);
