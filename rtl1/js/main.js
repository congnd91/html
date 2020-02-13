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


    $('.search-form').on('click', function (e) {
        e.stopPropagation();
        var p = $(this).parent();

        if ($(p).hasClass("show-search")) {} else {
            $(p).addClass("show-search");

        }
    });
    $('.search-suggestion').on('click', function (e) {
        e.stopPropagation();

        $('.search').removeClass("show-search");


    });


}


db.stepSlider = function () {
    var owl = $('.owl-carousel');

    $(owl).children().each(function (index) {
        $(this).attr('data-position', index); // NB: .attr() instead of .data()
    });

    $(owl).owlCarousel({
        center: true,
        loop: true,
        rtl: true,
        responsive: {
            0: {
                items: 2,

            },
            580: {
                items: 2,

            },
            700: {
                items: 3,

            },
            1200: {
                items: 5,


            },
            1350: {
                items: 5,

            }
        }

    });






    /* $(owl).owlCarousel({
         center: true,
         loop: true,
         items: 5,
         rtl: true

     })*/

    $(document).on('click', '.owl-item>div', function () {

        var $speed = 300;
        $(owl).trigger('to.owl.carousel', [$(this).data('position'), $speed]);
    });

}


db.preLoad();

db.stepSlider();
db.menuResponsive();

new WOW({
    offset: 100,
    mobile: true
}).init();
