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
            $('.dh-accordion-title').on('click', function () {
                var content = $(".dh-accordion-content");
                if ($(content).is(":visible")) {
                    $(content).hide();
                    $(this).removeClass("active");
                    $('body').removeClass("overflow");
                } else {
                    $(content).show();
                    $(this).addClass("active");

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
                    var padding = $('.dv-slider').height();
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
    });
})(jQuery);
