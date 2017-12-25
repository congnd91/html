
(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        /** slider**/
        var owl_contest = $('.owl-contest')
        $(owl_contest).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout:6000,
            items: 1,
            animateOut: 'fadeOutDown',
            animateIn: 'fadeInDown',
        });

        $('.open-test-right').click(function(){
            $('body').addClass("show-test-right");
        });
        $('.close-test-right').click(function () {
            $('body').removeClass("show-test-right");
        });

        //show test-button
        //$('.box-answer').click(function () {
        //    $('body').addClass("show-test-bottom");
        //});
        //$('.close-test-bottom').click(function () {
        //    $('body').removeClass("show-test-bottom");
        //});

        //menu user

        $('.user-info').click(function () {
            $('.user-panel').toggleClass("show-user-menu");
        });

        });
    })(jQuery);
