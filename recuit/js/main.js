(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
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


        db.partnerSlider = function () {
            var owl = $('.owl-partner');


            $(owl).owlCarousel({
                center: false,
                loop: false,
                margin: 0,
                responsive: {
                    0: {
                        items: 2,


                    },
                    769: {
                        items: 3,


                    },
                    992: {
                        items: 4,

                    }

                }

            });



        }

        db.popup = function () {
            $('.info-circle').on('click', function (e) {
                $(this).toggleClass("show");
            });


        }





        $(document).on('click', '.dropdown-menu', function (e) {
            e.stopPropagation();
        });

        db.preLoad();
        db.menuResponsive();
        db.dropdownMenu();
        db.partnerSlider();
        db.popup();

    });
})(jQuery);
