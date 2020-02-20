(function ($) {
    $(document).on('ready', function () {

        $('.mb-item-inner').click(function () {

            var overlay = $(this).next();
            if ($(overlay).is(":visible")) {
                $(overlay).hide();

            } else {

                $(overlay).show();
            }
        });


        $('.mb-overlay').click(function () {

            $('.mb-overlay').hide();
        });
        $('.mb-overlay .mb-box').click(function (e) {
            e.stopPropagation();
        });
        $('.mb-overlay .mb-box ul li a').click(function (e) {
            $('.mb-overlay').hide();

        });


        $('.db-icon-filter').click(function () {
            $("#content").css({
                "position": "fixed",
                "left": "250px"
            });
        });

        $('.btn-close-flyout').click(function () {
            $("#content").css({
                "position": "unset",
                "left": "unset"
            });
        });

        $('.acc-caption').click(function () {

            var content = $(this).next();
            if ($(content).is(":visible")) {
                $(this).removeClass("active");
                $(content).hide();

            } else {

                $(content).show();
                $(this).addClass("active");
            }
        });


    });
})(jQuery);
