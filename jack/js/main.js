(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });

        /**fullpage scroller**/
        //        $(document).ready(function () {
        //            $('.fullpage').fullpage({
        //                responsiveWidth: 992,
        //            });
        //        });

        if ($(".ml-fixed").length) {
            $(".ml-fixed").stick_in_parent({
                offset_top: 130
            });
        }




    });
})(jQuery);
