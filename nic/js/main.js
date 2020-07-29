(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('#page-loader').delay(800).fadeOut(600, function () {
        $('body').fadeIn();
      });
    }
    db.menuResponsive = function () {
      $('.menu-icon').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-menu");
      });
      $('.page').on('click', function () {
        $('body').removeClass("open-menu");
      });
    }
    db.matchHeight = function () {
      if ($('.pi-content').length) {
        $('.pi-content').matchHeight();
      }
    }
    db.impactSlider = function () {
      var owl = $('.owl-impact');
      $(owl).owlCarousel({
        loop: true,
        responsive: {
          0: {
            items: 3,
            loop: true,
          },
          580: {
            items: 3,
            // center: true,
          },
          992: {
            items: 5,
          },
          1200: {
            items: 5,
            loop: false,
          },
          1350: {
            items: 5,
          }
        }
      });
    }



    db.quickSlider = function () {
      var owl = $('.owl-quick');
      $(owl).owlCarousel({
        loop: true,
        loop: true,
        margin: 0,
        items: 1,
        nav: false,
        onDragged: callback
      });

      function callback(event) {
        $('.counter').countTo({
          from: 10000,
          to: 1000000,
          speed: 90000,
          refreshInterval: 50,
          formatter: function (value, options) {
            return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
          }
        });
      }

    }






    db.preLoad();
    db.menuResponsive();
    db.impactSlider();
    db.quickSlider();
    db.matchHeight();
  });
})(jQuery);
