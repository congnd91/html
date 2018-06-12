(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.sliderPopular = function () {
            var owl_popular = $('.owl-popular');
            if ($(owl_popular).length) {
                $(owl_popular).owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: true,
                    autoplay: false,
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
                        },
                        1199: {
                            items: 5,
                        }
                    }
                });
            }
        }

        db.sliderPhoto = function () {
            var owl_photo = $('.owl-photo');
            if ($(owl_photo).length) {
                $(owl_photo).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
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
                            items: 6,
                        }
                    }
                });
            }
        }


        db.sliderSrnLarge = function () {
            var owl_srn = $('.owl-srn-large');
            if ($(owl_srn).length) {
                $(owl_srn).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: false,
                    items: 1,
                });
            }
        }


        db.sliderPostDetail = function () {
            var owl_pd = $('.owl-pd');
            if ($(owl_pd).length) {
                $(owl_pd).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    navText: ['<i></i>', '<i></i>'],
                    autoplay: false,
                    items: 1,
                });
            }
        }
        db.sliderPhotoCri = function () {
            var owl_photo = $('.owl-photo-cri');
            if ($(owl_photo).length) {
                $(owl_photo).owlCarousel({
                    loop: false,
                    margin: 14,
                    nav: true,
                    autoplay: false,
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
        }

        db.sliderMyReview = function () {
            var owl_photo = $('.owl-my-review');
            if ($(owl_photo).length) {
                $(owl_photo).owlCarousel({
                    loop: false,
                    margin: 20,
                    nav: true,
                    autoplay: false,
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
                            items: 5,
                        },
                        1199: {
                            items: 5,
                        }
                    }
                });
            }
        }

        db.niceScroll = function () {

            if ($('.md-brand-group-scroll').length) {
                $('.md-brand-group-scroll').niceScroll({

                    autohidemode: 'leave'
                });
            }
            if ($('.rs-suggestion-scroll').length) {
                $('.rs-suggestion-scroll').niceScroll({

                    autohidemode: 'leave'
                });
            }
            if ($('.acc-brands-scroll').length) {
                $('.acc-brands-scroll').niceScroll({

                    autohidemode: 'leave'
                });
            }



        }
        db.topTop = function () {

            $(".totop").click(function () {

                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }

        db.menuMobile = function () {

            $(".menu-mobile .lv1 .has-child").click(function () {
                $(".menu-mobile").addClass("show-lv2");

            });
            $(".menu-mobile .lv2 .has-child").click(function () {
                $(".menu-mobile").addClass("show-lv3");

            });
            $(".menu-mobile .lv2 .back-lv1").click(function () {
                $(".menu-mobile").removeClass("show-lv2");
            });
            $(".menu-mobile .lv3 .back-lv2").click(function () {
                $(".menu-mobile").removeClass("show-lv3");
            });

            $('.menu-icon').click(function () {
                $('body').addClass("show-menu");
            });
            $('.menu-overlay').click(function () {
                $('body').removeClass("show-menu");
            });
        }

        db.showSuggestion = function () {

            $(".review-search input").click(function () {
                $(this).parents(".review-search").addClass("show-suggestion");
            });
            $(".rs-close-suggestion").click(function () {
                $(this).parents(".review-search").removeClass("show-suggestion");
            });
        }

        db.showSearchGlobalMobile = function () {

            $(".topbar .search-icon").click(function () {
                $(".topbar").toggleClass("show-search-global");
            });

        }
        db.filterAccordion = function () {
            $('.acc-caption').on('click', function () {
                var content = $(this).next(".acc-content");
                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp(300);

                    $(".acc-brands-scroll").getNiceScroll().hide();

                    setTimeout(function () {

                        $(".acc-brands-scroll").getNiceScroll().resize();
                    }, 300);

                } else {
                    $(content).stop(true, true).slideDown(300);
                    $(this).addClass("open");
                    $(".acc-brands-scroll").getNiceScroll().hide();
                    setTimeout(function () {
                        $(".acc-brands-scroll").getNiceScroll().resize();
                    }, 300);
                }
            });
        }
        db.profileAccordion = function () {
            $('.has-child').on('click', function () {
                var content = $(this).find(".pm-child");
                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp(300);



                } else {
                    $(content).stop(true, true).slideDown(300);
                    $(this).addClass("open");

                }
            });

        }

        db.nrAccordion = function () {
            $('.nra-caption').on('click', function () {
                var content = $(this).next(".nra-content");
                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp(300);


                } else {
                    $(content).stop(true, true).slideDown(300);
                    $(this).addClass("open");

                }
            });
        }
        db.preLoad();
        db.topTop();
        db.sliderPopular();
        db.menuMobile();
        db.sliderPhoto();
        db.sliderPhotoCri();
        db.sliderMyReview();
        db.sliderSrnLarge();
        db.sliderPostDetail();
        db.showSuggestion();
        db.niceScroll();
        db.filterAccordion();
        db.nrAccordion();
        db.profileAccordion();
        db.showSearchGlobalMobile();
    });
})(jQuery);
