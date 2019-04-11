/**
 * --------------------------------------------------------------------------
 * SCRIPTS
 * --------------------------------------------------------------------------
 *
 * Here we define config of APP
 */

'use strict';

var APP = {
  utilities: {},
  config: {}
};

/**
 * --------------------------------------------------------------------------
 * CONSTANTS
 * --------------------------------------------------------------------------
 *
 * Load tested earlier, universal modules
 */

/**
 * --------------------------------------------------------------------------
 * PubSub - Publish Subscibe (Mediator)
 * --------------------------------------------------------------------------
 */

APP.utilities.pubsub = {
  pubsub: {},
  subscribe: function(pubName, fn) {
    this.pubsub[pubName] = this.pubsub[pubName] || [];
    this.pubsub[pubName].push(fn);
  },
  unsubscribe: function(pubName, fn) {
    if (this.pubsub[pubName]) {
      for (var i = 0; i < this.pubsub[pubName].length; i++) {
        if (this.pubsub[pubName][i] === fn) {
          this.pubsub[pubName].splice(i, 1);
          break;
        }
      };
    }
  },
  publish: function(pubName, data) {
    if (this.pubsub[pubName]) {
      this.pubsub[pubName].forEach(function(fn) {
        fn(data);
      });
    }
  }
};

/**
 * --------------------------------------------------------------------------
 * BREAKPOINTS
 * --------------------------------------------------------------------------
 */

APP.utilities.breakpoints = (function() {

  // --------------------------------------------------------------------------
  // Get HTML body::before pseudoelement content.
  // It should be include-media variable, eg. '(sm: 576px, md: 768px, lg: 992px, xl: 1200px)'

  var data = window.getComputedStyle(document.body, '::before').getPropertyValue('content').replace(/[\"\'\s]/g, '');

  // Cut the (brackets)
  data = data.slice(1, -1);

  // Split data by comma
  var dataArr = data.split(',');
  dataArr.unshift('zero:0px');

  // --------------------------------------------------------------------------

  function checkBreakpoint() {

    dataArr.forEach(function(val, i) {

      var breakpoint = val.split(':');
      var breakpointName = breakpoint[0];
      var currValue = breakpoint[1].slice(0, -2);

      if (i !== dataArr.length - 1) {
        var nextValue = dataArr[i + 1].split(':')[1].slice(0, -2) - 1;
      }

      if (i === 0) {
        var query = window.matchMedia('screen and (max-width: ' + nextValue + 'px)');
      } else if (i === dataArr.length - 1) {
        var query = window.matchMedia('screen and (min-width: ' + currValue + 'px)');
      } else {
        var query = window.matchMedia('screen and (min-width: ' + currValue + 'px) and (max-width: ' + nextValue + 'px)');
      }

      query.addListener(change);

      function change() {
        query.matches ? APP.utilities.pubsub.publish('breakpoint', [breakpointName, currValue]) : null;
      }
      change();

    });
  }

  checkBreakpoint();

  // --------------------------------------------------------------------------
  // Return

  return {
    check: checkBreakpoint
  }

})();


/**
 * --------------------------------------------------------------------------
 * MODULES
 * --------------------------------------------------------------------------
 *
 * Load specific to the project modules
 */

var sampleModule = (function() {

  $('.menu-trigger').on('click', function(e) {
    e.preventDefault();
    var target = $(this).data('target');
    $(this).toggleClass('active');
    $('.header__box').toggleClass('active');
    $('#' + target).toggle();
    $('body').toggleClass('lock');
  });

  $('.header__box').on('click', function(e) {
    e.stopPropagation();
  });

  $('html').on('click', function() {
    $('#menu-mobile').hide();
  });

  document.addEventListener("touchstart", function() {}, true);


})();

var mobile = (function() {

  $('.slider').slick({
    arrows: false,
    dots: true,
    autoplay: false,
    autoplaySpeed: 5000,
    speed: 1000,
    pauseOnHover: false,
    slidesToScroll: 1,
    slidesToShow: 3,
    responsive: [{
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });


})();


APP.utilities.view = (function() {

  // --------------------------------------------------------------------------
  // Cache DOM

  var $code = $('#breakpoint');

  // --------------------------------------------------------------------------
  // Bind events

  APP.utilities.pubsub.subscribe('breakpoint', setDeviceInfo);

  // --------------------------------------------------------------------------
  // Functions

  function setDeviceInfo(value) {
    $code.text(value[0]+', min-width: '+ value[1] +'px');
  }

  APP.utilities.breakpoints.check();

})();

$('.header__button').click(function() {
  if($(window).innerWidth() < 1200) {
    if($('.menu').hasClass('active')) {
      $('.menu').removeClass('active');
      $('.header').css('position', '');
      $('.menu__item').removeClass('active');
      $('.header__icon').html('&#xea0d;');
    } else {
      $('.menu').addClass('active');
      $('.header__icon').html('&#xe88d;');
      $('.header').css('position', 'relative');
      $(window).scrollTop(0);
    }
  } else {
    return;
  }
});



$('.menu__item').click(function() {
  if ($(window).innerWidth() < 1200) {
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
    } else {
      $('.menu__item').removeClass('active');
      $(this).addClass('active');
    }
  } else {
    return;
  }
});

$('.sublist__item').click(function() {
  $(this).parent('.menu__item').removeClass('active');
  $('.menu').removeClass('active');
  $('.header__icon').html('&#xea0d;');    
});



$('.header__search').click(function() {
  if($(window).innerWidth() >= 1200) {
  $('.menu').removeClass('active');
  if ($('.header__searchIcon').hasClass('opened')) {
    $('.header__searchIcon').removeClass('opened');
    $('.search__prompt').css('display', '');
    $('.header__input')[0].value = '';
    $('.header__form').css('display', '');
    $('.menu').css('display', '');
  } else {
    $('.header__searchIcon').addClass('opened');
    $('.menu').css('display', 'none');
    
    $('.header__searchIcon').html('<i class="fa fa-times></i>');
    $('.header__form').css('display', 'block');
  } 
} else {
    $('.menu').removeClass('active');
    if ($('.header__searchIcon').hasClass('opened')) {
      $('.header__searchIcon').removeClass('opened');
      $('.search__prompt').css('display', '');
      $('.header__input')[0].value = '';
      $('.header__form').css('display', '');
      $('.header__brand').css('display', '');
      $('.header__navbutton').css('display', '');
      $('.menu').css('display', '');
      $('.header__icon').html('<i class="fa fa-bars></i>');
      $('.header__searchIcon').html('<i class="fa fa-search></i>');
    } else {
      $('.header__searchIcon').addClass('opened');
      $('.header__brand').css('display', 'none');
      $('.header__navbutton').css('display', 'none');
      $('.header__searchIcon').html('<i class="fa fa-times></i>');
      $('.header__form').css('display', 'block');
      $('.header__icon').html('<i class="fa fa-bars></i>');
    }
  }
});
if ($(window).innerWidth() >= 768) {

}
$('.menu__item').mouseover(function() {
  if ($(window).innerWidth() >= 768) {
    $(this).children('.sublist').css('display', 'block');
    $(this).children('.menu__link').css('color', '#F7991C');
  }
});



$('.menu__item').mouseout(function() {
  if ($(window).innerWidth() >= 768) {
    $(this).children('.sublist').css('display', 'none');
    $(this).children('.menu__link').css('color', '');
  }
});

$('.menu__item').click(function() {
  if ($(window).innerWidth() >= 768) {
    if ($(this).children('.sublist').css('display') == 'block') {
      $(this).children('.sublist').css('display', 'none');
      $(this).children('.menu__link').css('color', '');
    } else {
      $(this).children('.sublist').css('display', 'block');
      $(this).children('.menu__link').css('color', '#F7991C');
    }
  }
});
    
  

function keyPressed(input) {
  input.preventDefault();
  if ($('.header__searchIcon').hasClass('opened')) {
    if($('.header__input')[0].value.length == 0) {
      $('.search__prompt').slideUp();
    } else {
      input.preventDefault();
      $('.search__prompt').slideDown();
    }
  }
}


$('.search__item').click(function(e) {
  $('.header__input')[0].value = $(this).text();
});


function setMenuDisplay() {
  

  if ($(window).innerWidth() >= 768 && $('.header__searchIcon').hasClass('opened')) {
    $('.menu').css('display', 'none').removeClass('active');
    $('.header__brand').css('display', 'block');
    $('.header__navbutton').css('display', '');
    $('.header__icon').html('&#xea0d;');
  } else if ($(window).innerWidth() >= 768 && !$('.header__searchIcon').hasClass('opened')) {
    $('.menu').css('display', '').removeClass('active');
    $('.header__brand').css('display', '');
    $('.header__navbutton').css('display', '');
    $('.header__icon').html('&#xea0d;');
  } else if ($(window).innerWidth() < 768 && $('.header__searchIcon').hasClass('opened')) {
    $('.menu').css('display', '').removeClass('active');
    $('.header__brand').css('display', 'none');
    $('.header__navbutton').css('display', 'none');
    $('.header__icon').html('&#xea0d;');
  } else {
    $('.menu').css('display', '');
    $('.header__brand').css('display', '');
    $('.header__navbutton').css('display', '');
  }
}


window.addEventListener('keyup', keyPressed);

window.addEventListener('resize', setMenuDisplay);