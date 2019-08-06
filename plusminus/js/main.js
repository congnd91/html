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
                            breakpoint: 992,
                            settings: {
                                arrows: false,
                                centerMode: false,
                                centerPadding: '30px',
                                slidesToShow: 2
                            }
    },
                        {
                            breakpoint: 768,
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
        /*db.sliderGrid = function () {
            if ($('.grid').length) {
                $('.grid').isotope({
                    // options
                    itemSelector: '.grid-item',
                    layoutMode: 'fitRows'
                });
            }
        }*/

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

            $(".mallistomme-dropdown-content a").click(function () {
                $(".mallistomme-bar").removeClass("open");
                return false;
            });
        }

    /*    $('.logo-item').css("min-height", $('.logo-item').width() + "px");
    $(window).bind('resize', function () {
        $('.logo-item').css("min-height", $('.logo-item').width() + "px");
    }).trigger('resize');*/


        db.matchHeight = function () {
          /*  if ($('.logo-item').length) {
      $('.logo-item').matchHeight();
  }*/
        }
        db.preLoad();
        db.menuResponsive();
        db.sliderHay();
        db.sliderMallistomme();
        db.sliderReferensseja();
        //  db.sliderGrid();
        db.mallistommeDropdown();
        db.matchHeight();
        new WOW({
            offset: 100,
            mobile: true
        }).init()
    });
})(jQuery);
