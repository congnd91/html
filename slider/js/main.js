(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('.preload').delay(400).fadeOut(200, function () {
        $('body').fadeIn();
      });
    }


    db.preLoad();
    db.slider();



  });
})(jQuery);
