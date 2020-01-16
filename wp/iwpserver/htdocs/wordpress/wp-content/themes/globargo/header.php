<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greeky
 */
    $greeky_menu_visible = get_theme_mod('menu_visible');
        ?>
    <!doctype html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="page-preload"></div>
        <!--menu-mobile-->
        <div class="menu-mobile">
            <ul class="menu">
                <li><a href="#home"><span>Home</span></a></li>
                <li><a href="#about"><span>About us</span></a></li>
                <li class="active"><a href="#mission"><span>Mission</span></a></li>
                <li><a href="#services"><span>Services</span></a></li>
                <li><a href="#how-it-work"><span>How it works</span></a></li>
                <li><a href="#contact"><span>Contact Us</span></a></li>
            </ul>
        </div>
        <div class="page">
            <!--header-->
            <header class="header">
                <div class="container">
                    <div class="float-left">
                        <a href="#" class="logo">
                        <img alt="" src="images/logo.png">
                    </a>
                    </div>
                    <div class="float-right">
                        <div class="menu">
                            <ul>
                                <li><a href="#home"><i class="icon-home"></i></a></li>
                                <li><a href="#about"><span>About us</span></a></li>
                                <li class="active"><a href="#mission"><span>Mission</span></a></li>
                                <li><a href="#services"><span>Services</span></a></li>
                                <li><a href="#how-it-work"><span>How it works</span></a></li>
                                <li><a href="#contact"><span>Contact Us</span></a></li>
                            </ul>
                        </div>
                        <div class="menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </header>
