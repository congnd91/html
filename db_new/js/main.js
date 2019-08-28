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

        db.pricingFAQ = function () {
            $('.pricing-faq-item .caption').on('click', function () {

                var content = $(this).parent().find('.content');
                if ($(content).is(":visible")) {

                    $(content).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(content).slideDown();
                    $(this).parent().addClass("active");

                }

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

        db.gridCollection = function () {
            if ($('.grid-templates').length) {
                var $grid = $('.grid-templates').isotope({
                    itemSelector: '.grid-item'
                    // filter: '.t1'
                });
                // filter items on button click

            }
        }

        db.brandkitSlider = function () {
            var owl_brandkit = $('.owl-brandkit');
            if ($(owl_brandkit).length) {
                $(owl_brandkit).owlCarousel({
                    loop: true,
                    margin: 30,
                    mouseDrag: true,
                    nav: false,
                    autoplay: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        992: {
                            items: 4
                        },
                        1200: {
                            items: 5
                        },

                        1300: {
                            items: 6
                        },

                        1400: {
                            items: 7
                        }
                    }
                });
            }
        }



        db.sliderRecommended = function () {
            if ($('.slick-recommended').length) {
                $('.slick-recommended').slick({
                    dots: false,
                    infinite: true,
                    speed: 500,
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    prevArrow: "<div class='slick-prev'> <i class='fal fa-angle-left'></i></div>",
                    nextArrow: "<div class='slick-next'> <i class='fal fa-angle-right'></i></div>",
                    responsive: [{
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 5,
                                slidesToScroll: 5,
                            }
                    },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                    },
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                    }

                ]
                });

            }

        }





        db.menuResponsive();
        db.scrollMenu();
        db.gridTemplate();
        db.gridCollection();
        db.brandkitSlider();
        db.sliderRecommended();
        db.pricingFAQ();
    });
})(jQuery);
