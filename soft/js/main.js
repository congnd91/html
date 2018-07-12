(function ($) {

    //  new WOW().init(); var $body = $('body');
    var $body = $('body');
    var $box = $('.box');
    for (var i = 0; i < 20; i++) {
        $box.clone().appendTo($body);
    }

    // Helper function for add element box list in WOW
    WOW.prototype.addBox = function (element) {
        this.boxes.push(element);
    };

    // Init WOW.js and get instance
    var wow = new WOW();
    wow.init();

    // Attach scrollSpy to .wow elements for detect view exit events,
    // then reset elements and add again for animation
    $('.wow').on('scrollSpy:exit', function () {
        $(this).css({
            'visibility': 'hidden',
            'animation-name': 'none'
        }).removeClass('animated');
        wow.addBox(this);
    }).scrollSpy();



    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menu = function () {
            $(window).bind('resize', function () {
                //    $('.menubar').css("min-height", "500px");
            }).trigger('resize');
            if ($(".menubar").length) {
                $(".menubar").stick_in_parent();
            }
            $('.dropdown-mobile').click(function () {
                $(this).toggleClass("show");
            });




        }
        db.preLoad();
        db.menu();
    });
})(jQuery);
