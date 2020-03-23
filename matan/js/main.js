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


}


db.matchHeight = function () {
    if ($('.news-item').length) {
        $('.news-item').matchHeight();

    }
    if ($('.course-item').length) {
        $('.course-item').matchHeight();

    }
}
var scroll;

db.niceScroll = function () {
    if ($('.list-app-scroll').length) {


        var nicelist = $('.list-app-scroll').niceScroll({
            cursorcolor: "rgb(197,200,208)",
            cursorwidth: "4px"
        });




        $(".app .dropdown").on("shown.bs.dropdown", function (e) {
            nicelist.show().resize();
        });

        $(".app .dropdown").on("hide.bs.dropdown", function (e) {
            nicelist.hide();
        });




    }

    if ($('.sr-scroll').length) {

        $('.sr-scroll').niceScroll({
            cursorcolor: "rgb(197,200,208)",
            cursorwidth: "4px"
        });


    }
    if ($('.sl-scroll').length) {

        scroll = $('.sl-scroll').niceScroll({
            cursorcolor: "rgb(197,200,208)",
            cursorwidth: "4px"
        });


    }
    if ($('.menu-mobile').length) {

        $('.menu-mobile').niceScroll({
            cursorcolor: "rgb(197,200,208)",
            cursorwidth: "4px"
        });


    }


}
db.accordion = function () {
    $('.sl-acc .caption').on('click', function (e) {
        var content = $(this).next();
        if ($(content).is(":visible")) {
            $(content).hide();
            $(this).removeClass("active");

        } else {
            $(content).show();
            $('.acc .caption').removeClass("active");
            $(this).addClass("active");

        }

        scroll.show().resize();

    });


    $('.menu-mobile .app-caption').on('click', function (e) {
        var content = $(this).next();
        if ($(content).is(":visible")) {
            $(content).hide();
            $(this).removeClass("active");

        } else {
            $(content).show();
            $('.acc .caption').removeClass("active");
            $(this).addClass("active");

        }

        scroll.show().resize();

    });

}


db.cateSlider = function () {
    var owl = $('.owl-cate');


    $(owl).owlCarousel({
        center: false,
        loop: false,
        rtl: true,
        margin: 17,
        responsive: {
            0: {
                items: 2,


            },
            992: {
                items: 3,

            },
            1700: {
                items: 4,

            },
            1800: {
                items: 5,


            }

        }

    });



}


db.fourSlider = function () {
    var owl1 = $('.owl-four');

    $(owl1).owlCarousel({
        center: false,
        loop: false,
        rtl: true,
        items: 1,
    });


}

db.srSlider = function () {
    var owl = $('.owl-sr');


    $(owl).owlCarousel({
        center: false,
        loop: false,
        rtl: true,
        margin: 17,
        responsive: {
            0: {
                items: 2,


            },
            992: {
                items: 3,

            },
            1700: {
                items: 4,

            },
            1800: {
                items: 4,


            }

        }

    });



}


db.eightSlider = function () {
    var owl = $('.owl-eight');


    $(owl).owlCarousel({
        center: false,
        loop: false,
        rtl: true,
        margin: 15,
        responsive: {
            0: {
                items: 2,


            },
            992: {
                items: 2,

            }

        }

    });



}








db.preLoad();
db.menuResponsive();
db.niceScroll();
db.cateSlider();
db.fourSlider();
db.srSlider();
db.accordion();
db.eightSlider();
