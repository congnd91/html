(function ($) {
    $(document).on('ready', function () {
        var db = new Object();
        db.dropdown = function () {
            $('.dropdown').on('click', function () {
                $(this).toggleClass("is-active");
            });
        }
        db.addLotSelected = function () {
            $('.item-card-large').on('click', function () {
                $(this).toggleClass("is-active");
            });
        }
        db.stepSelected = function () {
            $('.step-item .dot').on('click', function () {
                $(this).parent().toggleClass("is-active");

            });
        }
        db.accodion = function () {
            $('.accordion-title').on('click', function () {
                var content = $(this).next();
                if ($(content).is(":visible")) {
                    $(content).slideUp();
                    $(this).addClass("is-active");
                } else {
                    $(content).slideDown();
                    $(this).removeClass("is-active");
                }
            });
            $('.dh-accordion-title').on('click', function () {
                var content = $(".dh-accordion-content");
                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("is-active");
                    $('body').removeClass("overflow");
                } else {
                    $(content).show();
                    $(this).addClass("is-active");

                    $('body').addClass("overflow");
                }
            });
        }
        db.fixBar = function () {
            function isMobileWidth() {
                return $('#mobile-indicator').is(':visible');
            }
            if (isMobileWidth()) {}
            $(window).bind('resize', function () {
                if (isMobileWidth()) {
                    var padding = $('.view-arrows').height();
                    var doc = $(window).height();
                    $(".document-sidebar-scroll").css("padding-top", padding + 10 + "px");
                }
                $(".dh-accordion-content").css("height", doc - padding - 50 + "px");
            }).trigger('resize');
        }
        db.dropdown();
        db.addLotSelected();
        db.stepSelected();
        db.accodion();
        db.fixBar();


        new SimpleBar($('.simple-scroll')[0]);
    });
})(jQuery);
