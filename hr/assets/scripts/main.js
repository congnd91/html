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


     
        /**-form**/
        $("#register-form").validate();

        $('.answer').on('click', function () {
            $(this).toggleClass("current");
        });



    });
})(jQuery);
