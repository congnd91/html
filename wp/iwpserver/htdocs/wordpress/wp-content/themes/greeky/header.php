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
    <nav class="menu-res hidden-lg hidden-md ">
        <div class="menu-res-inner">
            <?php wp_nav_menu(array(
        'theme_location'=>'main-menu',
        'menu_class'=>'',
        'container'=>'')
        ); ?>
        </div>
    </nav>
    <!--page-->
    <div class="page">
        <div class="wrap">
            <!--topbar-->
            <div class="topbar">
                <?php if(is_active_sidebar('greeky_social')){ dynamic_sidebar("greeky_social");  }?>
            </div>
            <!--header-->
            <header class="header">
                <div class="header-inner">
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

                    <!--menu-main-->
                    <nav class="menu-main hidden-sm hidden-xs">
                        <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'hidden-sm hidden-xs',
                                'container'=>'')
                                ); ?>
                    </nav>
                    <div class="header-right">
                        <div class="search-box">
                            <?php get_template_part( 'template/searchform' ); ?>
                        </div>
                        <div class="menu-icon hidden-lg hidden-md">
                            <i class="ion-navicon"></i>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </header>
            <?php if(is_active_sidebar('greeky_breaking_news')){ dynamic_sidebar("greeky_breaking_news");  }?>
