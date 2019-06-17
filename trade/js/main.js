(function ($) {
    "use strict";
    $("#mobile-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "991"
    });
    var wind = $(window);
    var sticky = $('#sticky-header');
    wind.on('scroll', function () {
        var scroll = wind.scrollTop();
        if (scroll < 180) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });
    $(".menu-tigger").on("click", function () {
        $(".offcanvas-menu,.offcanvas-overly").addClass("active");
        return false;
    });
    $(".menu-close,.offcanvas-overly").on("click", function () {
        $(".offcanvas-menu,.offcanvas-overly").removeClass("active");
    });

    function mainSlider() {
        var BasicSlider = $(".slider-active");
        BasicSlider.on("init", function (e, slick) {
            var $firstAnimatingElements = $(".single-slider:first-child").find("[data-animation]");
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on("beforeChange", function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find("[data-animation]");
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: true,
            autoplaySpeed: 10000,
            fade: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="icofont-long-arrow-left"></i>Prev</button>',
            nextArrow: '<button type="button" class="slick-next"><i class="icofont-long-arrow-right"></i>Next</button>',
            arrows: false,
            dots: true,
            responsive: [{
                breakpoint: 767,
                settings: {
                    dots: false,
                    arrows: false
                }
            }]
        });

        function doAnimations(elements) {
            var animationEndEvents = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
            elements.each(function () {
                var $this = $(this);
                var $animationDelay = $this.data("delay");
                var $animationType = "animated " + $this.data("animation");
                $this.css({
                    "animation-delay": $animationDelay,
                    "-webkit-animation-delay": $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }
    mainSlider();
    $(".slider-three-active").slick({
        infinite: true,
        autoplay: false,
        autoplaySpeed: 5000,
        speed: 400,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><span class="lnr lnr-chevron-left"></span></button>',
        nextArrow: '<button type="button" class="slick-next"><span class="lnr lnr-chevron-right"></span></button>',
        arrows: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows: false
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows: false
            }
        }]
    });
    $(".portfolio-active").imagesLoaded(function () {
        var $grid = $(".portfolio-active").isotope({
            itemSelector: ".grid-item",
            percentPosition: true,
            masonry: {
                columnWidth: 1
            }
        });
        $(".portfolio-menu").on("click", "button", function () {
            var filterValue = $(this).attr("data-filter");
            $grid.isotope({
                filter: filterValue
            });
        });
    });
    $(".portfolio-menu button").on("click", function (event) {
        $(this).siblings(".active").removeClass("active");
        $(this).addClass("active");
        event.preventDefault();
    });
    $(".counter").counterUp({
        delay: 10,
        time: 1000
    });
    $(".testimonial-active").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $(".portfolio-active").isotope({
        itemSelector: ".grid-item",
        percentPosition: true,
        masonry: {
            columnWidth: 1
        }
    });
    $(".view").magnificPopup({
        type: "image",
        gallery: {
            enabled: true
        }
    });
    $(".video-view").magnificPopup({
        type: "iframe"
    });
    $(".clients-active").owlCarousel({
        loop: true,
        nav: false,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            320: {
                items: 2
            },
            480: {
                items: 3
            },
            767: {
                items: 5
            },
            991: {
                items: 6
            },
            1000: {
                items: 6
            }
        }
    });
    $.scrollUp({
        scrollName: "scrollUp",
        topDistance: "300",
        topSpeed: 300,
        animation: "fade",
        animationInSpeed: 1000,
        animationOutSpeed: 1000,
        scrollText: '<span class="lnr lnr-chevron-up"></span>'
    });
})(jQuery);
