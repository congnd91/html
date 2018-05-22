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
                    <div class="social">
                        <a href="#">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                        <a href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                        <a href="#">
                        <i class="fa fa-youtube"></i>
                    </a>
                        <a href="#">
                        <i class="fa fa-rss"></i>
                    </a>
                    </div>
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
                <section class="breaking-news">
                    <span class="breaking-news-caption">
                    Breaking News
                </span>
                    <div class="owl-breaking-wrap">
                        <div class="owl-carousel  owl-breaking">
                            <div>
                                <p>
                                    <a href="single.html">Six big ways MacOS Sierra is going to change your Apple experience</a>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <a href="single-video.html">Do you have what it takes to age like a true expert?</a>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <a href="single-fullwidth-three-column.html">Secrets your parents never told you about trees</a>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <a href="single-fullwidth.html">Six big ways MacOS Sierra is going to change your Apple experience</a>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <a href="single-gallery.html">Do you have what it takes to age like a true expert?</a>
                                </p>
                            </div>
                            <div>
                                <p>
                                    <a href="single-audio.html">Secrets your parents never told you about trees</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
