$(document).ready(function () {
    $('.js-example-basic-single').select2();
});
(function ($) {
    $(document).on('ready', function () {

        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });



        var db = new Object();
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
            });
        }

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("is-scroll");
                } else {
                    $('body').removeClass("is-scroll");
                }
            });

            $('.backtotop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.backtotop').fadeIn();
                } else {
                    $('.backtotop').fadeOut();
                }
            });


            $(".backtotop").click(function () {

                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }
        db.homeSlider = function () {


            var owl_home = $('.owl-hero');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut',
                    mouseDrag: false

                });
            }

        }

        db.scrollMenu();
        db.menuResponsive();
        db.homeSlider();


        $('select111').select2({
            minimumResultsForSearch: -1,
            placeholder: function () {
                $(this).data('placeholder');
            }
        });







    });
})(jQuery);
