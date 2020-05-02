$(document).ready(function () {
    $('.page-preload').delay(400).fadeOut(200, function () {
        $('body').fadeIn();
    });
    $('.menu-icon').click(function () {
        var menu = $(".menu");
        if ($(menu).is(":visible")) {
            $("body").removeClass("open-menu");
        } else {
            $("body").addClass("open-menu");
        }
    });
});
