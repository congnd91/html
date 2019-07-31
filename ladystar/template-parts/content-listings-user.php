<?php 

$url = THEME_URI . '/assets/img/icon/demo-img.png'; 
if(has_post_thumbnail()) {
	$url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); 	
}

global $current_user;
$user_id = $current_user->ID; 

// Get positions text
$devon_positions = new DEVON_POSITIONS(); 
$position_text = $devon_positions->get_text(get_the_ID(), 'promo'); 
$position_text_top = $devon_positions->get_text(get_the_ID(), 'top'); 
$position_text_home = $devon_positions->get_text(get_the_ID(), 'home'); 

$meta_fields = array('age', 'height', 'weight', 'hair_color', 'eyes'); 
//$meta_fields = array(); 
$custom = get_post_custom(get_the_ID()); 
$taxonomies = devon_wp_get_post_terms(get_the_ID()); 
$price = isset($custom['price'][0]) ? $custom['price'][0] : '';
$featured_in_listings = (isset($custom['featured_in_listings'][0]) && $custom['featured_in_listings'][0]) ? $custom['featured_in_listings'][0] : 0; 
$viewed_in_detail = (isset($custom['viewed_in_detail'][0]) && $custom['viewed_in_detail'][0]) ? $custom['viewed_in_detail'][0] : 0; 

$row_class= ''; 
$promotions = devon_if_promoted(get_the_ID()); 
$row_classes = array(); 
$promoted_for = array(); 
foreach($promotions as $promotion=>$expiry) {
	if($promotion!='is_verified' && isset($expiry) && !empty($expiry)) {
		// $row_classes[] = 'ad_'.$promotion; 
		
		$text = __('Ad is promoted for ' . strtoupper($promotion), 'ladystar'); 
		$promoted_for[] = '<span title="'.$text.'" class="btn btn-classic btn-border p-1 mt-1 mr-1" style="font-size:9px">'.strtoupper($promotion).'</span>'; 
	}
}

if(isset($custom['is_verified']) && $custom['is_verified']==1) {
	$row_classes[] = 'is_verified'; 
}

if(isset($listing_status['listing_status'][0])) {
	switch($custom['listing_status'][0]) {
		case 'pending' : 
			$view_btn_text = __('Edit Ad', 'ladystar'); 
			break; 
		case 'rejected' : 
			$view_btn_text = __('Edit Ad', 'ladystar'); 
			break; 
		case 'approved' : 
			$view_btn_text = __('View Ad', 'ladystar'); 
			break; 
	}
}

?>
	<div class="col-md-12">
		<div class="devon-row model-row mt-1 p-1 <?php echo implode(' ', $row_classes); ?>" style="overflow:hidden;">
			
			<div class="column-preview col-lg-3 col-sm-3 p-0 pull-left eq-height">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img src="<?php echo $url ?>" class="d-block">
				</a>
				<?php echo '<p class="text-center m-0">' . implode('', $promoted_for) . '</p>'; ?>
			</div>
			
			<div class="col-lg-9 col-sm-9 pull-right eq-height">
			
				<!-- Actions options -->
				<div class="wrapper-demo btn-options btn-actions-options">
					<div id="" class="wrapper-dropdown wrapper-dropdown-5" tabindex="1"><?php echo __('Actions', 'ladystar'); ?>
						<ul class="dropdown">
							<li>
								<a href="<?php echo pll_get_page_url('user') . '?action=edit-listing&id='.get_the_ID(); ?>" class="link" style=";">
									<i class="icon ion-edit"></i> <?php echo __('Edit Ad', 'ladystar'); ?>
								</a>
							</li>
							<li>
								<a href="<?php echo pll_get_page_url('user') . '?action=manage-images&id='.get_the_ID(); ?>" class="link" style=";">
									<i class="icon ion-images"></i> <?php echo __('Images', 'ladystar'); ?>
								</a>
							</li>
							<?php if($custom['listing_status'][0]=='approved') { ?>
								<li>
									<?php if(devon_if_activated(get_the_ID())) { ?>
										<a href="#" title="Deactivate Listing" class="link active_link btn-activate-listing" data-action="deactivate" data-id="<?php echo get_the_ID(); ?>"><i class="fa fa-eye-slash"></i> <?php echo esc_html__('Deactivate', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
									<?php } else { ?>
										<a href="#" title="Activate Listing" class="link active_link btn-activate-listing" data-action="activate" data-id="<?php echo get_the_ID(); ?>"><i class="fa fa-eye"></i> <?php echo esc_html__('Activate', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
									<?php } ?>								
								</li>
							<?php } ?>
							
							<li>
								<a href="#" title="<?php _e('Refresh Ad', 'ladystar'); ?>" class="link active_link btn-refresh-ad" data-id="<?php echo get_the_ID(); ?>" data-user="<?php echo $user_id; ?>"><i class="fa fa-refresh"></i> <?php echo esc_html__('Refresh', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
							</li>
						</ul>
					</div>
				​</div>
				
				<p class="mb-0 font-weight-bold"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="font-size:1.3em;"><?php the_title(); ?></a></p>
				
				<small class="d-block mb-2">
				
					<?php if(isset($taxonomies['service_categories'][0])) { ?>
						<?php echo devon_get_terms_link($taxonomies['service_categories'], 'service_categories'); ?>
					<?php } ?>
					<?php if(isset($taxonomies['locations'][0])) { ?>
						<i class="icon ion-android-arrow-forward separator"></i>
						<?php echo devon_get_terms_link($taxonomies['locations'], 'locations'); ?>
					<?php } ?>
					
					<span class="listing-stats">
						<!-- removed listing-status from here -->
						<span class="ml-1" style="font-size:0.85em;">
							(<span title="<?php echo __("Last Updated at", 'ladystar'); ?> <?php echo get_the_modified_date('d M, Y H:i a', get_the_ID());  ?>" class="momentjs-time"><?php echo get_the_modified_date('Y-m-d H:i:s'); ?></span>)
						</span>
					</span>	
				</small>	
				
				<div class="model-attr mt-2 mb-2">
					<?php 
						$meta = array(); 
						foreach($meta_fields as $field) {
							if(isset($custom[$field][0]) && !empty($custom[$field][0])) { 
								switch($field) {
									case 'price' : $meta[] = $custom[$field][0] . 'lv'; break; 
									case 'age' : $meta[] = $custom[$field][0] . ' ' . __('years old', 'ladystar'); break; 
									case 'weight' : $meta[] = $custom[$field][0] . ' ' . __('kg', 'ladystar'); break; 
									case 'height' : $meta[] = $custom[$field][0] . ' ' . __('cm', 'ladystar'); break; 
									case 'eyes' : $meta[] = devon_ucwords($custom[$field][0]) . ' ' . __('eyes', 'ladystar'); break; 
									case 'hair_color' : $meta[] = devon_ucwords($custom[$field][0]) . ' ' . __('hair', 'ladystar'); break; 
								}
							}
						}
						echo '<p class="mb-0">'.implode(', ', $meta).'</p>'; 
					?>
				</div>
				
				<?php if(!isset($custom['listing_status'][0]) OR $custom['listing_status'][0]!='rejected') { ?>
					<p class="profile-desc"><?php echo get_the_excerpt(); ?></p>
				<?php } else { ?>
					<div class="alert alert-danger">
						<p class="profile-desc"><?php echo $custom['justification_text'][0]; ?></p>						
					</div>
				<?php } ?>
				
				<?php if(isset($custom['listing_status'][0]) && $custom['listing_status'][0]=='approved') { ?>					
					<div class="wrapper-btn-group text-right">
						
						<?php if(!empty($position_text) || !empty($position_text_top)) { ?>
							<div class="wrapper-demo btn-options btn-position-options">
								<div id="" class="wrapper-dropdown wrapper-dropdown-5 btn-view-position" tabindex="1"><?php echo __('View Position', 'ladystar'); ?>									</div>
							​</div>
						<?php } ?>
						
						<div class="wrapper-demo btn-options btn-reverse-options btn-promote-options">
							<div id="" class="wrapper-dropdown wrapper-dropdown-5" tabindex="1"><?php echo __('Promote', 'ladystar'); ?>
								<ul class="dropdown">
									<?php 
										$promotion_links = devon_promote_links(get_the_ID()); 
										foreach($promotion_links as $link) {
											echo '<li>'; 
												echo $link; 
											echo '</li>'; 
										}
									?>
								</ul>
							</div>
						​</div>						
					​</div>
				<?php } ?>
				
				<!-- Position info -->
				<?php if(isset($custom['listing_status'][0]) && $custom['listing_status'][0]!='rejected') { ?>							
					<?php if(!empty($position_text_home) || !empty($position_text) || !empty($position_text_top)) { ?>
						<div class="alert alert-dark mb-0 mt-2 py-1 px-2 view-position-text" style="text-align:left;display:none;">
							<?php if(isset($position_text_home) && !empty($position_text_home)) { echo '<div>'.$position_text_home.'</div>'; } ?>
							<?php if(isset($position_text_top) && !empty($position_text_top)) { echo '<div>'.$position_text_top.'</div>'; } ?>
							<?php if(isset($position_text) && !empty($position_text)) { echo '<div>'.$position_text.'</div>'; } ?>								
						</div>															
					<?php } ?>		
				<?php } ?>		
				
				<div class="text-center mb-1 hidden">
				
					<?php if(isset($custom['listing_status'][0]) && $custom['listing_status'][0]!='rejected') { ?>
						<?php $modal_id = 'modal-promote-options-'.get_the_ID(); ?>
						<a href="#" class="btn btn-option mr-1 hidden" data-toggle="modal" data-target="#<?php echo $modal_id; ?>"><?php echo esc_html__('Promote Ad', 'ladystar') ?></a>													
						<?php echo devon_promote_modal(get_the_ID(), $modal_id); ?>
					<?php } // hidden promote button and modal config ?>
					
				</div>
				
			</div>			
			
		</div>
	</div>