$(document).ready(function () {

    var db = new Object();
    db.preLoad = function () {

        $('.page-preload').delay(400).fadeOut(200, function () {
            $('body').fadeIn();
        });
    }
    db.menuResponsive = function () {
        $('.menu-icon').on('click', function (e) {
            e.stopPropagation();
            $('body').toggleClass("open-menu");
        });

    }
    db.closeAlert = function () {
        $('.close-alert').on('click', function (e) {
            e.stopPropagation();
            $(this).parent().hide();
        });


    }
    db.filter = function () {
        $('.filter-icon').on('click', function (e) {
            $('body').toggleClass('show-filter');
        });
        $('.close-lcf-left').on('click', function (e) {
            $('body').toggleClass('show-filter');
        });

    }
    db.checkboxFilter = function () {

        $('.filter-box input[type=checkbox]').change(function () {
            var pa = $(this).parents(".filter-box");

            var check = false;

            $(pa).find('input[type=checkbox]').each(function () {
                if ($(this).is(":checked")) {
                    check = true;
                    return;
                } else {

                }
            })
            if (check) {

                $(pa).addClass("has-check");
            } else {
                $(pa).removeClass("has-check");
            }
        });

        /*  var selected = [];
          $('.filter-box input[type=checkbox]').each(function () {
              if ($(this).is(":checked")) {
                  console.log("true");
              }
          });*/

    }
    db.accordion = function () {
        $('.accordion-caption').on('click', function (e) {

            var content = $(this).next();
            if ($(content).is(":visible")) {
                $(content).slideUp();
                $(this).removeClass("active");
            } else {
                $(content).slideDown();
                $(this).addClass("active");

            }
        });

    }


    $("#demo").freshslider({
        range: true,
        step: 1,
        text: true,
        min: 0,
        max: 100,
        // unit: none,
        enabled: true,
        value: [4, 60],
        onchange: function (low, high) {}

    });
    setTimeout(function () {
        $('.fb-content').hide();
    }, 50);









    db.preLoad();
    db.menuResponsive();
    db.accordion();
    db.closeAlert();
    db.filter();
    db.checkboxFilter();

});
