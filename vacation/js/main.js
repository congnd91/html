(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.customerSlider = function () {
            $('.slider-customer').slick({
                slidesToShow: 1,
                centerMode: true,
                centerPadding: '300px',
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            centerPadding: '0px',
                            slidesToShow: 1,
                        }
    },
                    {
                        breakpoint: 600,
                        settings: {
                            centerMode: false,
                            centerPadding: '0px',
                            slidesToShow: 1,
                        }
    }]
            })
        }
        db.gridTemplate = function () {
            if ($('.grid-template').length) {
                var $grid = $('.grid-template').isotope({
                    itemSelector: '.grid-item',
                    filter: '.management'
                });
                // filter items on button click
                $('.team-nav li').click(function () {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                    $('.is-active').removeClass("is-active");
                    $(this).addClass("is-active");
                });


                $grid.imagesLoaded().progress(function () {
                    $grid.isotope('layout');
                });

            }
        }
        db.showSortLong = function () {

            $(".ci-content .short a").click(function () {

                $(this).parents('.short').hide();
                $(this).parents('.ci-content ').find(".long").show();
                return false;

            })

            $(".ci-content .long a").click(function () {

                $(this).parents('.long').hide();
                $(this).parents('.ci-content ').find(".short").show();
                return false;

            })
        }
        db.customerSlider();
        db.gridTemplate();
        db.showSortLong();

    });
})(jQuery);
