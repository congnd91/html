(function ($) {
    $(document).on('ready', function () {





        var db = new Object();



        db.dropdown = function () {
            $('.dropdown').on('click', function () {
                $(this).toggleClass("is-active");
            });
        }
        db.addLotSelected = function () {
            $('.al-item').on('click', function () {
                $(this).toggleClass("selected");
            });
        }




        db.dropdown();
        db.addLotSelected();



    });
})(jQuery);
