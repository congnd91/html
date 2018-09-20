(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.icon-menu').on('click', function () {

                $("body").toggleClass("open-menu");
            });
        }


        db.playVideo = function () {
            $('.video-icon').on('click', function () {
                $("body").toggleClass("open-video");
            });
            $('.close-video').on('click', function () {
                $("body").toggleClass("open-video");
            });
        }

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("is-scroll");
                } else {
                    $('body').removeClass("is-scroll");
                }
            });
        }

        db.sliderHotmom = function () {
            var owl_hotmom = $('.owl-hotmom');
            if ($(owl_hotmom).length) {
                $(owl_hotmom).owlCarousel({
                    loop: true,
                    margin: 0,

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1

                });
            }
        }
        db.sliderNews = function () {
            var owl_news = $('.owl-news');
            if ($(owl_news).length) {
                $(owl_news).owlCarousel({
                    loop: true,
                    margin: 30,

                    nav: true,
                    autoplay: false,
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

                        }
                    },

                });
            }
        }

        db.sliderBaby = function () {
            var owl_baby = $('.owl-baby');
            if ($(owl_baby).length) {
                $(owl_baby).owlCarousel({
                    loop: true,
                    margin: 30,

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 1,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 3,

                        },
                        991: {
                            items: 4,

                        }
                    },

                });
            }
        }

        db.sliderThree = function () {
            var owl_three = $('.owl-three');
            if ($(owl_three).length) {
                $(owl_three).owlCarousel({
                    loop: true,
                    margin: 0,

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 1,
                            nav: true,
                            margin: 0,
                        },

                        576: {
                            items: 2,
                            nav: true,
                            margin: 30,
                        },

                        768: {
                            items: 2,
                            nav: false,
                            margin: 30,

                        },
                        991: {
                            items: 3,
                            nav: false,
                            margin: 30,

                        }
                    },

                });
            }
        }
        db.sliderFive = function () {
            var owl_five = $('.owl-five');
            if ($(owl_five).length) {
                $(owl_five).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 1,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 3,

                        },
                        991: {
                            items: 4,

                        }
                    },

                });
            }
        }
        db.sliderTrustme = function () {
            var owl_trustme = $('.owl-trustme');
            if ($(owl_trustme).length) {
                $(owl_trustme).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {

                        0: {
                            items: 1,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 3,

                        },
                        991: {
                            items: 4,

                        }
                    },

                });
            }
        }

        db.niceScroll = function () {
            $('.ss-tab-content').niceScroll();
            $('.question-content').niceScroll();

        }


        db.preLoad();
        db.menuResponsive();
        db.playVideo();
        db.scrollMenu();
        db.sliderNews();
        db.sliderHotmom();
        db.sliderBaby();
        db.sliderThree();
        db.sliderFive();
        db.sliderTrustme();

        db.niceScroll();




    });
})(jQuery);
