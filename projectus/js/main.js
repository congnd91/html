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
    $('.filter-nav').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-filter");
    });
    $('.close-filter').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-filter");
    });

    $('.sideleft-icon').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-sideleft");
    });
    $('.filter-icon').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-filter");
    });
    $('.bs-filter-mobile .caption').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-filter");
    });


    $('.main-bar .share').on('click', function (e) {
        e.stopPropagation();

        $(this).toggleClass("active");
    });


}


db.matchHeight = function () {
    if ($('.news-item').length) {
        $('.news-item').matchHeight();

    }
    if ($('.course-item').length) {
        $('.course-item').matchHeight();

    }
}



db.niceScroll = function () {

    if ($('.scroll').length) {

        $('.scroll').niceScroll({
            cursorcolor: "#555",
            cursorwidth: "5px",
            cursorborder: "none"
        });



    }
    if ($('.thread').length) {

        $('.thread').niceScroll({
            cursorcolor: "#DCD9D3",
            cursorwidth: "6px",
            cursorborder: "none",
            background: "#fff",
            autohidemode: 'leave',
            autohidemode: false
        });



    }

    if ($('.content-scroll').length) {

        $('.content-scroll').niceScroll({
            cursorcolor: "#DCD9D3",
            cursorwidth: "6px",
            cursorborder: "none",
            background: "#fff",
            autohidemode: 'leave',
            autohidemode: false
        });



    }




}






db.preLoad();

db.niceScroll();
