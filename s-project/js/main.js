(function ($) {
    $(document).on('ready', function () {

        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });

        $(".o-close").click(function () {

            $("body").removeClass("show-overlay");
        });




        $(".checkbox input").change(function () {
            if ($(this).prop('checked') == true) {
                $("body").addClass("show-overlay");
            }
        });

        $(".o-content-scroll").niceScroll({
            cursorcolor: "white",
            cursorwidth: "5px",
            autohidemode: false
        });
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true


        });

        $("#commentForm").validate();

    });
})(jQuery);
