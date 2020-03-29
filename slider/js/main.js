(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }
        db.slider = function () {
            if ($('.slider-images').length) {
                $('.slider-images').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    speed: 1000,
                    autoplay: true,
                    autoplaySpeed: 4000,

                    asNavFor: $('.slider-text,.slider-bg'),
                });
                $('.slider-text').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    dots: true,
                    speed: 1000,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    asNavFor: $('.slider-images,.slider-bg'),

                    //  focusOnSelect: true,

                });

                $('.slider-bg').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    speed: 1000,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    asNavFor: $('.slider-images,.slider-text'),

                    //  focusOnSelect: true,

                });
            }

        }

        db.preLoad();
        db.slider();



    });
})(jQuery);
