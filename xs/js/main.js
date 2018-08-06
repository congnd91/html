(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.preLoad = function () {
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("open-menu");
                setTimeout(scrollToTop, 0);
            });


            $('.menu-res li.menu-item-has-children').on('click', function (event) {
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

        }
        db.chooseDisplay = function () {

            var arr = new Array();
            $("#table1").find('.mt-value').each(function () {
                arr.push($(this).text());
            });

            $('.ct-item input').change(function () {
                var option = $(this).filter(':checked').val();
                $(this).parents("#table1").find('.mt-value').each(function (i) {
                    rootValue = arr[i];
                    switch (option) {
                        case "two":
                            value = rootValue.slice(-2);
                            $(this).text(value);
                            break;
                        case "three":
                            value = rootValue.slice(-3);
                            $(this).text(value);
                            break;
                        case "full":
                            $(this).text(rootValue);
                            break;
                        default:
                            break;
                    }
                });
            });

        }


        db.chooseMN = function () {

            var arr = new Array();
            $(".my-table-mn").find('.bold').each(function () {
                arr.push($(this).text());
            });

            $('.my-table-mn .ct-item input').change(function () {
                var option = $(this).filter(':checked').val();
                $(this).parents(".my-table-mn").find('.bold').each(function (i) {
                    rootValue = arr[i];
                    switch (option) {
                        case "two":
                            value = rootValue.slice(-2);
                            $(this).text(value);
                            break;
                        case "three":
                            value = rootValue.slice(-3);
                            $(this).text(value);
                            break;
                        case "full":
                            $(this).text(rootValue);
                            break;
                        default:
                            break;
                    }
                });
            });

        }
        db.preLoad();
        db.menuResponsive();

        db.chooseDisplay();
        db.chooseMN();

    });
})(jQuery);
