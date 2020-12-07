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
      $('#user-menu').click(function () {

        $("body").find("[aria-labelledby='user-menu']").toggleClass("transform opacity-100 scale-100");
      });

      $('#open-menu').click(function () {

        $("#off-canvas").removeClass('-translate-x-full opacity-0');
      });
      $('#close-menu').click(function () {

        $("#off-canvas").addClass('-translate-x-full opacity-0');
      });




    }

    db.matchHeight = function () {
      if ($('.feature-item').length) {
        $('.feature-item ').matchHeight();
      }



    }
    db.preLoad();
    db.menu();

    db.accordion();

  });
})(jQuery);
