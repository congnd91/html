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
                $("body").toggleClass("open-menu");
            });
            $('.close-menu').on('click', function () {
                $("body").toggleClass("open-menu");
            });
        }
        db.datePicker = function () {
            if ($("#birthday").length) {
                $('#birthday').datetimepicker({
                    format: 'DD/MM/YYYY',
                });
            }
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
        db.sliderHero = function () {
            var owl_hero = $('.owl-hero');
            if ($(owl_hero).length) {
                $(owl_hero).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1
                });
            }
        }
        db.sliderPartner = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: false,
                    margin: 30,
                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {
                        0: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        991: {
                            items: 4,
                        },
                        1191: {
                            items: 5,
                        }
                    },
                });
            }
        }
        db.niceScroll = function () {
            $('.ss-tab-content').niceScroll();
            $('.question-content').niceScroll();
        }
        db.sliderAd = function () {
            if ($('.slider-for').length) {
                $('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: true,
                    asNavFor: '.slider-nav',
                    prevArrow: '<button class="slick-prev slick-arrow"  type="button"><i class="fa fa-angle-left"></i></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"><i class="fa fa-angle-right"></i></button>'
                });
                $('.slider-nav').slick({
                    slidesToShow: 10,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',
                    focusOnSelect: true,
                    centerMode: true,
                    arrows: false,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 8,

                            }
    },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 7,

                            }
    },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 4,

                            }
    }

  ]


                });
            }
        }
        db.scrollFixBar = function () {
            if ($(".menu-ad").length) {
                $(".menu-ad").stick_in_parent();
            }
            $(".menu-ad ul li").click(function () {
                $(".menu-ad ul li").removeClass("active");
                var that = this;
                var id = $(that).attr("data-id");
                $(that).addClass("active");
                $('html,body').stop(true, true).animate({
                    scrollTop: $(id).offset().top - 160
                }, 700);
            });
        }
        db.showHeader = function () {
            $(".icon-show-header").click(function () {
                if ($(".top").is(":visible")) {
                    $(".top").slideUp();
                    $(".icon-show-header").removeClass("active");
                } else {
                    $(".top").slideDown();
                    $(".icon-show-header").addClass("active");
                }
            });
        }

        db.hideChatBox = function () {
            $(".close-chatbox").click(function () {
                if ($(".chatbox").is(":visible")) {
                    $(".chatbox").hide();

                } else {

                }
            });
        }

        db.faq = function () {
            $(".faq-caption").click(function () {

                var content = $(this).next();

                if ($(content).is(":visible")) {
                    $(content).slideUp();
                    $(this).removeClass("active");

                } else {
                    $(content).slideDown();
                    $(this).addClass("active");

                }
            });
        }




        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();
        db.sliderHero();
        db.sliderPartner();
        db.datePicker();
        db.sliderAd();
        db.scrollFixBar();
        db.showHeader();
        db.hideChatBox();
        db.faq();
        db.niceScroll();
    });
})(jQuery);
