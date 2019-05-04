(function ($) {
    $(document).on('ready', function () {
        $('[data-toggle="tooltip"]').tooltip();
        var db = new Object();
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("show-menu-mobile");
            });
            $('.close-menu').on('click', function () {
                $('body').toggleClass("show-menu-mobile");
            });
        }
        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });
        }

        db.gridTemplate = function () {
            if ($('.grid-template').length) {
                var $grid = $('.grid-template').isotope({
                    itemSelector: '.grid-item'
                    // filter: '.t1'
                });
                // filter items on button click
                $('.grid-template-nav li strong').click(function () {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                    $('.is-active').removeClass("is-active");
                    $(this).parent().addClass("is-active");
                });
            }
        }

        db.menuResponsive();
        db.scrollMenu();
        db.gridTemplate();
    });
})(jQuery);
