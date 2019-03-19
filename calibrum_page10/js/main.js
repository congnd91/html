(function ($) {
    $(document).on('ready', function () {
        var db = new Object();


        db.showBoxComment = function () {

            $('.rri-comment').click(function () {

                $('.rri-comment').removeClass("active");

                $(".rri-write-comment-box").hide();
                $('.rri-write-comment').removeClass("active");
                var content = $(this).parents(".ri-option").find('.rri-comment-box');

                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("active");
                } else {
                    $(content).show();
                    $(this).addClass("active");
                }


            });

            $('.rri-write-comment').click(function () {

                $('.rri-write-comment').removeClass("active");


                $('.rri-comment').removeClass("active");

                $(".rri-comment-box").hide();
                $('.rri-comment').removeClass("active");
                var content = $(this).parents(".ri-option").find('.rri-write-comment-box');

                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("active");
                } else {
                    $(content).show();
                    $(this).addClass("active");
                }


            });

        }

        db.showBoxComment();


    });
})(jQuery);
