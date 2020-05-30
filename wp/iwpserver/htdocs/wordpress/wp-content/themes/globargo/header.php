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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <div class="menu-res">
      <div class="menu">
        <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'',
                                'container'=>'')
                                ); ?>

      </div>
    </div>
    <div class="loader" id="page-loader">
    </div>
    <div class="page">
      <!--header-->
      <header class="header">
        <div class="container">
          <div class="header-inner">
            <div class="header-left">
              <?php $site_logo = greeky_get_theme_option('site_logo'); ?>
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
            <div class="header-right">
              <div class="menu">
                <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'',
                                'container'=>'')
                                ); ?>
              </div>
              <div class="menu-icon">
                <i class="fas fa-bars"></i>
              </div>
            </div>
          </div>
        </div>
      </header>
