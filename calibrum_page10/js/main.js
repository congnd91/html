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


            $('.bmi-caption h3 i').click(function () {

                $('.bmi-caption h3 i').removeClass("active");


                //$(".bmi-info").hide();


                var content = $(this).parents(".bmi-caption").find('.bmi-info');

                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("active");
                } else {
                    $(content).show();
                    $(this).addClass("active");
                }


            });



            $('.ho-comment').on("click", function () {

                if ($(this).hasClass("active")) {
                    $(".ho-comment-box").hide();
                    $(this).removeClass("active");
                } else {



                    $(".ho-comment-box").hide();
                    $('.ho-comment').removeClass("active");



                    var content = $(this).parents("td").find('.ho-comment-box');

                    if ($(content).is(":visible")) {
                        $(content).hide();
                        $(this).removeClass("active");
                    } else {
                        $(content).show();
                        $(this).addClass("active");
                    }
                }


            });
            $('.ho-write-comment').on("click", function () {

                if ($(this).hasClass("active")) {
                    $(".ho-write-comment-box").hide();
                    $(this).removeClass("active");
                } else {



                    $(".ho-write-comment-box").hide();
                    $('.ho-write-comment').removeClass("active");



                    var content = $(this).parents("td").find('.ho-write-comment-box');

                    if ($(content).is(":visible")) {
                        $(content).hide();
                        $(this).removeClass("active");
                    } else {
                        $(content).show();
                        $(this).addClass("active");
                    }
                }


            });



        }

        db.showBoxComment();



    });
})(jQuery);
