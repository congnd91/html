(function ($) {
    $(document).on('ready', function () {
        "use strict";
        //preload
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        //owl
        var owl_people = $('.owl-people')
        $(owl_people).owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            autoplay: false,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1000: {
                    items: 5
                }
            }
        });
        var owl_job_post = $('.owl-job-post')
        $(owl_job_post).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            items: 1
        });
        //nav
        $('.nav-icon').click(function () {
            $('body').addClass("show-menu");
        });
        $('.nav-close').click(function () {
            $('body').removeClass("show-menu");
        });
        //faq
        $('.faq-item.open .faq-content').show();
        $('.faq-item .faq-caption').click(function () {
            if ($(this).parent().hasClass("open")) {
                $(this).parent().removeClass("open");
                $(this).parent().find('.faq-content').slideUp();
            } else {
                $(this).parent().addClass("open");
                $(this).parent().find('.faq-content').slideDown();
            }
        });
        //filter
        $('.filter').click(function () {
            $('.search-wrap').toggleClass("show-filter-box");
        });
        //backtotop
        $(window).scroll(function () {
            if ($(this).scrollTop() >= 200) {
                $('.totop').fadeIn();
            } else {
                $('.totop').fadeOut();
            }
        });
        $(".totop").click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
    });
})(jQuery);
