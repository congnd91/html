var db = new Object();
db.preLoad = function () {
  $('.page-preload').delay(400).fadeOut(200, function () {
    $('body').fadeIn();
  });
}
db.loadMore = function () {
  $('.block-two .loadmore .loadmore-icon').on('click', function (e) {
    $('.block-two .loadmore').hide();
    $('.block-two .hidemore').show();
    $('.bt-flex-more').show();
  });

  $('.block-two .hidemore .hidemore-icon').on('click', function (e) {
    $('.block-two .loadmore').show();
    $('.block-two .hidemore').hide();
    $('.bt-flex-more').hide();
  });


}

db.matchHeight = function () {
  if ($('.bd-choose-size .item .thumb').length) {
    $('.bd-choose-size .item .thumb').matchHeight();

  }
  if ($('.course-item').length) {
    $('.course-item').matchHeight();

  }
}



db.detailSlider = function () {

  var owl_detail = $('.owl-detail');
  if ($(owl_detail).length) {
    $(owl_detail).owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      rtl: true,
      autoplay: false,
      items: 1,
      //      animateOut: 'fadeOut'
      navContainer: '#customNav',
      // move dotsContainer outside the primary owl wrapper
      dotsContainer: '#customDots',

    });
  }

}



db.reviewSlider = function () {

  var owl = $('.owl-review');
  if ($(owl).length) {
    $(owl).owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      rtl: true,
      autoplay: false,
      items: 2,
      navText: ['', ''],
    });
  }

}


db.frameDetailSlider = function () {

  var owl = $('.owl-frame-detail');
  if ($(owl).length) {
    $(owl).owlCarousel({
      loop: true,
      margin: 0,
      nav: false,
      rtl: true,
      autoplay: false,
      items: 1,
      navText: ['', ''],
    });
  }

}

db.frameDetailFullwidth = function () {

  var owl = $('.owl-frame-fullwidth');
  if ($(owl).length) {
    $(owl).owlCarousel({
      loop: true,
      margin: 0,
      nav: true,
      rtl: true,
      autoplay: false,
      items: 1,
      navText: ['', ''],
    });
  }

}

db.partnerSlider = function () {

  var owl = $('.owl-partner');
  if ($(owl).length) {
    $(owl).owlCarousel({
      loop: true,
      margin: 30,
      nav: true,
      rtl: true,
      autoplay: false,
      items: 5,
      navText: ['', ''],

    });
  }

}




db.stepSlider = function () {
  var owl = $('.owl-carousel');

  $(owl).children().each(function (index) {
    $(this).attr('data-position', index); // NB: .attr() instead of .data()
  });

  $(owl).owlCarousel({
    center: true,
    loop: true,
    rtl: true,
    responsive: {
      0: {
        items: 2,

      },
      700: {
        items: 2,

      },
      1200: {
        items: 3,

      },
      1350: {
        items: 5,

      }
    }

  });







  /* $(owl).owlCarousel({
       center: true,
       loop: true,
       items: 5,
       rtl: true

   })*/

  $(document).on('click', '.owl-item>div', function () {

    var $speed = 300;
    $(owl).trigger('to.owl.carousel', [$(this).data('position'), $speed]);
  });

}

db.preLoad();
db.loadMore();
db.reviewSlider();
db.partnerSlider();
db.matchHeight();
db.detailSlider();
db.frameDetailSlider();
db.frameDetailFullwidth();
