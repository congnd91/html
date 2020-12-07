(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.accordion = function () {
      $('.acc-caption').click(function () {
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
    db.sidebar = function () {
      $('.sidebar-head .close').click(function () {
        $('body').addClass("hide-sidebar");
        $('body').removeClass("show-sidebar-mobile");
      });
      $('.show-side-bar').click(function () {
        $('body').removeClass("hide-sidebar");

      });


      $('.show-side-bar-mobile').click(function () {
        $('body').addClass("show-sidebar-mobile");
      });


    }
    db.scroll = function () {
      $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
          $('body').addClass("scrolled");
        } else {
          $('body').removeClass("scrolled");
        }
      });
    }
    db.accordion();
    db.sidebar();
    db.scroll();
  });
})(jQuery);
