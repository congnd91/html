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

        db.showSuggestion = function () {

            $(".review-search input").click(function () {
                $(".review-search").addClass("show-suggestion");
            });
            $(".rs-close-suggestion").click(function () {
                $(".review-search").removeClass("show-suggestion");
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


        db.preLoad();
        db.topTop();
        db.sliderPopular();
        db.showSuggestion();
        db.niceScroll();
        db.filterAccordion();
    });
})(jQuery);
