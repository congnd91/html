<?php

add_action('devon_ak_tester', 'devon_cron_hourly_callback'); 
add_action('devon_cron_hourly', 'devon_cron_hourly_callback'); 
function devon_cron_hourly_callback() {	
	devon_expire_ad_promotions(); 	
}


function devon_expire_ad_promotions() {
	
	$args = array(
		'type' => 'all_promoted', 
	);
	
	$the_query = devon_ads_query($args); 
	$promotions = devon_get_globals('promotions'); 
	$tester = array(); 
	$count = 0; 
	//devon_ajaxy_die($promotions); 
	
	$tester[] = current_time('Y-m-d H:i:s'); 
	
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { 
			++$count; 
				
			$the_query->the_post(); 
			$post_id = get_the_ID();
			
			$custom = get_post_custom($post_id);			
			
			foreach($promotions as $promotion) {
				$promotion_key = 'promotion_' . strtolower($promotion['name']);
				$expiry_time = $custom[$promotion_key][0]; 
				if(!empty($expiry_time)) {
					$tester[] = $count . ': '. get_the_title() . ' Promotion: ' . $promotion_key . ': ' . $expiry_time; 
					if(devon_is_expired($expiry_time)) {
						update_post_meta($post_id, $promotion_key, ''); 
						$tester[] = $count . ': '. get_the_title() . ' Promotion Expired: ' . $promotion_key . ': ' . $expiry_time; 
					}
				}
			}
		}
	}	
	
	echo implode('<br>', $tester); 
}

function devon_ads_query($atts=array()) {
	$atts = wp_parse_args($atts, array(
		'number' => -1,
		'type' => '', 
	));
	
	$args = array(
		'post_type' => 'listings',
		'posts_per_page' => $atts['number'],
		'tax_query' => array('relation' => 'AND'),
		'meta_query' => array(
			'relation' => 'AND'
		)
	);	
	
	// Set query for all_promoted ads
	if($atts['type']=='all_promoted') {
		$args['meta_query'][] = array(
			'relation' => 'OR',
			array(
				'key' => 'promotion_top',
				'compare' => '!=',
				'value' => ''
			),
			array(
				'key' => 'promotion_home',
				'compare' => '!=',
				'value' => ''
			),
			array(
				'key' => 'promotion_promo',
				'compare' => '!=',
				'value' => ''
			) 
		); 
	}
	
	$output = ''; 
	$query = new WP_Query($args);	
	
	return $query; 
}