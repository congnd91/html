<?php 

$url = THEME_URI . '/assets/img/icon/demo-img.png'; 
if(has_post_thumbnail()) {
	$url = get_the_post_thumbnail_url(null, 'top-ad'); 	
}

$meta_fields = array('age', 'height', 'weight', 'hair_color', 'eyes'); 
$right_fields = array('hair_color', 'height'); 
$left_fields = array('age', 'weight'); 
$custom = get_post_custom(); 
$price = isset($custom['price'][0]) ? $custom['price'][0] : '?';

$promotions = devon_if_promoted(); 
$row_classes = array(); 
foreach($promotions as $promotion=>$expiry) {
	if(isset($expiry) && !empty($expiry)) 
		$row_classes[] = 'ad_'.$promotion; 
}

if(isset($custom['is_verified']) && $custom['is_verified']==1) {
	$row_classes[] = 'is_verified'; 
}

$reload = get_query_var('reload', false); 

devon_update_meta(get_the_ID(), 'featured_in_listings', 1, '+');

$taxonomies = devon_wp_get_post_terms(get_the_ID()); 
if(is_tax('locations')) {
	$current_term_id = get_queried_object_id(); 
	$taxonomy = get_query_var( 'taxonomy' );
	$current_term_slug = get_query_var( 'term' );
	$term = get_term_by( 'id', $current_term_id, get_query_var('taxonomy') );
	$current_term_name = $term->name;
	devon_update_location(get_the_ID(), $term, $position_counter, $total_positions); 
	$author = get_the_author(); 
}
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
				<p class="profile-locations">
					<?php if(is_array($taxonomies['locations']) && sizeof($taxonomies['locations'])) { ?>					
						<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['locations'], 'locations'); ?></span>					
					<?php } ?>
				
					<span class="ml-1" style="font-size:0.85em;">
						(<span title="<?php echo __("Last Updated at", 'ladystar'); ?> <?php echo get_the_modified_date('d M, Y H:i a');  ?>" class=""><?php echo human_time_diff(current_time('U'), get_the_modified_date('U')) . ' ' . __('ago', 'ladystar'); ?></span>)
					</span>
				</p>
				
				<div class="profile-desc"><?php echo get_the_excerpt(); ?></div>					
			</div>
			
			<!-- ToDo: Temp style margin-top:35px for alignment of favorite box -->
			<div class="col-md-2 pr-0 pull-right text-center col-listing-right mt-2">
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
				
				<p class="mt-1 mb-1 price-col" style="font-size:2em;"><?php echo $price . ' BGN'; ?></p>				
				
				<p class="age-weight-col">
					<?php 
						$str_array = array(); 
						if(isset($custom['age'][0])) $str_array[] = $custom['age'][0] . ' ' . __('years', 'ladystar');
						if(isset($custom['weight'][0])) $str_array[] = $custom['weight'][0] . ' ' . __('kgs', 'ladystar'); 
						echo implode(', ', $str_array); 
					?>
				</p>
				
				<?php 
					// ToDo: Remove test data
					echo devon_test_data_for_each_add(get_the_ID());
				?>
				
				<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator" style="display:none;"></i>
			</div>			
		</div>
	</div>
</article>