(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.page-loader').delay(900).fadeOut(700, function () {
        $('body').fadeIn();
      });
    }
    db.menu = function () {
      $('.menu-icon').click(function () {
        $('body').toggleClass("open-menu");
      });
      $('.menu-mobile li.has-child a').click(function () {
        var content = $(this).parent().find("ul");
        if ($(content).is(":visible")) {
          $(content).slideUp();
          $(content).removeClass("active");
          $(this).removeClass("active");
        } else {
          $(content).slideDown();
          $(content).addClass("active");
          $(this).addClass("active");
        }
        return false;
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


      $('.dasboard-acc .item .cap').click(function () {


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


      $(window).scroll(function () {
        var header = $('.header'),
          scroll = $(window).scrollTop();
        if (scroll >= 100) header.addClass('scrolled');
        else header.removeClass('scrolled');
      });
    }

    db.sliderText = function () {
      if ($('.text-slider').length) {
        $('.text-slider').slick({

          vertical: true,
          arrows: false,
          fade: false,
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          draggable: false,
          autoplaySpeed: 1500,
          pauseOnHover: false,
        });
      }
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
    db.marquee = function () {
      $('.marquee').marquee({
        speed: 50,
        gap: 30,
        delayBeforeStart: 0,
        direction: 'left',
        //duplicated: true,
        //  pauseOnHover: true,
        startVisible: true,
        duplicated: true,
      });
      $('.marquee-logos').marquee({
        speed: 30,
        gap: 30,
        delayBeforeStart: 0,
        direction: 'left',
        //duplicated: true,
        //  pauseOnHover: true,
        startVisible: true,
        duplicated: true,
      });
      $('.marquee-customers').marquee({
        speed: 30,
        gap: 0,
        delayBeforeStart: 0,
        direction: 'left',
        //duplicated: true,
        //  pauseOnHover: true,
        startVisible: true,
        duplicated: true,
      });
    }
    db.preLoad();
    db.menu();
    db.sliderMenu();
    db.sliderRelared();
    db.sliderFive();
    db.accordion();
    db.marquee();
    db.sliderText();
    new WOW({
      offset: 100,
      mobile: true
    }).init()
  });
})(jQuery);
