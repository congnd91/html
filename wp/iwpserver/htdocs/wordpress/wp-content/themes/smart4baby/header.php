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
        <nav class="menu-res hidden-md-up">
            <div class="menu-res-inner">
                <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'container'=>'')
                                ); ?>
            </div>
        </nav>
        <!--preload-->
        <div class="loader" id="page-loader">
        </div>
        <div class="page">
            <div class="topbar">
                <div class="container">
                    <a href="#" class="phone"><i class="fas fa-phone-square"></i> 096 275 1191  </a>

                    <div class="social">
                        <a href="#" class="facebook">
                <span>
                        <i class="fab fa-facebook-f"></i>
                        </span>
                        <em>
                    Facebook</em>
                </a>
                        <a href="#" class="shopee">
                <span></span>
                        <em>
                    Shopee</em>
                </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <header class="header">
                <div class="container">
                    <div class="header-inner">

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

                        <div class="menu-icon hidden-lg-up">
                            <i class="fas fa-bars"></i>
                        </div>

                        <?php if (class_exists('WooCommerce')) : ?>
                        <?php global $woocommerce; ?>


                        <div class="cart">
                            <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'mazpage'); ?>">
      <i class="fas fa-shopping-basket"></i>
     <span>
 <?php echo  $woocommerce->cart->cart_contents_count ?>
</span>
</a>
                        </div>
                        <?php endif; ?>


                        <!--menu-->

                        <?php wp_nav_menu(array(
                                'theme_location'=>'main-menu',
                                'container'=>'nav',
                                'container_class'=>'menu hidden-md-down')
                                ); ?>




                    </div>
                    <div class="clearfix"></div>
                </div>
            </header>
