$(document).ready(function () {

    var db = new Object();
    db.preLoad = function () {

        $('.page-preload').delay(400).fadeOut(200, function () {
            $('body').fadeIn();
        });
    }
    db.menuResponsive = function () {
        $('.menu-icon').on('click', function (e) {
            e.stopPropagation();
            $('body').toggleClass("open-menu");
        });

    }
    db.accordion = function () {
        $('.accordion-caption').on('click', function (e) {

            var content = $(this).next();
            if ($(content).is(":visible")) {
                $(content).slideUp();
                $(this).removeClass("active");
            } else {
                $(content).slideDown();
                $(this).addClass("active");

            }
        });

    }


    db.preLoad();
    db.menuResponsive();
    db.accordion();

});
