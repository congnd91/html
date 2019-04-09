<?
include("config.php");
?>
<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="utf-8">
    <title>Application</title>
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="index, follow">
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="images/favicon/favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="images/favicon/safari-pinned-tab.svg" color="#0c457b">
    <link rel="shortcut icon" href="images/favicon/favicon.ico">
    <meta name="msapplication-config" content="images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <link href='css/font/css7880.css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    <link href="css/main.css" rel="stylesheet" type="text/css" />
    <!-- change font in web -->

    <link href="css/secure-logos.css" rel="stylesheet" type="text/css" />
    <!-- change header image and logo -->

    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" />
    <link rel="stylesheet" href="form/content/themes/general/jquery-ui-1.8.23.custom.css" />
    <link rel="stylesheet" href="css/styles.css" />

    <!--[if lt IE 9]>
         <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body class="bg_form">
    <div class="body_wrapper">

        <div class="header_wrapper">
            <div class="header">
                <div class="container">
                    <div class="header__menu-caller">
                        <div class="burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="header__menu">
                        <ul>
                            <li><a href="index.html">Back to Homepage</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main">
<script src="https://cdn101.openmarketzp.com/form/run.php?p=E9598D06919011E7A47042010A80034B"></script> 
        </div>

        <div class="footer_wrapper">
            <div class="footer">
                <div class="container">
                    <p class="copyrights" style="text-align:center;">
                        Copyright &copy; 2017 All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
        <div class="scroll_to_top">
            <i class="icon-arrow-top"></i>
        </div>

        <div style="display: none">
            <div id="disclaimer-content" class="content"></div>
            <div id="privacy-content" class="content"></div>
            <div id="t-content" class="content"></div>
        </div>
    </div>



<script>
    $(function () {
        var mobileMenu = (function () {
            return {
                init: (function () {
                    var $menuCaller = $('.header__menu-caller').find('.burger'),
                            $menu = $('.header__menu'),
                            $header = $('.header'),
                            $body = $('body, html');

                    $menuCaller.on('click', function () {
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
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 200 && scr_hidden) {
                scr_hidden = false;
                $('.scroll_to_top').fadeIn(200)
            } else if ($(this).scrollTop() < 200 && !scr_hidden) {
                scr_hidden = true;
                $('.scroll_to_top').fadeOut(200)
            }
        });
        $('.scroll_to_top').on('click', function () {
            $('body, html').animate({
                scrollTop: 0
            }, 1000)
        });
    });
</script>

    <!--[if IE 9]>
<script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('input[type=text], input[type=password], textarea').placeholder();
    });
</script>
<![endif]-->
    <script type="text/javascript" src="form/scripts/plugins/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="form/scripts/form.js"></script>
    <script type="text/javascript" src="form/mobile/dp3.js"></script>

    <script type="text/javascript">
        $(function() {
            $(".frm-popup-link").fancybox({
                'width': 500,
                'height': 490,
                'margin': 5,
                'autoDimensions': false
            });
            $(".frm-link-disclaimer").click(function() {
                $('#disclaimer-content').load('_disclaimer.html', function() {
                    $('.popup-content p').each(function() {
                        $(this).html($(this).text().replace(/{SiteName}/gmi, location.hostname))
                    })
                });
            });
            $(".frm-link-privacy").click(function() {
                $('#privacy-content').load('_privacypolicy.html', function() {
                    $('.popup-content p').each(function() {
                        $(this).html($(this).text().replace(/{SiteName}/gmi, location.hostname))
                    })
                });
            });
            $(".frm-link-terms").click(function() {
                $('#t-content').load('_terms.html', function() {
                    $('.popup-content p').each(function() {
                        $(this).html($(this).text().replace(/{SiteName}/gmi, location.hostname))
                    })
                });
            });
        });
    </script>
    
    <style>
        div#LGleadform { margin: 50px auto !important; }
        div#js_progressbar { margin-left: 13px !important;}
    </style>

<? echo $stat; ?>
</body>


</html>