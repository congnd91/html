<?php 
	$listing_status = (isset($_GET['status']) && !empty($_GET['status'])) ? $_GET['status'] : 'approved'; 			
	$phones = devon_get_user_phones($user_id); 
	$emails = devon_get_user_emails($user_id); 
	
	// ToDo: Remove when implmented at all possible places
	// Improvement scope: 30 minutes position update time
	$devon_positions = new DEVON_POSITIONS(); 
	$devon_positions->set_positions(); 	
		
?>

	<?php if(!sizeof($phones) or !sizeof($emails)) { ?>
		<div class="my-ads-container" style="overflow:hidden;">
			<?php if(!sizeof($phones) && !sizeof($emails)) { ?>
				<p class="alert alert-info">
					<?php _e('Please add atlese one phone number and one email to your profile before you add an Ad.', 'ladystar'); ?> 
					<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=phones"><?php echo esc_html__('Add Phones', 'ladystar') ?></a>
				</p>
			<?php } else if(!sizeof($phones)) { ?>
				<p class="alert alert-info">
					<?php _e('You have not added any phone numbers to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
					<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=phones"><?php echo esc_html__('Add Phones', 'ladystar') ?></a>
				</p>
			<?php } else if(!sizeof($emails)) { ?>
				<p class="alert alert-info">
					<?php _e('You have not added any emails to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
					<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=emails"><?php echo esc_html__('Add Emails', 'ladystar') ?></a>
				</p>
			<?php } ?>
		</div>
	<?php } ?>

<div class="user-main">
	<h2>
		<?php _e('My ' . devon_ucwords($listing_status) . ' Ads', 'ladystar'); ?>		
		<div class="pull-right">
			<a href="<?php echo pll_get_page_url('user') . '?action=add-listing'; ?>" title="Add New Listing" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i></a>
		</div>
	</h2>	
	
	<div class="my-ads-container" style="overflow:hidden;">
		<div class="row">
			<div class="col-md-12 text-center">
				<a class="<?php if($listing_status=='approved') echo 'color-pink'; ?>" href="<?php echo pll_get_page_url('user') . '?action=my-ads&status=approved'; ?>" class=""><?php echo __('Approved Ads', 'ladystar'); ?></a>
				&nbsp;|&nbsp;
				<a class="<?php if($listing_status=='pending') echo 'color-pink'; ?>" class="" href="<?php echo pll_get_page_url('user') . '?action=my-ads&status=pending'; ?>" class=""><?php echo __('Pending Ads', 'ladystar'); ?></a>
				&nbsp;|&nbsp;
				<a class="<?php if($listing_status=='rejected') echo 'color-pink'; ?>" href="<?php echo pll_get_page_url('user') . '?action=my-ads&status=rejected'; ?>" class=""><?php echo __('Rejected Ads', 'ladystar'); ?></a>
			</div>
		</div>
		
		<div class="model-row-wrap">
						
			<?php 
				if(is_user_logged_in()) {
					global $current_user;
					wp_get_current_user();
					$author_query = array(
						'post_status'=>'any', 
						'post_type'=>'listings',
						'posts_per_page' => '-1',
						'author' => $current_user->ID, 
						'orderby' => 'modified',
						'order' => 'DESC',
						'meta_query' => array(
							array('key'=>'listing_status', 'compare'=>'LIKE', 'value' => $listing_status ),		
						)
					);
					$author_posts = new WP_Query($author_query);
					
					if($author_posts->have_posts()) { ?>					
					<?php
						echo '<div class="row">'; 
							while($author_posts->have_posts()) : $author_posts->the_post();
								get_template_part('template-parts/content', 'listings-user');
							endwhile;
						echo '</div>'; 
					}
					else {
						echo '<div class="row">'; 
							echo '<div class="col-md-12 text-center">'; 
								echo '<div class="alert alert-info">'; 
									if($listing_status=='approved') {
										echo __('No Approved Ads', 'ladystar');
									}
									elseif($listing_status=='rejected') {
										echo __('No Rejected Ads', 'ladystar');
									}
									elseif($listing_status=='pending') {
										echo __('No Pending Ads', 'ladystar');
									}
									else {
										echo __('No ' . devon_ucwords($listing_status) . ' Ads', 'ladystar');
									}
								echo '</div>'; 
							echo '</div>'; 
						echo '</div>'; 
					}
					
					wp_reset_postdata(); 
				}
			?>	
		
		</div>
	</div>
</div>