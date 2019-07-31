<?php

function devon_get_user_page($action) {
	
	$url = pll_get_page_url('user'); 
	$query_args = array(); 
	
	switch($action) {
				
		default: 
			$query_args['action'] = $action; 
	}
	
	return add_query_arg($query_args, $url); 	
}

function devon_promote_links($post_id='', $modal_id='') {
	if(empty($post_id)) {
		global $post; 
		$post_id = $post->ID; 
	}
	
	if(!isset($post_id) or is_null($post_id)) return; 
	
	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	
	$promotions = devon_get_globals('promotions'); 
	$modal_id = empty($modal_id) ? 'modal-promote-options' : $modal_id; 
	$output = ''; 
	$links = array(); 
	$devon_positions = new DEVON_POSITIONS(); 
	
	$ad_promotions = devon_if_promoted($post_id); 
	
	$output .= '<!-- Promote Options Modal -->';	
	foreach($promotions as $promotion) { 
		$position =	$devon_positions->get($post_id, strtolower($promotion['name'])); 
		if($ad_promotions[strtolower($promotion['name'])]!='' && $position['position']>1) {
			$promotion['price'] = isset($promotion['make-first-price']) ? $promotion['make-first-price'] : 0.5; 
			$promotion['btn_text'] = '<span class="font-weight-bold">'.__("Make first in", 'ladystar') . '</span> ' . devon_ucwords(strtolower($promotion['name'])) . ' <small>('. $promotion['price'] . __('BGN', 'ladystar') . ')</small>'; 			
		}
		$btn_text = ''; 
		$swal_text = __('BGN', 'ladystar') .' '. $promotion['price'] .' '. __('will be deducted from your wallet. Proceed?', 'ladystar'); 
		$btn_text .= '<a class="btn-promote-listing" data-debug="'. $ad_promotions[strtolower($promotion['name'])] . ' : ' . $position['position'].'" data-promotion="'.strtolower($promotion['name']).'" data-price="'.$promotion['price'].'" data-time="'.$promotion['time'].'" data-user="'.$user_id.'" data-id="'.$post_id.'" data-swal-title="'.__('Get More Views!', 'ladystar').'" data-swal-text="'.$swal_text.'">';
			$btn_text .= $promotion['btn_text'];
			$btn_text .= '<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i>';
		$btn_text .= '</a>';		
		
		$links[] = $btn_text; 
	}
	
	return $links; 
}

function devon_promote_modal($post_id='', $modal_id='') {
	if(empty($post_id)) {
		global $post; 
		$post_id = $post->ID; 
	}
	
	if(!isset($post_id) or is_null($post_id)) return; 
	
	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	
	$promotions = devon_get_globals('promotions'); 
	$modal_id = empty($modal_id) ? 'modal-promote-options' : $modal_id; 
	$output = ''; 
	
	$output .= '<!-- Promote Options Modal -->';
	$output .= '<div class="modal fade modal-form devon-modal modal-promote-options" id="'.$modal_id.'" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">';
		$output .= '<div class="modal-dialog modal-lg" role="document">';
			$output .= '<div class="modal-content">';
				$output .= '<div class="modal-header">';
					$output .= '<h3>'. __('Promote', 'ladystar'). ' ' . get_the_title() . ' </h3>';
					$output .= '<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>';
				$output .= '</div>';
				$output .= '<div class="modal-body">';
					$output .= '<div class="row">';
						$output .= '<div class="pricing-entry container">';
							$output .= '<div class="row pricing-wr">';
								foreach($promotions as $promotion) { 
									$output .= '<div class="col-md-4 pricing-wr-inner">';
										$output .= '<a href="#" class="pricing-item no-decoration">';
											$output .= '<p class="">'.$promotion['name'].'</p>';
											foreach($promotion['features'] as $feature) { 
												$output .= '<p>'.$feature.'</p>';
											}
											$output .= '<p>';
												$swal_text = __('BGN', 'ladystar') .' '. $promotion['price'] .' '. __('will be deducted from your wallet. Proceed?', 'ladystar'); 
												
												$output .= '<span class="btn-border btn-classic btn-promote-listing" data-promotion="'.strtolower($promotion['name']).'" data-price="'.$promotion['price'].'" data-time="'.$promotion['time'].'" data-user="'.$user_id.'" data-id="'.$post_id.'" data-swal-title="'.__('Are you sure?', 'ladystar').'" data-swal-text="'.$swal_text.'">';
													$output .= $promotion['btn_text'];
													$output .= '<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i>';
												$output .= '</span>';
											$output .= '</p>';
										$output .= '</a>';
									$output .= '</div>';
								}
							$output .= '</div>';
						$output .= '</div>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<!-- /.modal-content -->';
		$output .= '</div>';
		$output .= '<!-- /.modal-dialog -->';
	$output .= '</div>';
	
	return $output; 
}

function devon_if_promoted($post_id='') {
	if(empty($post_id)) {
		global $post; 
		$post_id = $post->ID; 
	}
	$return = array(); 
	$promotions = array('promo', 'home', 'top'); 
	
	foreach($promotions as $promotion) {
		$return[$promotion] = get_post_meta($post_id, 'promotion_'.$promotion, true); 
	}
	
	$return['is_verified'] = get_post_meta($post_id, 'is_verified', true); 	
	return $return; 
}

function devon_test_data_for_each_add($post_id='', $custom=array()) {
	
	// return ''; // disable temporarily
	
	$output = ''; 	
	if(empty($post_id)) { return $output; }	
	
	// Do not show test data to logged out users
	if(!is_user_logged_in()) return; 

	if(!sizeof($custom)) {
		$custom = get_post_custom($post_id); 
	}
	
	// ToDo: Remove this modal for testing promotions
	$output .= '<div class="modal fade modal-form devon-modal modal-debug" id="modal-debug-'.$post_id.'" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">';
		$output .= '<div class="modal-dialog" role="document">';
			$output .= '<div class="modal-content">';
				$output .= '<div class="modal-header">';
					$output .= '<h3>Promotions</h3>';
					$output .= '<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>';
				$output .= '</div>';
				$output .= '<div class="modal-body">';
					$output .= 'Debug Data <br>';
					$fields = array('listing_status', 'is_activated', 'promotion_promo', 'promotion_home', 'promotion_top', 'is_verified'); 
					foreach($fields as $field) {
						$output .= $field . ' => ' . $custom[$field][0] . '<br>';
					}
					
					// Get positions text
					$devon_positions = new DEVON_POSITIONS(); 
					$position_text = $devon_positions->get_text(get_the_ID(), 'promo'); 
					$position_text_top = $devon_positions->get_text(get_the_ID(), 'top'); 
					
					if(!empty($position_text) || !empty($position_text_top)) { 
						$output .= '<div class="alert alert-dark mb-0 mt-2 py-1 px-2 view-position-text" style="text-align:left;">';
							if(isset($position_text_top) && !empty($position_text_top)) { $output .= '<div>'.$position_text_top.'</div>'; } 
							if(isset($position_text) && !empty($position_text)) { $output .= '<div>'.$position_text.'</div>'; } 
						$output .= '</div>'; 					
					}				
				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';
	$icon_text = array('<i class="fa fa-question"></i>'); 	
	$output .= '<span class="color-pink pull-left" data-toggle="modal" data-target="#modal-debug-'.$post_id.'" style="position:absolute;bottom:-10px;right:50%;">'.implode(' ', $icon_text).'</span>';
	
	return $output; 
}

function devon_if_activated($post_id='') {

	if(empty($post_id)) {
		global $post; 
		$post_id = $post->ID; 
	}

	$is_activated = get_post_meta($post_id, 'is_activated', true);

	return (isset($is_activated) && $is_activated); 
}

function devon_is_approved($post_id, $custom=array()) {
	
	if(sizeof($custom) && isset($custom['listing_status'][0])) {
		$listing_status = $custom['listing_status'][0]; 
	}
	
	return ($listing_status=='approved'); 
}

function devon_get_terms_link($terms, $taxonomy, $link=true, $target="_self") {
	$term_links = array(); 
	foreach($terms as $term) {
		if($link) {
			//$term_links[] = '<a href="'.get_term_link($term['term_id']).'" title="" target="'.$target.'">'.$term['name'].'</a>';
			$url = pll_get_page_url('ads'); 			
			
			switch($taxonomy) {
				case 'locations': 
					$key = 'location'; 
					break; 
				case 'services': 
					$key = 'service'; 
					break; 			
				case 'service_locations': 
					$key = 'venue'; 
					break; 			
				case 'service_categories': 
					$key = 'category'; 
					break; 			
				case 'languages': 
					$key = 'language'; 
					break; 					
				case 'amenities': 
					$key = 'amenities'; 
					break; 							
			}
			
			$args = array($key=>urlencode($term['term_id'])); 
			$url = add_query_arg($args, $url); 			
			$term_links[] = '<a href="'.$url.'" title="" target="'.$target.'">'.$term['name'].'</a>';
		}
		else $term_links[] = $term['name'];
	}
	
	return implode(', ', $term_links); 
}

function devon_get_terms($user_id="") {
		
	$post_taxonomies = array('services', 'locations', 'service_locations', 'languages', 'service_categories'); 
	$taxonomies = array(); 
	foreach($post_taxonomies as $tax) {
		$terms = get_terms( array(
			'taxonomy' => $tax,
			'hide_empty' => false,
		) );	
		foreach($terms as $term) {
			$taxonomies[$tax][] = array(
				'term_id' => $term->term_id,
				'name' => $term->name,
				'slug' => $term->slug,
				'count' => $term->count,
			);
		}
	}
	
	return $taxonomies; 
}

function devon_wp_get_post_terms($post_id="", $post_type='') {
	
	if(empty($post_id)) {
		global $post; 
		$post_id = $post->ID; 
	}
	
	if(empty($post_type)) $post_type = 'listings'; 
	
	$taxonomies = array(); 	
	$post_taxonomies = devon_get_globals('taxonomies-'.$post_type); 
	$terms = wp_get_post_terms($post_id, $post_taxonomies); 
	
	foreach($terms as $term) {
		$taxonomies[$term->taxonomy][] = array(
			'term_id' => $term->term_id,
			'name' => $term->name,
			'slug' => $term->slug,
			'count' => $term->count,
		);
	}
	
	return $taxonomies; 
}

function devon_add_ad_to_user_phones($user_id, $post_id, $phone) {	
	if( ! $user_phones = get_user_meta($user_id, 'devon_phones', true) ) 
	$user_phones = array(); 	

	if(!isset($user_phones[$phone]['ads']) OR !is_array($user_phones[$phone]['ads'])) {
		$user_phones[$phone]['ads'] = array($post_id); 
	}
	else $user_phones[$phone]['ads'][] = $post_id; 		
	
	update_user_meta($user_id, 'devon_phones', $user_phones); 
}

function devon_add_ad_to_user_emails($user_id, $post_id, $email) {	
	if( ! $user_emails = get_user_meta($user_id, 'devon_emails', true) ) 
	$user_emails = array(); 	
	
	if(!isset($user_emails[$email]['ads']) OR !is_array($user_emails[$email]['ads'])) {
		$user_emails[$email]['ads'] = array($post_id); 
	}
	else $user_emails[$email]['ads'][] = $post_id; 		
	
	update_user_meta($user_id, 'devon_emails', $user_emails); 
}

function devon_delete_ad_from_user_phones($user_id, $post_id, $phone) {	
	if( ! $user_phones = get_user_meta($user_id, 'devon_phones', true) ) 
		$user_phones = array(); 	
	
	if(!isset($user_phones[$phone]['ads']) OR !is_array($user_phones[$phone]['ads'])) {
		$user_phones[$phone]['ads'] = array(); 
	}
	else {
		foreach($user_phones[$phone]['ads'] as $key=>$ad_id) {
			if($ad_id==$post_id) {
				unset($user_phones[$phone]['ads'][$key]); 
			}
		}		
	}	
	
	update_user_meta($user_id, 'devon_phones', $user_phones); 
}

function devon_delete_ad_from_user_emails($user_id, $post_id, $email) {	
	if( ! $user_emails = get_user_meta($user_id, 'devon_emails', true) ) 
	$user_emails = array(); 	
	
	if(!isset($user_emails[$email]['ads']) OR !is_array($user_emails[$email]['ads'])) {
		$user_emails[$email]['ads'] = array(); 
	}
	else {
		//$user_emails[$email]['ads'][] = $post_id; 		
		foreach($user_emails[$email]['ads'] as $key=>$ad_id) {
			if($ad_id==$post_id) unset($user_emails[$email]['ads'][$key]); 
		}		
	}	
	update_user_meta($user_id, 'devon_emails', $user_emails); 
}

function devon_get_user_emails($user_id="") {
	if(empty($user_id)) {
		return array(); 
	}
	
	if( ! $emails = get_user_meta($user_id, 'devon_emails', true) ) 
		$emails = array(); 
	
	return $emails; 
}

function devon_get_user_phones($user_id="") {
	if(empty($user_id)) {
		return array(); 
	}
	
	if( ! $phones = get_user_meta($user_id, 'devon_phones', true) ) 
		$phones = array(); 
	
	return $phones; 
}

function devon_get_user_transactions($search_args="", $limit_query="") {
	global $wpdb;

	$res = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'transaction WHERE 1'.$search_args.' ORDER BY id DESC '. $limit_query, OBJECT);
	return $res;
}

function devon_get_user_wallet_history_old($user_id="") {
	global $wpdb;
	if(empty($user_id)) {
		return array(); 
	}
	if( ! $devon_wallet_history = get_user_meta($user_id, 'devon_wallet_history', true) ) 
		$devon_wallet_history = array(); 
	
	return $devon_wallet_history;
}

function devon_get_user_wallet_history($user_id="") {
	global $wpdb;
	if(empty($user_id)) {
		return array(); 
	}
	/*
	if( ! $devon_wallet_history = get_user_meta($user_id, 'devon_wallet_history', true) ) 
		$devon_wallet_history = array(); 
	*/
	$res = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'transaction WHERE user_id = '.(int)$user_id.' ORDER BY id DESC', OBJECT);
	return $res;
}

function devon_update_user_wallet_balance($user_id='', $amount='', $operator='') {
	if(empty($user_id) OR empty($amount) OR empty($operator)) {
		return false; 
	}
	
	//$res = $wpdb->get_var('SELECT SUM(amount) FROM '.$wpdb->prefix.'transaction WHERE user_id = '.(int)$user_id.' AND payment_status = "success"');
	//return $res;
	
	if( ! $balance = get_user_meta($user_id, 'devon_wallet_balance', true) )
		$balance = 0; 
	
	switch($operator) {
		case '+': $balance += intval($amount); break;  
		case '-': $balance -= intval($amount); break;  		
	}
	
	return update_user_meta($user_id, 'devon_wallet_balance', $balance); 
}

function devon_get_user_wallet_amount($user_id) {
	if(empty($user_id)) {
		return 0; 
	}
	
	//$res = $wpdb->get_var('SELECT SUM(amount) FROM '.$wpdb->prefix.'transaction WHERE user_id = '.(int)$user_id.' AND payment_status = "success"');
	//return $res;
	
	if( ! $devon_wallet_balance = get_user_meta($user_id, 'devon_wallet_balance', true) )
		$devon_wallet_balance = 0; 
	
	return $devon_wallet_balance; 		
}

function ladystar_add_transaction($user_id, $type, $amount, $status, $transaction_id='') {
	global $wpdb;
	$wpdb->query(
		$wpdb->prepare('
			INSERT INTO '.$wpdb->prefix.'transaction (user_id, payment_type, payment_status, amount, transaction_id, date_added) 
			VALUES (%d, %s, %s, %f, %s, %s)
			',
			$user_id, $type, $status, $amount, $transaction_id, date('Y-m-d H:i:s')
		)
	);

	return $wpdb->insert_id;
}


function devon_get_transaction($id="") {
	global $wpdb;
	if(empty($id)) {
		return array(); 
	}
	/*
	if( ! $devon_wallet_history = get_user_meta($user_id, 'devon_wallet_history', true) ) 
		$devon_wallet_history = array(); 
	*/
	$res = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'transaction WHERE id = '.(int)$id.' ORDER BY id DESC', OBJECT);
	return isset($res[0]) ? $res[0] : $res;
}

function ladystar_update_transaction_status($transaction_id, $status) {
	global $wpdb;
	if($wpdb->query(
		$wpdb->prepare('
			UPDATE '.$wpdb->prefix.'transaction 
			SET payment_status = %s
			WHERE id = %d
		', $status, $transaction_id)
	)) {
		return true;
	}

	return false;
}

function wp_handle_ajax_images($files, $post_id=0, $is_featured=false) {

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $error = array();
    $success = array();

    if(! $is_featured ) {
		foreach ($files as $file) {	        
			$_FILES = array("upload_file" => $file);
			$attachment_id = media_handle_upload("upload_file", $post_id);
			
			if (is_wp_error($attachment_id)) {
				// There was an error uploading the image.
				$error[] = "Error adding file";
			} else {
				// The image was uploaded successfully!
				$success[] = $attachment_id;
			}
		}
        if(sizeof($error)) return $error;
        elseif(sizeof($success)) return array('attachment_ids' => $success);
	}
	
	return false; 
}

function devon_custom_upload_dir( $dir_data ) {
	
 $custom_dir = 'control-photos'; return [ 'path' => $dir_data[ 'basedir' ] . '/' . $custom_dir, 'url' => $dir_data[ 'url' ] . '/' . $custom_dir, 'subdir' => '/' . $custom_dir, 'basedir' => $dir_data[ 'error' ], 'error' => $dir_data[ 'error' ], ];
}

function wp_handle_images_for_control_photo($file, $post_id=0, $is_featured=false) {
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $error = array();
    $success = array();
	
	$image_name = $file['name']; 
	$image_content = file_get_contents($file['tmp_name']);
	
	$name_parts = explode(".", $image_name);
	$extension=end($name_parts);
	$image_name = 'control-photo-'.$post_id.'.'.$extension;
	//var_dump($extension); wp_die();
	
	add_filter( 'upload_dir', 'devon_custom_upload_dir' );
	$root = getcwd(); 
	$existing_file = $root . '/wp-content/uploads/control-photos/'. $image_name; 
	if(file_exists($existing_file)) unlink($existing_file);	
	$upload = wp_upload_bits($image_name, null, $image_content);
	remove_filter( 'upload_dir', 'devon_custom_upload_dir' );
	//var_dump($upload); wp_die();
	
	if($upload['error']) return $upload['error'];
	
	update_post_meta($post_id, 'is_verified', -1);
	update_post_meta($post_id, 'control_photo_url', $upload['url']);
	update_post_meta($post_id, 'control_photo_file', $upload['file']);
	update_post_meta($post_id, 'control_photo_type', $upload['type']);
	
	return $upload; 
}

function wp_handle_images($file, $post_id=0) {

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $error = array();
    $success = array();
		
	$file = array(
		'name' => $file['name'],
		'type' => $file['type'],
		'tmp_name' => $file['tmp_name'],
		'error' => $file['error'],
		'size' => $file['size']
	);
	$_FILES = array("upload_file" => $file);
	$attachment_id = media_handle_upload("upload_file", $post_id);
	
	if (is_wp_error($attachment_id)) {
		// There was an error uploading the image.
		return false; 
	} else {
		// The image was uploaded successfully!
		//$success[] = $attachment_id;
		return true; 
	}
}

function devon_get_search_filters() {

	$locations = get_terms([
	    'taxonomy' => 'locations',
	    'hide_empty' => false,
	]);
	$service_locations = get_terms([
	    'taxonomy' => 'service_locations',
	    'hide_empty' => false,
	]);
	$services = get_terms([
	    'taxonomy' => 'services',
	    'hide_empty' => false,
	]);
	$languages = get_terms([
	    'taxonomy' => 'languages',
	    'hide_empty' => false,
	]);

	$listingtitle = (isset($_REQUEST['s']) AND !empty($_REQUEST['s'])) ? $_REQUEST['s'] : '';
	$search_location = (isset($_REQUEST['location']) AND !empty($_REQUEST['location'])) ? $_REQUEST['location'] : '';
	$search_service = (isset($_REQUEST['service']) AND !empty($_REQUEST['service'])) ? $_REQUEST['service'] : '';
	$search_service_location = (isset($_REQUEST['service_location']) AND !empty($_REQUEST['service_location'])) ? $_REQUEST['service_location'] : '';
	$search_language = (isset($_REQUEST['language']) AND !empty($_REQUEST['language'])) ? $_REQUEST['language'] : '';

	$output = '';

	//$output .= '<div class="col-md-12">';
		$output .= '<div class="border-container vertical-padded-container">';
			$output .= '<div class="col-md-12">';
				$output .= '<h3>Search '.__('Ads', 'ladystar').'</h3>';
			$output .= '</div>';
			$output .= '<form class="devon-search-filters" method="GET" action="'.site_url('/listings/').'">';				
				$output .= '<div class="form-group col-md-4">';
					$output .= '<label for="listingtitle">'.__('Title', 'ladystar').'</label>';
					$output .= '<input type="text" class="form-control listingtitle" name="s" placeholder="'.__('Enter the title', 'ladystar').'" value="'.$listingtitle.'">';
				$output .= '</div>';
				if(sizeof($locations)) {
					$output .= '<div class="form-group col-md-4">';
						$output .= '<label for="location[]">'.__('Location', 'ladystar').'</label>';
						$output .= '<select name="location" class="form-control custom-select">';
							$output .= '<option value="">'.__('Choose', 'ladystar').'</option>';
							foreach($locations as $location) { 
								$selected = '';
								if($location->name == $search_location)
									$selected = 'selected';
								$output .= '<option value="'.$location->name.'" '.$selected.'>'.$location->name.'</option>';
							} 
						$output .= '</select>';
					$output .= '</div>';
				} 
				if(sizeof($services)) {
					$output .= '<div class="form-group col-md-4">';
						$output .= '<label for="service[]">'.__('Service', 'ladystar').'</label>';
						$output .= '<select name="service" class="form-control custom-select">';
							$output .= '<option value="">'.__('Choose', 'ladystar').'</option>';
							foreach($services as $service) { 
								$selected = '';
								if($service->name == $search_service)
									$selected = 'selected';
								$output .= '<option value="'.$service->name.'" '.$selected.'>'.$service->name.'</option>';
							}
						$output .= '</select>';
					$output .= '</div>';
				}
				if(sizeof($service_locations)) {
					$output .= '<div class="form-group col-md-4">';
						$output .= '<label for="service_location[]">'.__('Service Location', 'ladystar').'</label>';
						$output .= '<select name="service_location" class="form-control custom-select">';
							$output .= '<option value="">'.__('Choose', 'ladystar').'</option>';
							foreach($service_locations as $service_location) { 
								$selected = '';
								if($service_location->name == $search_service_location)
									$selected = 'selected';
								$output .= '<option value="'.$service_location->name.'" '.$selected.'>'.$service_location->name.'</option>';
							}
						$output .= '</select>';
					$output .= '</div>';
				}
				if(sizeof($languages)) {
					$output .= '<div class="form-group col-md-4">';
						$output .= '<label for="language[]">'.__('Language', 'ladystar').'</label>';
						$output .= '<select name="language" class="form-control custom-select">';
							$output .= '<option value="">'.__('Choose', 'ladystar').'</option>';
							foreach($languages as $language) { 
								$selected = '';
								if($language->name == $search_language)
									$selected = 'selected';
								$output .= '<option value="'.$language->name.'" '.$selected.'>'.$language->name.'</option>';
							} 
						$output .= '</select>';
					$output .= '</div>';
				}
				$output .= '<div class="form-group col-md-2">';
					$output .= '<input type="hidden" class="devon-action" name="devon-action" value="devon-custom-search">';
					$output .= '<input type="submit" class="btn btn-primary devon-custom-search" name="devon-custom-search" value="'.__('Search', 'ladystar').'">';
				$output .= '</div>';
			$output .= '</form>';
		$output .= '</div>';
	//$output .= '</div>';

	echo $output;
}

function devon_search_listing() {
	
	if( !isset($_POST) ) {
		esc_html__('Try again. Nothing Sent to server.', 'ladystar');
	}

	$args = array(
	    'post_type' => 'listings',
	);

	if(isset($_POST['listingtitle']) AND !empty($_POST['listingtitle'])) {
		$args['title'] = $_POST['listingtitle'];
	}

	$query = new WP_Query( $args );
	//wp_die(var_dump($query));

	if($query->have_posts()) {
		while($query->have_posts()) {
			$query->the_post();
			while($author_posts->have_posts()) : $author_posts->the_post();
				get_template_part('template-parts/content', 'listings-public');
			endwhile;
		}
	}
}

function devon_get_public_ad_args($type='') {
	$args = array(
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
	);
	
	if($type=='promotion_home') {
		$args[] = array(
			'key' => 'promotion_home',
			'compare' => '!=',
			'value' => ''
		);
	}
	elseif($type=='promotion_top') {
		$args[] = array(
			'key' => 'promotion_top',
			'compare' => '!=',
			'value' => ''
		);
	}
	elseif($type=='promotion_promo') {
		$args[] = array(
			'key' => 'promotion_promo',
			'compare' => '!=',
			'value' => ''
		);
	}
	elseif($type=='taxonomy') {
		
	}
	
	return $args; 
}

//add_action( 'pre_get_posts', 'devon_pre_get_posts', 9999 );
function devon_pre_get_posts( $query ) {
	
	$no_of_listings = 7; 
	$post_type = $query->get('post_type'); 

    if(!is_admin() && $query->is_main_query()) {
		
		if(is_user_logged_in() && is_single() && 'listings'==$post_type) {
			$query->set( 'post_status', array('publish', 'draft') );
		}
		
		if(in_array($post_type, array('listings')) OR is_tax()) {
			$query->set('posts_per_page', $no_of_listings);
		}
		
		if(is_tax('locations')) {				
			$query->set('meta_key', 'promotion_promo' );
			$query->set('orderby', array('meta_value' => 'DESC', 'title' => 'DESC'));	
			$meta_query = array(
				'relation' => 'AND'									
			);
			$public_ad_args = devon_get_public_ad_args('taxonomy'); 			
			$meta_query = array_merge($meta_query, $public_ad_args); 
			//var_dump($meta_query); wp_die(); 
			$query->set('meta_query', $meta_query);				
		}		

		if(0 AND $query->is_search) {

			$tax_query = array(
				'relation' => 'AND'
			);

			if(isset($_REQUEST['location']) AND !empty($_REQUEST['location'])) {
				$tax_query[] = array(
		            'taxonomy' => 'locations',
		            'field' => 'name',
		            'terms' => $_REQUEST['location'] //excluding the term you dont want.
		        );
			}

			if(isset($_REQUEST['service']) AND !empty($_REQUEST['service'])) {
				$tax_query[] = array(
		            'taxonomy' => 'services',
		            'field' => 'name',
		            'terms' => $_REQUEST['service'] //excluding the term you dont want.
		        );
			}

			if(isset($_REQUEST['service_location']) AND !empty($_REQUEST['service_location'])) {
				$tax_query[] = array(
		            'taxonomy' => 'service_locations',
		            'field' => 'name',
		            'terms' => $_REQUEST['service_location'] //excluding the term you dont want.
		        );
			}

			if(isset($_REQUEST['language']) AND !empty($_REQUEST['language'])) {
				$tax_query[] = array(
		            'taxonomy' => 'languages',
		            'field' => 'name',
		            'terms' => $_REQUEST['language'] //excluding the term you dont want.
		        );
			}

			$query->set('tax_query', $tax_query);
		}
	
	}	

	return $query;
}

function devon_get_listing_attachments($post_id, $size='') {
	
	if(empty($post_id))
		return array();
	
	$listing_images = array();
	$attachments = get_posts( array(
	    'post_type' => 'attachment',
	    'posts_per_page' => -1,
	    'post_parent' => $post_id,
	    'exclude'     => get_post_thumbnail_id()
	) );
	
	$media = get_attached_media( 'image', intval($post_id) );	
	$size = empty($size) ? 'listing-image' : $size; 
	//devon_ajaxy_die($media); 
	
	if ($media) {
		foreach($media as $attachment) {
	        $class = "post-attachment mime-" . sanitize_title( $attachment->post_mime_type );
	        $thumbimg = wp_get_attachment_image_src($attachment->ID, $size, false);
			$listing_images[] = array(
	        	'image_url' => $thumbimg[0],
	        	'id' => $attachment->ID
	        );
	    }
	}
	
	//devon_ajaxy_die($listing_images); 
	return $listing_images;
}

function devon_update_location($post_id, $term, $position, $total) {
	//delete_post_meta($post_id, 'positions'); 
	
	//if( ! $positions = get_post_meta($post_id, 'positions', true) OR !is_array($positions)) 
		//$positions = array(); 	
	
	$positions[$term->term_id] = array(
		'position' => $position,
		'total' => $total,
		'term' => $term, 
	); 
	
	update_post_meta($post_id, 'positions', $positions); 
}

function devon_position_terms($positions) {	
	$output = array(); 	
	
	foreach(maybe_unserialize($positions) as $term) {
		$output[] = $term['term']->name . ': ' . $term['position'] . '/' . $term['total']; 	
	}	
	
	return implode(', ', $output); 
}

function devon_add_email_to_user($user_id, $email) {
	
	if( ! $user_emails = get_user_meta($user_id, 'devon_emails', true) ) 
		$user_emails = array(); 
	
	$user_emails[$email] = array(
		'email' => $email, 
		'date' => current_time('Y-m-d H:i:s'), 
		'last_modified' => current_time('Y-m-d H:i:s'), 
	); 				
	
	update_user_meta($user_id, 'devon_emails', $user_emails); 
}




/**
 * Update Last Modified Time in actions
 * @param  none
 
 * @return bool - result of updation true/false
 * Called in ajax POST method in ajaxmailjs.js
 */
function devon_update_last_modified($post_id) {
	// bail out early if we don't need to update the date
	if(!wp_doing_ajax() || $post_id == 'new' ) { return; }
	
   global $wpdb;
   $datetime = current_time("Y-m-d H:i:s");
   $datetimeGMT = date("Y-m-d H:i:s");
   $updated_columns = ''; 
   $query = "UPDATE $wpdb->posts SET post_modified = '$datetime' WHERE ID = '$post_id'";	
	if( $wpdb->query( $query ) ) $updated_columns .= ' post_modified'; 
	
    $query = "UPDATE $wpdb->posts SET post_modified_gmt = '$datetimeGMT' WHERE ID = '$post_id'";	
	if( $wpdb->query( $query ) ) $updated_columns .= ' post_modified_gmt'; 	
	
    return '<br/>DB Columns Updated: '. $updated_columns;
}