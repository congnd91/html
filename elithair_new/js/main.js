(function ($) {
    $(document).on('ready', function () {
        var db = new Object();


        db.scrollMenu = function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() >= 50) {
                    $('.header').addClass("header-scrolled");
                } else {
                    $('.header').removeClass("header-scrolled");
                }

                if ($(this).scrollTop() >= 150) {

                    $('.totop').addClass("show");
                } else {
                    $('.totop').removeClass("show");
                }

            });

            $(".totop").click(function () {

                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
            });
        }


        db.menuResponsive = function () {
            $('.menu-icon').on('click', function (e) {
                var menu = $('.menu-mobile');

                if ($(menu).is(":visible")) {
                    $(menu).slideUp();
                } else {
                    $(menu).slideDown();
                }
            });

            $('.menu-mobile ul li a').click(function () {

                $('.menu-mobile').slideUp();
            });



        }



        db.faq = function () {


            $('.faq-caption').on('click', function (e) {
                var content = $(this).next();


                if ($(content).is(":visible")) {

                    $(content).slideUp();
                    $(this).parent().removeClass("active");
                } else {

                    $(content).slideDown();
                    $(this).parent().addClass("active");
                }
            });

            $('.qi-content').on('click', function (e) {
                e.stopPropagation();
            });
            $('.close-qi-content').on('click', function (e) {
                e.stopPropagation();
                $('.question-item').removeClass("show");
            });
            $('.scroll-faq').on('click', function (e) {
                $('body').toggleClass("open-menu");
                $('html,body').animate({
                    scrollTop: $(".section-faq").offset().top
                }, 2000);
                return false;
            });






        }

        db.video = function () {






            $('.peo-item').on('click', function (e) {

                $(this).find(".peo-overlay").show();
            });

            $('.close-video').on('click', function (e) {
                e.stopPropagation();
                $('.peo-overlay').hide();
                $("video").each(function () {
                    this.pause()
                });
            });





        }


        db.sliderImage0 = function () {




            var duration = 10; // duration in seconds
            var fadeAmount = 0.1; // fade duration amount relative to the time the image is visible

            var images = $(".slideshow0 img");
            var numImages = images.size();
            var durationMs = duration * 1000;
            var imageTime = durationMs / numImages; // time the image is visible 
            var fadeTime = imageTime * fadeAmount; // time for cross fading
            var visibleTime = imageTime - (imageTime * fadeAmount * 2); // time the image is visible with opacity == 1
            var animDelay = visibleTime * (numImages - 1) + fadeTime * (numImages - 2); // animation delay/offset for a single image 

            images.each(function (index, element) {
                if (index != 0) {
                    $(element).css("opacity", "0");
                    setTimeout(function () {
                        doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
                    }, visibleTime * index + fadeTime * (index - 1));
                } else {
                    setTimeout(function () {
                        $(element).animate({
                            opacity: 0
                        }, fadeTime, function () {
                            setTimeout(function () {
                                doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
                            }, animDelay)
                        });
                    }, visibleTime);
                }
            });


            // creates a animation loop
            function doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime) {
                fadeInOut(element, fadeInTime, visibleTime, fadeOutTime, function () {
                    setTimeout(function () {
                        doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime);
                    }, pauseTime);
                });
            }

            // shorthand for in- and out-fading
            function fadeInOut(element, fadeIn, visible, fadeOut, onComplete) {
                return $(element).animate({
                    opacity: 1
                }, fadeIn).delay(visible).animate({
                    opacity: 0
                }, fadeOut, onComplete);
            }



        }
        db.sliderImage = function () {




            var duration = 10; // duration in seconds
            var fadeAmount = 0.1; // fade duration amount relative to the time the image is visible

            var images = $(".slideshow img");
            var numImages = images.size();
            var durationMs = duration * 1000;
            var imageTime = durationMs / numImages; // time the image is visible 
            var fadeTime = imageTime * fadeAmount; // time for cross fading
            var visibleTime = imageTime - (imageTime * fadeAmount * 2); // time the image is visible with opacity == 1
            var animDelay = visibleTime * (numImages - 1) + fadeTime * (numImages - 2); // animation delay/offset for a single image 

            images.each(function (index, element) {
                if (index != 0) {
                    $(element).css("opacity", "0");
                    setTimeout(function () {
                        doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
                    }, visibleTime * index + fadeTime * (index - 1));
                } else {
                    setTimeout(function () {
                        $(element).animate({
                            opacity: 0
                        }, fadeTime, function () {
                            setTimeout(function () {
                                doAnimationLoop(element, fadeTime, visibleTime, fadeTime, animDelay);
                            }, animDelay)
                        });
                    }, visibleTime);
                }
            });


            // creates a animation loop
            function doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime) {
                fadeInOut(element, fadeInTime, visibleTime, fadeOutTime, function () {
                    setTimeout(function () {
                        doAnimationLoop(element, fadeInTime, visibleTime, fadeOutTime, pauseTime);
                    }, pauseTime);
                });
            }

            // shorthand for in- and out-fading
            function fadeInOut(element, fadeIn, visible, fadeOut, onComplete) {
                return $(element).animate({
                    opacity: 1
                }, fadeIn).delay(visible).animate({
                    opacity: 0
                }, fadeOut, onComplete);
            }



        }


        db.scroll = function () {
            $(".scroll-to").click(function () {
                var id = $(this).attr("data-id");
                $('html,body').animate({
                    scrollTop: $(id).offset().top - 30
                }, 1000);
                return false;

            });
        }





        db.scrollMenu();
        db.menuResponsive();
        db.faq();
        db.video();
        db.sliderImage0();
        db.sliderImage();
        db.scroll();

    });
})(jQuery);
