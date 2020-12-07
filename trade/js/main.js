$(document).ready(function () {
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

    $('.dashboard-menu-icon').click(function () {
      $('body').toggleClass("open-menu-dashboard");
    });
  }

  db.menuDashboard = function () {
    $('.menu-nav .has-child a').click(function () {


      var x = $(this).next();

      if ($(x).is(":visible")) {

        $(x).slideUp();
        $(this).parent().removeClass("active");
      } else {
        $(x).slideDown();
        $(this).parent().addClass("active");
      }
      return false;
    });

  }
  db.matchHeight = function () {
    $('.mb-content .tab-content').matchHeight();
  }
  db.pressSlider = function () {
    var owl = $('.owl-press');
    $(owl).owlCarousel({
      center: false,
      loop: false,
      margin: 17,
      responsive: {
        0: {
          items: 1,
        },
        768: {
          items: 2,
        },
        1200: {
          items: 3,
        },
      }
    });
  }
  db.select2 = function () {
    $('.js-example-basic-single').select2({
      width: '100%'
    });
  }



  db.preLoad();
  db.menuDashboard();
  db.menu();
  db.matchHeight();
  db.select2();
});
