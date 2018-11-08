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

            $('.menu-res li.has-child em').on('click', function (event) {
                event.stopPropagation();
                var submenu = $(this).parent().find(" > ul");
                if ($(submenu).is(":visible")) {
                    $(submenu).slideUp();
                    $(this).parent().removeClass("open-submenu-active");
                } else {
                    $(submenu).slideDown();
                    $(this).parent().addClass("open-submenu-active");
                }
            });

            $('.menu-res li.menu-item-has-children > a').on('click', function () {
                //  return false;
            });

        }
        db.toTop = function () {

            $('.backtotop').hide();
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("body-scrolling");
                    $('.backtotop').fadeIn();
                } else {
                    $('body').removeClass("body-scrolling");
                    $('.backtotop').fadeOut();
                }
            });

            $(".backtotop").click(function () {

                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }

        db.preLoad();
        db.menuResponsive();
        db.toTop();

    });
})(jQuery);
