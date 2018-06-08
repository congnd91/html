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



        db.preLoad();
        db.topTop();
        db.sliderPopular();
        db.showSuggestion();
        db.niceScroll();
    });
})(jQuery);
