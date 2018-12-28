
(function ($) {
    $(document).on('ready', function () {
        "use strict";
        /**Tooltip**/
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })

        /**Scroll to top**/
        function scrollToTop() {
            $("html, body").animate({ scrollTop: 0 }, 0);
        }
        /**Menu**/
        $('.menu-icon-mobile').on('click', function () {
            $('body').toggleClass("open-menu-mobile");
        });
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
            }
            else {
                $(submenu).slideDown();
                $(this).addClass("open-submenu-active");
            }
        });

        $('.menu-res li.menu-item-has-children > a').on('click', function () {
          //  return false;
        });


        /** Back To Top**/
        var win = $(window);
        var totop = $('.totop');
        win.on('scroll', function () {
            if ($(this).scrollTop() >= 300) {
                $(totop).addClass("show");
            }
            else {
                $(totop).removeClass("show");
            }
        });
        $(totop).on('click', function () {
            $("html, body").animate({ scrollTop: 0 }, 1500);
        });


        /**Search Box**/
        var menu_inner = $('.menu-main-inner');
        $('.search-icon').on('click', function () {
            if ($(menu_inner).hasClass("show-search")) {
                $(menu_inner).removeClass("show-search");
            }
            else {
                $(menu_inner).addClass("show-search");
                setTimeout(function () { $('.txt-search').focus(); }, 300);
            }
        });

        var mobile_bar = $('.mobile-bar');
        $('.search-icon-mobile').on('click', function () {
            if ($(mobile_bar).hasClass("show-search-mobile")) {
                $(mobile_bar).removeClass("show-search-mobile");
            }
            else {
                $(mobile_bar).addClass("show-search-mobile");
                setTimeout(function () { $('.txt-search').focus(); }, 300);
            }
        });

        /**Match height  item**/
        var grids_item = $('.grids-item');
        if ($(grids_item).length) {
            $(grids_item).matchHeight();
        }

        /**review slider**/
        var swiper_review = new Swiper('.swiper-review', {
            slidesPerView: 'auto',
            pagination: '.swiper-pagination',
            paginationClickable: true,
            spaceBetween: 10,
            speed: 500,
            nextButton: '.swiper-next',
            prevButton: '.swiper-prev',
            loop: true
        });

        /**gallery  slider**/
        var swiper = new Swiper('.swiper-gallery', {
            slidesPerView: 'auto',
            loop: true,
            paginationClickable: true,
            spaceBetween: 10,
            speed: 500,
            nextButton: '.swiper-next',
            prevButton: '.swiper-prev',
        });

        /**home  slider**/
        var swiper_home = new Swiper('.swiper-home', {
            slidesPerView: 'auto',
            loop: true,
            paginationClickable: true,
            spaceBetween: 10,
            speed: 500,
            pagination: '.swiper-pagination',
            nextButton: '.swiper-next',
            prevButton: '.swiper-prev',
        });

        /**product  slider**/
       var swiper_product = new Swiper('.swiper-product', {
         
            loop: false,
            paginationClickable: true,
            spaceBetween: 0,
            speed: 500,
            nextButton: '.swiper-next',
            prevButton: '.swiper-prev',
            simulateTouch:false,
        });

        /**Grid pinterest style**/
        var grid = $('.grid');
        if ($(grid).length) {
            $(grid).isotope({
                itemSelector: '.grid-item',
            });
        }

        /**Gallery fancybox**/
        var fancybox = $('.fancybox');
        if ($(fancybox).length) {
            $(fancybox).fancybox({
                scrolling: true
            });
        }
        /**price range slider**/
    var price_slider = $('#price-slider');
    if ($(price_slider).length) {
        $(price_slider).slider({
            tooltip: 'hide'
        });
        $(price_slider).on("slide", function (slideEvt) {
            $('.budget-min em').html(slideEvt.value[0]);
            $('.budget-max em').html(slideEvt.value[1]);
        });
    }


    $(function demo() {

    // Quantity buttons
    $( 'div.quantity:not(.buttons-added), td.quantity:not(.buttons-added)' )
    .addClass( 'buttons-added' )
    .append( '<input type="button" value="+" class="plus" />' )
    .prepend( '<input type="button" value="-" class="minus" />' );

    // Set min value
    $( 'input.qty:not(.product-quantity input.qty)' ).each ( function() {
        var qty = $( this ),
            min = parseFloat( qty.attr( 'min' ) );
        if ( min && min > 0 && parseFloat( qty.val() ) < min ) {
            qty.val( min );
        }
    });
    });

     $(document).on( 'click', '.plus, .minus', function() {

            // Get values
        var qty = $( this ).closest( '.quantity' ).find( '.qty' ),
            currentQty = parseFloat( qty.val() ),
            max = parseFloat( qty.attr( 'max' ) ),
            min = parseFloat( qty.attr( 'min' ) ),
            step = qty.attr( 'step' );

        // Format values
        if ( !currentQty || currentQty === '' || currentQty === 'NaN' ) currentQty = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( $( this ).is( '.plus' ) ) {

            if ( max && ( max == currentQty || currentQty > max ) ) {
                qty.val( max );
            } else {
                qty.val( currentQty + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentQty || currentQty < min ) ) {
                qty.val( min );
            } else if ( currentQty > 0 ) {
                qty.val( currentQty - parseFloat( step ) );
            }

        }

        // Trigger change event
        qty.trigger( 'change' );

    });


    });

    



    var Config = {
        Link: "a.share-link",
        Width: 500,
        Height: 500
    };
 
    $(Config.Link).click(function(e){
        e = (e ? e : window.event);
        var t = $(this);
 
        // popup position
        var
            px = Math.floor(((screen.availWidth || 1024) - Config.Width) / 2),
            py = Math.floor(((screen.availHeight || 700) - Config.Height) / 2);
 
        // open popup
        if(t.data('href')) {
            var popup = window.open(t.attr('data-href'), "social", 
                "width="+Config.Width+",height="+Config.Height+
                ",left="+px+",top="+py+
                ",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
            if (popup) {
                popup.focus();
                if (e.preventDefault) e.preventDefault();
                e.returnValue = false;
            }
     
            return !!popup;
        }
    }); // click
})(jQuery);
