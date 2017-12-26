(function ($) {


    $(document).on('ready', function () {

        "use strict";

        /**Preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();

        });


        //mathHeight
        $('.book-item').matchHeight();

        $('.nav-icon').click(function () {
            $(this).toggleClass('open');
            $('body').toggleClass("open-menu");
        });
        /**Menu**/


        $('.menu-res li.has-child').on('click', function (event) {
            event.stopPropagation();
            var submenu = $(this).find(" > ul");
            if ($(submenu).is(":visible")) {
                $(submenu).slideUp();
                $(this).removeClass("open-submenu-active");
            } else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });

        $('.menu-res li.menu-item-has-children > a').on('click', function () {
            //  return false;
        });


        //Reading page

        if ($('.api').length) {

            if (window.innerWidth <= 768) {
                var split = Split(['#slpit-one', '#slpit-two'], {
                    sizes: [50, 50],
                    minSize: 0,
                    direction: 'vertical',
                    onDrag: function () {
                        $(".split-item").getNiceScroll().resize();
                    },



                });

            } else {
                var split = Split(['#slpit-one', '#slpit-two'], {
                    sizes: [50, 50],
                    minSize: 0,
                    onDrag: function () {
                        $(".split-item").getNiceScroll().resize();
                    },



                });

            }
            setTimeout(function () {
                $(".split-item").getNiceScroll().resize();
            }, 400);

        }
        //split
        $(".split-item").niceScroll({
            autohidemode: 'false'
        });

        $('.qp-items').niceScroll({
            autohidemode: 'true'
        });

        $('.rf-button-pallete').click(function () {

            if ($('.question-panel').is(':visible')) {
                $('.question-panel').removeClass("show");

            } else {
                $('.question-panel').addClass("show");
                $('.qp-items').getNiceScroll().resize();

            }

        });

        $('.show-test-menu').click(function () {
            $('.reading-header').toggleClass("show-test");


            if ($('.reading-header').hasClass("show-test")) {
                $(this).html(" <em></em>  Hide Test Info");
            } else {
                $(this).html(" <em></em>  Show Test Info");
            }
        });

        if ($('.api').length) {
            $(window).bind('resize', function () {
                var width = window.innerWidth;
                var check = false;
                if (width <= 768) {
                    check = true;

                } else {
                    check = false;

                }
                if (check) {
                    split.destroy();
                    split = Split(['#slpit-one', '#slpit-two'], {
                        sizes: [50, 50],
                        minSize: 20,
                        direction: 'vertical',
                        onDrag: function () {
                            $(".split-item").getNiceScroll().resize();
                        },
                    });

                } else {
                    split.destroy();
                    split = Split(['#slpit-one', '#slpit-two'], {
                        sizes: [50, 50],
                        minSize: 20,
                        onDrag: function () {
                            $(".split-item").getNiceScroll().resize();
                        },
                    });

                }
            }).trigger('resize');

        }




        //listing page

        $('#qp-afix').affix({
            offset: {
                top: 290,
                bottom: function () {
                    return (this.bottom = $('.footer').outerHeight(true) + 100)
                }
            }
        })

        //show-nodepad
        $('.btn-show-note').click(function () {

            var id = $(this).attr("data-id");
            if ($(id).is(":visible")) {
                $(id).slideUp();
                $(this).removeClass("active");
                $(this).html(" <strong></strong> Show Notepad");

            } else {

                $(id).slideDown();
                $(this).addClass("active");
                $(this).html(" <strong></strong> Hide Notepad");
            }


        });

        //text-size
        $('.btn-textsize').click(function () {
            $('body').addClass("text-big");

        });


        //tips page


        var owl_tip = $('.owl-tip')
        $(owl_tip).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 8000,
            items: 1


        });

        //analytics page
        if ($('.datetimepicker').length) {
            $(function () {
                $('.datetimepicker').datetimepicker({
                    format: 'DD/MM/YYYY'
                });
            });
        }

        //show-performance
        $('.btn-show-performance').click(function () {


            if ($(this).parents(".item-score").find(".box-performance").is(":visible")) {
                $(this).parents(".item-score").find(".box-performance").slideUp();
                $(this).removeClass("active");

            } else {

                $(this).parents(".item-score").find(".box-performance").slideDown();
                $(this).addClass("active");
            }


        });

        //homepage

        var owl_say = $('.owl-say')
        $(owl_say).owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            autoplay: true,
            autoplayTimeout: 8000,
            responsive: {
                0: {
                    items: 1,

                },
                768: {
                    items: 2,

                },
                1000: {
                    items: 3,

                }
            }


        });

        $('.carousel').carousel({
            directionNav: false,
            buttonNav: 'bullets',
            slidesPerScroll: 5,
            top: 10,
            hMargin: 0.1,
            frontWidth: 500,
            autoplayInterval: 3000,
            description: true,
            pauseOnHover: false,
            descriptionContainer: '.description'
        });


        //set progesss
        var setProcess = function (id, number) {

            $(id).removeClass(function (index, className) {
                return (className.match(/(^|\s)progress-\S+/g) || []).join(' ');
            });
            var newClass = "progress-" + number;
            $(id).addClass(newClass);

        };
        setProcess("#progress-small", 75);
        setProcess("#progress-big", 40);


        //show-re
        $('.btn-show-re').click(function () {
            $('body').addClass("show-review-explanation");
            $(".split-item").getNiceScroll().resize();
        });
        //close-re
        $('.close-rx').click(function () {
            $('body').removeClass("show-review-explanation");
        });




        //build-pofile
        $('.pb-choose span').click(function () {

            $('.pb-choose span').removeClass("active");
            $(this).addClass("active");
            $('.bo-im span').html($(this).text());


        });

        $('.step2-choose').click(function () {

            var current = $(this).next(".ts2-item-wrap");
            $('.ts2-item-wrap').not(current).slideUp();
            if ($(this).next(".ts2-item-wrap").is(":visible")) {

            } else {
                $(this).next('.ts2-item-wrap').slideDown();
            }



            $('.step2-choose').removeClass("active");
            $(this).addClass("active");




        });


    });
})(jQuery);
