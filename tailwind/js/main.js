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


      /***********basic accordion*******/

      $('.accordion .acc-caption').click(function (e) {

        var content = $(this).next();
        if ($(content).is(":visible")) {
          $(this).removeClass("active");
          $(content).hide();
        } else {
          $(this).addClass("active");
          $(content).show();
        }

      });

    }

    db.matchHeight = function () {
      if ($('.feature-item').length) {
        $('.feature-item ').matchHeight();
      }



    }
    db.preLoad();
    db.menu();
    db.matchHeight();
    db.accordion();

  });
})(jQuery);
