(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuAccordion = function () {
            $('.acc-caption').on('click', function () {
                var content = $(this).next(".acc-content");
                if ($(content).is(":visible")) {
                    $(this).removeClass("open");
                    $(content).stop(true, true).slideUp();
                } else {
                    $(content).stop(true, true).slideDown();
                    $(this).addClass("open");
                }
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
            });
        }
        db.accordion = function () {
            $('.faq-acc-caption').on('click', function () {
                var content = $(this).next();
                if ($(content).is(":visible")) {
                    $(content).stop(true, true).slideUp();
                    $(this).removeClass("active");
                } else {
                    $(content).stop(true, true).slideDown();
                    $(this).addClass("active");
                }
            });
        }
        db.chat = function () {
            $('.chatbox-caption-show').on('click', function () {
                $('.chatbox').addClass("show");
            });
            $('.chatbox-caption-hide').on('click', function () {
                $('.chatbox').removeClass("show");
            });
        }
        db.hoverMenu = function () {
            /*$('.menu-inner ul li').hover(function () {

                    $(".mega-menu").stop(true, true).slideUp(400);

                    var mega = $(this).find(".mega-menu");

                    if ($(mega).is(":not(:visible)")) {

                        setTimeout(function () {
                            $(mega).stop(true, true).slideDown(400);
                        }, 400);

                        $('body').addClass("show-overlay");
                    }
                },
                function () {
                    // $(this).find(".mega-menu").stop(true, true).slideUp(400);
                    $('body').removeClass("show-overlay");
                });*/




            $('.menu-inner ul li').hover(function () {
                    var mega = $(this).find(".mega-menu");
                    if ($(mega).is(":not(:visible)")) {
                        $(mega).stop().slideDown(400);
                        $('body').addClass("show-overlay")
                    }


                },
                function () {
                    var mega = $(this).find(".mega-menu");

                    $(mega).stop().slideUp(400);

                    $('body').removeClass("show-overlay")

                });


        }

        db.search = function () {
            $('.search-form input').focus(function () {
                $('.search-box').addClass("show");
            });

            $('.search-form input').blur(function () {
                $('.search-box').removeClass("show");
            });
        }
        db.menuLeft = function () {
            $('.ml-ul > li > a').on('click', function () {


                var child = $(this).next();
                if ($(child).is(":visible")) {
                    $(child).slideUp();
                    $(this).removeClass("active");

                } else {
                    $(child).slideDown();
                    $(this).addClass("active");


                }
                return false;
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
                $('.news-item h3').matchHeight();
                $('.news-item p').matchHeight();
            }

        }

        db.newsDetail = function () {
            $('.news-item').on('click', function () {
                $("body").addClass("show-news-detail");
            });
            $('.close-nd').on('click', function () {
                $("body").removeClass("show-news-detail");
            });


        }



        db.homeSlider = function () {


            var owl_home = $('.owl-home');
            if ($(owl_home).length) {
                $(owl_home).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    smartSpeed: 700

                });
            }

        }
        db.applicationSlider = function () {


            var owl_application = $('.owl-application');
            if ($(owl_application).length) {
                $(owl_application).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
                    autoplay: true,
                    items: 1,
                    smartSpeed: 700

                });
            }

        }






        db.preLoad();
        db.hoverMenu();
        db.homeSlider();
        db.applicationSlider();

        db.search();
        db.menuLeft();
        db.menuAccordion();
        db.menuResponsive();
        db.chat();
        db.accordion();
        db.matchHeight();
        db.newsDetail();
        db.sliderMiles();
        db.scroll();
        db.scrollFixBar();
    });
})(jQuery);
