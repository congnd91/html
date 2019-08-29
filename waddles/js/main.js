(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();


            });
        }

        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-side");
            });

        }

        db.menuDashboard = function () {
            $('.ds-menu .has-child .arrow').on('click', function (e) {

                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");

                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
            });


        }



        db.matchHeight = function () {
            if ($('.ls-item ul').length) {
                $('.ls-item ul').matchHeight();
            }
            if ($('.project-row .project-col').length) {
                $('.project-row .project-col').matchHeight();
            }
        }
        db.preLoad();
        db.matchHeight();
        db.menuDashboard();
        db.menuResponsive();

    });
})(jQuery);
