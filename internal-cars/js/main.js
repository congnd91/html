(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('#page-loader').delay(200).fadeOut(100, function () {
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
    db.playVideo = function () {

      var $videoSrc;
      $('.icon-play').click(function () {
        $videoSrc = $(this).data("src");

      });

      // when the modal is opened autoplay it  
      $('#modal-video').on('shown.bs.modal', function (e) {

        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
      })



      // stop playing the youtube video when I close the modal
      $('#modal-video').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src', $videoSrc);
      })

    }



    db.preLoad();
    db.menuResponsive();
    db.newsSlider();
    db.accordion();
    db.matchHeight();
    db.playVideo();
  });
})(jQuery);
