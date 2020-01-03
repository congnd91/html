$(document).ready(function () {

    /*$('.header').on('click', function (e) {
    alert("s");
    $('.nav-tabs a[href="#deals-investments"]').tab('show');
});*/

});

(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });


            $(function () {
                var hash = window.location.hash;

                $('.nav-tabs a[href="' + hash + '"]').tab('show');

                if (hash.length > 10) {
                    $("html, body").delay(1000).animate({
                        scrollTop: $('.main-tab').offset().top - 100
                    }, 1000)
                }


                $('.nav-tabs a').click(function (e) {
                    window.location.hash = this.hash;

                });
            });
            $('.link-business-services').click(function () {

                $('.nav-tabs a[href="#business-services"]').tab('show');
                $("html, body").animate({
                    scrollTop: $('.main-tab').offset().top - 100
                }, 0)
                return false;
            });
            $('.link-deals-investments').click(function () {

                $('.nav-tabs a[href="#deals-investments"]').tab('show');
                $("html, body").animate({
                    scrollTop: $('.main-tab').offset().top - 100
                }, 0)
                return false;
            });


            $('input:radio[name=r1]').change(function () {
                if (this.value == 'yes') {
                    $('.date-form').show();

                } else if (this.value == 'no') {
                    $('.date-form').hide();

                }
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
        db.datePicker = function () {
            if ($('#date-picker').length) {
                $('#date-picker').daterangepicker({
                    "singleDatePicker": true,
                    "startDate": moment(),
                    "endDate": "11/13/2019"
                }, function (start, end, label) {
                    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
                });
            }
        }
        db.preLoad();
        db.homeSlider();
        db.menuResponsive();
        db.aboutMenu();
        db.matchHeight();
        db.datePicker();
    });
})(jQuery);
