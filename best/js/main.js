(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.page-loader').delay(800).fadeOut(600, function () {
        $('body').fadeIn();
      });
    }
    db.readmore = function () {
      $('.po-more-control .readmore').click(function () {
        $('.po-more').show();

        $('.po-more-control .readless').show();
        $('.po-more-control .readmore').hide();

      });
      $('.po-more-control .readless').click(function () {
        $('.po-more').hide();

        $('.po-more-control .readmore').show();
        $('.po-more-control .readless').hide();

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
    db.sliderBlock2 = function () {
      if ($('.block2-slider').length) {
        $('.block2-slider').slick({
          slidesToShow: 2,
          // centerMode: true,
          arrows: false,
          variableWidth: true,
          fade: false,
          infinite: true,
          prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button"> <i class="icon ion-ios-arrow-back"></i></button>',
          nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button"> <i class="icon ion-ios-arrow-forward"></i></button>',
        });
      }
    }
    db.sliderBlock7 = function () {
      if ($('.block7-slider').length) {
        $('.block7-slider').slick({
          slidesToShow: 1,
          // centerMode: true,
          arrows: false,
          variableWidth: false,
          fade: false,
          infinite: true,
          dots: true

        });
      }
    }


    db.marquee = function () {
      if ($('.marquee').length) {
        $('.marquee').marquee({
          speed: 50,
          gap: 50,
          delayBeforeStart: 0,
          direction: 'left',
          //duplicated: true,
          pauseOnHover: true,
          startVisible: true,
        });
      }
    }
    db.chooseAnswer = function () {
      $('.answer-item').click(function () {
        $(this).parents('.row').find('.answer-item').removeClass("active");
        $(this).addClass("active");

      });

    }


    db.preLoad();
    db.marquee();
    db.sliderBlock2();
    db.sliderBlock7();
    db.readmore();
    db.chooseAnswer();
  });
})(jQuery);
