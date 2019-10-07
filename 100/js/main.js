(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(400).fadeOut(200, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });

            $('.menu-mobile ul li a').on('click', function (e) {
                $('body').removeClass("open-menu");
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
        db.eventSlider = function () {
            var owl_event = $('.owl-event');
            if ($(owl_event).length) {
                $(owl_event).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    autoplay: false,
                    items: 1,
                    //      animateOut: 'fadeOut'
                });
            }
        }
        db.scrollIt = function () {
            $(function () {
                $.scrollIt({
                    upKey: 38, // key code to navigate to the next section
                    downKey: 40, // key code to navigate to the previous section
                    easing: 'linear', // the easing function for animation
                    scrollTime: 600, // how long (in ms) the animation takes
                    activeClass: 'active', // class given to the active nav element
                    onPageChange: null, // function(pageIndex) that is called when page is changed
                    topOffset: -50 // offste (in px) for fixed top navigation
                });
            });
        }
        db.matchHeight = function () {

        }
        db.preLoad();
        db.menuResponsive();
        db.scrollMenu();
        db.matchHeight();
        db.eventSlider();
        db.scrollIt();
    });
})(jQuery);
