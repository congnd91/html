(function ($) {
    $(document).on('ready', function () {

        "use strict";
    
   
        $(window).scroll(function () {
            if ($(this).scrollTop()>200) {
                $('.back-top').fadeIn();
            } else {
                $('.back-top').fadeOut();
            }
        });

        $(".back-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 1000);
        });

        /**Menu Mobile**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
        });
        $('.menu-res li.menu-item-has-children').on('click', function () {
        
            var submenu = $(this).find("ul");
            if ($(submenu).is(":visible")) {
                $(submenu).slideUp();
                $(this).removeClass("open-submenu-active");
            }
            else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });

        $('.menu-res li.menu-item-has-children > a').on('click', function () {
            return false;
        });


        /**Sportlight slider**/
        $('.owl-home').owlCarousel({
            loop: true,
            nav: true,
            items: 1,
            mouseDrag: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });

       
        
        /**Review slider**/
        $('.owl-product').owlCarousel({
            loop: true,
            nav: true,
            mouseDrag: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                350: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 3
                },
                991: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }


        });

        /**Review slider**/
        $(window).bind('resize', function () {
            if ($(window).width() <= 480) {
                $('.box-items-scroll').css("max-height", $(window).height() - 250);
            }
            else
                {
                $('.box-items-scroll').css("max-height", $(window).height() - 350);
            }

        
        }).trigger('resize');

      

        $(".box-items-scroll").niceScroll({ cursorcolor: "#00F" });
        $(".brand-left").niceScroll({ cursorcolor: "#00F" });

        /**Match Height Review Item**/
        if ($('.product-item').length) {
            $('.product-item').matchHeight();
        }

        $(".brand-char li span").hover(function () {
            var id = $(this).attr("data-id");
            $(".brand-left").scrollTop(0);
            $(".brand-left").scrollTop($("#" + id).offset().top - $('.brand-left').offset().top);
            // $(".brand-left").animate({ scrollTop: $('#brand-c').offset().top - $('.brand-left').offset().top }, 1000);
        });

        $(".brand-left").scroll(function () {

            // console.log($('#brand-a').offset().top - $('.brand-left').offset().top);

            // console.log($('#brand-a').height());

            $('.brand-name').each(function () {


                // console.log($(this).attr("id"));

                var top = $(this).offset().top - $('.brand-left').offset().top;
                if (top <= 0 && Math.abs($(this).offset().top - $('.brand-left').offset().top) < $(this).height()) {
                   // console.log($(this).attr("id"));
                    $('.brand-char li span').removeClass("active");

                    $(".brand-char li span[data-id=" + $(this).attr("id") + "]").addClass('active');
                }


            });
        });
    });
})(jQuery);