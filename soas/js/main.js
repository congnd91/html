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






        }
        db.homeSlider = function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }



        db.aboutMenu = function () {
            $('.about-bar span').on('click', function (event) {
                var id = $(this).attr("data-id");
                $('.about-bar span').removeClass("active");
                $(this).addClass("active");

                $('.about-block').hide();
                $("#" + id).show();


            });





        }







        db.matchHeight = function () {
            if ($('.service-item').length) {
                $('.service-item').matchHeight();

            }




        }




        db.preLoad();
        db.homeSlider();
        db.menuResponsive();
        db.aboutMenu();
        db.matchHeight();


    });
})(jQuery);
