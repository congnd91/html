<?php 

$url = THEME_URI . '/assets/img/icon/demo-img.png'; 
if(has_post_thumbnail()) {
	$url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); 	
}

global $current_user;
$user_id = $current_user->ID; 

$meta_fields = array('price', 'location'); 
//$meta_fields = array(); 
$custom = get_post_custom(get_the_ID()); 
$taxonomies = devon_wp_get_post_terms(get_the_ID(), 'leisure-rooms'); 
$price = isset($custom['price'][0]) ? $custom['price'][0] : '';
$location = isset($custom['location'][0]) ? $custom['location'][0] : '';
$row_classes = array(); 

if(isset($custom['is_verified']) && $custom['is_verified']==1) {
	$row_classes[] = 'is_verified'; 
}

if(isset($listing_status['listing_status'][0])) {
	switch($custom['listing_status'][0]) {
		case 'pending' : 
			$view_btn_text = 'Edit Ad'; 
			break; 
		case 'rejected' : 
			$view_btn_text = 'Edit Ad'; 
			break; 
		case 'approved' : 
			$view_btn_text = 'View Ad'; 
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
			</div>
			
			<div class="col-lg-9 col-sm-9 pull-right eq-height">
			
				<p class="mb-0 font-weight-bold"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="font-size:1.3em;"><?php the_title(); ?></a></p>
				<div class="model-attr mt-2 mb-2">
					<?php 
						$meta = array(); 
						foreach($meta_fields as $field) {
							if(isset($custom[$field][0]) && !empty($custom[$field][0])) { 
								switch($field) {
									case 'location' : $meta[] = $custom[$field][0]; break; 
									case 'price' : $meta[] = $custom[$field][0] . 'lv'; break; 
								}
							}
						}
						echo '<p class="mb-0">';
							echo implode(', ', $meta);							
							echo ' (<span title="'.__("Last Updated at", 'ladystar'). ' ' . get_the_modified_date('d M, Y H:i a').'>" class="momentjs-time">'.get_the_modified_date('Y-m-d H:i:s').'</span>)</span>';
						echo '</p>'; 
					?>
				</div>
				
				<p class="mb-0">
					<?php if(is_array($taxonomies['amenities']) && sizeof($taxonomies['amenities'])) { ?>					
						<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['amenities'], 'amenities'); ?></span>					
					<?php } ?>				
				</p>
				
				<?php if(!isset($custom['listing_status'][0]) OR $custom['listing_status'][0]!='rejected') { ?>
					<p class="profile-desc"><?php echo get_the_excerpt(); ?></p>
				<?php } else { ?>
					<div class="alert alert-danger">
						<p class="profile-desc"><?php echo $custom['justification_text'][0]; ?></p>						
					</div>
				<?php } ?>
				
				<?php if(!isset($custom['listing_status'][0]) OR $custom['listing_status'][0]!='rejected') { ?>					
				<?php } else { ?>
					<div class="listing-stats mt-1">
						<div class="alert alert-danger">
							<?php echo $custom['justification_text'][0]; ?>
						</div>
					</div>
				<?php } ?>
				
				<div class="btn-view-listing text-center mb-1" style="margin-top:2rem;">
				
					<a class="btn btn-option mr-1" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><i class="fa fa-eye"></i> View Ad</a>	
					<a class="btn btn-option mr-1" href="<?php echo pll_get_page_url('user') . '?action=edit-room&id='.get_the_ID(); ?>" title=""><i class="fa fa-pencil"></i> Edit Ad</a>
					
					<?php if(isset($custom['listing_status'][0]) && $custom['listing_status'][0]!='rejected') { ?>
						<?php if($custom['listing_status'][0]=='approved') {
							if(devon_if_activated(get_the_ID())) { ?>
								<a href="#" title="Deactivate Listing" class="btn btn-option mr-1 btn-activate-listing" data-action="deactivate" data-id="<?php echo get_the_ID(); ?>"><i class="fa fa-eye-slash"></i> <?php echo esc_html__('Deactivate', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
							<?php } else { ?>
								<a href="#" title="Activate Listing" class="btn btn-option mr-1 btn-activate-listing" data-action="activate" data-id="<?php echo get_the_ID(); ?>"><i class="fa fa-eye"></i> <?php echo esc_html__('Activate', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
							<?php } ?>
						<?php } ?>							
					<?php } ?>					
				</div>				
			</div>
		</div>
	</div>