<?php

/*
	Shortcode: topFiveAds
*/
add_shortcode( 'topFiveAds', 'devon_sc_topFiveAds' );
function devon_sc_topFiveAds($atts, $content='') { 
	$atts = shortcode_atts( array(
		'ids' => '',
		'post_type' => 'listings',
		'number' => 6,
		'service_category' => '',
		'category' => '',
		'location' => '',
		'service' => '',
		'service_location' => '',
		'age' => '',
		'price' => '',
		'height' => '',
		'weight' => '',
		'hair' => '',
		'venue' => '',
		'type' => false,		
	), $atts );
	
	$public_ad_args = devon_get_public_ad_args('taxonomy');
	$tax_query = array( 'relation' => 'AND' );
	$meta_query = array( 'relation' => 'AND' );
	$page = isset($atts['u']) ? $atts['u']-1 : 0; 	
	$offset = $page * $atts['number']; 
	
	// check if service taxonomy is to be included
    if (isset($atts['category']) && !empty($atts['category'])) {
        $tax_query[] = array(
            'taxonomy' => 'service_categories',
            'field' => 'term_id',
            'terms' => $atts['category']
        );
    }

    if (isset($atts['service']) && !empty($atts['service'])) {
		foreach(explode(',', $atts['service']) as $service_name) {
			$tax_query[] = array(
				'taxonomy' => 'services',
				'field' => 'term_id',
				'terms' => $service_name,
			);
		}
    }

    // check if actor location is to be included
    if (isset($atts['location']) && !empty($atts['location'])) {
        $tax_query[] = array(
            'taxonomy' => 'locations',
            'field' => 'term_id',
            'terms' => $atts['location']
        );
    }
    // check if actor service_locations is to be included
    if (isset($atts['venue']) && !empty($atts['venue'])) {
        $tax_query[] = array(
            'taxonomy' => 'service_locations',
            'field' => 'term_id',
            'terms' => $atts['venue']
        );
    }

    // check if actor service_locations is to be included
    if (isset($atts['hair']) && !empty($atts['hair'])) {
        $meta_query[] = array(
            'key' => 'hair_color',
            'value' => $atts['hair'],
            'compare' => '='
        );
    }

    if (isset($atts['price']) && !empty($atts['price'])) {
        $exp = explode('-', $atts['price']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'price',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }

    if (isset($atts['weight']) && !empty($atts['weight'])) {
        $exp = explode('-', $atts['weight']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'weight',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }

    if (isset($atts['age']) && !empty($atts['age'])) {
        $exp = explode('-', $atts['age']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'age',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }
	
	// Include only promoted ads for top
	$meta_query[] = array('key' => 'promotion_top', 'compare' => '!=', 'value' => '');
	
	$meta_query = array_merge($meta_query, $public_ad_args); 	
	$args = array(
		'post_type'  => 'listings',
		'offset'  => $offset,
		'posts_per_page' => $atts['number'],
		'meta_key' => 'promotion_top',
		'meta_type' => 'DATETIME',
		'orderby' => array('meta_value' => 'DESC', 'modified' => 'DESC'),
		'tax_query' => $tax_query,
		'meta_query' => $meta_query	
	);	
	
	// print_r($args); 
	
	$output = ''; 
	$query = new WP_Query($args);	
	//$output .= print_r($atts, true);  $output .= print_r('<hr>', true);  $output .= print_r($args, true); 
	
	$output .= '<!-- top-five List -->';
	$output .= '<section class="container">';
		$output .= '<div class="row top-five-wr categories-wr">';
			if($query->have_posts()) {
				$output .= '<div class="top-five-slider recently-featured-slider">';
					while($query->have_posts()) {
						$query->the_post();
						$url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'details-ad') : THEME_URI . '/assets/img/icon/demo-img.png';

						$output .= '<div class="categories-item-wr text-center">';
							$output .= '<a class="" href="'.get_the_permalink().'" class="item-wr">';
								$output .= '<img src="'.$url.'">';
								$output .= '<span>'.get_the_title().'</span>';
							$output .= '</a>';
						$output .= '</div>';
					}
				$output .= '</div>';
				
				while($query->have_posts()) {
					$query->the_post();
					$url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'details-ad') : THEME_URI . '/assets/img/icon/demo-img.png';

					$output .= '<div class="each-ad text-center d-md-block">';
					//$output .= '<div class="col-md-2 each-ad-col text-center d-md-block">';
						$output .= '<a class="" href="'.get_the_permalink().'" class="item-wr">';
							$output .= '<img src="'.$url.'">';
							$output .= '<span>'.get_the_title().'</span>'; 
						$output .= '</a>';
							// ToDo: Remove this modal for testing promotions
							$output .= devon_test_data_for_each_add(get_the_ID()); 
					$output .= '</div>';
				}								
			}					
		$output .= '</div>';
	$output .= '</section>';
	$output .= '<!-- End top-five List -->';
	return $output;
} 

/*
	Shortcode: categoryBoxes
	Used for category in box view
	Params: 
		number -> number of terms to show
		taxonomy -> service_categories, locations, service_locations, services
		Other params for get_terms function applicable
*/
add_shortcode( 'categoryBoxes', 'devon_sc_categories' );
function devon_sc_categories($atts, $content='') { 
	$atts = shortcode_atts( array(
		'ids' => '',
		'number' => 12,
		'hide_empty' => false,
		'taxonomy' => 'service_categories',
		'order' => 'desc',
		'parent' => '',
		'exclude' => '',
		'include' => '',
	), $atts );

	$service_categories = get_terms([
	    'taxonomy' => $atts['taxonomy'],
	    'hide_empty' => $atts['hide_empty'],
	    'number' => $atts['number'],
	    'order' => $atts['order'],
	]);
	
	$output = '';
	$images = get_option('taxonomy_image_plugin');
		
	$output = ''; 
	
	$output .= '<!-- Categories List -->';
	$output .= '<section class="container categories bigger">';
		$output .= '<h2 class="section-title lines"><span class="">'.__('Categories', 'ladystar').'</span></h2>';
		$output .= '<div class="row categories-wr">';
			$output .= '<div class="recently-featured-slider">';
			
				foreach($service_categories as $category) { 
					$url = add_query_arg(array('category'=>urlencode($category->name)), pll_get_page_url('ads')); 
					$output .= '<div class="col-md-6 col-lg-4 slick-slide categories-item-wr">';
						$output .= '<a href="'.$url.'" class="category-models-item" style="background-image: url('.wp_get_attachment_image_url( $images[$category->term_id], 'large' ).')">';
							$output .= '<footer class="categories-item-footer">';
								$output .= '<p class="category">'.$category->name.'</p>';
								$output .= '<p class="models-count">'.$category->count.' '.__('Ads', 'ladystar').'</p>';
							$output .= '</footer>';
						$output .= '</a>';
					$output .= '</div>';
				}
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';
	$output .= '<!-- End Categories List -->';

	return $output;
} 

/*
	Shortcode: showListings
	Used for showing different types of listing
	Params: 
		number -> no of ads to show
		service_category, location, service_location, services -> comma separated value with slugs
		type => popular, featured
*/
add_shortcode('showListings', 'devon_sc_popular_listing');
function devon_sc_popular_listing($atts, $content='') {

	$atts = shortcode_atts( array(
		'ids' => '',
		'post_type' => 'listings',
		'number' => 4,
		'service_category' => '',
		'location' => '',
		'service' => '',
		'service_location' => '',
		'type' => false,		
	), $atts );

	$meta_fields = array('height', 'weight', 'age', 'hair_color', 'eyes');

	$args = array(
		'post_type' => 'listings',
		'posts_per_page' => $atts['number'],
		'tax_query' => array('relation' => 'AND'),
		'meta_query' => array(
			'relation' => 'AND',
			array(
				'key' => 'is_activated',
				'compare' => 'EXISTS'
			),
			array(
				'key' => 'is_activated',
				'compare' => '=',
				'value' => true
			),
			array(
				'key' => 'listing_status',
				'compare' => '=',
				'value' => 'approved'
			)
		)
	);	

	// Set Query for shortcode listing type
	if(!$atts['type']) {
		if($atts['type']=='popular') {

		}
		else if($atts['type']=='featured') {
				
		}
	}

	// Handle Taxonomy Parameters
	if(!empty($atts['service_category'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'service_categories',
			'terms' => explode(',', trim($atts['service_category'])),
	        'field' => 'slug',
		);
	}
	if(!empty($atts['location'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'locations',
	        'terms' => explode(',', trim($atts['location'])),
	        'field' => 'slug',
		);
	}
	if(!empty($atts['service_location'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'service_locations',
	        'terms' => explode(',', trim($atts['service_location'])),
	        'field' => 'slug',
		);
	}
	if(!empty($atts['service'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'services',
	        'terms' => explode(',', trim($atts['service'])),
	        'field' => 'slug',
		);
	}

	$query = new WP_Query($args);	
	
	$output = '<div data-id="" class="elementor-element elementor-element-5922 elementor-widget elementor-widget-popular-models" data-element_type="popular-models.default">';
	   	$output .= '<div class="elementor-widget-container">';
	      	$output .= '<main>';
	         	$output .= '<!-- Popular Models List -->';
	         	$output .= '<section class="container popular-models model-row-wrap models-list-item">';
	            	$output .= '<h2 class="section-title lines"><span class="">Popular '.__('Ads', 'ladystar').'</span></h2>';
		            if($query->have_posts()) {
						while($query->have_posts()) {
							$query->the_post();
							$post_id = get_the_ID(); 
							$custom = get_post_custom();
							$thumbnail_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'full') : '';
							$output .= '<article class="model-row">';
				               	$output .= '<div class="row row-models-list-item">';
									$output .= '<div class="column column-preview">';
										$output .= '<a href="'.get_the_permalink().'" class="img-wr">';
										$output .= '<img src="'.$thumbnail_url.'" alt="">';
										$output .= '</a>';
									$output .= '</div>';
									$output .= '<div class="column column-caption">';
										$output .= '<div class="row-model-info">';
											$output .= '<h3 class="title">';
												$output .= '<a href="'. get_the_permalink().'">'.get_the_title().'</a>';
											$output .= '</h3>';
											$output .= '<div class="model-attr">';
												foreach ($meta_fields as $field) { 
												if(isset($custom[$field][0]) && !empty($custom[$field][0])) { 
													$output .= '<p class="attr-item">';
														$output .= '<span class="attr-name">'.str_replace('_', ' ', ucwords($field)).':</span>';
														$output .= '<span class="attr-value">'.$custom[$field][0].'</span>';
													$output .= '</p>';
													} 
												}
											$output .= '</div>';
											$output .= '<p class="rating">';
												$output .= '<i class="fa fa-star active" aria-hidden="true"></i>';
												$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
												$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
												$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
												$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
											$output .= '</p>';
										$output .= '</div>';
									$output .= '</div>';
									$output .= '<div class="column column-social">';
										$output .= '<p class="soc-icons-wr">';
											$output .= '<a href="https://twitter.com/home?status=http://www.ladystar.eu/listing-preview/sandra-baker" class="soc-icon"><i class="fa fa-twitter" target="_blank" aria-hidden="true"></i></a>';
											$output .= '<a href="https://www.facebook.com/share.php?u=http://www.ladystar.eu/listing-preview/sandra-baker&amp;title=Sandra" baker"="" target="_blank" class="soc-icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
										$output .= '</p>';
									$output .= '</div>';
									$output .= '<div class="column column-social">';
										$output .= '<p class="soc-icons-wr big">';
											$output .= '<span class="is_favorite soc-icon">';
												$output .= '<a href="#" class="add-favorites-action " data-loginpopup="true" data-id="15" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en"><i class="icon ion-android-favorite"></i></a>';
												$output .= '<a href="#" class="remove-favorites-action hidden" data-id="15" data-ajax="http://www.ladystar.eu/wp-admin/admin-ajax.php?lang=en"><i class="icon ion-android-favorite"></i></a>';
												$output .= '<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator"></i>';
											$output .= '</span>';
											$output .= '<a href="#" class="soc-icon"><i class="icon ion-ios-email-outline"></i></a>';
										$output .= '</p>';
									$output .= '</div>';
								$output .= '</div>';
				            $output .= '</article>';
						}
					}
	         	$output .= '</section>';
	         	$output .= '<!-- End Popular Models List -->';
	      	$output .= '</main>';
	   	$output .= '</div>';
	$output .= '</div>';

	return $output;
}

/*
	Shortcode: displayListings
	Used for showing different types of listing
	Params: 
		number -> no of ads to show
		service_category, location, service_location, services -> comma separated value with slugs
		type => popular, featured
*/
add_shortcode( 'displayListings', 'devon_sc_display_listing' );
function devon_sc_display_listing($atts, $content='') {

	$atts = shortcode_atts( array(
		'ids' => '',
		'post_type' => 'listings',
		'number' => 36,
		'service_category' => '',
		'location' => '',
		'service' => '',
		'service_location' => '',
		'title' => __('Recently Featured', 'ladystar'),
		'type' => false,		
		'img_size' => 'details-ad'
	), $atts );

	$meta_fields = array('height', 'weight', 'age', 'hair_color', 'eyes');	
	$public_ad_args = devon_get_public_ad_args('taxonomy');
	$tax_query = array( 'relation' => 'AND' );
	$meta_query = array( 'relation' => 'AND' );
	
	$meta_query = array_merge($meta_query, $public_ad_args); 

	// Do something extra for home-ads
	if($atts['type']=='home-ads') {
		$meta_query[] = array(
			'key' => 'promotion_home', 
			'compare' => '!=', 
			'value' => '', 
		);
	}
	
	$args = array(
		'post_type'  => $atts['post_type'],
		'posts_per_page' => $atts['number'],
		'tax_query' => $tax_query,
		'meta_query' => $meta_query	
	);	
	
	if($atts['post_type']=='listings') {
		$args['meta_key'] = 'promotion_home';
		$args['meta_type'] = 'DATETIME';
		$args['orderby'] = array('meta_value' => 'DESC', 'modified' => 'DESC');		
	}
	else {
		$args['orderby'] = array('modified' => 'DESC');		
	}
	
	$output = ''; 
	$query = new WP_Query($args);	
		
	$output .= '<!-- Popular Models List -->';
	//$output .= '<section class="container popular-models model-section">';
	$output .= '<section class="container">';
	$output .= '<h2 class="section-title lines"><span class="">'.$atts['title'].'</span></h2>';
		$output .= '<div class="row">';
			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post();
					$url = ''; 
					if(has_post_thumbnail()) {
						$url = get_the_post_thumbnail_url(null, $atts['img_size']); 	
					}

					$meta_fields = array('age', 'height'); 
					$custom = get_post_custom();
					$output .= '<article class="col-sm-6 col-lg-2 item-wr">	';
						$output .= '<a href="'.get_the_permalink().'" class="">';
							$output .= '<div class="model-item" style="background-image: url('.$url.')">';
								$output .= '<div class="model-info">';
									foreach($meta_fields as $field) {
										if(isset($custom[$field][0]) && !empty($custom[$field][0])) { 
											$output .= '<p class="archive-attr-item">'.str_replace('_', ' ', ucwords($field)).': ';
												$output .= '<span class="archive-attr-value">'.$custom[$field][0].'</span>';
											$output .= '</p>';
										}
									}
									$output .= '<p class="title color-pink hidden">';
										$output .= get_the_title();
									$output .= '</p>';
									$output .= '<p class="rating hidden">';
										$output .= '<i class="fa fa-star active" aria-hidden="true"></i>';
										$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
										$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
										$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
										$output .= '<i class="fa fa-star" aria-hidden="true"></i>';
									$output .= '</p>';
								$output .= '</div>';
							$output .= '</div>';
							$output .= '<div class="mt-1 text-center">'. get_the_title().'</div>'; 
						$output .= '</a>';
							
						// ToDo: Remove this modal for testing promotions
						$output .= devon_test_data_for_each_add(get_the_ID()); 
							
					$output .= '</article>';
				}
			}
		$output .= '</div>';
	$output .= '</section>';
	$output .= '<!-- End Popular Models List -->';

	return $output;
}


/*
	Shortcode: datingWidgets
	Used for showing dating widgets layout
	Params: 
		number -> no of cols, default 4		
*/
add_shortcode( 'datingWidgets', 'devon_sc_datingWidgets' );
function devon_sc_datingWidgets($atts, $content='') {

	$atts = shortcode_atts( array(
		'ids' => '',
		'post_type' => 'listings',
		'number' => 4,
		'service_category' => '',
		'location' => '',
		'service' => '',
		'service_location' => '',
		'type' => false,		
	), $atts );

	$args = array(
		'post_type' => 'listings',
		'posts_per_page' => $atts['number'],
		'tax_query' => array('relation' => 'AND'),
		'meta_key' => 'viewed_in_detail',
		'orderby' => array('meta_value_num' => 'DESC', 'modified' => 'DESC'),
	);	

	// Handle Taxonomy Parameters
	if(!empty($atts['service_category'])) {
		$args['tax_query'][] = array(
			'taxonomy' => 'service_categories',
			'terms' => explode(',', trim($atts['service_category'])),
	        'field' => 'slug',
		);
	}

	$output = ''; 
	$term = get_term_by('slug', $atts['service_category'], 'service_categories');	

	$widget_title = is_wp_error($term) ? __('More Ads') : $term->name; 	
	$query = new WP_Query($args);	
	
	$output .= '<!-- Dating widget for '.$atts['service_category'].' -->';
	$output .= '<div id="" class="widget widget_datingWidget side">';
		$output .= '<h2 class="widget-title" style="text-transform:none;">'.$widget_title.'</h2>';		
		$output .= '<ul class="datingWidget">';		
			if($query->have_posts()) {
				while($query->have_posts()) {
					$query->the_post();
					$url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'listings-table') : THEME_URI . '/assets/img/icon/demo-img.png';
					$price = get_post_meta(get_the_ID(), 'price', true) . ' ' . __('BGN', 'ladystar'); 
					$taxonomies = devon_wp_get_post_terms(); 	
					$details = array($price); 
					if(isset($taxonomies['locations'][0])) { 
						$details[] = devon_get_terms_link($taxonomies['locations'], 'locations');
					}						

					$output .= '<li>';
						$output .= '<a href="'.get_the_permalink().'">';
							$output .= '<span class="pull-left mr-1"><img src="'.$url.'" style="height:40px; weight:40px;"></span>';
							$output .= get_the_title() . ' <small class="pull-right"><i class="fa fa-eye"></i> '. get_post_meta(get_the_ID(), 'viewed_in_detail', true) . ' ' . __('views', 'ladystar') . '</small>';							
						$output .= '</a>';
						$output .= '<small class="d-block">'.implode(', ', $details).'</small>';
					$output .= '</li>';
				}
			}
			else $output .= '<li>'.__('No Ads here', 'ladystar').' </li>';
		$output .= '</ul>';
	$output .= '</div>';
	$output .= '<!-- End Dating widget for '.$atts['service_category'].' -->';

	return $output;
}

/*
	Shortcode: showPosts
	Used for showing different types of posts
	Params: 
		number -> no of posts to show
		category -> comma separated value with slugs
		tag -> comma separated value with slugs
*/
add_shortcode( 'showPosts', 'devon_sc_show_posts' );
function devon_sc_show_posts($atts, $content='') {

	$atts = shortcode_atts( array(
		'ids' => '',
		'post_type' => 'listings',
		'number' => 4,
		'category' => '',
		'tag' => '',
	), $atts );

	$meta_fields = array('height', 'weight', 'age', 'hair_color', 'eyes');

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $atts['number'],
		'tax_query' => array('relation' => 'AND')
	);	

	// Handle Taxonomy Parameters
	if(!empty($atts['category'])) {
		$args['category_name'] = explode(',', trim($atts['category']));
	}
	if(!empty($atts['tag'])) {
		$args['tag'] = explode(',', trim($atts['tag']));
	}

	$query = new WP_Query( $args );	

	$output = '<div data-id="24e9" class="elementor-element elementor-element-24e9 elementor-widget elementor-widget-latest-news" data-element_type="latest-news.default">';
	   	$output .= '<div class="elementor-widget-container">';
	      	$output .= '<main>';
	         	$output .= '<!-- Last Post List -->';
		        $output .= '<section class="container last-posts small">';
		           	$output .= '<h2 class="section-title lines"><span class="">Latest From Journal</span></h2>';
		            $output .= '<div class="row justify-content-center">';
		            	if($query->have_posts()) {
							while($query->have_posts()) {
								$query->the_post();
								$post_id = get_the_ID();
								$url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'full') : '';
								$category = get_the_category();
				               	$output.= '<article class="col-md-6 col-lg-4 last-post-wr">';
									$output .= '<a href="'.get_the_permalink().'" class="post-item no-decoration">';
										$output .= '<figure class="post-image" style="background-image: url('.$url.')">';
											$output .= '<div class="info">';
												$output .= '<p class="post-btn">View post</p>';
												$output .= '<p class="post-publish">';
													$output .= '<span class="publish-date">'.get_the_date().'</span>';
													$output .= '<span class="separator">·</span>';
													$output .= '<span class="publish-time">'.get_post_time("H:i").'</span>';  
												$output .= '</p>';
											$output .= '</div>';
										$output .= '</figure>';
										$output .= '<footer class="post-footer">';
											$output .= '<p class="post-category">'.$category[0]->name.'</p>';
											$output .= '<h3 class="post-title">'.get_the_title().'</h3>';
										$output .= '</footer>';
									$output .= '</a>';
								$output .= '</article>';
							}
						}
	            	$output .= '</div>';
	         	$output .= '</section>';
	         	$output .= '<!-- End Last Post List -->';
	      	$output .= '</main>';
	   	$output .= '</div>';
	$output .= '</div>';

	return $output;
}

/*
	Shortcode: showPosts
	Used for showing different types of posts
	Params: 
		number -> no of posts to show
		category -> comma separated value with slugs
		tag -> comma separated value with slugs
*/
add_shortcode( 'searchWidget', 'devon_sc_searchWidget' );
function devon_sc_searchWidget($atts, $content='') {
	
	global $devon_opts; 
	if(!isset($_POST)) {
		$hair_color = $eyes = ''; 
	}
	else {
		$eyes = isset($_POST['eyes']) ? $_POST['eyes'] : ''; 
		$hair_color = isset($_POST['hair_color']) ? $_POST['hair_color'] : ''; 				
	}
	
	global $devon_opts; 
	$locations = get_terms(['taxonomy' => 'locations','hide_empty' => false]);

	$atts = shortcode_atts( array(
		'ids' => '',
	), $atts );
	$output = '<section class="hero over-header" style="">';
		$output .= '<div class="container">';
			$output .= '<div class="over-header-inner">';
				$output .= '<h1 class="title">'.__('Find Perfect Date Now', 'ladystar').'</h1>';
				$output .= '<div class="devon_sc_sw_win_wrapper">';
		$output .= '<div class="ci sw_widget sw_wrap">';
			$output .= '<form action="'.pll_get_page_url('ads').'" class="sw_search_primary searh-model  devon-form-secondary">';
				$output .= '<span class="field_location select-item  col-sm-12" style="">';
					$output .= '<select name="location" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">'.__('Location', 'ladystar').'</option>';
						if(sizeof($locations)) {
							foreach($locations as $location) {
								$selected = ''; 
                                $output .= '<option value="'.$location->term_id.'" '. $selected.'>'.$location->name.'</option>';
							}
						}				
					$output .= '</select>';
				$output .= '</span>';
				
				$output .= '<span class="field_price select-item  col-sm-12" style="">';
					$output .= '<select name="price" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">'.__('Price', 'ladystar').'</option>';
						$output .= '<option value="80-120">'.__('80lv - 120lv', 'ladystar').'</option>';
						$output .= '<option value="120-200">'.__('120lv-200lv', 'ladystar').'</option>';
						$output .= '<option value="200-100000">'.__('200lv+', 'ladystar').'</option>';
					$output .= '</select>';
				$output .= '</span>';
				/*
				$output .= '<span class="field_height select-item  col-sm-12" style="">';
					$output .= '<select name="height" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">Height</option>';
						$output .= '<option value="Up to 170 cm">Up to 170 cm</option>';
						$output .= '<option value="171 - 180 cm">171 - 180 cm</option>';
						$output .= '<option value="181 - 190 cm">181 - 190 cm</option>';
						$output .= '<option value="Above 191 cm">Above 191 cm</option>';
					$output .= '</select>';
				$output .= '</span>';
				*/
				
				$output .= '<span class="field_age select-item  col-sm-12" style="">';
					$output .= '<select name="age" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">'.__('Age', 'ladystar').'</option>';
						$output .= '<option value="18-20">18 - 20 '.__('years old', 'ladystar').'</option>';
						$output .= '<option value="21-24">21 - 24 '.__('years old', 'ladystar').'</option>';
						$output .= '<option value="25-30">25 - 30 '.__('years old', 'ladystar').'</option>';
						$output .= '<option value="30-100">'.__('Above', 'ladystar').' 30 '.__('years', 'ladystar').'</option>';
					$output .= '</select>';
				$output .= '</span>';
				
				$output .= '<span class="field_weight select-item  col-sm-12" style="">';
					$output .= '<select name="weight" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">'.__('Weight', 'ladystar').'</option>';
						$output .= '<option value="0-50">'.__('Up to 50 kg', 'ladystar').'</option>';
						$output .= '<option value="50-60">'.__('50 - 60 kg', 'ladystar').'</option>';
						$output .= '<option value="60-200">'.__('Above 60 kg', 'ladystar').'</option>';
					$output .= '</select>';
				$output .= '</span>';				
				
				$output .= '<span class="field_hair_color select-item  col-sm-12" style="">';
					$output .= '<select name="hair" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">'.__('Hair', 'ladystar').'</option>';
						$output .= ladystar_create_options_from_list($devon_opts['hair_color'], $hair_color); 
					$output .= '</select>';
				$output .= '</span>';
				
				/*
				$output .= '<span class="field_eyes select-item  col-sm-12" style="">';
					$output .= '<select name="eyes" class="form-control selectpicker" title="Nothing selected">';
						$output .= '<option value="" selected="selected">Eyes</option>';
						$output .= ladystar_create_options_from_list($devon_opts['eyes'], $eyes); 
					$output .= '</select>';
				$output .= '</span>';
				*/

				//Hidden Fields
				$output .= '<div class="select-item  winter_dropdown_tree_style form-group group_location_id search_field hide_on_all hide_on_filters col-md-3" style="">';
					$output .= '<script>
						var dp_fields_1 = {"1":[""],"2":[""],"3":["15","22","21","20","19","16","27","26","25","24","23"],"4":[""],"5":["15","22","21","20","19","16","27"],"6":["15","22","21","20","19","16","27"],"7":["15","22","21","20","19","16","27"]}
						var dp_fields_1  = [];
						
						jQuery(document).ready(function($) {
						    $("#wintreeelem_0").winterTreefield({
						        ajax_url: "http://www.ladystar.eu/wp-admin/admin-ajax.php",
						        ajax_param: { 
						                      "page": "frontendajax_treefieldid",
						                      "action": "ci_action",
						                      "table": "treefield_m",
						                      "field_id": "1",
						                      "empty_value": "All Categories"
						                    },
						        attribute_id: "idtreefield",
						        language_id: "1",
						        attribute_value: "value",
						        skip_id: "",
						        empty_value: " - ",
						        text_search: "Search term",
						        text_no_results: "No results found",
						        callback_selected: function(key) {
						            $("#wintreeelem_0").trigger("change");
						
						                        $("*[class^="field_search_"]").show();
						            
						            if(dp_fields_1 [key])
						            {
						                $.each( dp_fields_1 [key], function( key, value ) {
						                    
						                    // Hide all dependent fields
						                    $(".field_search_"+value).hide();
						                    
						                                        $(".field_search_"+value).find("input:not([type="checkbox"])").val(null);
						                    $(".field_search_"+value).find("input[type="checkbox"]").prop( "checked", false );
						                    $(".field_search_"+value).find("input:checked").removeAttr("checked");
						                    $(".field_search_"+value).find($("option")).attr("selected",false)
						                    //tinymce.execCommand( "mceAddEditor", false, "input_"+value+"_1" );
						                                            
						                });
						            }
						        }
						    });
						});
					</script>';
					$output .= '<div class="winter_dropdown_tree color-secondary">';
						$output .= '<div class="btn-group"><button class="btn btn-default color-secondary" type="button">All Categories</button><button type="button" class="btn btn-default dropdown-toggle color-secondary"> <span class="glyphicon glyphicon-menu-down"></span> </button></div>';
						$output .= '<div class="list_container color-primary" style="display: none;">';
							$output .= '<div class="list_scroll">';
								$output .= '<ul class="list_items">';
									$output .= '<li key="">All Categories</li>';
									$output .= '<li key="7">Art</li>';
									$output .= '<li key="5">Catalog</li>';
									$output .= '<li key="6">Fitness</li>';
									$output .= '<li key="2">Glamour</li>';
									$output .= '<li key="3">Parts</li>';
									$output .= '<li key="1">Petite</li>';
									$output .= '<li key="4">Promo</li>';
								$output .= '</ul>';
							$output .= '</div>';
							$output .= '<div class="input-group"><input type="text" class="form-control color-secondary search_term" placeholder="Search term" aria-describedby="basic-addon2"><span class="input-group-addon color-secondary"><i class="loader-spiner fa fa-search"></i></span></div>';
						$output .= '</div>';
					$output .= '</div>';
					$output .= '<input name="search_category" value="" type="text" id="wintreeelem_0" readonly="" style="display: none;">';
				$output .= '</div>';
				$output .= '<!-- /.form-group -->';
				$output .= '<div class="select-item  winter_dropdown_tree_style form-group group_location_id search_field hide_on_all hide_on_filters col-md-3" style="">';
					$output .= '<script>
						var dp_fields_2 = []
						var dp_fields_2  = [];
						
						jQuery(document).ready(function($) {
						    $("#wintreeelem_1").winterTreefield({
						        ajax_url: "http://www.ladystar.eu/wp-admin/admin-ajax.php",
						        ajax_param: { 
						                      "page": "frontendajax_treefieldid",
						                      "action": "ci_action",
						                      "table": "treefield_m",
						                      "field_id": "2",
						                      "empty_value": "All Locations"
						                    },
						        attribute_id: "idtreefield",
						        language_id: "1",
						        attribute_value: "value",
						        skip_id: "",
						        empty_value: " - ",
						        text_search: "Search term",
						        text_no_results: "No results found",
						        callback_selected: function(key) {
						            $("#wintreeelem_1").trigger("change");
						
						            
						            if(dp_fields_2 [key])
						            {
						                $.each( dp_fields_2 [key], function( key, value ) {
						                    
						                    // Hide all dependent fields
						                    $(".field_search_"+value).hide();
						                    
						                                        $(".field_search_"+value).find("input:not([type="checkbox"])").val(null);
						                    $(".field_search_"+value).find("input[type="checkbox"]").prop( "checked", false );
						                    $(".field_search_"+value).find("input:checked").removeAttr("checked");
						                    $(".field_search_"+value).find($("option")).attr("selected",false)
						                    //tinymce.execCommand( "mceAddEditor", false, "input_"+value+"_1" );
						                                            
						                });
						            }
						        }
						    });
						});
					</script>';
					$output .= '<div class="winter_dropdown_tree color-secondary">';
						$output .= '<div class="btn-group"><button class="btn btn-default color-secondary" type="button">All Locations</button><button type="button" class="btn btn-default dropdown-toggle color-secondary"> <span class="glyphicon glyphicon-menu-down"></span> </button></div>';
						$output .= '<div class="list_container color-primary" style="display: none;">';
							$output .= '<div class="list_scroll">';
								$output .= '<ul class="list_items">';
									$output .= '<li key="">All Locations</li>';
									$output .= '<li key="23">Europe</li>';
									$output .= '<li key="24">&nbsp;&nbsp;Albania</li>';
									$output .= '<li key="25">&nbsp;&nbsp;Austria</li>';
									$output .= '<li key="29">&nbsp;&nbsp;Belarus</li>';
									$output .= '<li key="26">&nbsp;&nbsp;Belgium</li>';
									$output .= '<li key="28">&nbsp;&nbsp;Bosnia and Herz.</li>';
									$output .= '<li key="27">&nbsp;&nbsp;Bulgaria</li>';
									$output .= '<li key="38">&nbsp;&nbsp;Croatia</li>';
									$output .= '<li key="31">&nbsp;&nbsp;Czech Rep.</li>';
									$output .= '<li key="33">&nbsp;&nbsp;Denmark</li>';
									$output .= '<li key="34">&nbsp;&nbsp;Estonia</li>';
									$output .= '<li key="35">&nbsp;&nbsp;Finland</li>';
									$output .= '<li key="59">&nbsp;&nbsp;France</li>';
									$output .= '<li key="32">&nbsp;&nbsp;Germany</li>';
									$output .= '<li key="37">&nbsp;&nbsp;Greece</li>';
									$output .= '<li key="39">&nbsp;&nbsp;Hungary</li>';
									$output .= '<li key="41">&nbsp;&nbsp;Iceland</li>';
									$output .= '<li key="40">&nbsp;&nbsp;Ireland</li>';
									$output .= '<li key="42">&nbsp;&nbsp;Italy</li>';
									$output .= '<li key="45">&nbsp;&nbsp;Latvia</li>';
									$output .= '<li key="43">&nbsp;&nbsp;Lithuania</li>';
									$output .= '<li key="44">&nbsp;&nbsp;Luxembourg</li>';
									$output .= '<li key="47">&nbsp;&nbsp;Macedonia</li>';
									$output .= '<li key="46">&nbsp;&nbsp;Moldova</li>';
									$output .= '<li key="48">&nbsp;&nbsp;Montenegro</li>';
									$output .= '<li key="49">&nbsp;&nbsp;Netherlands</li>';
									$output .= '<li key="50">&nbsp;&nbsp;Norway</li>';
									$output .= '<li key="51">&nbsp;&nbsp;Poland</li>';
									$output .= '<li key="52">&nbsp;&nbsp;Portugal</li>';
									$output .= '<li key="53">&nbsp;&nbsp;Romania</li>';
									$output .= '<li key="54">&nbsp;&nbsp;Serbia</li>';
									$output .= '<li key="55">&nbsp;&nbsp;Slovakia</li>';
									$output .= '<li key="56">&nbsp;&nbsp;Slovenia</li>';
									$output .= '<li key="60">&nbsp;&nbsp;Spain</li>';
									$output .= '<li key="57">&nbsp;&nbsp;Sweden</li>';
									$output .= '<li key="30">&nbsp;&nbsp;Switzerland</li>';
									$output .= '<li key="58">&nbsp;&nbsp;Ukraine</li>';
									$output .= '<li key="36">&nbsp;&nbsp;United Kingdom</li>';
								$output .= '</ul>';
							$output .= '</div>';
							$output .= '<div class="input-group"><input type="text" class="form-control color-secondary search_term" placeholder="Search term" aria-describedby="basic-addon2"><span class="input-group-addon color-secondary"><i class="loader-spiner fa fa-search"></i></span></div>';
						$output .= '</div>';
					$output .= '</div>';
					$output .= '<input name="search_location" value="" type="text" id="wintreeelem_1" readonly="" style="display: none;">';
				$output .= '</div>';
				$output .= '<!-- /.form-group -->';

				$output .= '<input type="submit" value="'.__('Search', 'ladystar').'" class="submit sw-search-start">';
			$output .= '</form>';
		$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</section>';

	return $output;
}


function ladystar_create_options_from_list($list, $selected_value='') {
	
	if(empty($list)) return ''; 
	
	$list_elements = explode(',', trim(str_replace('_', '', str_replace(' ', '', $list)))); 
	$output = ''; 
	
	if(!sizeof($list_elements)) return ''; 
	
	foreach($list_elements as $ele) {
		$ele_value = strtolower($ele);
		$selected = ($ele_value==$selected_value) ? 'selected' : ''; 
		
		$output .= '<option value="'.$ele_value.'" '.$selected.'>'.__($ele, 'ladystar').'</option>';
		
	}
	
	return $output; 
}	

	
function ladystar_create_options_from_array($list, $selected_value='') {
	if(!is_array($list)) return ''; 
	$output = ''; 	
	
	foreach($list as $value=>$name) {		
		$selected = ($value==$selected_value) ? 'selected' : ''; 		
		$output .= '<option value="'.$value.'" '.$selected.'>'.$name.'</option>';		
	}
	
	return $output; 
}	


function ladystar_create_options_for_taxonomy($list, $selected_value='') {
	if(!is_array($list)) return ''; 
	$output = ''; 
	
	foreach($list as $ele) {		
		$ele_value = $ele->term_id; 		
		$selected = ($ele_value==$selected_value) ? 'selected' : ''; 		
		$output .= '<option value="'.$ele_value.'" '.$selected.'>'.$ele->name.'</option>';		
	}
	
	return $output; 
}	


