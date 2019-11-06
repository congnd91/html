$(document).ready(function () {

    $('.flag-container').click(function () {
        $(this).find(".country-list").toggleClass("hide");

    });





    $(function () {
        $(window).on("scroll", function () {
            if ($('.build-section').hasClass('in-view')) {
                if ($('#first-text').hasClass('text')) {
                    $('#first-text').removeClass('text');
                    var i = 0;
                    var txt = '<class=';
                    var speed = 500;

                    function typeWriter() {
                        if (i < txt.length) {
                            document.getElementById("first-text").innerHTML += txt.charAt(i);
                            i++;
                            setTimeout(typeWriter, 150);
                        }
                    }
                    setTimeout(function () {
                        typeWriter();
                    }, 2400);
                    var $j = 0;
                    var txt2 = '"my bitcoin app"';
                    var speed = 150;

                    function type() {
                        if ($j < txt2.length) {
                            document.getElementById("second-text").innerHTML += txt2.charAt($j);
                            $j++;
                            setTimeout(type, 150);
                        }
                    }
                    setTimeout(function () {
                        type();
                    }, 3250);
                    setTimeout(function () {
                        $('#text-third').css('opacity', '1');
                    }, 3400);
                }
            } else {
                $('#first-text').addClass('text');
                $('#first-text').text('');
                $('#second-text').text('');
                $('#text-third').css('opacity', '0');
            }
        });
        $(window).on('load', function () {
            $(".main-slider").each(function () {
                var max = -1;
                $(this).find("li").each(function () {
                    var h = $(this).height() + 25;
                    max = h > max ? h : max;
                });
                $(this).css('height', max);
                var count = $(this).find("li").length;
                $(this).find('li:nth-child(1)').addClass('active');
                $(this).find('li:nth-child(1)').css('top', 0);
                for (var i = 0; i < count; i++) {
                    if (i != 0) {
                        $(this).parents('.cryptochamp-slider').find('.slider-nav').append("<li><a href='#'></a></li>");
                    } else {
                        $(this).parents('.cryptochamp-slider').find('.slider-nav').append("<li class='active'><a href='#'></a></li>");
                    }
                }
            });
            $('.slider-nav li a').click(function (e) {
                e.preventDefault();
                $('.slider-nav li').removeClass('active');
                $(this).parent().addClass('active');
                var index = $(this).parent().index() + 1;
                var index_main = $(this).parents('.cryptochamp-slider').find('.main-slider li.active').index() + 1;
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('z-index', '2');
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('z-index', '1');
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('top', '-100%');
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('top', '0');
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').removeClass('active')
                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').addClass('active');
                setTimeout(function () {
                    $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('top', '100%');
                }, 0);
            });
            if ($(window).width() <= 767) {
                $(".main-slider").swipe({
                    swipeLeft: function (event) {
                        var active_ele = $('.slider-nav li.active');
                        var index = $('.slider-nav li.active').index();
                        if (index !== 0) {
                            active_ele.removeClass('active');
                            active_ele.prev().addClass('active');
                            var index_main = index + 1;
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('z-index', '2');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('z-index', '1');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('top', '-100%');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('top', '0');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').removeClass('active')
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').addClass('active');
                            setTimeout(function () {
                                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('top', '100%');
                            }, 0);
                        }
                    },
                    swipeRight: function (event) {
                        var count_slides = $('.slider-nav li').length;
                        var active_ele = $('.slider-nav li.active');
                        var index = $('.slider-nav li.active').index();
                        if ((index + 1) !== count_slides) {
                            index = index + 1;
                            active_ele.removeClass('active');
                            active_ele.next().addClass('active');
                            var index_main = index + 1;
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('z-index', '2');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('z-index', '1');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('top', '-100%');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').css('top', '0');
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').removeClass('active')
                            $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index_main + ')').addClass('active');
                            setTimeout(function () {
                                $(this).parents('.cryptochamp-slider').find('.main-slider li:nth-child(' + index + ')').css('top', '100%');
                            }, 0);
                        }
                    },
                    threshold: 0
                });
            }
        });
        if ($('#notificationForm').length) {
            document.getElementById("notificationForm").addEventListener("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/log-signup-click",
                    type: 'GET',
                    success: function () {
                        console.log('Button Clicked');
                    },
                    error: function (error) {
                        console.log('Something wrong', error);
                    },
                    complete: function () {
                        var telephone_no = $('#notificationInput').val();
                        var country_code = $(this).find('.country-list .active').data("country-code");
                        var ref = getCookie('__ref');
                        if (ref) {
                            window.location = referralBaseURL + ref;
                            return false;
                        }
                        window.location = registerUrl + encodeURIComponent('&countrycode=' + country_code + '&mobilenumber=' + telephone_no);
                    }
                });
            });
        }
        if ($('#cryptostartedForm').length) {
            document.getElementById("cryptostartedForm").addEventListener("submit", function (e) {
                e.preventDefault();
                $.ajax({
                    url: "/log-signup-click",
                    type: 'GET',
                    success: function () {
                        console.log('Button Clicked');
                    },
                    error: function (error) {
                        console.log('Something wrong', error);
                    },
                    complete: function () {
                        var telephone_no = $('#cryptoStartedInput').val();
                        var country_code = $(this).find('.country-list .active').data("country-code");
                        var ref = getCookie('__ref');
                        if (ref) {
                            window.location = referralBaseURL + ref;
                            return false;
                        }
                        window.location = registerUrl + encodeURIComponent('&countrycode=' + country_code + '&mobilenumber=' + telephone_no);
                    }
                });
            });
        }
        $('.signupLink').click(function () {
            var ref = getCookie('__ref');
            if (ref) {
                window.location = referralBaseURL + ref;
                return false;
            }
            window.location = registerUrl;
        });
        $('.tab-list').click(function () {
            var open_id = $(this).attr('data-tab');
            $('.coins-table ').removeClass('active ');
            $('#' + open_id).addClass('active ');
            $('.tab-list').removeClass('active');
            $(this).addClass('active');
            var img = $(this).children('img').attr('src');
            var name = $(this).children('p').text();
            $('.coins-filter img').attr('src', img);
            $('.coins-filter p').text(name);
            $('.coins-filter-ul').slideUp(500);
            setTimeout(function () {
                $('.coins-filter').removeClass('remove-radius');
            }, 500);
        });
        $('.coins-filter').click(function () {
            $('.coins-filter-ul').slideToggle(500);
            if ($(this).hasClass('remove-radius')) {
                setTimeout(function () {
                    $('.coins-filter').removeClass('remove-radius');
                }, 500);
            } else {
                $('.coins-filter').addClass('remove-radius');
            }
        });
        var $tradeCount = $('#coinValue').val('30');
        var $coinValue = $('#coin').val('2');

        function exchangeCalculator() {
            var otherExchange = $('#otherExchange').val();
            var $tradeCount = $('#coinValue').val();
            var $coinValue = $('#coin').val();
            var data = new FormData();
            data.append('coin', 'true');
            data.append('coinValue', $coinValue);
            data.append('tradeCount', $tradeCount);
            data.append('fiatCurrency', 'EUR');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://cryptoapi.activ.space/calculate', true);
            xhr.onload = function () {
                var calculateData = JSON.parse(this.responseText);
                var feesLenght = calculateData.data.fees.length;
                for (var i = 0; i < feesLenght; i++) {
                    var selectedExchange = calculateData.data.fees[i].exchange;
                    if (otherExchange == selectedExchange) {
                        $('.other_price').text(calculateData.data.fees[i].fees);
                    }
                }
            };
            xhr.send(data);
        }

        function onloadexchangeCalculator() {
            var $tradeCount = $('#coinValue').val();
            var $coinValue = $('#coin').val();
            var data = new FormData();
            data.append('coin', 'true');
            data.append('coinValue', $coinValue);
            data.append('tradeCount', $tradeCount);
            data.append('fiatCurrency', 'EUR');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'https://cryptoapi.activ.space/calculate', true);
            xhr.onload = function () {
                var calculateData = JSON.parse(this.responseText);
                var feesLenght = calculateData.data.fees.length;
                var s = calculateData.data.fees

                function compare(a, b) {
                    if (a.exchange < b.exchange)
                        return -1;
                    if (a.exchange > b.exchange)
                        return 1;
                    return 0;
                }
                var z = s.sort(compare);
                for (var i = 0; i < feesLenght; i++) {
                    $('#otherExchange').append('<option value="' + z[i].exchange + '">' + z[i].exchange + '</option>');
                }
                const max_fees = calculateData.data.fees.reduce(function (prev, current) {
                    return (prev.fees > current.fees) ? prev : current;
                });
                $('#otherExchange').val(max_fees.exchange).attr('selected');
                var otherExchange = $('#otherExchange').val();
                for (var i = 0; i < feesLenght; i++) {
                    var selectedExchange = calculateData.data.fees[i].exchange;
                    if (otherExchange == selectedExchange) {
                        $('.other_price').text(calculateData.data.fees[i].fees);
                    }
                }
            };
            xhr.send(data);
        }
        if ($('.calculator-wrapper').length > 0) {
            onloadexchangeCalculator();
        }
        $(".otherExchange").change(function () {
            exchangeCalculator();
        });

        var url_string = window.location.href;
        var url = new URL(url_string);
        var calcPara = url.searchParams.get("my-savings");
        if (calcPara == 'yes') {
            $('.calculator-wrapper').fadeIn();
        }
        $('#open_calculator').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            $('.calculator-wrapper').fadeIn();
        });
        $('body, .close-popup').click(function (e) {
            if ($(".calculator-wrapper").is(':visible')) {
                e.preventDefault();
                $('.calculator-wrapper').fadeOut();
            }
        });
        $(".calculator-wrap").click(function (e) {
            e.stopPropagation();
        });
    });



    $('#contry-code').click(function () {
        $('.list-code').slideToggle();
    });
    $('#contry-code1').click(function () {
        $('.list-code').slideToggle();
    });
    $('.list-code1 li').click(function () {
        var value = $(this).attr('data');
        $('#contry-code span').text(value);
        $('.list-code1').slideToggle();
        $('#contry-code').attr('data', value);
    });
    $('.list-code2 li').click(function () {
        var value = $(this).attr('data');
        $('#contry-code1 span').text(value);
        $('.list-code2').slideToggle();
        $('#contry-code1').attr('data', value);
    });
    $('.hamburger').click(function () {
        $(this).toggleClass('hamb-open');
        $('.navigation > ul').slideToggle();
    });
    var $animation_elements = $('.animation-element');
    var $window = $(window);
    $window.on('scroll', check_if_in_view);
    $window.on('scroll resize', check_if_in_view);
    $window.trigger('scroll');

    function check_if_in_view() {
        var window_height = $window.height() - 200;
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);
        $.each($animation_elements, function () {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);
            if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                $element.addClass('in-view');
            } else {}
        });
    }
    $('.faq-accordion h5').click(function () {
        $('.faq-accordion h5').removeClass('active');
        if ($(this).next().hasClass('accord-open')) {
            $(this).next().removeClass('accord-open');
        } else {
            $('.accordion-content').removeClass('accord-open');
            $(this).next().addClass('accord-open');
            $(this).addClass('active');
        }
    });
});
