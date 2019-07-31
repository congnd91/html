<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php 
	global $current_user;
	wp_get_current_user();
	$username = $current_user->user_login; 
?>

<!-- Navbar -->
<header class="header">
    <div class="container">
        <div class="header-inner">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                <p class="site-logo-title"><?php bloginfo( 'name' ); ?></p>
                <p class="site-logo-text"><?php bloginfo( 'description' ); ?></p>
            </a>


            <div class="navigation-wr">
                <?php if(has_nav_menu('top')): ?>
                    <nav class="navigation">
                        <?php wp_nav_menu(array(
                                'theme_location' => 'top',
                                'menu_id'        => 'top-menu',
                                'container'      => '',
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>

                <div class="right-sec-nav d-flex align-items-center">
					
					
                    <?php /* if(1) { ?>
						<a href="#" id="search-smart" class="d-flex align-items-center">
							<i class="icon ion-ios-search"></i>
						</a>
						<div class="smart-search-form hidden">
							<a href="#" class="smart-search-close"><i class="ion ion-android-close"></i></a>
							<?php get_search_form(); ?>
						</div>
					<?php } */ ?>
					<div class="lang-swt">
					<?php pll_the_languages(array('show_flags'=>1,'show_names'=>1));?>
					<div class="account-cust">
						<ul>
							<li>
								<?php if(is_user_logged_in()) { 
									echo $username; 
								} else { ?>
									<a href="<?php echo pll_get_page_url('/user/'); ?>"><i class="fa fa-user-o" aria-hidden="true"></i>
										<?php echo __('My Profile', 'ladystar'); ?>
									</a>
								<?php } ?>
								
								<ul class="drop-down">
									<li>
										<?php if(is_user_logged_in()) { ?>
											<a href="<?php echo pll_get_page_url('user'); ?>" title="<?php _e('My Ads', 'ladystar'); ?>" class="logout d-flex align-items-center active_link" style=";">
												<i class="icon ion-plus"></i> <?php _e('My Account', 'ladystar'); ?>
											</a>
											<a href="<?php echo pll_get_page_url('user') . '?action=my-ads'; ?>" title="<?php _e('My Ads', 'ladystar'); ?>" class="logout d-flex align-items-center active_link" style=";">
												<i class="icon ion-plus"></i> <?php _e('My Ads', 'ladystar'); ?>
											</a>
											<a href="<?php echo pll_get_page_url('user') . '?action=add-listing'; ?>" title="<?php _e('Post an Ad', 'ladystar'); ?>" class="logout d-flex align-items-center active_link" style=";">
												<i class="icon ion-plus"></i> <?php _e('Post an Ad', 'ladystar'); ?>
											</a>
											<a href="<?php echo pll_get_page_url('user') . '?action=wallet'; ?>" title="<?php _e('My Wallet', 'ladystar'); ?>" class="logout d-flex align-items-center active_link" style=";">
												<i class="icon ion-plus"></i> <?php _e('My Wallet', 'ladystar'); ?>
											</a>
											<a href="<?php echo wp_logout_url(pll_get_page_url('user')); ?>" title="Logout" class="logout d-flex align-items-center active_link" style=";">
												<i class="icon ion-power"></i> <?php _e('Logout', 'ladystar'); ?>
											</a>
										<?php } else { ?>
											<a href="<?php echo pll_get_page_url('user'); ?>" title="<?php _e('Login/Register', 'ladystar'); ?>" 	class="logout d-flex align-items-center active_link" style="color: #ea1d5e;">
												<i class="icon ion-power"></i> <?php _e('Login/Register', 'ladystar'); ?>
											</a>
										<?php }  ?>
									</li>
								</ul>
							</li>
						</ul>
						
					</div>
                </div>
                </div>
                <i class="fa fa-times" aria-hidden="true"></i>
            </div>
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>
</header>
<!-- End Navbar -->

<main class="main">