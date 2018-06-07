(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.sliderHome = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    margin: 0,
                    items: 1,
                    animateOut: 'fadeOut',
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                });
            }
        }

        db.sliderFade = function () {
            var owl_fade = $('.owl-fade');
            if ($(owl_fade).length) {
                $(owl_fade).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    margin: 0,
                    items: 1,
                    animateOut: 'fadeOut',

                });
            }
        }
        db.sliderPopular = function () {
            var owl_popular = $('.owl-popular');
            if ($(owl_popular).length) {
                $(owl_popular).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
                    autoplay: false,
                    margin: 30,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        768: {
                            items: 2,
                        },
                        991: {
                            items: 3,
                        },
                        1199: {
                            items: 4,
                        }
                    }
                });
            }
        }



        db.niceScroll = function () {

            if ($('.md-brand-group-scroll').length) {
                $('.md-brand-group-scroll').niceScroll({
                    autohidemode: 'leave'
                });
            }
        }
        db.preLoad();
        db.sliderPopular();
        db.sliderHome();
        db.sliderFade();
        db.niceScroll();
    });
})(jQuery);
