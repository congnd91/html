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
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {


                var menu = $(".menu-mobile");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $('body').removeClass("open-menu");
                } else {
                    $(menu).slideDown();
                    $('body').addClass("open-menu");
                }


            });

        }

        db.quoteSlider = function () {
            var owl_quote = $('.owl-quote');
            if ($(owl_quote).length) {
                $(owl_quote).owlCarousel({
                    loop: true,
                    margin: 0,
                    //mouseDrag: false,
                    nav: false,
                    autoplay: true,
                    items: 1,
                    // animateOut: 'fadeOut'
                });
            }
        }


        db.scrollMenu();
        db.menuResponsive();
        db.quoteSlider();

    });
})(jQuery);
