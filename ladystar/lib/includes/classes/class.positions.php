<?php

if(!class_exists('DEVON_POSITIONS')) {
	class DEVON_POSITIONS {
		
		public function __construct() {
		}
		
		public function get($post_id, $promo) {
			$meta_key = $this->get_meta_key($promo); 
			$position = get_post_meta($post_id, $meta_key, true); 						
			return maybe_unserialize($position); 
		}
		
		public function get_meta_key($promo) {			
			$meta_key = 'position'; 
			if($promo=='top') {
				$meta_key = 'position_top'; 
			}
			elseif($promo=='home') {
				$meta_key = 'position_home'; 
			}
			
			return $meta_key; 
		}
		
		public function get_text($post_id, $promo) {
			$position = $this->get($post_id, $promo); 
			
			$promotion_key = get_post_meta($post_id, 'promotion_'.$promo, true); 
			if(!isset($promotion_key) OR empty($promotion_key)) return ''; 
			
			if(!isset($position) or !is_array($position)) return ''; 			
			
			// ToDo: Translation here with variables 
			$position_ordinal = $this->position_text($position['position'], $position);
			
			$text = __('Ad is promoted for ' . strtoupper($promo), 'ladystar'); 
			$promoted_for = '<span title="'.$text.'" class="btn btn-classic btn-border p-1 mt-1 mr-1" style="font-size:9px">'.strtoupper($promo).'</span>'; 
		
			if($promo=='home') {
				return $promoted_for . 'The ad is ranked ' . $position_ordinal; 
			} else {
				return $promoted_for . 'The ad is ranked ' . $position_ordinal . ' in ' . $position['category_name'] . ' in ' . $position['location_name']; 
			}
		}
		
		public function position_text($number, $position_array=array()) {
			$per_page = 20; 
			$page = intval($number/$per_page); 
			$position =  fmod($number,$per_page);
			
			if($position) $page++; else $position = $per_page; 
			
			$url = pll_get_page_url('ads'); 
			$args = array(); 
			if(isset($position_array['category_name'])) {
				$args['category'] = urlencode($position_array['category_name']);
			}
			if(isset($position_array	['location_name'])) {
				$args['location'] = urlencode($position_array['location_name']);
			}
			
			return '<a class="alert-link" href="'.add_query_arg($args, $url).'">'.devon_ordinal($number) . ' ('. devon_ordinal($position) . ' on ' . devon_ordinal($page) . ' page)</a>'; 
		}
		
		/* 
		 * Position Text Tester 
		*/
		public function check_position_text() {
			for($i=0; $i<100; $i++) {
				echo '<br>'; 
				echo '          ' . $this->position_text($i); 
			}
		}
		
		public function set($args=array(), $promo) {
			if(!isset($args['post_id'])) return; 
			
			extract($args); 
			$meta_key = $this->get_meta_key($promo); 			
			
			$position = array(
				'position' => $position, 
				'location' => $location, 
				'location_name' => $location_name,
				'category' => $category, 				
				'category_name' => $category_name, 				
			);
			
			update_post_meta($post_id, $meta_key, $position);			
		}
		
		public function set_positions() {
			$total_ads = 0; 
			$service_categories = get_terms(['taxonomy' => 'service_categories','hide_empty' => false]);
			$locations = get_terms(['taxonomy' => 'locations','hide_empty' => false]);
			$promotions = array('promo', 'top', 'home'); 
			// add meta_query for public ads (activated and approved)
			$public_ad_args = devon_get_public_ad_args('taxonomy'); 			
			//var_dump($locations);  echo '<hr>';  var_dump($service_categories); echo '<hr>'; 
			$counters = array(				
				'locations' => 0,
			);
			
			foreach($promotions as $promo) {
				foreach($locations as $location) {
					$counters['locations'] = isset($counters['locations']) ? ++$counters['locations'] : 1; 
					foreach($service_categories as $category) {
						$tax_query = array( 'relation' => 'AND' );
						$meta_query = array( 'relation' => 'AND' );
						$counters['categories'] = isset($counters['categories']) ? ++$counters['categories'] : 1; 
						
						$tax_query[] = array(
							'taxonomy' => 'locations',
							'field'    => 'term_id',
							'terms'    => $location->term_id
						);
						$tax_query[] = array(
							'taxonomy' => 'service_categories',
							'field'    => 'term_id', 
							'terms'    => $category->term_id
						);
				
						$meta_query = array_merge($meta_query, $public_ad_args); 	
						$args = array(
							'post_type'  => 'listings',
							'meta_key' => 'promotion_' . $promo,
							'meta_type' => 'DATETIME',
							'orderby' => array('meta_value' => 'DESC', 'modified' => 'DESC'),
							'tax_query' => $tax_query,
							'meta_query' => $meta_query	
						);	

						if($promo=='top') {
							// devon_var_dump($args); 
						}
						
						$query = new WP_Query( $args );			
						
						if ($query->have_posts() ) {
							$count = 0; 
							while ( $query->have_posts() ) {
								$query->the_post();
								$total_ads++; 
								
								$position_args = array(
									'post_id' => get_the_ID(), 
									'position' => ++$count, 
									'location' => $location->term_id, 
									'location_name' => $location->name, 
									'category' => $category->term_id, 
									'category_name' => $category->name, 
								);
								
								if($promo=='top') {
									//echo get_the_title(get_the_ID()); 
									//devon_var_dump($position_args);
								}
								
								$this->set($position_args, $promo); 								
								//echo 'Setting for ' . get_the_title(get_the_ID()); echo '<br>'; var_dump($position_args);  echo '<hr>'; 
							}
						}
						wp_reset_postdata(); 
					}
				}
			}
			
			$counters['total_ads'] = $total_ads; 
			//devon_var_dump($counters); 
		}		
		
		public function set_positions_home() {
			$total_ads = 0; 
			$public_ad_args = devon_get_public_ad_args(); 			
			
			$tax_query = array( 'relation' => 'AND' );
			$meta_query = array( 'relation' => 'AND' );
			
			$meta_query = array_merge($meta_query, $public_ad_args); 	
			$args = array(
				'post_type'  => 'listings',
				'meta_key' => 'promotion_home',
				'meta_type' => 'DATETIME',
				'orderby' => array('meta_value' => 'DESC', 'modified' => 'DESC'),
				'tax_query' => $tax_query,
				'meta_query' => $meta_query	
			);	

			$query = new WP_Query( $args );			
			if ($query->have_posts() ) {
				$count = 0; 
				while ( $query->have_posts() ) {
					$query->the_post();
					$total_ads++; 
					
					$position_args = array(
						'post_id' => get_the_ID(), 
						'position' => ++$count
					);
					$this->set($position_args, $promo);					
				}
			}
			wp_reset_postdata(); 			
		}		
	
	}
}