(function ($) {
    $(document).on('ready', function () {
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });
        /**Menu**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
            $('body').removeClass("open-side");

        });

        $('.menu-res-inner ul ul').hide();
        $('.menu-res-inner > ul > li > a').on('click', function () {

            var child = $(this).next();

            if ($(child).is(":visible")) {
                $(child).slideUp();
            } else {
                $(child).slideDown();
            }


            return false;


        });
        $('.cs-item').on('click', function () {
            $('.cs-item').removeClass("active");
            $(this).addClass("active")
        });
        $('.side-arrow').on('click', function () {
            $('body').toggleClass("open-side");
        });
        $('.accodion-caption .arr').on('click', function () {
            var content = $(this).parents('.accodion-caption').next();
            if ($(content).is(":visible")) {
                $(content).slideUp();
                $(this).parents('.accodion-caption').removeClass("active");
            } else {
                $(content).slideDown();
                $(this).parents('.accodion-caption').addClass("active");
            }
        });
        $('.btn-map').on('click', function () {
            $('.box13').toggleClass("show-map");
        });
        $('.close-map').on('click', function () {
            $('.box13').toggleClass("show-map");
        });
        //box18
        $('.box17-control span').on('click', function () {
            var box18 = $('.box18');
            if ($(box18).is(":visible")) {
                $(box18).slideUp();
            } else {
                $(box18).slideDown();
            }
        });

        //box14

        $('.box14 li a').on('click', function () {

            $('.box14 li a').removeClass("active");
            $(this).addClass("active");
        });


        //box19
        {
            $('.box19 .arr-down').on('click', function () {
                var content = $(this).parents('.parent').next();
                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("active");
                } else {
                    $(content).show();

                    $(this).addClass("active");
                }
            });
        }

        //


        var owl_public = $('.owl-public');
        if ($(owl_public).length) {
            $(owl_public).owlCarousel({
                loop: false,
                margin: 0,
                nav: true,
                autoplay: false,
                items: 1,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],


            });
        }



        var owl_13 = $('.owl-13');
        if ($(owl_13).length) {
            $(owl_13).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: true,
                items: 1,
            });
        }
        var owl_b22 = $('.owl-b22');
        if ($(owl_b22).length) {
            $(owl_b22).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                autoplay: false,
                responsive: {
                    400: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    }
                }
            });
        }
        var owl_b23 = $('.owl-b23');
        if ($(owl_b23).length) {
            $(owl_b23).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                autoplay: false,
                items: 1,
                responsive: {
                    400: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        }
        var owl_intro = $('.owl-intro');
        if ($(owl_intro).length) {
            $(owl_intro).owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                autoplay: false,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                items: 1,
                responsive: {
                    400: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1200: {
                        items: 5
                    }
                }
            });
        }
        var owl_home = $('.owl-home');
        if ($(owl_home).length) {
            $(owl_home).owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                autoplay: true,
                navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                items: 1,
            });
        }

        if ($('.caption-scroll').length) {
            $('.caption-scroll').hoverscroll({
                width: 'auto',
                width: 'auto'
            });
        }
        $('.show-delete').on('click', function () {
            $(this).parents('.accodion-content').find(".box12-left").css("display", "flex");

        });


    })

})(jQuery);

$(function () {

    if ($('.input-date input').length) {
        $('.input-date input').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    }


    if ($('.sb-date input').length) {
        $('.sb-date input').datetimepicker({

            format: 'DD/MM/YYYY'
        });
    }




});
