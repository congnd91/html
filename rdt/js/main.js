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

}
db.accordion = function () {
    $('.accordion .caption').on('click', function (e) {
        var content = $(this).next();
        if ($(content).is(":visible")) {
            $(content).slideUp();
            $(this).removeClass("active");

        } else {
            $(content).slideDown();
            $('.accordion .caption').removeClass("active");
            $(this).addClass("active");

        }
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



db.detailSlider = function () {

    var owl_detail = $('.owl-detail');
    if ($(owl_detail).length) {
        $(owl_detail).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            rtl: true,
            autoplay: false,
            items: 1,
            //      animateOut: 'fadeOut'
            navContainer: '#customNav',
            // move dotsContainer outside the primary owl wrapper
            dotsContainer: '#customDots',

        });
    }

}



db.relatedSlider = function () {

    var owl_related = $('.owl-related');
    if ($(owl_related).length) {
        $(owl_related).owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            rtl: true,
            autoplay: false,
            items: 1,
            //      animateOut: 'fadeOut'
            navContainer: '#customNav1',
            // move dotsContainer outside the primary owl wrapper
            dotsContainer: '#customDots1',

            responsive: {
                768: {
                    items: 1,

                },
                992: {
                    items: 2,

                },
                1200: {
                    items: 3,

                }
            }

        });
    }

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
            700: {
                items: 2,

            },
            1200: {
                items: 3,

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
db.menuResponsive();
db.matchHeight();
db.detailSlider();
db.accordion();
db.relatedSlider();
