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
    db.customerSlider = function () {
      var owl = $('.owl-customer');
      $(owl).owlCarousel({
        center: true,
        loop: true,
        margin: 0,
        nav: true,
        responsive: {
          0: {
            items: 1,
          },
          992: {
            items: 3,
          },
        }
      });
    }

    db.mediaSlider = function () {
      var owl = $('.owl-media');
      $(owl).owlCarousel({
        loop: false,
        margin: 5,
        autoWidth: true,
        nav: true,
        responsive: {
          0: {
            items: 3,
          },
          992: {
            items: 4,
          },

          1200: {
            items: 5,
          }
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
          slidesToShow: 8,
          slidesToScroll: 1,
          asNavFor: '.slider-for',
          focusOnSelect: true,
          prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> </button>',
          nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> </button>',

          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 6,
                slidesToScroll: 3,

              }
    },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 2
              }
    },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 5,
                slidesToScroll: 1
              }
    }

  ]
        });
      }

    }

    db.preLoad();
    db.menu();
    db.customerSlider();
    db.mediaSlider();
    db.sliderProduct();
  });
})(jQuery);
