<?php
    /*
     * Template Name: 182-welcome-bonuses-ru
     */
    $templateName = "182-welcome-bonuses-ru";
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
<link rel="shortcut icon" href="<?php echo $path_file ?>/images/16x16.ico">
<title>Бонус 300% при каждом повышении уровня</title>
<link rel="stylesheet" href="<?php echo $path_file ?>/css/style.min.css">
</head>

<body class="page">
    <div class="page__wrap">

        <div class="top-circle">
            <h1 class="top-circle__title">
                <img src="images/text-bonus300.png?1490599886539" alt="Бонус 300%" class="top-circle__bonus">
                <span class="top-circle__text">При каждом повышении уровня</span>
            </h1>
        </div>
        <div class="bottom-circle">
            <div class="bottom-circle__pack">
                Welcome Pack
                <span class="bottom-circle__percent">450%</span>
            </div>
            <div class="bottom-circle__money">до 100 000 RUB</div>
            <a href="#" class="button">Играть</a>
        </div>
    </div>
    <div class="page__bottom logotypes"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
