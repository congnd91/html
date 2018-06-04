



new WOW().init();

$(document).ready(function () {
    $(function () {
        $('#dl-menu').dlmenu();
    });
    $('.bxslider').bxSlider({
         auto: true,
         mode: "fade",
        pause:8000,
        autoControls: true
    });

    $('.owl-links').owlCarousel({
        loop: true,
        nav: false,
        mouseDrag: true,
        margin:30,
        responsive: {
            0: {
                items: 1
            },
            350: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            991: {
                items: 4
            },

        }

    });
    $('.owl-news').owlCarousel({
        loop: false,
        nav: true,
        items: 1,
        mouseDrag: true,
        navText: ["<i class='fa fa-caret-left'></i>", "<i class='fa fa-caret-right'></i>"]

    });
   
    


    

    /**Menu responsive**/
    $('.icon-menu').click(function () {
      
        if ($('body').hasClass("open-menu")) {
            $('body').removeClass("open-menu");
        }
        else {
            $('body').addClass("open-menu");
        }
    });

    $('.close-menu').click(function () {

        if ($('body').hasClass("open-menu")) {
            $('body').removeClass("open-menu");
        }
        else {
            $('body').addClass("open-menu");
        }
    });

   
   


   
   




 


    $('.backtotop').fadeOut();
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('.backtotop').fadeIn();
        } else {
            $('.backtotop').fadeOut();
        }

    });

    $(".backtotop").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);

    });
   

    

});
