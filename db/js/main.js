(function ($) {

    $(document).on('ready', function () {



        var db = new Object();

        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });

        }

        db.menuAccordion = function () {

            $('.acc-caption').on('click', function () {
                var content = $(this).next(".acc-content");

                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp();
                } else {
                    $(content).stop(true, true).slideDown();
                    $(this).addClass("open");
                }

            });

        }

        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");

            });
        }









        db.preLoad();
        db.menuAccordion();
        db.menuResponsive();




    });
})(jQuery);
