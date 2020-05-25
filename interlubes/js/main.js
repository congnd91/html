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


      $('.menu-child li.has-child > a').click(function () {
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

    db.dropdownMenu = function () {
      $('.sb-caption').on('click', function (e) {
        var content = $(this).next(".sb-content");
        if ($(content).is(":visible")) {
          $(content).hide();
          $(this).removeClass("active");

        } else {
          $(content).show();
          $(this).addClass("active");

        }
      });


    }


    db.partnerSlider = function () {
      var owl = $('.owl-partner');
      if ($(owl).length) {

        $(owl).owlCarousel({
          center: false,
          loop: false,
          margin: 0,
          responsive: {
            0: {
              items: 2,


            },
            769: {
              items: 3,


            },
            992: {
              items: 4,

            }

          }

        });
      }



    }

    db.popup = function () {
      /*$('.info-circle').on('click', function (e) {
	$(this).toggleClass("show");
});*/

      $('.phone-icon .icon').on('click', function (e) {

        $('.phone-icon').toggleClass("active");
      });


    }

    db.accordion = function () {

      $('.dsgvo-caption').on('click', function (e) {

        var content = $(this).next();

        if ($(content).is(":visible")) {

          $(content).hide();
          $(this).removeClass("active");

        } else {
          $(content).show();
          $(this).addClass("active");

        }
      });


      $('.acc-historie .caption').on('click', function (e) {

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





    $(document).on('click', '.db-dropdown .dropdown-menu', function (e) {
      e.stopPropagation();
    });

    db.preLoad();
    db.menuResponsive();
    db.dropdownMenu();
    db.partnerSlider();
    db.popup();
    db.accordion();

  });
})(jQuery);
