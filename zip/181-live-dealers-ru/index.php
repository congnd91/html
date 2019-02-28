<?php
    /*
     * Template Name: 181-live-dealers-ru
     */
    $templateName = "181-live-dealers-ru";
?>
<?php

$path_file = './'.$_GET['template_type'].'/'.$_GET['advertorial_template_select'] .'/';



   /* $path_file = plugins_url('lpcp-pro')."/page-templates/advertorial/".$templateName; 
    $templates_file = plugins_url('lpcp-pro')."/page-templates/templates"; 
    $affiliate_link = get_post_meta($post->ID, 'affiliate_link', true);
    $referral_type = get_post_meta($post->ID, 'referral_type', true);
    $template_select = get_post_meta($post->ID, 'template_select', true);
    $pixelID = get_post_meta($post->ID, 'facebook_pixel', true);
    $page_identify = get_post_meta($post->ID, 'page_identify', true);
    $pixelType = get_post_meta($post->ID, 'pixel_type', true);
    $dynamic_offer = get_post_meta($post->ID, 'dynamic_offer', true);
    $dynamic_content = get_post_meta($post->ID, 'dynamic_content', true);
    if (empty($pixelType)) {
        $FacebookPixelType = "Lead";
    }else{
        $FacebookPixelType = $pixelType;
    }
    */
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Live Dealers</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,700i&amp;subset=cyrillic" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $path_file ?>/css/style.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <header>
                <div class="left-side">

                    <div class="text">
                        Живые<br />
                        <span>Дилеры</span>
                    </div>
                </div>
                <div class="benefits">
                    <div class="item">
                        Испытайте комфорт<br /> онлайн заведения<br /> и качество игры
                    </div>
                    <div class="item">
                        Вырабатывайте<br /> стратегии выигрышей
                    </div>
                    <div class="item">
                        Общайтесь с дилером<br /> в реальном времени<br /> не выходя из дома
                    </div>
                </div>
            </header>
            <a href="#" class="button">Играть!</a>
            <div class="payments"></div>
        </div>
    </div>
    <div class="live">
        <div class="line">
            <div class="item">Casino Hold'em live</div>
            <div class="white-line"></div>
            <div class="item">Roulette live</div>
            <div class="white-line"></div>
            <div class="item">Blackjack live</div>
            <div class="white-line"></div>
            <div class="item">Keno live</div>
            <div class="white-line"></div>
            <div class="item">Lottery live</div>
            <div class="white-line"></div>
            <div class="item">Baccarat live</div>
        </div>
    </div>
