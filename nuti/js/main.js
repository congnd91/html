(function ($) {
    $(document).on('ready', function () {
        var db = new Object();

        db.menuResponsive = function () {
            $('.icon-menu').on('click', function () {

                $("body").toggleClass("open-menu");
            });
        }


        db.playVideo = function () {
            $('.img6').on('click', function () {
                $("body").toggleClass("open-video");
            });
            $('.close-video').on('click', function () {
                $("body").toggleClass("open-video");
            });
        }

        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('body').addClass("is-scroll");
                } else {
                    $('body').removeClass("is-scroll");
                }
            });
        }

        db.sliderHotmom = function () {
            var owl_hotmom = $('.owl-hotmom');
            if ($(owl_hotmom).length) {
                $(owl_hotmom).owlCarousel({
                    loop: true,
                    margin: 0,

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1

                });
            }
        }
        db.sliderNews = function () {
            var owl_news = $('.owl-news');
            if ($(owl_news).length) {
                $(owl_news).owlCarousel({
                    loop: true,
                    margin: 30,

                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
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
                            items: 3,

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
        db.playVideo();
        db.scrollMenu();
        db.sliderNews();
        db.sliderHotmom();
        db.gallery();

    });
})(jQuery);
