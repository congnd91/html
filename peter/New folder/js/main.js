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
        db.sliderOne = function () {
            if ($('.slider-one').length) {
                $('.slider-one').slick({
                    slidesToShow: 1,
                    variableWidth: true,
                    //slidesToScroll: 1,
                    centerMode: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="fa fa-arrow-left"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="fa fa-arrow-right"></i></button>'
                });
            }
        }


        db.sliderTwo = function () {
            if ($('.slider-two').length) {
                $('.slider-two').slick({
                    slidesToShow: 1,
                    variableWidth: true,
                    dots: true,
                    //slidesToScroll: 1,
                    // centerMode: true,

                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="fa fa-arrow-left"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="fa fa-arrow-right"></i></button>'
                });
            }
        }
        db.sliderThree = function () {
            if ($('.slider-three').length) {
                $('.slider-three').slick({
                    slidesToShow: 5,

                    arrows: false,

                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {

                                slidesToShow: 3
                            }
                            },
                        {
                            breakpoint: 992,
                            settings: {

                                slidesToShow: 2
                            }
                            },
                        {
                            breakpoint: 576,
                            settings: {

                                slidesToShow: 1
                            }
                            }
                        ]
                });
            }
        }



        db.openChat = function () {
            $('.floating-chat-front').on('click', function (e) {
                $('body').toggleClass("open-chat");
            });
            $('.floating-chat-back').on('click', function (e) {
                $('body').toggleClass("open-chat");
            });
        }




        db.preLoad();
        db.sliderOne();
        db.sliderTwo();
        db.sliderThree();
        db.openChat();

    });
})(jQuery);
