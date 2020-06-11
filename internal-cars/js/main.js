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
      $('.menu-res-inner li.has-child > a').click(function () {
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
      $('.child-menu >ul>li').hover(function () {
        $('.child-menu >ul>li').removeClass("active");
      }, function () {
        $('.child-menu >ul>li:first-child').addClass("active");
      });
    }
    db.newsSlider = function () {
      var owl = $('.owl-news');
      if ($(owl).length) {
        $(owl).owlCarousel({
          center: false,
          loop: false,
          margin: 30,
          responsive: {
            0: {
              items: 1,
            },
            769: {
              items: 2,
            },
            992: {
              items: 3,
            }
          }
        });
      }
    }


    db.matchHeight = function () {

      if ($('.testimonials-item').length) {
        $('.testimonials-item .content').matchHeight();
      }

      if ($('.plan-item').length) {
        $('.plan-item .content').matchHeight();
      }
    }


    db.accordion = function () {
      $('.faq-caption').on('click', function (e) {
        var content = $(this).next();
        if ($(content).is(":visible")) {
          $(content).hide();
          $(this).removeClass("active");
        } else {
          $(content).show();
          $(this).addClass("active");
        }
      });
    }
    db.preLoad();
    db.menuResponsive();
    db.newsSlider();
    db.accordion();
    db.matchHeight();
  });
})(jQuery);
