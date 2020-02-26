var db = new Object();
db.preLoad = function () {
    $('.page-preload').delay(400).fadeOut(200, function () {
        $('body').fadeIn();
    });
}



db.select = function () {

    if ($('.select-one').length) {


        $('.select-one').select2();
        var flg = 0;
        $('.select-one').on("select2:open", function () {
            flg++;
            if (flg == 1) {
                $(".select2-results").append("<div class='ss-button'><a href='#'>فـضأ ناونـع دـج</a> </div>");
            }

        });
    }
    if ($('.select-two').length) {


        $('.select-two').select2();
        var flg1 = 0;
        $('.select-two').on("select2:open", function () {
            flg1++;
            if (flg1 == 1) {
                $(".select2-results").append("<div class='ss-button'><a href='#'>فـضأ ناونـع دـج</a> </div>");
            }

        });
    }
}


db.setupFloatLabels = function () {
    // Check the inputs to see if we should keep the label floating or not
    $('.field input').not('button').on('blur', function () {
        // Different validation for different inputs
        switch (this.tagName) {
            case 'SELECT':
                if (this.value > 0) {
                    $(this).addClass('hasInput');
                } else {
                    $(this).removeClass('hasInput');
                }
                break;
            case 'INPUT':
                if (this.value !== '') {
                    $(this).addClass('hasInput');
                } else {
                    $(this).removeClass('hasInput');
                }
                break;
            default:
                break;
        }
    });
    $('.field textarea').on('blur', function () {
        // Different validation for different inputs
        if (this.value !== '') {
            $(this).addClass('hasInput');
        } else {
            $(this).removeClass('hasInput');
        }
    });
    return false;

    $('.field select').on('blur', function () {
        // Different validation for different inputs
        if (this.value !== '') {
            $(this).addClass('hasInput');
        } else {
            $(this).removeClass('hasInput');
        }
    });
    return false;
}




db.menuResponsive = function () {
    $('.menu-icon').on('click', function (e) {
        e.stopPropagation();
        $('body').toggleClass("open-menu");
    });


    $('.search-form').on('click', function (e) {
        e.stopPropagation();
        var p = $(this).parent();

        if ($(p).hasClass("show-search")) {} else {
            $(p).addClass("show-search");

        }
    });
    $('.search-suggestion').on('click', function (e) {
        e.stopPropagation();

        $('.search').removeClass("show-search");


    });


}
db.goStep = function () {
    $('.btn-go-step2').on('click', function (e) {

        $('.step1').slideUp();

        setTimeout(function () {
            $('html,body').animate({
                scrollTop: $('.step-item2').offset().top
            }, '3000');
        }, 800);

        setTimeout(function () {
            $('.step2').slideDown();
        }, 1000);

        $('.step-item1').removeClass("active").addClass("done");
        $('.step-item2').addClass("active");




    });

    $('.btn-go-step3').on('click', function (e) {
        $('.step2').slideUp();

        setTimeout(function () {
            $('html,body').animate({
                scrollTop: $('.step-item3').offset().top
            }, '3000');
        }, 800);

        setTimeout(function () {
            $('.step3').slideDown();
        }, 1000);


        $('.step-item2').removeClass("active").addClass("done");
        $('.step-item3').addClass("active");

    });

    $('.sf-control a').on('click', function (e) {

        $('.step3').slideUp();

        setTimeout(function () {
            $('html,body').animate({
                scrollTop: $('.step-item4').offset().top
            }, '3000');
        }, 800);

        setTimeout(function () {
            $('.step4').slideDown();
        }, 1000);

        $('.step-item3').removeClass("active").addClass("done");
        $('.step-item4').addClass("active");

    });

    $('.btn-go-step5').on('click', function (e) {

        $('.step4').slideUp();

        setTimeout(function () {
            $('html,body').animate({
                scrollTop: $('.step-item5').offset().top
            }, '3000');
        }, 800);

        setTimeout(function () {
            $('.step5').slideDown();
        }, 1000);
        $('.step-item4').removeClass("active").addClass("done");
        $('.step-item5').addClass("active");


    });

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
            580: {
                items: 2,

            },
            700: {
                items: 3,

            },
            1200: {
                items: 5,


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

db.stepSlider();
db.menuResponsive();
db.select();
db.goStep();

db.setupFloatLabels();


new WOW({
    offset: 100,
    mobile: true
}).init();
