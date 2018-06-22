(function ($) {
    $(document).on('ready', function () {
        var db = new Object();





        db.homeSlider = function () {


            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'

                });
            }

        }


        db.homeSlider();


    });
})(jQuery);
