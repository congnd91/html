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
            }
        }
        db.matchHeight = function () {}
        db.customerSlider();
        db.gridTemplate();
    });
})(jQuery);
