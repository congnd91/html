(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.loader').delay(300).fadeOut(100, function () {
        $('body').fadeIn();
      });
    }

    db.menuMobile = function () {
      $('.menu-icon').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-menu");
      });

      $('.close-menu').on('click', function () {
        $('body').removeClass("open-menu");
      });
      $('.menu-mobile li.has-child > a').click(function () {
        var child = $(this).parent().find(">ul");
        if ($(child).is(":visible")) {
          $(child).slideUp();
          $(this).parent().removeClass("active");
        } else {
          $(child).slideDown();
          $(this).parent().addClass("active");
        }
        return false;
      });


      $('.search-icon').on('click', function (e) {

        $('body').toggleClass("open-search");
      });

      $('.search-form .clear').on('click', function () {
        $('body').removeClass("open-search");
      });
    }


    db.scrollMenu = function () {
      $(window).scroll(function () {
        if ($(this).scrollTop() >= 150) {
          $('.header').addClass("header-scrolled");
        } else {
          $('.header').removeClass("header-scrolled");
        }
      });

      $(".to-top").click(function () {
        $("html, body").animate({
          scrollTop: 0
        }, 1000);
      });
    }

    db.accordion = function () {
      $('.eh-caption').click(function () {
        var child = $(this).next(".eh-content");

        if ($(child).is(":visible")) {
          $(child).hide();
          $(this).removeClass("active");
        } else {
          $(child).show();
          $(this).addClass("active");
        }

      });

      $('.eh-calendar-caption').click(function () {
        var child = $(this).next(".eh-calendar-content");

        if ($(child).is(":visible")) {
          $(child).hide();
          $(this).removeClass("active");
        } else {
          $(child).show();
          $(this).addClass("active");
        }

      });
    }

    db.heroSlider = function () {
      if ($('.slider-images').length) {
        $('.slider-images').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          speed: 1000,
          autoplay: false,
          autoplaySpeed: 4000,
          asNavFor: $('.slider-text'),
        });
        $('.slider-text').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          fade: true,
          dots: true,
          speed: 1000,
          autoplay: false,
          autoplaySpeed: 4000,
          prevArrow: "<button type='button' class='slick-prev'><i class='btr bt-angle-left'></i></button>",
          nextArrow: "<button type='button' class='slick-next'><i class='btr bt-angle-right'></i></button>",
          asNavFor: $('.slider-images'),

          //  focusOnSelect: true,

        });


      }

    }

    db.eventSlider = function () {
      if ($('.slider-event').length) {
        $('.slider-event').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: false,
          speed: 1000,
          autoplay: false,
          infinite: true,
          centerPadding: 30,
          autoplaySpeed: 4000,
          dots: true,
          responsive: [
            {
              breakpoint: 992,

              settings: {
                slidesToShow: 2,
                centerPadding: '15px',
                slidesToScroll: 1,
              }
            }
          ]

        });



      }

    }
    db.matchHeight = function () {
      if ($('.event-item').length) {
        $('.event-item ').matchHeight();

      }
    }

    db.relatedSlider = function () {
      var owl_related = $('.owl-related');
      if ($(owl_related).length) {
        $(owl_related).owlCarousel({
          loop: true,
          margin: 20,
          nav: true,
          navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
          autoplay: true,
          smartSpeed: 700,
          responsive: {

            0: {
              items: 1,
            },

            576: {
              items: 2,
            },

            992: {
              items: 3,

            },
            1200: {
              items: 4,

            }
          },

        });
      }
    }


    db.preLoad();
    db.menuMobile();

    db.scrollMenu();
    db.heroSlider();
    db.eventSlider();
    db.matchHeight();
    db.accordion();

  });
})(jQuery);
