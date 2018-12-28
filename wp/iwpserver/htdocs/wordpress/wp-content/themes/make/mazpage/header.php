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
     <?php if($mazpage_menu_visible=="no"):?>
    <!--menu-icon-->
    <div class="menu-icon hidden-sm hidden-xs">
        <i class="fa fa-navicon"></i>
    </div>
    <?php endif;?>
    <!--page-->
    <div class="page">
        <div class="mobile-bar hidden-lg hidden-md">
            <div class="menu-icon-mobile hidden-lg hidden-md">
                <i class="fa fa-navicon"></i>
               <span><?php echo esc_html("MENU","mazpage") ?></span>
            </div>
            <div class="search-icon-mobile">
                <i class="fa fa-search"></i>
            </div>
            <div class="search-box-mobile">
                <?php get_template_part( 'template/searchform' ); ?>
            </div>
        </div>
        <!--header-->

        <?php if($mazpage_menu_visible=="yes"||!get_theme_mod('menu_visible')):?>
        <header class="header menu-visible">
   		<?php else:?>
    	  <header class="header">
    	 <?php endif;?>
            <div class="container">
                <div class="logo-wrap">
  				<?php $site_logo = mazpage_get_theme_option('site_logo'); ?>
                <?php if($site_logo):?>
                      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                    <img alt="Logo" src="<?php echo esc_url($site_logo);?>" title="<?php bloginfo('name'); ?>" />
                     </a>
                <?php else:?>
                    <h1> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
                        <?php bloginfo( 'name' ); ?>
                         </a>
                    </h1>
                <?php endif;?>
                </div>
                <!--menu-main-->
                <nav class="menu-main">
                    <div class="menu-main-inner">
                     		 <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'menu_class'=>'hidden-sm hidden-xs',
                                'container'=>'')
                                ); ?>
                       
                        <div class="search-icon hidden-sm hidden-xs">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="search-box">
                            <?php get_template_part( 'template/searchform' ); ?>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--wrapper-->
        <div class="wrapper">
            <div class="wrap">
 <?php if (class_exists('WooCommerce')) : ?>
                    <?php global $woocommerce; ?>
 <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'mazpage'); ?>"><p>
 <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mazpage'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?>
</p>
</a>
   <?php endif; ?>

