(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.page-loader').delay(300).fadeOut(100, function () {
        $('body').fadeIn();
      });
    }
    db.menu = function () {
      $('.menu-icon').click(function () {
        $('body').toggleClass("open-menu");
      });

      $('.menu-mobile .menu-item-has-children > a').click(function () {
        var child = $(this).next();

        if ($(child).is(":visible")) {

          $(child).slideUp();
        } else {
          $(child).slideDown();
        }
        return false;
      });

      $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {

          $('body').addClass("scroll");
        } else {
          $('body').removeClass("scroll");
        }
      });

      $(document).on('click', '.td1 .dropdown-menu', function (e) {
        e.stopPropagation();
      });
      $('.dd-item').click(function () {
        var child = $(this).next();

        if ($(child).is(":visible")) {
          $(this).removeClass("active");
          $(child).hide();
        } else {
          $(child).show();
          $(this).addClass("active");
        }
        return false;
      });

      //modal staff
      $('.items .item').click(function () {
        $('.staff-modal').show();
      });
      $('.sm-box .close').click(function () {
        $('.staff-modal').hide();
      });



    }
    db.heroSlider = function () {
      var owl = $('.owl-hero');
      $(owl).owlCarousel({
        nav: true,
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        onTranslated: function (current) {
          $('.owl-item video').each(function () {
            $(this).get(0).pause();
          });
          if ($('.owl-item.active video').length) {
            $('.owl-item.active video').get(0).play();
          }
        }
      });
    }
    db.bannerSlider = function () {
      var owl = $('.owl-banner');
      $(owl).owlCarousel({
        nav: false,
        loop: true,
        margin: 0,
        items: 1,
        dots: true,

      });
    }

    db.techSlider = function () {
      var owl = $('.owl-tech');
      $(owl).owlCarousel({
        nav: true,
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        navText: ['', ''],

      });
    }



    db.serviceSlider = function () {
      var owl = $('.owl-service');
      $(owl).owlCarousel({
        nav: true,
        loop: true,
        animateOut: 'fadeOut',
        margin: 0,
        items: 1,
        dots: false,
        navText: ['', ''],

      });
    }

    db.matchHeight = function () {
      if ($('.feature-item').length) {
        $('.feature-item .des').matchHeight();
      }
    }


    db.tabScroll = function () {

      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href");
        if ((target == '#tab3')) {


          if ($('.scroll-nav__wrapper').length == 0) {

            $(function () {
              $('.ctc3-content').scrollNav({
                headlineText: 'scrollNav',
                //fixedMargin: 350,
                scrollOffset: 300,
                showHeadline: false,
                showTopLink: false,
                activeClass: 'active'
              });

              $(window).on('scroll.scrollNav', function () {
                var position = $('.scroll-nav__list').find("li.active").position();
                if (position) {
                  position = position.top;
                  position = (position - 30) * -1;
                  $('.scroll-nav__list').stop().animate({
                    top: position
                  }, 300);
                }
              });
            });
          }
        }
      });
    }


    db.preLoad();
    db.menu();
    db.heroSlider();
    db.serviceSlider();
    db.matchHeight();
    db.tabScroll();
    db.bannerSlider();
    db.techSlider();

  });
})(jQuery);
