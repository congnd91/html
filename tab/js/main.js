(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.page-loader').delay(800).fadeOut(600, function () {
        $('body').fadeIn();
      });
    }
    db.menu = function () {
      $('.menu-icon').click(function () {
        $('body').toggleClass("open-menu");
      });
    }
    db.pressSlider = function () {
      var owl = $('.owl-press');
      $(owl).owlCarousel({
        center: false,
        loop: false,
        margin: 17,
        responsive: {
          0: {
            items: 1,
          },
          768: {
            items: 2,
          },
          1200: {
            items: 3,
          },
        }
      });
    }
    db.preLoad();
    db.menu();
    db.pressSlider();
  });
})(jQuery);
