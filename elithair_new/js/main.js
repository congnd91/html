(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
                if ($(this).scrollTop() >= 150) {
                    $('.totop').addClass("show");
                } else {
                    $('.totop').removeClass("show");
                }
            });
            $(".totop").click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                var menu = $('.menu-mobile');
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                } else {
                    $(menu).slideDown();
                }
            });
            $('.menu-mobile ul li a').click(function () {
                $('.menu-mobile').slideUp();
            });
        }
        db.slider = function () {
            $('.owl-peo').owlCarousel({
                items: 1,
                center: false,
                margin: 10,
                loop: true,
                responsive: {
                    576: {
                        center: true,
                        items: 3,
                        margin: 10,
                    }
                }
            });
        }
        db.scroll = function () {
            $(".scroll-to").click(function () {
                var id = $(this).attr("data-id");
                $('html,body').animate({
                    scrollTop: $(id).offset().top - 100
                }, 1000);
                return false;
            });
        }
        db.scrollMenu();
        db.menuResponsive();
        db.slider();
        db.scroll();

        new WOW({
            offset: 100,
            mobile: true
        }).init()
    });
})(jQuery);
