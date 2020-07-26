$(document).ready(function () {
  $('.mb-item-inner').click(function (e) {
    var overlay = $(this).next();
    if ($(overlay).is(":visible")) {

    } else {
      $(overlay).show();
    }
  });
  $('.mb-overlay').click(function (e) {

    if (e.target !== e.currentTarget) {

    } else {
      $('.mb-overlay').hide();
    }
  });
  $('.mb-overlay .mb-box ul li a').click(function (e) {
    $('.mb-overlay').hide();

  });
  $('.mb-close').click(function (e) {
    $('.mb-overlay').hide();

  });

  $('.db-icon-filter').click(function () {
    $("#content").css({
      "position": "fixed",
      "left": "250px"
    });
  });

  $('.btn-close-flyout').click(function () {
    $("#content").css({
      "position": "unset",
      "left": "unset"
    });
  });

  $('.acc-caption').click(function () {

    var content = $(this).next();
    if ($(content).is(":visible")) {
      $(this).removeClass("active");
      $(content).hide();

    } else {

      $(content).show();
      $(this).addClass("active");
    }
  });



  /*  const slider = document.querySelector('.db-mobile-bar .db-scroll');
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
        console.log(walk);
    });



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

    });*/



});
