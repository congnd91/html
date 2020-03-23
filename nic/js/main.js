$(document).ready(function () {

    /*$('.header').on('click', function (e) {
    alert("s");
    $('.nav-tabs a[href="#deals-investments"]').tab('show');
});*/

});

(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });




        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.page').on('click', function () {
                $('body').removeClass("open-menu");
            });
        }

        db.matchHeight = function () {
            if ($('.service-item').length) {
                $('.service-item').matchHeight();
            }



        }

        db.impactSlider = function () {
            var owl = $('.owl-impact');

            $(owl).children().each(function (index) {
                $(this).attr('data-position', index); // NB: .attr() instead of .data()
            });

            $(owl).owlCarousel({
                // center: true,
                loop: false,
                //  rtl: true,
                responsive: {
                    0: {
                        items: 3,
                        //  nav: true,
                        // center: true,

                    },
                    580: {
                        items: 3,
                        // center: true,

                    },
                    992: {
                        items: 5,
                        //  center: true,

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
        db.menuResponsive();
        db.impactSlider();
        db.matchHeight();

    });
})(jQuery);
