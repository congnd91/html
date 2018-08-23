(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        /** slider**/
        var owl_home = $('.owl-home')
        $(owl_home).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4000,
            items: 1


        });

        /** slider**/
        var owl_cate_slider = $('.owl-cate-slider')
        $(owl_cate_slider).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 4000,
            items: 1

        });


        /** slider qrcode**/
        var owl_qr = $('.owl-qr')
        $(owl_qr).owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4000,
            items: 1

        });

        //Search option
        $('.option-value').click(function () {

            var dropdown = $(this).parent().find('.search-dropdown');
            if ($(dropdown).is(":visible")) {
                $(dropdown).slideUp();
            } else {
                $(dropdown).slideDown();
            }



        });

        //switch view

        $('.cl-switch span').click(function () {
            $('.view-active').removeClass('view-active');
            $(this).addClass("view-active");
            $('.view-style').hide();
            var id = $(this).attr("data-id");
            $(id).show();


        });

        $('.search-dropdown a').click(function () {
            $('.search-dropdown').slideUp();
        });

        //accdion

        var caption = $('.acc-caption');
        $(caption).click(function () {

            var content = $(this).next();

            if ($(content).is(":visible")) {
                $(content).slideUp();
            } else {
                $(content).slideDown();
            }

        });
        //slider detail

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider-nav',
            autoplay: false,
            autoplaySpeed: 5000,

        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            arrows: false,
            dots: false,
            centerMode: false,
            focusOnSelect: true,
            autoplay: false,
            autoplaySpeed: 6000,
            vertical: true
        });



        $('.slider-for img').click(function () {
            $('#modal-cart').modal('show');

            // $('.slider-for1').resize();
            // $('.slider-nav1').resize();
        });


        $('#modal-cart').on('shown.bs.modal', function (e) {
            $('.slider-for1').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav1',
                autoplay: false,
                autoplaySpeed: 5000,

            });
            $('.slider-nav1').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for1',
                arrows: false,
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                autoplay: false,
                autoplaySpeed: 6000,
                vertical: true
            });


        });



        $(".accordion-caption .arr").click(function () {


            var content = $(this).parent().find(".accordion-content");

            if ($(content).is(":visible")) {
                $(content).slideUp();
                $(this).removeClass("active");
            } else {
                $(content).slideDown();
                $(this).addClass("active");
            }


        });

        $(".pb-color-item").click(function () {


            $('.pb-color-item').removeClass("active");
            $(this).addClass("active");



        });

    });
})(jQuery);
