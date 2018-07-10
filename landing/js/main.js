(function ($) {
    $(document).on('ready', function () {
        var db = new Object();





        db.homeSlider = function () {


            var owl_three = $('.owl-three');
            if ($(owl_three).length) {
                $(owl_three).owlCarousel({
                    loop: false,
                    nav: false,
                    margin: 15,
                    autoplay: false,
                    responsive: {

                        0: {
                            items: 1,

                        },

                        576: {
                            items: 2,

                        },

                        768: {
                            items: 3,


                        },
                        991: {
                            items: 3,


                        }
                    },


                });
            }

        }

        db.homeSlider();


    });
})(jQuery);
