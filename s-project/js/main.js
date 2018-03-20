(function ($) {
    $(document).on('ready', function () {

        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });

        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true


        });

        $("#commentForm").validate();

    });
})(jQuery);
