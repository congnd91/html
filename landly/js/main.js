(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.openMap = function () {
            $('.view-map').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-map");
            });
            $('.close-map').on('click', function () {
                $('body').removeClass("open-map");
            });
        }
        db.showMore = function () {
            $('.d-short .show-more').on('click', function (e) {
                $('.d-short').hide();
                $('.d-long').show();
            });
            $('.d-long .show-less').on('click', function (e) {
                $('.d-short').show();
                $('.d-long').hide();
            });
        }

        db.owlCard = function () {
            var owl_card = $('.owl-card');
            if ($(owl_card).length) {
                $(owl_card).owlCarousel({
                    loop: false,
                    margin: 0,
                    //mouseDrag: false,
                    nav: true,
                    autoplay: false,
                    items: 1,
                });
            }
        }
        db.sliderDetail = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    arrows: false,
                    focusOnSelect: true,
                });
            }
        }
        db.preLoad();
        db.openMap();
        db.owlCard();
        db.sliderDetail();
        db.showMore();
    });
})(jQuery);
