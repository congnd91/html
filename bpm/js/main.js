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
    db.recentSlider = function () {
      var owl = $('.owl-recent');
      $(owl).owlCarousel({
        center: false,
        loop: true,
        margin: 15,
        nav: true,
        // navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        responsive: {
          0: {
            items: 2,
          },
          576: {
            items: 3,
          },

          768: {
            items: 4,
          },

          992: {
            items: 4,
          },
          1200: {
            items: 5,
          },
        }
      });
    }

    db.blogSlider = function () {
      var owl = $('.owl-blog');
      $(owl).owlCarousel({
        center: false,
        loop: false,
        //animateOut: 'fadeOut',
        margin: 0,
        nav: true,
        dots: false,
        items: 1,
        // navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        navText: [$('.am-next'), $('.am-prev')]

      });
    }
    db.preLoad();
    db.menu();
    db.recentSlider();
    db.blogSlider();
    new WOW({
      offset: 100,
      mobile: true
    }).init()
  });
})(jQuery);
