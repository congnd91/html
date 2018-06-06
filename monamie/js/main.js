(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.sliderPopular = function () {
            var owl_popular = $('.owl-popular');
            if ($(owl_popular).length) {
                $(owl_popular).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
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
                            items: 4,
                        },
                        1199: {
                            items: 5,
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
        db.niceScroll();
    });
})(jQuery);
