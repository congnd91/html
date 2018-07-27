$(document).ready(function () {



    var owl_school = $('.owl-school');
    if ($(owl_school).length) {
        $(owl_school).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplay: true,
            items: 1,


        });
    }



    var owl_function = $('.owl-function');
    if ($(owl_function).length) {
        $(owl_function).owlCarousel({
            loop: false,
            margin: 0,
            nav: false,
            margin: 30,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplay: false,
            responsive: {

                0: {
                    items: 3,
                },

                576: {
                    items: 2,
                },

                768: {
                    items: 3,

                },
                992: {
                    items: 4,

                },
                1200: {
                    items: 6,

                }
            },


        });
    }

    var owl_partner = $('.owl-partner');
    if ($(owl_partner).length) {
        $(owl_partner).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            margin: 30,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            autoplay: false,
            responsive: {

                0: {
                    items: 3,
                },

                576: {
                    items: 2,
                },

                768: {
                    items: 2,

                },
                992: {
                    items: 3,

                },
                1200: {
                    items: 3,

                }
            },


        });
    }



});
