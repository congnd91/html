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
        db.dropdown = function () {
            var $toggle = $('.dropdown');
            $toggle.click(function () {
                $(this).toggleClass('is-active');

            });



            $('.accordion-caption').click(function () {
                var content = $(this).next(".accordion-content");
                if ($(content).is(":visible")) {

                    $(content).hide();
                    $(this).removeClass("is-active");
                } else {
                    $(content).show();
                    $(this).addClass("is-active");
                }

            });

            $('.ib-caption').click(function () {
                var content = $(this).next(".ib-content");
                if ($(content).is(":visible")) {

                    $(content).hide();
                    $(this).removeClass("is-active");
                } else {
                    $(content).show();
                    $(this).addClass("is-active");
                }

            });


            $('.tabs ul li').click(function () {
                var content = $(this).attr("data-id");
                $(this).parents(".tabs").find("li").removeClass("is-active");
                $(this).addClass("is-active");
                $(this).parents(".db-tabs").find(".tab-content").removeClass("is-active");
                $(content).addClass("is-active");


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
                    asNavFor: '.slider-nav',
                    responsive: [
                        {
                            breakpoint: 991,
                            settings: {

                                dots: true,

                            }
                                    }
                                    ]
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
        db.dropdown();

        db.footer();
        db.sliderProduct();

    });
})(jQuery);
