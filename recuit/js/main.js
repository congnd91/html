(function ($) {
  $(document).on('ready', function () {
    var db = new Object();
    db.preLoad = function () {
      $('#page-loader').delay(800).fadeOut(600, function () {
        $('body').fadeIn();
      });
    }



    db.closeBox = function () {
      $('.confirm-box .close').on('click', function (e) {
        $('.confirm-box').hide();
      });
      $('.alert-box .close').on('click', function (e) {
        $('.alert-box').hide();
      });
      $('.hide-control').on('click', function (e) {
        $('.alert-box').hide();
        return false;
      });
      $('.control .star').on('click', function (e) {
        $(this).toggleClass("active");
      });
      $(".wrap-input input").keyup(function () {
        if ($(this).val().trim().length > 0) {
          $(this).parent().addClass("has-text");

        }
      });
      $(".wrap-input .clear").click(function (e) {
        $(this).parent().find(".input").val("");
        $(this).parent().removeClass("has-text");

        $(this).parents('.wrap-input').find("label.error").hide();
        $(this).parents('.wrap-input').find(".error").removeClass("error");


      });


      $('.button-apply-now').on('click', function (e) {

        $('.apply-form').show();
        return false;

      });
      //**

      $('.wrap-tooltip .input').on('click', function (e) {
        $('.tooltip-box').show();
      });
      $('.close-tooltip').on('click', function (e) {
        $('.tooltip-box').hide();
      });

      //**

      $(document).on('click', '.cb-list .item .close-item', function (e) {
        $(this).parent().hide();

      });

      //

      $('body').on('click', function (e) {

        $('.share-dropdown').hide();

      });

      $('.dots-share').on('click', function (e) {
        e.stopPropagation();

        var x = $('.share-dropdown');
        if ($(x).is(":visible")) {

          $(x).hide();
        } else {
          $(x).show();
        }
      });

      //
      $('body').on('click', function (e) {

        $('.dot-dropdown').hide();

      });

      $('.dots-control .dots').on('click', function (e) {
        $('.box-d').hide();
        $('.dot-dropdown').hide();
        e.stopPropagation();

        var x = $(this).parent().find('.dot-dropdown');
        if ($(x).is(":visible")) {

          $(x).hide();
        } else {
          $(x).show();
        }
      });




      $('.d-share').on('click', function (e) {
        $('.box-d').hide();
        var x = $(this).parents('.dots-control').find('.box-d-share');
        if ($(x).is(":visible")) {
          $(x).hide();
        } else {
          $(x).show();
        }
      });

      $('.d-flag').on('click', function (e) {
        $('.box-d').hide();
        $(this).parent().hide();
        var x = $(this).parents('.dots-control').find('.box-d-flag');
        if ($(x).is(":visible")) {
          $(x).hide();
        } else {
          $(x).show();
        }
      });

      $('.d-tool').on('click', function (e) {
        $('.box-d').hide();
        $(this).parent().hide();
        var x = $(this).parents('.dots-control').find('.box-d-tool');
        if ($(x).is(":visible")) {
          $(x).hide();
        } else {
          $(x).show();
        }
      });


      $('.d-close').on('click', function (e) {
        $(this).parent().hide();

      });



      //
      $('.re-item .close').on('click', function (e) {

        $(this).parents('.re-item').hide();
      });


    }
    db.validate = function () {
      if ($('.form-opportunities').length) {
        $('.form-opportunities').validate();
      };
      if ($('.form-contact').length) {
        $('.form-contact').validate();
      };
      if ($('.form-apply').length) {
        $('.form-apply').validate();
      };
      if ($('.form-modal').length) {
        $('.form-modal').validate();
      };
      if ($('.form-follow').length) {
        $('.form-follow').validate();
      };
      if ($('.form-share').length) {
        $('.form-share').each(function () {
          $(this).validate();
        });
      };
      // $('.form-share').validate();

      if ($('.form-create-alert').length) {
        $('.form-create-alert').each(function () {
          $(this).validate();
        });
      };



    }

    db.addJob = function () {

      $('.interested p').click(function () {
        $(this).hide();
        $('.cb-list').append('<div class="item"><div class="icon"></div> <span>' + $(this).text() + '</span><div class="close-item"><i class="fas fa-times"></i</div></div>')

      });


    }

    db.scroll = function () {

      // Hide Header on on scroll down
      var didScroll;
      var lastScrollTop = 0;
      var delta = 5;
      var navbarHeight = $('.fix-button-alert').outerHeight();

      $(window).scroll(function (event) {
        didScroll = true;
      });

      setInterval(function () {
        if (didScroll) {
          hasScrolled();
          didScroll = false;
        }
      }, 250);

      function hasScrolled() {
        var st = $(this).scrollTop();

        // Make sure they scroll more than delta
        if (Math.abs(lastScrollTop - st) <= delta)
          return;

        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if (st > lastScrollTop && st > navbarHeight) {
          // Scroll Down
          $('.fix-button-alert').removeClass('nav-down').addClass('nav-up');
        } else {
          // Scroll Up
          if (st + $(window).height() < $(document).height()) {
            $('.fix-button-alert').removeClass('nav-up').addClass('nav-down');
          }
        }

        lastScrollTop = st;
      }


    }

    db.menuMobile = function () {
      $('.menu-icon').on('click', function () {
        $('body').addClass("open-menu-mobile");
      });
      $('.close-menu-mobile').on('click', function () {
        $('body').removeClass("open-menu-mobile");
      });


    }
    db.search = function () {
      $('body').on('click', function () {
        $('.header').removeClass("show-search");
      });

      $('.back').on('click', function () {
        $('.header').removeClass("show-search");
      });
      $('.search-header .title input').on('focus', function (e) {
        $('.header').addClass("show-search");

        //close dropdown

        $('.user-dropdown .dropdown-menu').removeClass("show");

      });
      $('.header').on('click', function (e) {
        e.stopPropagation();
      });
      $('.ui-menu').on('click', function (e) {
        e.stopPropagation();
      });
      $(".input-wrap input").keyup(function () {
        if ($(this).val().trim().length > 0) {
          $(this).parent().addClass("has-text");
        }
      });
      $(".input-wrap .clear").click(function (e) {
        $(this).parent().find("input").val("");
        $(this).parent().removeClass("has-text");
      });
    }
    db.menuLeft = function () {
      $('.box .box-caption').click(function () {
        var content = $(this).parent().find(".box-content");
        if ($(content).is(":visible")) {
          $(content).hide();
          $(this).parent().removeClass("active");
        } else {
          $(content).show();
          $(this).parent().addClass("active");
        }
        return false;
      });
    }
    db.popup = function () {
      $('.mb-item-inner').click(function () {
        var overlay = $(this).next();
        if ($(overlay).is(":visible")) {
          $(overlay).hide();
        } else {
          $(overlay).show();
        }
      });
      $('.mb-overlay').click(function () {
        $('.mb-overlay').hide();
      });
      $('.mb-overlay .mb-box').click(function (e) {
        e.stopPropagation();
      });
      $('.mb-overlay .mb-box ul li a').click(function (e) {
        $('.mb-overlay').hide();
      });
      $('.mb-close').click(function (e) {
        $('.mb-overlay').hide();
      });
      if ($('.db-mobile-bar').length) {
        const slider = document.querySelector('.db-mobile-bar .db-scroll');
        let isDown = false;
        let startX;
        let scrollLeft;
        slider.addEventListener('mousedown', (e) => {
          isDown = true;
          slider.classList.add('active');
          startX = e.pageX - slider.offsetLeft;
          scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
          isDown = false;
          slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
          isDown = false;
          slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
          if (!isDown) return;
          e.preventDefault();
          const x = e.pageX - slider.offsetLeft;
          const walk = (x - startX) * 3; //scroll-fast
          slider.scrollLeft = scrollLeft - walk;
          //	console.log(walk);
        });
      };
      if ($('.db-cities').length) {
        const slider1 = document.querySelector('.db-cities .db-scroll');
        let isDown1 = false;
        let startX1;
        let scrollLeft1;
        slider1.addEventListener('mousedown', (e) => {
          isDown1 = true;
          slider1.classList.add('active');
          startX1 = e.pageX - slider1.offsetLeft;
          scrollLeft1 = slider1.scrollLeft;
        });
        slider1.addEventListener('mouseleave', () => {
          isDown1 = false;
          slider1.classList.remove('active');
        });
        slider1.addEventListener('mouseup', () => {
          isDown1 = false;
          slider1.classList.remove('active');
        });
        slider1.addEventListener('mousemove', (e) => {
          if (!isDown1) return;
          const x1 = e.pageX - slider1.offsetLeft;
          const walk1 = (x1 - startX1) * 3; //scroll-fast
          slider1.scrollLeft = scrollLeft1 - walk1;
        });
      };
      if ($('.list-companies').length) {
        const slider2 = document.querySelector('.list-companies .scroll');
        let isDown2 = false;
        let startX2;
        let scrollLeft2;
        slider2.addEventListener('mousedown', (e) => {
          isDown2 = true;
          slider2.classList.add('active');
          startX2 = e.pageX - slider2.offsetLeft;
          scrollLeft2 = slider2.scrollLeft;
        });
        slider2.addEventListener('mouseleave', () => {
          isDown2 = false;
          slider2.classList.remove('active');
        });
        slider2.addEventListener('mouseup', () => {
          isDown2 = false;
          slider2.classList.remove('active');
        });
        slider2.addEventListener('mousemove', (e) => {
          if (!isDown2) return;
          const x2 = e.pageX - slider2.offsetLeft;
          const walk2 = (x2 - startX2) * 3; //scroll-fast
          slider2.scrollLeft = scrollLeft2 - walk2;
        });
      };


      if ($('.db-refined').length) {
        const slider4 = document.querySelector('.db-refined .db-scroll');
        let isDown4 = false;
        let startX4;
        let scrollLeft4;
        slider4.addEventListener('mousedown', (e) => {
          isDown4 = true;
          slider4.classList.add('active');
          startX4 = e.pageX - slider4.offsetLeft;
          scrollLeft4 = slider4.scrollLeft;
        });
        slider4.addEventListener('mouseleave', () => {
          isDown4 = false;
          slider4.classList.remove('active');
        });
        slider4.addEventListener('mouseup', () => {
          isDown4 = false;
          slider4.classList.remove('active');
        });
        slider4.addEventListener('mousemove', (e) => {
          if (!isDown4) return;
          const x4 = e.pageX - slider4.offsetLeft;
          const walk4 = (x4 - startX4) * 3; //scroll-fast
          slider4.scrollLeft = scrollLeft4 - walk4;
        });
      };
    }
    db.filterMobile = function () {
      $('.db-icon-filter').click(function () {
        $("body").addClass("show-filter-mobile");
      });
      $('.fm-caption .close').click(function () {
        $("body").removeClass("show-filter-mobile");
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
    db.preLoad();
    db.menuMobile();
    db.search();
    db.menuLeft();
    db.popup();
    db.filterMobile();
    db.closeBox();
    db.validate();
    db.addJob();
    db.scroll();
    // db.menuResponsive();
    // db.dropdownMenu();
    // db.partnerSlider();
    //  db.popup();
  });
})(jQuery);
