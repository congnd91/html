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

    db.preLoad();
    db.menuResponsive();

});
