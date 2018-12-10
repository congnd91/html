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
            $('.search-icon').on('click', function () {
                $("body").toggleClass("show-search");
            });
            $('.search-control span').on('click', function () {
                $("body").toggleClass("show-search");
            });

            $('.menu li.has-child').hover(function () {
                $('.menu-overlay').stop(true, true).addClass("active");

            }, function () {

                $('.menu-overlay').stop(true, true).removeClass("active");
            });

            $('.menu-res ul li.has-child a').on('click', function (e) {
                var menu = $(this).parent().find("ul");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).removeClass("active");


                } else {
                    $(menu).slideDown();
                    $(this).addClass("active");

                }
                return false;
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

            $('.btn-discover').on('click', function () {

                $("html, body").delay(2).animate({
                    scrollTop: $('.intro-first').offset().top
                }, 1000)
            });

        }
        db.sliderHero = function () {
            var owl_hero = $('.owl-hero');
            if ($(owl_hero).length) {
                $(owl_hero).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                    smartSpeed: 500,
                });
            }


            owl_hero.on('changed.owl.carousel', function (property) {
                var current = property.item.index;
                var prev = $(property.target).find(".owl-item").eq(current).prev().find(".hero-item").attr("data-src");

                var next = $(property.target).find(".owl-item").eq(current).next().find(".hero-item").attr("data-src");

                $('.navPrev').find('img').attr('src', prev);
                $('.navNext').find('img').attr('src', next);
            });



            $('.navNext').on('click', function () {
                owl_hero.trigger('next.owl.carousel', [300]);
                return false;
            });

            $('.navPrev').on('click', function () {
                owl_hero.trigger('prev.owl.carousel', [300]);
                return false;
            });

        }
        db.sliderGT = function () {
            var owl_gt = $('.owl-gt');
            if ($(owl_gt).length) {
                $(owl_gt).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                    smartSpeed: 500,
                });
            }
        }
        db.niceScroll = function () {
            var scroll = $('.cf-policy');
            if ($(scroll).length) {
                $(scroll).niceScroll({
                    cursorwidth: 8,
                    cursoropacitymin: 0.4,
                    cursorcolor: '#e5e5e5',
                    cursorborder: 'none',
                    cursorborderradius: 6,
                    autohidemode: 'leave'
                }); // free your immagination
            }


        }

        db.sliderQT = function () {
            var owl_qt = $('.owl-qt');
            if ($(owl_qt).length) {
                $(owl_qt).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                    smartSpeed: 500,
                });
            }


        }

        db.sliderQTTC = function () {
            var owl_qt_tc = $('.owl-qt-tc');
            if ($(owl_qt_tc).length) {
                $(owl_qt_tc).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,
                    animateOut: 'fadeOut',
                    thumbs: true,
                    thumbsPrerendered: true
                });
            }


        }


        db.sliderIntro = function () {
            var owl_intro = $('.owl-intro');
            if ($(owl_intro).length) {
                $(owl_intro).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,

                    items: 1,
                    smartSpeed: 500,
                });
            }




        }

        db.sliderSP = function () {
            var owl_sp = $('.owl-sp');
            if ($(owl_sp).length) {
                $(owl_sp).owlCarousel({
                    center: true,
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 2,
                    responsive: {

                        768: {
                            items: 2,

                        },
                        992: {
                            items: 2,

                        }
                    }

                });
            }


        }
        db.GtText = function () {


            $(".gt-more a").on('click', function () {


                if ($(this).parents(".gt-text-sp").find(".gt-hidden").is(":visible")) {
                    $(this).parents(".gt-text-sp").find(".gt-hidden").slideUp();
                    $(this).text("Xem thêm")

                } else {
                    $(this).parents(".gt-text-sp").find(".gt-hidden").slideDown();
                    $(this).text("Đóng")
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
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    asNavFor: '.slider-for',


                    focusOnSelect: true,
                    prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;"></button>',
                    nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;"></button>'
                });
            }

        }


        db.countDown = function () {

            $('#countdown').countdown('2018/11/11', function (event) {
                var $this = $(this).html(event.strftime('' +

                    '<div> <span>%d</span> <strong>Ngày</strong></div>  ' +
                    '<div><em>:</em></div>' +
                    '<div><span>%H</span> <strong>Giờ</strong></div>   ' +
                    '<div><em>:</em></div>  ' +
                    '<div><span>%M</span> <strong>Phút</strong></div>    ' +
                    '<div><em>:</em></div>  ' +
                    '<div><span>%S</span> <strong>Giây</strong></div>   '));
            });

        }



        db.switch = function () {
            $(".f-switch .fs1").click(function () {
                $(".f-switch").removeClass("active-fs2");
            });
            $(".f-switch .fs2").click(function () {
                $(".f-switch").addClass("active-fs2");
            });
        }
        db.fancybox = function () {


            $('.fancybox').fancybox();
        }






        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();
        db.sliderHero();
        db.sliderIntro();
        db.countDown();
        db.switch();
        db.sliderGT();
        db.sliderQT();
        db.sliderQTTC();

        db.sliderSP();
        db.sliderProduct();

        db.fancybox();
        db.niceScroll();
        db.GtText();


    });
})(jQuery);
