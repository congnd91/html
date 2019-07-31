<?php 

$url = THEME_URI . '/assets/img/icon/demo-img.png'; 
if(has_post_thumbnail()) {
	$url = get_the_post_thumbnail_url(null, 'top-ad'); 	
}

$meta_fields = array('price', 'location'); 
$custom = get_post_custom(); 
$price = isset($custom['price'][0]) ? $custom['price'][0] : '';
$location = isset($custom['location'][0]) ? $custom['location'][0] : '';

$row_classes = array(); 
if(isset($custom['is_verified']) && $custom['is_verified']==1) {
	$row_classes[] = 'is_verified'; 
}

$reload = get_query_var('reload', false); 

devon_update_meta(get_the_ID(), 'featured_in_listings', 1, '+');
$taxonomies = devon_wp_get_post_terms(get_the_ID(), 'leisure-rooms'); 

?>

<article class="model-row model-row-final <?php echo implode(' ', $row_classes); ?>">
	<div class="row row-models-list-item" data-id="<?php echo get_the_ID(); ?>">
		<div class="column column-preview">
			<a href="<?php the_permalink() ?>" class="list-thubnail img-wr">
				<img src="<?php echo $url ?>" alt="">
			</a>
		</div>
		
		<div class="container" style="padding: 0px">			
			<div class="col-md-9 pull-left mt-1">
				<h2 class="profile-title mb-0">	
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="font-size:inherit;"><?php the_title(); ?></a>
				</h2>
				<p class="profile-location">
				
					<span class="attr-value"><?php echo $custom['location'][0]; ?></span>	
					
					<span class="ml-1" style="font-size:0.85em;">
						(<span title="<?php echo __("Last Updated at", 'ladystar'); ?> <?php echo get_the_modified_date('d M, Y H:i a');  ?>" class=""><?php echo human_time_diff(current_time('U'), get_the_modified_date('U')) . ' ' . __('ago', 'ladystar'); ?></span>)
					</span>
					
					<?php if(is_array($taxonomies['amenities']) && sizeof($taxonomies['amenities'])) { ?>					
						<span class="attr-value d-block"><?php echo devon_get_terms_link($taxonomies['amenities'], 'amenities'); ?></span>	
					<?php } ?>
				</p>
				
				<div class="profile-desc"><?php echo get_the_excerpt(); ?></div>
			</div>
			
			<!-- ToDo: Temp style margin-top:35px for alignment of favorite box -->
			<div class="col-md-2 pr-0 pull-right mt-1 text-center col-listing-right" style="margin-top: 35px !important;">
				<p class="soc-icons-wr big">
					<span class="is_favorite soc-icon">
						<?php 
							$name = 'ladystar_favorites'; 
							$favorites = devon_cookie_reader($name);
							if(is_null($favorites) || !in_array(get_the_ID(), $favorites)) { ?>
								<a href="#" class="add-favorites-action" data-reload="<?php echo $reload; ?>"><i class="icon ion-android-favorite"></i></a>
								<a href="#" class="remove-favorites-action hidden" data-reload="<?php echo $reload; ?>"><i class="icon ion-android-favorite"></i></a>						
							<?php } else { ?>
								<a href="#" class="add-favorites-action hidden" data-reload="<?php echo $reload; ?>"><i class="icon ion-android-favorite"></i></a>
								<a href="#" class="remove-favorites-action" data-reload="<?php echo $reload; ?>"><i class="icon ion-android-favorite"></i></a>
								<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator"></i>
							<?php } ?>
							<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator"></i>
					</span>
				</p>
				
				<p class="mt-1 mb-1" style="font-size:2em;"><?php echo $price . ' BGN'; ?></p>				
				
				<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator" style="display:none;"></i>
			</div>			
		</div>
	</div>
</article>