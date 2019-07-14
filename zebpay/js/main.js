(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.sliderTestimonial = function () {
            var owl_testimonial = $('.owl-testimonial');
            if ($(owl_testimonial).length) {
                $(owl_testimonial).owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,


                    autoplay: true,
                    items: 3,
                });
            }
        }
        db.scroll = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 650) {
                    $('.tab-caption-fixed').addClass("show");
                } else {
                    $('.tab-caption-fixed').removeClass("show");
                }
            });
        }
        db.matchHeight = function () {
            if ($('.testi-item').length) {
                $('.testi-item').matchHeight();
            }
        }
        db.sliderTestimonial();
        db.matchHeight();
        db.scroll();
    });
})(jQuery);
