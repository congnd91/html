<?php
	/*
        * Template Name: User Page
        * Page template for
        *
    */   

if (!is_user_logged_in()) {
	wp_redirect(pll_get_page_url('auth'));exit;
}

global $current_user;
wp_get_current_user();
$user_id = $current_user->ID; 
if( ! $wallet_balance = devon_get_user_wallet_amount($user_id) )  {
	$wallet_balance = 0; 
}
	
the_post();
?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-9">
			<?php 
			if (isset($_GET['action']) && $_GET['action'] != '') {
				switch ($_GET['action']) {
					case 'phones':
						require_once('partials/user-phones.php');
						break;
					case 'emails':
						require_once('partials/user-emails.php');
						break;
					case 'faq':
						require_once('partials/user-faq.php');
						break;
					case 'my-ads':
						require_once('partials/user-ads.php');
						break;
					case 'wallet':
						require_once('partials/user-wallet.php');
						break;
					case 'payment':
						require_once('partials/user-payment.php');
						break;						
					case 'edit-listing':
						require_once('partials/user-edit-listing.php');
						break;												
					case 'add-listing':
						require_once('partials/user-add-listing.php');
						break;												
					case 'add-room':
						require_once('partials/user-add-room.php');
						break;										
					case 'edit-room':
						require_once('partials/user-edit-room.php');
						break;
					case 'my-rooms':
						require_once('partials/user-rooms.php');
						break;												
					case 'manage-images':
						require_once('partials/user-manage-images.php');
						break;
					case 'change-password':
						require_once('partials/user-change-password.php');
						break;																	
					default: 
						require_once('partials/user-settings.php');						
						break; 
				}
			} else {
				require_once('partials/user-ads.php');
				// the_content();
			} ?>
		</div>

		<aside class="col-lg-3 widgets">
			<?php if(current_user_can('administrator')) { ?>
				<div class="widget widget_recent_entries side">
					<h2 class="widget-title"><span><?php echo esc_html__('You\'re Admin', 'ladystar') ?></span></h2>
					<ul>
						<li><a class="btn-classic" tabindex="0" href="<?php echo admin_url(); ?>"><span><?php echo __('Go to Dashboard', 'ladystar') ?></span><i class="icon ion-play"></i></a></li>
						<li><a class="btn-classic" tabindex="0" href="<?php echo admin_url('/admin.php?page=listing'); ?>"><span><?php echo esc_html__('Manage Ads', 'ladystar') ?></span><i class="icon ion-play"></i></a></li>
					</ul>
				</div>
			<?php } ?>
			<div class="widget widget_recent_entries side">
				<h2 class="widget-title"><span><?php echo esc_html__('Ads', 'ladystar') ?></span></h2>
				<ul>
					<li>
						<a href="<?php echo pll_home_url('/user/'); ?>?action=my-ads"><?php echo esc_html__('My Ads', 'ladystar') ?></a>
						&nbsp; <a href="<?php echo pll_home_url('/user/'); ?>?action=add-listing">(<?php echo esc_html__('Add New', 'ladystar') ?>)</a>
					</li>					
					<li>
						<a href="<?php echo pll_home_url('/user/'); ?>?action=my-rooms"><?php echo esc_html__('Leisure Rooms', 'ladystar') ?></a>
						&nbsp; <a href="<?php echo pll_home_url('/user/'); ?>?action=add-room">(<?php echo esc_html__('Add New', 'ladystar') ?>)</a>
					</li>
				</ul>
			</div>
			<div class="widget widget_recent_entries side">
				<h2 class="widget-title"><span><?php echo esc_html__('Profile', 'ladystar') ?></span></h2>
				<ul>
					<li><a href="<?php echo pll_home_url('/user/'); ?>?action=settings"><?php echo esc_html__('Settings', 'ladystar') ?></a></li>
					<li>
						<a href="<?php echo pll_home_url('/user/'); ?>?action=phones"><?php echo esc_html__('Phones', 'ladystar') ?></a>
						&nbsp;/&nbsp; <a href="<?php echo pll_home_url('/user/'); ?>?action=emails"><?php echo esc_html__('Emails', 'ladystar') ?></a>
					</li>
					<li><a href="<?php echo pll_home_url('/user/'); ?>?action=faq"><?php echo esc_html__('FAQ', 'ladystar') ?></a></li>
				</ul>
			</div>
			<div class="widget widget_recent_entries side">
				<h2 class="widget-title"><span><?php echo esc_html__('Wallet', 'ladystar') ?></span>
				
				</h2>
				<ul>
					<li><a href="<?php echo pll_home_url('/user/'); ?>?action=wallet"><?php echo esc_html__('Balance: ', 'ladystar') ?> $<?php echo $wallet_balance; ?></a></li>
				</ul>
			</div>
		</aside>

	</div>
</div>
<?php get_footer(); ?>