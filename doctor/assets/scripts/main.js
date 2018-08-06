(function ($) {
    $(document).on('ready', function () {
        /**preload**/
        $('#page-loader').delay(800).fadeOut(600, function () {
            $('body').fadeIn();
        });


        /**menu mobile**/
        $('.menu-icon').on('click', function () {
            $('body').toggleClass("open-menu");
        });




        var owl_home = $('.owl-home');
        if ($(owl_home).length) {
            $(owl_home).owlCarousel({
                loop: true,
                animateOut: 'fadeOut',
                margin: 0,
                nav: false,
                autoplay: false,
                items: 1,


            });
        }


        $('.box-lk-caption').on('click', function () {
            $('.box-lk').toggleClass("show");
        });
        /**-form**/

        if ($("#register-form").length) {
            $("#register-form").validate();
        }

        $(function () {
            $('#datepicker').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });

    });
})(jQuery);
