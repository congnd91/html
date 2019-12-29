(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            var $toggle = $('.navbar-burger');
            var $menu = $('.navbar-menu');

            $toggle.click(function () {
                $(this).toggleClass('is-active');
                $menu.toggleClass('is-active');
            });




        }
        db.footer = function () {
            $('.footer h3.has-list-menu').click(function () {

                var content = $(this).next(".col-content");
                if ($(content).is(":visible")) {

                    $(content).hide();
                } else {
                    $(content).show();
                }

            });

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
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    vertical: true,
                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="fas fa-angle-up"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="fa fa-angle-down"></i></button>'
                });
            }

        }









        db.preLoad();

        db.menuResponsive();
        db.footer();
        db.sliderProduct();

    });
})(jQuery);
