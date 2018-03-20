(function ($) {
    $(document).on('ready', function () {



        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#myModal').modal('show');

        $('body').on("click", function (e) {
            $(".service-search").removeClass("show");

        })

        $('.service-search .arr').on("click", function (e) {

            e.stopPropagation();
            if ($(this).parent().find(".ss-drop").is(":visible")) {
                $(this).parent().removeClass("show");
            } else {
                $(this).parent().addClass("show");
            }
        });


    });
})(jQuery);
