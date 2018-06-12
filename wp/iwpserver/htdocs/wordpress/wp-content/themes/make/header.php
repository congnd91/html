<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mazpage
 */
    $mazpage_menu_visible = get_theme_mod('menu_visible');
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
        <!--preload-->
        <div class="loader" id="page-loader">
        </div>
        <!--menu mobile-->
        <div class="menu-res d-lg-none">
            <div class="menu-res-inner">
                <?php wp_nav_menu(array(
        'theme_location'=>'main-menu',
        'menu_class'=>'',
        'container'=>'')
        ); ?>
            </div>
        </div>
        <!--page-->
        <div class="page">

            <div class="overlay-menu"></div>
            <!--header-->
            <header class="header">
                <div class="container">
                    <div class="header-left">
                        <div class="logo-wrap">
                            <?php $site_logo = mazpage_get_theme_option('site_logo'); ?>
                            <?php if($site_logo):?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <img alt="Logo" src="<?php echo esc_url($site_logo);?>" title="<?php bloginfo('name'); ?>" />
                     </a>
                            <?php else:?>
                            <h1>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                                    <?php bloginfo( 'name' ); ?>
                                </a>
                            </h1>
                            <?php endif;?>
                        </div>

                    </div>
                    <div class="menu-icon d-lg-none">
                        <i class="icon ion-md-menu"></i>
                    </div>
                    <div class="search-box">
                        <div class="search-form">

                            <?php get_template_part( 'template/searchform' ); ?>


                        </div>
                    </div>
                    <div class="menu">
                        <div class="container">
                            <div class="menu-inner d-none d-lg-block">
                                <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'hidden-sm hidden-xs',
                                'container'=>'')
                                ); ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </header>
