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
    db.accordion = function () {
      $('.acc-caption').click(function () {
        var content = $(this).next();
        if ($(content).is(":visible")) {
          $(content).slideUp();
          $(content).removeClass("active");
          $(this).removeClass("active");
        } else {
          $(content).slideDown();
          $(content).addClass("active");
          $(this).addClass("active");
        }

      });

    }
    db.sliderMenu = function () {
      if ($('.slider-for').length) {
        $('.slider-for').slick({
          slidesToShow: 1,
          centerMode: true,
          arrows: true,
          fade: false,
          infinite: true,
          centerPadding: '180px',
          prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
          nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>',
          responsive: [{
            breakpoint: 1200,
            settings: {
              centerPadding: '100px',
            }
          }, {
            breakpoint: 768,
            settings: {
              centerPadding: '0px',
            }
          }]
        });
      }
    }
    db.sliderRelared = function () {
      if ($('.related-slider').length) {
        $('.related-slider').slick({
          slidesToShow: 3,
          centerMode: false,
          arrows: false,
          fade: false,
          infinite: false,
          variableWidth: false,
          responsive: [{
            breakpoint: 1200,
            settings: {
              variableWidth: false,

            }
          }, {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              variableWidth: true
            }
          }]
        });
      }
    }
    db.sliderFive = function () {
      if ($('.five-slider').length) {
        $('.five-slider').slick({
          slidesToShow: 1,
          centerMode: false,
          arrows: true,
          fade: false,
          infinite: true,
          prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
          nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>',
        });
      }
    }
    db.preLoad();
    db.menu();
    db.sliderMenu();
    db.sliderRelared();
    db.sliderFive();
    db.accordion();
  });
})(jQuery);
