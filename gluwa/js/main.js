(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('.page-preload').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                e.stopPropagation();
                $('body').toggleClass("open-menu");
            });
            $('.close-menu').on('click', function () {
                $('body').removeClass("open-menu");
            });

        }
        db.focus = function () {
            $(function () {
                $('.db-txt').focusin(function () {
                    $(this).parent().addClass('focus');
                });
                $('.db-txt').focusout(function () {
                    $(this).parent().removeClass('focus');
                });
            });

        }
        db.keyMark = function () {

            var myColors = ["#C2C7CE", "#C9CFD6"];

            $('.hidden-key').find('p').each(function () {

                var $el = $(this),
                    text = $el.text(),
                    len = text.length,
                    coLen = myColors.length,
                    newCont = '';

                for (var i = 0; i < len; i++) {
                    newCont += '<span style="background:' + myColors[i % coLen] + '">' + text.charAt(i) + '</span>';
                }

                $el.html(newCont);

            });

        }

        db.preLoad();
        db.focus();
        db.keyMark();
        db.menuResponsive();

    });
})(jQuery);
