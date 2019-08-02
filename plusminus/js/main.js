(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(800).fadeOut(600, function () {
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
            $('.menu-res-inner ul li.has-menu a').on('click', function (e) {
                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });
        }


        db.sliderHay = function () {
            if ($('.slider-hay').length) {
                $('.slider-hay').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: false,
                    dots: true,
                });

            }

        }
        db.sliderMallistomme = function () {
            if ($('.mallistomme-slider').length) {
                $('.mallistomme-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: false,
                    dots: true,
                });

            }

        }

        db.sliderReferensseja = function () {
            if ($('.slider-referensseja').length) {
                $('.slider-referensseja').slick({

                    arrows: true,
                    dots: true,

                    centerMode: true,
                    centerPadding: '230px',
                    slidesToShow: 2,
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '30px',
                                slidesToShow: 1
                            }
    },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: false,
                                centerPadding: '0px',
                                slidesToShow: 1
                            }
    }]

                });


            }

        }



        db.sliderGrid = function () {
            if ($('.grid').length) {
                $('.grid').isotope({
                    // options
                    itemSelector: '.grid-item',
                    layoutMode: 'fitRows'
                });

            }

        }








        new WOW({
            offset: 100,
            mobile: true
        }).init()
        db.toTop = function () {
            $('.totop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.totop').fadeIn();
                } else {
                    $('.totop').fadeOut();
                }
            });
            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }


        db.mallistommeDropdown = function () {

            $(".mallistomme-dropdown").click(function () {

                $(".mallistomme-bar").toggleClass("open");

            });
        }


        db.matchHeight = function () {
            if ($('.se-step').length) {
                $('.se-step').matchHeight();
            }
        };
        db.preLoad();

        db.menuResponsive();

        db.sliderHay();
        db.sliderMallistomme();
        db.sliderReferensseja();

        db.sliderGrid();
        db.mallistommeDropdown();
    });
})(jQuery);
