(function ($) {
    $(document).on('ready', function () {

        new WOW({
            offset: 100,
            mobile: true
        }).init()


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



            $('.mega-menu ul li:first-child').find(".mega-sub").show();
            $('.mega-menu ul li').hover(function () {
                    $('.mega-menu ul li').removeClass("active");
                    $(".mega-sub").hide();
                    $(this).addClass("active");
                    $(this).find(".mega-sub").show();

                },


                function () {});


        }
        db.homeSlider = function () {


            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'

                });
            }

        }









        db.sliderProduct = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>'
                });
            }

        }

        db.matchHeight = function () {
            if ($('.fx-card-inner').length) {
                $('.fx-card-inner').matchHeight();
            }
            if ($('.pp-item').length) {
                $('.pp-item').matchHeight();
            }
            $('.mega-col').matchHeight();
        }









        db.preLoad();



        db.menuResponsive();
        db.homeSlider();

        db.matchHeight();




        db.addCompare();



    });
})(jQuery);
