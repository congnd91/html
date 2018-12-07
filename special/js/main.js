(function ($) {
    $(document).on('ready', function () {
        "use strict";
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        var db = new Object();
        db.preLoad = function () {
            /**Preload**/
            $('#page-loader').delay(800).fadeOut(600, function () {
                $('body').fadeIn();
            });
        }
        db.menu = function () {

            $('.icon-menu').on('click', function () {
                $('body').toggleClass("open-menu");
            });
            $('.close-menu').on('click', function () {
                $('body').toggleClass("open-menu");
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

            $('.icon-search').on('click', function () {
                $('body').toggleClass("open-search");
            });
            $('.close-search').on('click', function () {
                $('body').toggleClass("open-search");
            });

        }

        db.search = function () {

            /**Search Box**/
            var search = $('.search-frame');
            $('.search-icon').on('click', function () {
                if ($(search).hasClass("show-search")) {
                    $(search).removeClass("show-search");
                } else {
                    $(search).addClass("show-search");
                    setTimeout(function () {
                        $('.txt-search').focus();
                    }, 300);
                }
            });

        }


        db.sliderNP = function () {
            var owl_np = $('.owl-np');
            if ($(owl_np).length) {
                $(owl_np).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,

                });
            }
        }









        db.sliderBook = function () {
            var owl_book = $('.owl-book');
            if ($(owl_book).length) {
                $(owl_book).owlCarousel({
                    loop: true,
                    margin: 20,
                    nav: true,
                    autoplay: false,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    responsive: {
                        0: {
                            items: 2,
                        },
                        768: {
                            items: 3,
                        },
                        991: {
                            items: 4,
                        },
                        1191: {
                            items: 5,
                        }
                    },

                });
            }
        }

        db.sliderPost = function () {
            var owl_post = $('.owl-post');
            if ($(owl_post).length) {
                $(owl_post).owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    autoplay: true,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                    items: 1,

                });
            }
        }




        db.fancybox = function () {

            $('.fancybox').fancybox();
        }






        db.preLoad();
        db.menu();
        db.search();
        db.sliderNP();
        db.sliderBook();
        db.sliderPost();








        /**Tooltip**/
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        })

        /**Scroll to top**/
        function scrollToTop() {
            $("html, body").animate({
                scrollTop: 0
            }, 0);
        }
        /**Menu**/



        /** Back To Top**/
        var win = $(window);
        var totop = $('.totop');
        win.on('scroll', function () {
            if ($(this).scrollTop() >= 300) {
                $(totop).addClass("show");
            } else {
                $(totop).removeClass("show");
            }
        });
        $(totop).on('click', function () {
            $("html, body").animate({
                scrollTop: 0
            }, 1500);
        });






        /**Match height  item**/
        var grids_item = $('.col-item');
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
            slidesPerView: 'auto',
            loop: true,
            paginationClickable: true,
            spaceBetween: 0,
            speed: 500,
            nextButton: '.swiper-next',
            prevButton: '.swiper-prev',
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
    });


})(jQuery);
