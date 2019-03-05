(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.sidebarMenu = function () {
            $('.sidebar-menu-item.has-child.active .sidebar-sub-menu').show();
            $('.sidebar-menu-item.has-child >a').on('click', function (e) {
                var menu = $(this).parent().find(".sidebar-sub-menu");
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                    $(this).parent().removeClass("active");
                } else {
                    $(menu).slideDown();
                    $(this).parent().addClass("active");
                }
                return false;
            });
        }
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                var menu = $('.menu-res');
                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                } else {
                    $(menu).slideDown();
                }
            });
        }
        db.sidebarMenu();
        db.menuResponsive();
    });
})(jQuery);
