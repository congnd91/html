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

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta property="og:title" content="Получай космические бонусы">

<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Космические бонусы</title>
<link rel="stylesheet" href="<?php echo $path_file ?>/css/style.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

</head>

<body cz-shortcut-listen="true">
    <div class="cont">
        <div class="main center_top">
            <div class="wheel">
                <div class="reels">
                    <div id="reel1" class="reel wheel_anim_big"></div>
                    <div id="reel2" class="reel wheel_anim_small"></div>
                    <div id="reel3" class="reel wheel_anim_big"></div>
                </div>
                <div class="wheel_base">
                    <a href="" class="logo center_top"></a>
                    <div class="bulbs"></div>
                </div>
                <div id="wheel_back" class="wheel_back center_top">
                    <div id="wheel_big" class="wheel_big wheel_anim_big"></div>
                </div>
                <div id="wheel_front" class="wheel_front center_top">
                    <div class="wheel_small wheel_anim_small"></div>
                </div>
                <div class="shadow center_top"></div>
                <div class="frame center_top">
                    <div class="lights"></div>
                </div>
                <div id="btn" class="turn_btn turn_btn_anim center_top">
                    <div class="btn_text">КРУТИТЬ</div>
                </div>
                <div class="pers">
                    <div class="pers_octobus"></div>
                    <div class="pers_bug"></div>
                    <div class="pers_crystal"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="payment">
        <img src="<?php echo $path_file ?>/images/pay_visa.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_visa_el.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_masrecard.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_maestro.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_qiwi.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_yandex.png" alt="" class="pay">
        <img src="<?php echo $path_file ?>/images/pay_webmoney.png" alt="" class="pay">
    </div>

    <div class="popup">
        <div class="window">
            <p class="t1">Lorem Ipsum is: </p>
            <p class="t2">100% lorem ips </p>

            <p class="text-one"><span>30 000P</span>
            </p>
            <p class="text-two"><span>200</span>


            </p>
            <p class="t3">Lorem Ipsum is simply <br /> dummy text here </p>
            <a href="#" class="pop_logo"></a>
            <a href="#" class="pop_btn center_top">ЗАБРАТЬ</a>
        </div>
    </div>

    <script type="text/javascript" async="" src="<?php echo $path_file ?>/js/watch.js"></script>
    <script src="<?php echo $path_file ?>/js/jquery.min.js"></script>
    <script src="<?php echo $path_file ?>/js/jquery-ui.min.js"></script>
    <script src="<?php echo $path_file ?>/js/main.min.js"></script>
