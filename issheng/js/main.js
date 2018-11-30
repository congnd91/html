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
            });
            $('.mega-menu ul li:first-child').find(".mega-sub").show();
            $('.mega-menu ul li').hover(function () {
                    $('.mega-menu ul li').removeClass("active");
                    $(".mega-sub").hide();
                    $(this).addClass("active");
                    $(this).find(".mega-sub").show();
                },
                function () {});
            $('.menu > ul > li.has-mega').hover(function () {
                    $("body").addClass("show-overlay");
                },
                function () {
                    $("body").removeClass("show-overlay");
                });
        }
        db.homeSlider = function () {
            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    mouseDrag: false,
                    nav: true,
                    autoplay: true,
                    items: 1,
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.homeProductSlider = function () {
            var owl_home = $('.owl-product-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    mouseDrag: false,
                    items: 1,
                    animateOut: 'fadeOut'
                });
            }
        }
        db.showSearch = function () {
            $('.search-icon').on('click', function () {
                $('.search-wrap').toggleClass("show");
            });
        }
        db.sliderAbout = function () {
            setTimeout(function () {
                var owl_miles = $('.owl-miles');
                if ($(owl_miles).length) {
                    $(owl_miles).owlCarousel({
                        loop: false,
                        margin: 0,
                        nav: true,
                        autoplay: false,
                        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
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
                        onRefreshed: callback
                    });
                }

                function callback() {
                    var maxHeight = 0;
                    $('.mi-box').each(function () {
                        var thisH = $(this).height();
                        if (thisH > maxHeight) {
                            maxHeight = thisH;
                        }
                    });
                    $('.mi-box').css("min-height", maxHeight + 30 + "px");
                    console.log(maxHeight);
                }
            }, 1000);
        }
        db.menuLeft = function () {
            $('.ml-ul > li > a.has-child > div').on('click', function (event) {
                event.preventDefault();
                var child = $(this).parents("a").next();
                var child_ul = $(this).parents(".ml-ul");
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).parents("a").removeClass("active");
                } else {
                    $(child).slideDown();
                    $(this).parents("a").addClass("active");
                }
            });
            $('.ml-caption').on('click', function () {
                var lv1 = $('.lv1');
                if ($(lv1).is(":visible")) {
                    $(lv1).slideUp();
                } else {
                    $(lv1).slideDown();
                }
            });
        }
        db.matchHeight = function () {
            if ($('.news-item').length) {
                $('.news-item').matchHeight();
            }
            if ($('.pp-item').length) {
                $('.pp-item').matchHeight();
            }
            if ($('.sr-item').length) {
                $('.sr-item').matchHeight();
            }
            $('.mega-col').matchHeight();
        }
        db.gender = function () {
            $('.c-text').on('click', function () {
                $('.c-text').removeClass("active");
                $(this).addClass("active");
                var gender = $(this).attr('data-gender');
                $("#gender").val(gender);
            });
        }
        db.preLoad();
        db.homeSlider();
        db.homeProductSlider();
        db.showSearch();
        db.menuLeft();
        db.sliderAbout();
        db.menuResponsive();
        db.matchHeight();
        db.gender();
    });
})(jQuery);
