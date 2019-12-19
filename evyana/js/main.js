(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            var $toggle = $('.navbar-burger');
            var $menu = $('.navbar-menu');

            $toggle.click(function () {
                $(this).toggleClass('is-active');
                $menu.toggleClass('is-active');
            });




        }
        db.footer = function () {
            $('.footer h3.has-list-menu').click(function () {

                var content = $(this).next(".col-content");
                if ($(content).is(":visible")) {

                    $(content).hide();
                } else {
                    $(content).show();
                }

            });

        }








        db.preLoad();

        db.menuResponsive();
        db.footer();

    });
})(jQuery);
