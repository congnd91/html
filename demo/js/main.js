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


        db.stepSelected = function () {
            $('.step-item .dot').on('click', function () {
                $(this).parent().toggleClass("active");
            });
        }

        db.accodion = function () {
            $('.accordion-title').on('click', function () {

                var content = $(this).next();

                if ($(content).is(":visible")) {

                    $(content).slideUp();
                    $(this).addClass("active");
                } else {
                    $(content).slideDown();
                    $(this).removeClass("active");
                }

            });
        }



        db.dropdown();
        db.addLotSelected();
        db.stepSelected();
        db.accodion();






    });
})(jQuery);
