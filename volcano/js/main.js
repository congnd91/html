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
            $('.menu-inner ul li').hover(function () {

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


        db.sliderProduct = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true
                });
            }

        }


        db.preLoad();
        db.hoverMenu();
        db.search();
        db.menuLeft();
        db.menuAccordion();
        db.menuResponsive();
        db.chat();
        db.accordion();
        db.sliderProduct();
    });
})(jQuery);
