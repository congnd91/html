(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
        }
        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header-scroll').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });
        }
        db.friendsSlider = function () {
            var owl_friends = $('.owl-friends');
            if ($(owl_friends).length) {
                $(owl_friends).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: false,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    //      animateOut: 'fadeOut'
                });
            }
        }

        db.tipSlider = function () {
            var owl_tip = $('.owl-tip');
            if ($(owl_tip).length) {
                $(owl_tip).owlCarousel({
                    loop: false,
                    margin: 30,
                    mouseDrag: false,
                    nav: true,
                    autoplay: false,
                    items: 1,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],

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
                            items: 4,
                        }
                    },
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.matchHeight = function () {
            if ($('.ls-item ul').length) {
                $('.ls-item ul').matchHeight();
            }
            if ($('.project-row .project-col').length) {
                $('.project-row .project-col').matchHeight();
            }
        }
        new WOW({
            offset: 100,
            mobile: true
        }).init();

        if ($('#datepicker').length) {
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
        }



        db.preLoad();
        db.matchHeight();
        db.friendsSlider();
        db.tipSlider();
        db.menuResponsive();
        db.scrollMenu();
    });
})(jQuery);
