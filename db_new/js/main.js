(function ($) {
    $(document).on('ready', function () {




        var db = new Object();
        db.menuResponsive = function () {
            $('.menu-icon').on('click', function () {
                $('body').toggleClass("show-menu-mobile");
            });

            $('.close-menu').on('click', function () {
                $('body').toggleClass("show-menu-mobile");
            });
        }

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }
            });
        }

        db.gridTemplate = function () {

            if ($('.grid-template').length) {
                var $grid = $('.grid-template').isotope({
                    itemSelector: '.grid-item'
                    // filter: '.t1'
                });
                // filter items on button click
                $('.grid-template-nav li strong').click(function () {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                    $('.is-active').removeClass("is-active");
                    $(this).parent().addClass("is-active");
                });
            }
        }


        db.Grid = function () {

            if ($('.grid').length) {
                var $grid = $('.grid').isotope({
                    itemSelector: '.grid-item'
                    // filter: '.t1'
                });
                // filter items on button click

            }
        }







        db.sliderPartner = function () {
            var owl_partner = $('.owl-partner');
            if ($(owl_partner).length) {
                $(owl_partner).owlCarousel({
                    loop: true,
                    margin: 0,


                    nav: true,
                    autoplay: false,
                    navText: ['<i class="icon icon-circle-left2"></i>', '<i class="icon icon-circle-right2"></i>'],
                    responsive: {

                        0: {
                            items: 1,
                        },

                        576: {
                            items: 2,
                        },

                        768: {
                            items: 2,

                        },
                        991: {
                            items: 4,

                        }
                    },

                });
            }
        }

        db.gallery = function () {

            var openPhotoSwipe = function (index) {
                console.log(index + "ss");
                var pswpElement = document.querySelectorAll('.pswp')[0];

                // build items array
                /* var items = [{
                         src: 'images/16.png',
                         w: 1000,
                         h: 600
                 },
                     {
                         src: 'images/17.png',
                         w: 1000,
                         h: 600
                 } ];*/


                var imgs = $('.news-article img');





                var items = new Array();



                for (i = 0; i < imgs.length; i++) {


                    items[i] = {
                        src: $(imgs[i]).attr("src"),
                        w: 1000,
                        h: 600
                    };


                }




                console.log(items);

                // define options (if needed)
                var options = {
                    // history & focus options are disabled on CodePen        
                    history: false,
                    focus: false,
                    index: parseInt(index, 10),

                    showAnimationDuration: 0,
                    hideAnimationDuration: 0

                };

                var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
                gallery.init();
            };

            $('.news-article img').click(function () {




                openPhotoSwipe($(this).attr("data-index"));
                console.log($(this).attr("data-index"));


            });
        }



        db.menuResponsive();
        db.scrollMenu();
        db.gridTemplate();
        db.Grid();

        $("#mygallery").justifiedGallery({

            rowHeight: 250,

            margins: 20,
            lastRow: 'nojustify',
            selector: '.gallery-item'

        });

    });
})(jQuery);
