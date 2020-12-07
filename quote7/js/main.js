(function ($) {
  $(document).on('ready', function () {
    var db = new Object();

    db.accordion = function () {
      $('.list-caption').click(function () {
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

    db.slider = function () {
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        autoplay: true,

      })


    }

    db.accordion();
    db.slider();
  });
})(jQuery);
