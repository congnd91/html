(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
                setTimeout(scrollToTop, 0);
            });


            $('.menu-res li.menu-item-has-children').on('click', function (event) {
                event.stopPropagation();
                var submenu = $(this).find(" > ul");
                if ($(submenu).is(":visible")) {
                    $(submenu).slideUp();
                    $(this).removeClass("open-submenu-active");
                } else {
                    $(submenu).slideDown();
                    $(this).addClass("open-submenu-active");
                }
            });
            $('.menu-res li.menu-item-has-children > a').on('click', function () {
                //  return false;
            });

        }

        db.sliderHome = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    animateOut: 'fadeOut',

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="icon icon-circle-left2"></i>', '<i class="icon icon-circle-right2"></i>'],
                    items: 1

                });
            }
        }
        db.sliderPartner = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: true,
                    margin: 0,


                    nav: true,
                    autoplay: false,
                    navText: ['<i class="icon icon-circle-left2"></i>', '<i class="icon icon-circle-right2"></i>'],
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
                            items: 4,

                        }
                    },

                });
            }
        }


        db.preLoad();
        db.menuResponsive();
        db.sliderHome();
        db.sliderPartner();
    });
})(jQuery);
