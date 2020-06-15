(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.preload').delay(400).fadeOut(200, function () {
        $('body').fadeIn();
      });
    }
    db.tab = function () {
      $('.tab-caption span').click(function () {
        $('.tab-caption span').removeClass("active");
        $(this).addClass("active");
        var x = $(this).attr("data-id");

        $('.tab-content').hide();
        $(x).show();
      });

      $('.message .close').click(function () {
        $('.message').hide();

      });
    }

    db.preLoad();
    db.tab();



  });
})(jQuery);
