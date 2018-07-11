(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {



            $(window).bind('resize', function () {
                //    $('.menubar').css("min-height", "500px");
            }).trigger('resize');

            if ($(".menubar").length) {


                $(".menubar").stick_in_parent();
            }






        }




        db.preLoad();
        db.menuResponsive();

        /*  $(window).scroll(function () {
      var scrollDistance = $(window).scrollTop();

      // Show/hide menu on scroll
      //if (scrollDistance >= 850) {
      //		$('nav').fadeIn("fast");
      //} else {
      //		$('nav').fadeOut("fast");
      //}

      // Assign active class to nav links while scolling
      $('.section').each(function (i) {
          if ($(this).position().top <= scrollDistance + 100) {
              $('.navigation a.active').removeClass('active');
              $('.navigation a').eq(i).addClass('active');
          }
      });
  }).scroll();*/

    });
})(jQuery);
