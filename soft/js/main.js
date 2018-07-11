(function ($) {

    new WOW().init();
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menu = function () {
            $(window).bind('resize', function () {
                //    $('.menubar').css("min-height", "500px");
            }).trigger('resize');
            if ($(".menubar").length) {
                $(".menubar").stick_in_parent();
            }
            $('.dropdown-mobile').click(function () {
                $(this).toggleClass("show");
            });




        }
        db.preLoad();
        db.menu();
    });
})(jQuery);
