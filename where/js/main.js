(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });

            $('body').on('click', function (e) {
                var search = $(".search-box-mobile");
                if ($(search).is(":visible")) {
                    $(search).hide();
                }
            });

            $('.search-box-mobile').on('click', function (e) {
                e.stopPropagation();
            });
            $('.search-icon-mobile').on('click', function (e) {
                e.stopPropagation();
                var search = $(".search-box-mobile");
                if ($(search).is(":visible")) {
                    $(search).hide();
                } else {
                    $(search).show();
                    $(".search-box-mobile input").focus();
                }
            });

            $('.close-menu').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });

        }



        db.aboutSlider = function () {
            var owl_about = $('.owl-about');
            if ($(owl_about).length) {
                $(owl_about).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        db.blogSlider = function () {
            var owl_blog = $('.owl-blog');
            if ($(owl_blog).length) {
                $(owl_blog).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }


        db.reviewSlider = function () {
            var owl_review = $('.owl-rv');
            if ($(owl_review).length) {
                $(owl_review).owlCarousel({
                    loop: true,
                    margin: 15,
                    //mouseDrag: false,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 5,
                        },

                        576: {
                            items: 6,
                        },

                        768: {
                            items: 7,

                        },
                        991: {
                            items: 8,

                        }
                    },
                });
            }
        }

        db.menuSlider = function () {
            var owl_menu = $('.owl-menu');
            if ($(owl_menu).length) {
                $(owl_menu).owlCarousel({
                    loop: true,
                    margin: 40,

                    autoWidth: true,
                    nav: true,
                    autoplay: true,

                    responsive: {

                        0: {
                            items: 2,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 3,
                            margin: 20,

                        },
                        991: {
                            items: 4,

                        }
                    },
                });
            }
        }

        db.like = function () {
            $('.like-icon').on('click', function (e) {
                $(this).toggleClass("liked");

            });



        }
        db.advanceFilter = function () {
            $('.af-value').on('click', function (e) {
                $(".advanced-filter").toggleClass("show-dropdown");

            });
            $('.af-control a').on('click', function (e) {
                $(".advanced-filter").toggleClass("show-dropdown");
                return false;

            });


        }

        db.changeValueDropdown = function () {
            $('.sbi-dropdown ul li p').on('click', function (e) {
                $(this).parents('.sbi-dropdown').find("span").text($(this).text());
            });



        }








        db.preLoad();
        db.scrollMenu();
        db.menuResponsive();
        db.reviewSlider();
        db.aboutSlider();
        db.menuSlider();
        db.blogSlider();
        db.like();
        db.advanceFilter();
        db.changeValueDropdown();

    });
})(jQuery);
