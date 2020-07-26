var db = new Object();
db.preLoad = function () {
  $('.page-preload').delay(400).fadeOut(200, function () {
    $('body').fadeIn();
  });
}
db.menu = function () {
  $('.menu-item .menu-icon').on('click', function (e) {
    e.stopPropagation();
    $('body').toggleClass("show-menu");

    $(".scroll").getNiceScroll().resize();
  });
}
db.matchHeight = function () {
  if ($('.matchHeight').length) {
    $('.matchHeight').matchHeight();
  }
  if ($('.course-item').length) {
    $('.course-item').matchHeight();
  }
}
db.niceScroll = function () {
  if ($('.scroll').length) {
    $('.scroll').niceScroll({
      cursorcolor: "#555",
      cursorwidth: "5px",
      cursorborder: "none"
    });
  }
}
db.preLoad();
db.menu();
db.niceScroll();
db.matchHeight();
