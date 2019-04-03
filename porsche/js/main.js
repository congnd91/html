(function ($) {
    $(document).on('ready', function () {
        var db = new Object();

        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        db.menuSlider = function () {
            var owl_menu = $('.owl-menu');
            if ($(owl_menu).length) {
                $(owl_menu).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 3,
                    margin: 12,
                    responsive: {


                        480: {

                            items: 3,
                        },

                        768: {
                            items: 4,

                        },

                        992: {
                            items: 6,

                        }

                    }
                });
            }
        }

        db.toTop = function () {


            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 500);
            });
        }

        db.matchHeight = function () {
            if ($('.sc-item').length) {
                $('.sc-item').matchHeight();
            }
            if ($('.st-item').length) {
                $('.st-item').matchHeight();
            }
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }
            if ($('.no-des h3').length) {
                $('.no-des h3').matchHeight();
            }
        }
        db.homeSlider();
        db.menuSlider();
        db.toTop();
        db.matchHeight();

    });
})(jQuery);
