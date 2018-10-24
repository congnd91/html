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




        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();
        db.sliderHero();
        db.sliderIntro();
        db.countDown();



        db.showHeader();


    });
})(jQuery);
