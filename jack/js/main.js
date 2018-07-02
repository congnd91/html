(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        /**fullpage scroller**/
        //        $(document).ready(function () {
        //            $('.fullpage').fullpage({
        //                responsiveWidth: 992,
        //            });
        //        });
        $(".count-down").countdown('2018/07/05 23:20:00', function (event) {
            $(this).find(".hours span").html(event.strftime('%H'));
            $(this).find(".minute span").html(event.strftime('%M'));
            $(this).find(".seconds span").html(event.strftime('%S'));
        });
        if ($(".ml-fixed").length) {
            $(".ml-fixed").stick_in_parent({
                offset_top: 130
            });
        }
        var owl_story = $('.owl-story');
        if ($(owl_story).length) {
            $(owl_story).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: false,
                margin: 30,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    991: {
                        items: 3,
                    },
                    1199: {
                        items: 3,
                    }
                }
            });
        }
        var owl_partner = $('.owl-partner');
        if ($(owl_partner).length) {
            $(owl_partner).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: false,
                margin: 30,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 2,
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
                        items: 4,
                    }
                }
            });
        }
    });
})(jQuery);
