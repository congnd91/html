'use strict';

function slider_ini() {

    //01_home hero slider
    var slickCarousel = jQuery('.hero-slider-wr');

    if (slickCarousel.hasClass('slick-initialized')) {
        slickCarousel.slick("unslick");
    }

    slickCarousel.slick({
        slidesToShow: 1,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    adaptiveHeight: true,
                }
            },
            ]
    })

    //recently featured

    var recently_featured_slider = jQuery('.recently-featured-slider');

    if (recently_featured_slider.hasClass('slick-initialized')) {
        recently_featured_slider.slick("unslick");
    }

    recently_featured_slider.slick({
        slidesToShow: 3,
        arrows: false,
        dots: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 450,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
    })

    //testimonials
    var slickt = jQuery('.testimonials-slider');

    if (slickt.hasClass('slick-initialized')) {
        slickt.slick("unslick");
    }

    slickt.slick({
        slidesToShow: 1,
    });


    //01_Home agancy logo slider
    var slickta = jQuery('.agancy-logo-wr');

    if (slickta.hasClass('slick-initialized')) {
        slickta.slick("unslick");
    }

    slickta.slick({
        slidesToShow: 5,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                }
            }
            ]
    })

    if (1) {
        jQuery('.profile-photos-container').slick({
            arrows: false,

            slidesToShow: 3,

            responsive: [
                {
                    breakpoint: 991,

                    settings: {
                        arrows: true,
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                    }
            },
                ]
        });


        jQuery('.profile-entry .thumbnail-photo img').on('click', function () {
            var imgIndex = jQuery(this).parent().index();
            jQuery('.profile-photos-container').slick('slickGoTo', imgIndex);
        })
    }

    // jQuery('.your-class').slick(); 

    // 05_Model_Profile
    jQuery('.another-model-slider').slick({

    })
}
