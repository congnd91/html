$(function() {
            var mobileMenu = (function() {
                return {
                    init: (function() {
                        var $menuCaller = $('.header__menu-caller').find('.burger'),
                            $menu = $('.header__menu'),
                            $header = $('.header'),
                            $body = $('body, html');

                        $menuCaller.on('click', function() {
                            $(this).toggleClass('active');
                            $menu.toggleClass('active');
                            $header.toggleClass('active');
                            $body.toggleClass('menu_opened')
                        })
                    }())
                }
            }());
            var scr_hidden;
            if ($(window).scrollTop() > 200) {
                scr_hidden = false;
                $('.scroll_to_top').css('display', 'block');
            } else {
                scr_hidden = true;
                $('.scroll_to_top').css('display', 'none');
            }
            $(window).on('scroll', function() {
                if ($(this).scrollTop() > 200 && scr_hidden) {
                    scr_hidden = false;
                    $('.scroll_to_top').fadeIn(200)
                } else if ($(this).scrollTop() < 200 && !scr_hidden) {
                    scr_hidden = true;
                    $('.scroll_to_top').fadeOut(200)
                }
            });
            $('.scroll_to_top').on('click', function() {
                $('body, html').animate({
                    scrollTop: 0
                }, 1000)
            });
            $('.applynow').on('click',function(){
				var userip = $(".userip").val();
                if((6%6)==2){
                    window.setTimeout(function () {
        			    window.location.href = 'https://dollarcenterloan.com';
        		    }, 20000);
                }
            });
});