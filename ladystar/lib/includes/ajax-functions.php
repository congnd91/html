<?php

function tjp_ajaxy_die($array=array(), $type='error') {
	
	if(is_array($array))
		$ajaxy = $array; 
	else 
		$ajaxy = array('reason' => print_r($array,true)); 	
	
	if($type=='error') wp_send_json_error($ajaxy); 
	else wp_send_json_success($ajaxy); 				
	wp_die();
}

function action_add_new_room() {

	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	//parse_str($_POST['fields'], $fields);
	$fields = $_POST;
	$errors = array(); 
	$output = ''; 

	if(!wp_verify_nonce( $_POST['devon_wpnonce'], 'add-room-nonce' )) {
		return esc_html__('Security check failed. Please reload the page and try again', 'ladystar'); 
	}

	$required_fields = array('price', 'location', 'amenity');
	foreach($required_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( !isset($fields[$field]) OR empty($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' is required'; 
			}
		}
	}
	
	$integer_fields = array('price'); 
	foreach($integer_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( ! is_numeric($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' should be a number'; 
			}
		}
	}

	if(sizeof($errors)) {
		$output .= '<ul class="mb-0">';
			foreach($errors as $error) {
				$output .= '<li>'. $error.'</li>';
			}
		$output .= '</ul>';

		return $output; 
	}

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
	$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
	$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
	$location = isset($fields['location']) ? sanitize_text_field($fields['location']) : '';
	$featured_image = isset($_FILES['featured_image']) ? $_FILES['featured_image'] : '';
	
	$post_id = wp_insert_post( array(
		'post_author'	=> $user_id,
		'post_title'	=> $title,
		'post_content'	=> $description,
		'post_type'     => 'leisure-rooms',
		'post_status'	=> 'draft'
	) );
				
	if($post_id!=0) { 
		update_post_meta($post_id, 'price', $price);
		// update_post_meta($post_id, 'location', $location);
		
		update_post_meta($post_id, 'listing_status', 'pending');
		update_post_meta($post_id, 'is_activated', true);
		update_post_meta($post_id, 'is_verified', '');
		update_post_meta($post_id, 'featured_in_listings', 0);
		update_post_meta($post_id, 'viewed_in_detail', 0);

		update_post_meta($post_id, 'email', $fields['email']);
		update_post_meta($post_id, 'phone', $fields['phone']);
		
		// Add this ad to user phones and email data
		devon_add_ad_to_user_phones($user_id, $post_id, $fields['phone'][0]); 
		devon_add_ad_to_user_emails($user_id, $post_id, $fields['email'][0]); 

		wp_set_post_terms($post_id, $fields['amenity'], 'amenities');
		wp_set_post_terms($post_id, $fields['location'], 'locations');
		$link = '<a href="'.pll_get_page_url('user') . '?action=manage-images&id='.$post_id. '"> Manage Images</a>';
		
		//Send Admin Notification
		$admin_email = devon_get_admin_email(); 
		$headers = devon_get_mail_headers(); 
		$email_setup = devon_get_email($post_id, 'new-room'); 
		wp_mail($admin_email, $email_setup['subject'], $email_setup['body'], $headers);
		
		return $output = array(
			'message' => esc_html__('Submitted successfully, please wait for approval by admin. ', 'ladystar') . $link,
			'success' => true,
		);
	}
	else {
		return $output = esc_html__('Something went wrong, please try again.', 'ladystar'); 	
	}	
}


function action_edit_room() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	$fields = $_POST;
	$errors = array(); 
	$output = ''; 

	if(!wp_verify_nonce( $_POST['devon_wpnonce'], 'edit-room-nonce' )) {
		return esc_html__('Security check failed. Please reload the page and try again', 'ladystar'); 
	}

	$required_fields = array('price', 'location', 'amenity');
	foreach($required_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( !isset($fields[$field]) OR empty($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' is required'; 
			}
		}
	}
	
	$integer_fields = array('price'); 
	foreach($integer_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( ! is_numeric($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' should be a number'; 
			}
		}
	}

	if(sizeof($errors)) {
		$output .= '<ul class="mb-0">';
			foreach($errors as $error) {
				$output .= '<li>'. $error.'</li>';
			}
		$output .= '</ul>';

		return $output; 
	}

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	$post_id = $_POST['post_id'];
	$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
	$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
	$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
	$featured_image = $_FILES['featured_image'];
	
	$post_id = wp_update_post( array(
		'ID'            => $post_id,
		'post_title'	=> $title,
		'post_content'	=> $description,
	) );
				
	if($post_id!=0) { 
		update_post_meta($post_id, 'price', $price);
		//update_post_meta($post_id, 'listing_status', 'pending');
		
		// Check if user has changed the phone, and update the phones data
		$current_phone = get_post_meta($post_id, 'phone', true);
		$current_phone = $current_phone[0]; 
		if($current_phone != $fields['phone']) {
			devon_delete_ad_from_user_phones($user_id, $post_id, $current_phone); 		
			devon_add_ad_to_user_phones($user_id, $post_id, $fields['phone'][0]); 			
		} 
		
		// Check if user has changed the email, and update the emails data
		$current_email = get_post_meta($post_id, 'email', true); 
		$current_email = $current_email[0]; 
		if($current_email != $fields['email']) {
			devon_delete_ad_from_user_emails($user_id, $post_id, $current_email); 		
			devon_add_ad_to_user_emails($user_id, $post_id, $fields['email'][0]); 			
		}
		
		update_post_meta($post_id, 'email', $fields['email']);
		update_post_meta($post_id, 'phone', $fields['phone']);

		wp_set_post_terms($post_id, $fields['location'], 'locations');
		wp_set_post_terms($post_id, $fields['amenity'], 'amenities');
		
		//if(!empty($featured_image['name'])) $result = wp_handle_images($featured_image, $post_id, true);

		$link = '<a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id). ' (Status: Pending)</a>'; 
		
		// Send Mail to Admin for Re-approval
		$admin_email = devon_get_admin_email(); 
		$headers = devon_get_mail_headers(); 
		$email_setup = devon_get_email($post_id, 'edit-room'); 
		wp_mail($admin_email, $email_setup['subject'], $email_setup['body'], $headers);
		
		return $output .= esc_html__('Updated successfully, please wait for approval by admin. ', 'ladystar')  .$link; 
	}
	else {
		return $output .= esc_html__('Something went wrong, please try again.', 'ladystar'); 	
	}	
}


function action_add_new_listing() {

	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	//parse_str($_POST['fields'], $fields);
	$fields = $_POST;
	$errors = array(); 
	$output = ''; 

	if(!wp_verify_nonce( $_POST['devon_wpnonce'], 'add-listing-nonce' )) {
		return esc_html__('Security check failed. Please reload the page and try again', 'ladystar'); 
	}

	$required_fields = array('listingtitle', 'description', 'email', 'phone', 'price', 'age', 'height', 'weight', 'hair_color', 'eyes', 'location', 'service', 'service_location', 'language');
	foreach($required_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( !isset($fields[$field]) OR empty($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' is required'; 
			}
		}
	}
	
	$integer_fields = array('height', 'weight', 'age', 'price'); 
	foreach($integer_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( ! is_numeric($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' should be a number'; 
			}
		}
	}

	if(sizeof($errors)) {
		$output .= '<ul class="mb-0">';
			foreach($errors as $error) {
				$output .= '<li>'. $error.'</li>';
			}
		$output .= '</ul>';

		return $output; 
	}

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
	$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
	$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
	$age = isset($fields['age']) ? sanitize_text_field($fields['age']) : '';
	$weight = isset($fields['weight']) ? sanitize_text_field($fields['weight']) : '';
	$height = isset($fields['height']) ? sanitize_text_field($fields['height']) : '';
	$hair_color = isset($fields['hair_color']) ? sanitize_text_field($fields['hair_color']) : '';
	$eyes = isset($fields['eyes']) ? sanitize_text_field($fields['eyes']) : '';
	$featured_image = isset($_FILES['featured_image']) ? $_FILES['featured_image'] : '';
	
	$post_id = wp_insert_post( array(
		'post_author'	=> $user_id,
		'post_title'	=> $title,
		'post_content'	=> $description,
		'post_type'     => 'listings',
		'post_status'	=> 'draft'
	) );
				
	if($post_id!=0) { 
		update_post_meta($post_id, 'price', $price);
		update_post_meta($post_id, 'age', $age);
		update_post_meta($post_id, 'weight', $weight);
		update_post_meta($post_id, 'height', $height);
		update_post_meta($post_id, 'hair_color', $hair_color);
		update_post_meta($post_id, 'eyes', $eyes);
		
		update_post_meta($post_id, 'listing_status', 'pending');
		update_post_meta($post_id, 'is_activated', true);
		update_post_meta($post_id, 'promotion_home', '');
		update_post_meta($post_id, 'promotion_top', '');
		update_post_meta($post_id, 'promotion_promo', '');
		update_post_meta($post_id, 'is_verified', '');
		update_post_meta($post_id, 'featured_in_listings', 0);
		update_post_meta($post_id, 'viewed_in_detail', 0);

		update_post_meta($post_id, 'email', $fields['email']);
		update_post_meta($post_id, 'phone', $fields['phone']);
		
		// Add this ad to user phones and email data
		devon_add_ad_to_user_phones($user_id, $post_id, $fields['phone'][0]); 
		devon_add_ad_to_user_emails($user_id, $post_id, $fields['email'][0]); 

		wp_set_post_terms($post_id, $fields['location'], 'locations');
		wp_set_post_terms($post_id, $fields['service'], 'services');
		wp_set_post_terms($post_id, $fields['service_location'], 'service_locations');
		wp_set_post_terms($post_id, $fields['language'], 'languages');
		if (isset($fields['service_categories'])) {
			wp_set_post_terms($post_id, $fields['service_categories'], 'service_categories');
		}
	  	
	  	// $result = wp_handle_images($featured_image, $post_id, true);
	  	//$result = wp_handle_images($images, $post_id);

		//$link = '<a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id). ' (Status: Pending)</a>';
		$link = '<a href="'.pll_get_page_url('user') . '?action=manage-images&id='.$post_id. '"> Manage Images</a>';
		
		//Send Admin Notification
		$admin_email = devon_get_admin_email(); 
		$headers = devon_get_mail_headers(); 
		$email_setup = devon_get_email($post_id, 'new-post'); 
		wp_mail($admin_email, $email_setup['subject'], $email_setup['body'], $headers);
		
		return $output = array(
			'message' => esc_html__('Submitted successfully, please wait for approval by admin. ', 'ladystar') . $link,
			'success' => true,
		);
	}
	else {
		return $output = esc_html__('Something went wrong, please try again.', 'ladystar'); 	
	}	
}

function action_edit_listing() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	$fields = $_POST;
	$errors = array(); 
	$output = ''; 

	if(!wp_verify_nonce( $_POST['devon_wpnonce'], 'edit-listing-nonce' )) {
		return esc_html__('Security check failed. Please reload the page and try again', 'ladystar'); 
	}

	$required_fields = array('listingtitle', 'description', 'email', 'phone', 'price', 'age', 'height', 'weight', 'hair_color', 'eyes', 'location', 'service', 'service_location', 'language');
	foreach($required_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( !isset($fields[$field]) OR empty($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' is required'; 
			}
		}
	}
	
	$integer_fields = array('height', 'weight', 'age', 'price'); 
	foreach($integer_fields as $field) {
		if(1 OR !sizeof($errors)) {
			if( ! is_numeric($fields[$field]) ) {
				$errors[] = ucwords(str_replace('_', ' ', $field)) . ' should be a number'; 
			}
		}
	}

	if(sizeof($errors)) {
		$output .= '<ul class="mb-0">';
			foreach($errors as $error) {
				$output .= '<li>'. $error.'</li>';
			}
		$output .= '</ul>';

		return $output; 
	}

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	$post_id = $_POST['post_id'];
	$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
	$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
	$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
	$age = isset($fields['age']) ? sanitize_text_field($fields['age']) : '';
	$weight = isset($fields['weight']) ? sanitize_text_field($fields['weight']) : '';
	$height = isset($fields['height']) ? sanitize_text_field($fields['height']) : '';
	$hair_color = isset($fields['hair_color']) ? sanitize_text_field($fields['hair_color']) : '';
	$eyes = isset($fields['eyes']) ? sanitize_text_field($fields['eyes']) : '';

	$featured_image = $_FILES['featured_image'];
	
	$post_id = wp_update_post( array(
		'ID'            => $post_id,
		'post_title'	=> $title,
		'post_content'	=> $description,
	) );
				
	if($post_id!=0) { 
		update_post_meta($post_id, 'price', $price);
		update_post_meta($post_id, 'age', $age);
		update_post_meta($post_id, 'weight', $weight);
		update_post_meta($post_id, 'height', $height);
		update_post_meta($post_id, 'hair_color', $hair_color);
		update_post_meta($post_id, 'eyes', $eyes);
		//update_post_meta($post_id, 'listing_status', 'pending');
		
		// Check if user has changed the phone, and update the phones data
		$current_phone = get_post_meta($post_id, 'phone', true);
		$current_phone = $current_phone[0]; 
		if($current_phone != $fields['phone']) {
			devon_delete_ad_from_user_phones($user_id, $post_id, $current_phone); 		
			devon_add_ad_to_user_phones($user_id, $post_id, $fields['phone'][0]); 			
		} 
		
		// Check if user has changed the email, and update the emails data
		$current_email = get_post_meta($post_id, 'email', true); 
		$current_email = $current_email[0]; 
		if($current_email != $fields['email']) {
			devon_delete_ad_from_user_emails($user_id, $post_id, $current_email); 		
			devon_add_ad_to_user_emails($user_id, $post_id, $fields['email'][0]); 			
		}
		
		update_post_meta($post_id, 'email', $fields['email']);
		update_post_meta($post_id, 'phone', $fields['phone']);

		wp_set_post_terms($post_id, $fields['location'], 'locations');
		wp_set_post_terms($post_id, $fields['service'], 'services');
		wp_set_post_terms($post_id, $fields['service_location'], 'service_locations');
		wp_set_post_terms($post_id, $fields['language'], 'languages');
		wp_set_post_terms($post_id, $fields['service_categories'], 'service_categories');

		//if(!empty($featured_image['name'])) $result = wp_handle_images($featured_image, $post_id, true);

		$link = '<a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id). ' (Status: Pending)</a>'; 
		
		// Send Mail to Admin for Re-approval
		$admin_email = devon_get_admin_email(); 
		$headers = devon_get_mail_headers(); 
		$email_setup = devon_get_email($post_id, 're-approval'); 
		wp_mail($admin_email, $email_setup['subject'], $email_setup['body'], $headers);
		
		return $output .= esc_html__('Updated successfully, please wait for approval by admin. ', 'ladystar')  .$link; 
	}
	else {
		return $output .= esc_html__('Something went wrong, please try again.', 'ladystar'); 	
	}	
}

/* Used for control photo upload to specific directory */
function action_upload_control_photo() {

	if(!isset($_FILES) OR empty($_FILES['control-photo'])) {
		return esc_html__('Something went wrong, please try again.', 'ladystar');
	}
	if(!isset($_POST['post_id']) AND empty($_POST['post_id'])) {
		return esc_html__('Something went wrong, please try again.', 'ladystar');
	}

	$post_id = $_POST['post_id'];
	$image = $_FILES['control-photo'];
	$result = wp_handle_images_for_control_photo($image, $post_id);

	if(!is_array($result)) {
		return esc_html__('Something went wrong, please try again.', 'ladystar');
	}
	
	return esc_html__('Control photo uploaded successfully. Please wait for an approval by moderators.', 'ladystar');
}

function action_add_attached_image() {

	if(!isset($_FILES) AND empty($_FILES)) {
		return esc_html__('Something went wrong, please try again.', 'ladystar');
	}
	if(!isset($_POST['post_id']) AND empty($_POST['post_id'])) {
		return esc_html__('Something went wrong, please try again.', 'ladystar');
	}

	$post_id = $_POST['post_id'];
	$images = $_FILES['images'];
	$result = wp_handle_images($images, $post_id);

	if(is_array($result)) {
		if(isset($result['attachment_ids'])) {
			$output = '';
			$listing_images = devon_get_listing_attachments($_POST['post_id']);
			foreach ($listing_images as $image) {
				$output .= '
					<div class="devon-image devon-attachment">
						<img src="'.$image['image_url'].'" data-id="'.$image['id'].'">
						<span class="devon-remove" data-id="'.$image['id'].'" data-swal-title="'.__('Are you sure?', 'ladystar').'" data-swal-text="'.__('The image will be permanently deleted!', 'ladystar').'">'.__('Remove', 'ladystar').'</span>
					</div>
				';
			}
			return $output;
			//return "File added successfully, please <a href='".pll_get_page_url('user') . '?action=manage-images&id='.$_POST['post_id'].'">Reload</a> the page.";			
		}
		else {
			return esc_html__('Something went wrong, please try again.', 'ladystar');
		}
	}
}

add_action('wp_ajax_action_remove_attached_image', 'action_remove_attached_image');
function action_remove_attached_image() {

	$delete_permanently = true;

	if(!isset($_POST['attachment_id']) OR empty($_POST['attachment_id'])) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload.', 'ladystar'));
		tjp_ajaxy_die($ajaxy);
	}

    if($delete_permanently) {
    	if(wp_delete_attachment($_POST['attachment_id'], true)) {
	    	$ajaxy  = array( 'reason' => __('Attached image removed successfully.' , 'ladystar'));
			tjp_ajaxy_die($ajaxy, 'success');
	    }
	    else {
	    	$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload.', 'ladystar'));
			tjp_ajaxy_die($ajaxy);
	    }
	}
    else {
    	$ajaxy = array('status' => 'failed', 'reason' => __('Not allowed to delete.' , 'ladystar'));
		tjp_ajaxy_die($ajaxy);
    }
}

add_action('wp_ajax_action_add_remove_images', 'action_add_remove_images');
function action_add_remove_images() {

	if(!isset($_POST)) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload and try again.' , 'ladystar'));
		tjp_ajaxy_die($ajaxy);		
	}	
	
	if(!isset($_GET) OR !isset($_GET['post_id']) OR empty($_GET['post_id']) OR !is_numeric($_GET['post_id']) OR 'listings'!=get_post_type($_GET['post_id'])) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Ad ID missing, please reload the page and try again.' , 'ladystar'));
		tjp_ajaxy_die($ajaxy);
	}
	
	$post_id = $_GET['post_id']; 
	$files = $_FILES; 	
	
	// Check if any of the images are uploaded
    if(!sizeof($files)) {
		$ajaxy = array('status' => 'failed', 'reason' => __('No files uploaded, please reload and try again.' , 'ladystar'));
		tjp_ajaxy_die($ajaxy);
	}
	
	$image_files = array(); 
	foreach($files as $file) {
		$image_files[] = $file; 	
	}
	
	$output = '';
	$result = wp_handle_ajax_images($image_files, $post_id);
	if(is_array($result)) {
		if(isset($result['attachment_ids'])) {
			$listing_images = devon_get_listing_attachments($post_id, 'thumbnail');
			$output .= '<p class="text-center mb-0 attachment-count" data-count="'.sizeof($listing_images).'">Total images with this ad: ' . sizeof($listing_images); 
			foreach ($listing_images as $image) {
				$output .= '
					<div class="devon-image devon-attachment devon-zoom">
						<img src="'.$image['image_url'].'" data-id="'.$image['id'].'">
						<span class="btn btn-classic btn-small devon-img-options" data-id="'.$image['id'].'" data-post_id="'.$post_id.'">
							<span class="devon-make-primary" data-swal-title="'.__('Make this a primary image?', 'ladystar').'" data-swal-text="">'.__('Make Primary', 'ladystar').'</span>
							<span class="devon-remove pull-right" data-swal-title="'.__('Are you sure?', 'ladystar').'" data-swal-text="'.__('The image will be permanently deleted!', 'ladystar').'"><i class="fa fa-trash"></i></span>
							<i class="fa fa-spin fa-spinner" style="display:none;"></i>
						</span>
					</div>
				';
			}			
			tjp_ajaxy_die(array('reason'=>'Uploaded successfully.', 'output'=>$output, 'count'=>sizeof($listing_images)), 'sucess'); 
		}
	}
	
	tjp_ajaxy_die(__('Something failed, please try again.', 'ladystar')); 	
}

add_action('wp_ajax_action_make_primary_image', 'action_make_primary_image');
function action_make_primary_image() {

	if(!isset($_POST)) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload and try again.' , 'ladystar'));
		tjp_ajaxy_die($ajaxy);		
	}

	if(!isset($_POST['attachment_id']) OR empty($_POST['attachment_id'])) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload.', 'ladystar'));
		tjp_ajaxy_die($ajaxy);
	}
	
	if(!isset($_POST['post_id']) OR empty($_POST['post_id'])) {
		$ajaxy = array('status' => 'failed', 'reason' => __('Something went wrong, please reload.', 'ladystar'));
		tjp_ajaxy_die($ajaxy);
	}
	
	$output = '';
	$set = set_post_thumbnail($_POST['post_id'], $_POST['attachment_id']);
	if($set) {			
		tjp_ajaxy_die(array('reason'=>'Image is set successfully.', 'reload'=>true), 'sucess'); 		
	}
	
	tjp_ajaxy_die('Something failed, please try again.'); 	
}

add_action('wp_ajax_action_submit_bank_transfer', 'action_submit_bank_transfer');
function action_submit_bank_transfer() {	
	if(!isset($_POST)) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	}
	if(!isset($_POST['data'])) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	}
	
	parse_str($_POST['data'], $data); 
	
	$id = ladystar_add_transaction($data['user_id'], 'bank_transfer', $data['amount'], 'pending', $data['bank_transfer_id']);

	if($id) {
		$bank_transfer_id = devon_increment_counter($data['bank_transfer_id']);
		update_option('bank_transfer_id', $bank_transfer_id);
		
		tjp_ajaxy_die('Successfully submitted the transaction.', 'success'); 
	}
	else {
		tjp_ajaxy_die('Transaction failed, please refresh and try again.', 'success'); 
	}
	
}

add_action('wp_ajax_nopriv_action_add_to_favorites', 'action_add_to_favorites');
add_action('wp_ajax_action_add_to_favorites', 'action_add_to_favorites');
function action_add_to_favorites() {	
	
	if(!isset($_POST)) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	}
	if(!isset($_POST['post_id'])) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	}
	if(!isset($_POST['task'])) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	}
	
	$name = 'ladystar_favorites'; 
	$favorites = devon_cookie_reader($name);
	
	if(0) {
		if($_POST['task']=='add') {
			$favorites[] = $_POST['post_id'];				
		}
		elseif($_POST['task']=='remove') {
			
			if(in_array($_POST['post_id'], $favorites)) {
				foreach($favorites as $key=>$fav) {
					if($_POST['post_id']==$fav) {
						unset($favorites[$key]);
					}
				}
			}
		}		
		$cookie = devon_cookie_creator($name, $favorites);
	}
	
	$response = array(
		'reason' => __('Favorites done' , 'ladystar'),
		'old_favorites' => $_POST['favorites'],
		'favorites' => $favorites
	);
	
	tjp_ajaxy_die($response, 'success'); 	
}


/**
 * AJAX: Update User Email Data
 */
add_action( 'wp_ajax_action_update_user_emails_data', 'action_update_user_emails_data' );
function action_update_user_emails_data() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		tjp_ajaxy_die( $ajaxy );
	} 
	
	// If Post_id is not available
	if( !isset($_POST['ajax_action']) OR empty($_POST['ajax_action']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		tjp_ajaxy_die( $ajaxy );
	}
	// If Post_id is not available
	if( !isset($_POST['user_id']) OR empty($_POST['user_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		tjp_ajaxy_die( $ajaxy );
	}
	// If email is not available
	if( !isset($_POST['email']) OR empty($_POST['email']) ) {
		$ajaxy  = array('reason' => __('Please enter the email.' , 'ladystar') );
		tjp_ajaxy_die( $ajaxy );
	}
	
	if( ! devon_validate_email($_POST['email']) ) {
		$ajaxy  = array('reason' => __('Invalid email ID.' , 'ladystar') );
		tjp_ajaxy_die( $ajaxy );
	}
	
	if($_POST['action']=='add-email') {
	}
	elseif($_POST['action']=='edit-email') {
		
	}
	elseif($_POST['action']=='delete-email') {
	}
	
	////////////////////////////////////
	// email Validation Point
	////////////////////////////////////
	
	if( ! $user_emails = get_user_meta($_POST['user_id'], 'devon_emails', true) ) 
		$user_emails = array(); 
	
	if($_POST['ajax_action']=='edit-email') {
		//tjp_ajaxy_die($user_emails); 
		if(isset($user_emails[$_POST['existing_email']])) {
			
			if($_POST['existing_email']==$_POST['email']) {
				$ajaxy  = array( 'reason' => __('Email updated successfully.' , 'ladystar'), 'reload' => false );
				tjp_ajaxy_die($ajaxy); 		
			}
			
			$email_data = $user_emails[$_POST['existing_email']];
			unset($user_emails[$_POST['existing_email']]); 
			
			$user_emails[$_POST['email']] = array(
				'email' => $_POST['email'], 
				'date' => $email_data['date'], 
				'ads' => array(),
				'last_modified' => current_time('Y-m-d H:i:s'), 
			);
			
			update_user_meta($_POST['user_id'], 'devon_emails', $user_emails); 
			$ajaxy  = array( 'reason' => __('Email updated successfully.', 'ladystar'), 'reload' => true );
			tjp_ajaxy_die($ajaxy, 'success'); 		
		}
		else {
			$ajaxy  = array( 'reason' => __('Email does not exist, please reload.' , 'ladystar'), 'reload' => false );
			tjp_ajaxy_die($ajaxy); 		
		}
	}
	elseif($_POST['ajax_action']=='add-email') {		
		$user_emails[$_POST['email']] = array(
			'email' => $_POST['email'], 
			'date' => current_time('Y-m-d H:i:s'), 
			'ads' => array(),
			'last_modified' => current_time('Y-m-d H:i:s'), 
		); 
	}
	
	
	if(update_user_meta($_POST['user_id'], 'devon_emails', $user_emails)) {
		$ajaxy  = array( 'reason' => __('Email added successfully.', 'ladystar'), 'reload' => true );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	else {		
		$ajaxy  = array('reason' => __('Something failed, please try again' , 'ladystar') );
		wp_send_json_error( $ajaxy );
		wp_die();	
	}
}

/**
 * AJAX: Delete User Email Data
 */
add_action( 'wp_ajax_action_delete_user_emails_data', 'action_delete_user_emails_data' );
function action_delete_user_emails_data() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	// If Post_id is not available
	if( !isset($_POST['ajax_action']) OR empty($_POST['ajax_action']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	// If user_id is not available
	if( !isset($_POST['user_id']) OR empty($_POST['user_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}	
	// If email is not available
	if( !isset($_POST['email']) OR empty($_POST['email']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	////////////////////////////////////
	// email Validation Point
	////////////////////////////////////
	
	$email = $_POST['email']; 
	
	if( ! $user_emails = get_user_meta($_POST['user_id'], 'devon_emails', true) ) 
		$user_emails = array(); 
	
	if( ! isset($user_emails[$email]) ) {		
		tjp_ajaxy_die(__('Email does not exist or already deleted.', 'ladystar'));
	}	
	
	if( sizeof($user_emails[$email]['ads']) ) {		
		tjp_ajaxy_die(__('Email can not be deleted, as it is assigned to your ads.', 'ladystar'));
	}		
	
	// Remove email here
	unset($user_emails[$email]); 
	
	if(update_user_meta($_POST['user_id'], 'devon_emails', $user_emails)) {		
		$ajaxy  = array( 'reason' => __('Email deleted successfully.' , 'ladystar'), 'reload' => false );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	else {		
		tjp_ajaxy_die('Something failed, please try again' );
	}
}

/**
 * AJAX: Update User Phone Data
 */
add_action( 'wp_ajax_action_update_user_phones_data', 'action_update_user_phone_data' );
function action_update_user_phone_data() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	// If Post_id is not available
	if( !isset($_POST['ajax_action']) OR empty($_POST['ajax_action']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	// If Post_id is not available
	if( !isset($_POST['user_id']) OR empty($_POST['user_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	// If phone is not available
	if( !isset($_POST['phone']) OR empty($_POST['phone']) ) {
		$ajaxy  = array('reason' => __('Please enter the phone.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
		
	if( ! devon_validate_phone($_POST['phone']) ) {
		$ajaxy  = array('reason' => __('Invalid Phone.' , 'ladystar') );
		tjp_ajaxy_die( $ajaxy );
	}
	
	if($_POST['action']=='add-phone') {
	}
	elseif($_POST['action']=='edit-phone') {
		
	}
	elseif($_POST['action']=='delete-phone') {
	}
	
	////////////////////////////////////
	// phone Validation Point
	////////////////////////////////////
	
	if( ! $user_phones = get_user_meta($_POST['user_id'], 'devon_phones', true) ) 
		$user_phones = array(); 
	
	if($_POST['ajax_action']=='edit-phone') {
		//tjp_ajaxy_die($user_phones); 
		if(isset($user_phones[$_POST['existing_phone']])) {
			
			if($_POST['existing_phone']==$_POST['phone']) {
				$ajaxy  = array( 'reason' => __('Phone updated successfully.' , 'ladystar'), 'reload' => false );
				tjp_ajaxy_die($ajaxy, 'success'); 		
			}
			
			$phone_data = $user_phones[$_POST['existing_phone']];
			unset($user_phones[$_POST['existing_phone']]); 
			
			$user_phones[$_POST['phone']] = array(
				'phone' => $_POST['phone'], 				
				'date' => $phone_data['date'], 
				'ads' => array(),
				'last_modified' => current_time('Y-m-d H:i:s'), 
			);
			
			update_user_meta($_POST['user_id'], 'devon_phones', $user_phones); 
			$ajaxy  = array( 'reason' => __('Phone number updated successfully.', 'ladystar'), 'reload' => true );
			tjp_ajaxy_die($ajaxy, 'success'); 		
		}
		else {
			$ajaxy  = array( 'reason' => __('Phone does not exist, please reload.' , 'ladystar'), 'reload' => false );
			tjp_ajaxy_die($ajaxy); 		
		}
	}
	elseif($_POST['ajax_action']=='add-phone') {
		if(0) {
			//Check if number already in use by other users
			$users = get_users();
			foreach($users as $user) {
				$phones_data = get_user_meta($user->ID, 'devon_phones', true);
					if(isset($phones_data[$_POST['phone']])) {
						$ajaxy  = array( 'reason' => __('Please add unique phone number.' , 'ladystar'), 'reload' => false );
						tjp_ajaxy_die($ajaxy);
					}
			}
		}
		
		//Check if number already for current user
		if(isset($user_phones[$_POST['phone']])) {
			$ajaxy  = array( 'reason' => __('Please add a unique phone number.' , 'ladystar'), 'reload' => false );
			tjp_ajaxy_die($ajaxy);
		}

		$user_phones[$_POST['phone']] = array(
			'phone' => $_POST['phone'], 
			'date' => current_time('Y-m-d H:i:s'), 
			'ads' => array(),
			'last_modified' => current_time('Y-m-d H:i:s'), 
		); 
	}
	
	
	if(update_user_meta($_POST['user_id'], 'devon_phones', $user_phones)) {
		$ajaxy  = array( 'reason' => __('Phone number added successfully.', 'ladystar'), 'reload' => true );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	else {		
		$ajaxy  = array('reason' => __('Something failed, please try again' , 'ladystar') );
		wp_send_json_error( $ajaxy );
		wp_die();	
	}
}


/**
 * AJAX: Delete User Phone Data
 */
add_action( 'wp_ajax_action_delete_user_phones_data', 'action_delete_user_phones_data' );
function action_delete_user_phones_data() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	
	// If Post_id is not available
	if( !isset($_POST['ajax_action']) OR empty($_POST['ajax_action']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	// If user_id is not available
	if( !isset($_POST['user_id']) OR empty($_POST['user_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}	
	// If phone is not available
	if( !isset($_POST['phone']) OR empty($_POST['phone']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar') );
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	////////////////////////////////////
	// phone Validation Point
	////////////////////////////////////
	
	$phone = $_POST['phone']; 
	
	if( ! $user_phones = get_user_meta($_POST['user_id'], 'devon_phones', true) ) 
		$user_phones = array(); 
	
	if( ! isset($user_phones[$phone]) ) {		
		tjp_ajaxy_die(__('Phone does not exist or already deleted.', 'ladystar'));
	}		
	
	if( sizeof($user_phones[$phone]['ads']) ) {		
		tjp_ajaxy_die(__('Phone number can not be deleted, as it is assigned to your ads.', 'ladystar'));
	}	
	
	// Remove phone here
	unset($user_phones[$phone]); 
	
	if(update_user_meta($_POST['user_id'], 'devon_phones', $user_phones)) {		
		$ajaxy  = array( 'reason' => __('Phone deleted successfully.' , 'ladystar'), 'reload' => false );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	else {		
		tjp_ajaxy_die('Something failed, please try again' );
	}
}

/**
 * AJAX: Delete the Ad
 */
add_action( 'wp_ajax_action_delete_an_ad', 'action_delete_an_ad' );
function action_delete_an_ad() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	} 

	// If Post_id is not available
	if( !isset($_POST['post_id']) OR empty($_POST['post_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
	
	$check_permissions = 1; 

	if($check_permissions) {
		$deleted = wp_delete_post($_POST['post_id'], true); 
		
		if($deleted) {
			$ajaxy  = array( 'reason' => __('Ad deleted successfully.', 'ladystar'), 'reload' => true );
			
			// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
			// ToDo: Can be improved to update positions for particular location and category only
			$devon_positions = new DEVON_POSITIONS(); 
			$devon_positions->set_positions(); 
			
			devon_ajaxy_die($ajaxy, 'success'); 
		}
		else {
			$ajaxy  = array('reason' => __('Ad could not be deleted, please refresh and try again.' , 'ladystar'));
			devon_ajaxy_die($ajaxy);
		}
	}
	else {		
		$ajaxy  = array('reason' => __('You are not allowed to delete this ad.' , 'ladystar'));
		devon_ajaxy_die($ajaxy);
	}
}

/**
 * AJAX: Verify Control Photo
 */
add_action( 'wp_ajax_action_verify_control_photo', 'action_verify_control_photo' );
function action_verify_control_photo() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	} 

	parse_str($_POST['fields'], $fields);
	//tjp_ajaxy_die($fields); 	
	
	// If Post_id is not available
	if( !isset($_POST['post_id']) OR empty($_POST['post_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}

	// If is_verified is not available
	if( !isset($fields['is_verified']) OR $fields['is_verified']=='' ) {
		$ajaxy  = array('reason' => __('Please choose to verify or reject the control photo.', 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
	
	// If justification_text is not available
	if( $fields['is_verified']==0 && (!isset($fields['control_photo_justification_text']) OR empty($fields['control_photo_justification_text'])) ) {
		$ajaxy  = array('reason' => __('Please enter the justification text for rejection of this control photo.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
	
	// Set is_verified to 0 or 1, is_verified (empty=>'Not uploaded', 0=>'rejeced', 1=>verified)
	update_post_meta($_POST['post_id'], 'is_verified', $fields['is_verified']); 
	// Update justification text if the is_verified is false
	if(!$_POST['is_verified']) {
		update_post_meta($_POST['post_id'], 'control_photo_justification_text', $fields['control_photo_justification_text']); 
	}
	else {
		delete_post_meta($_POST['post_id'], 'control_photo_justification_text'); 
	}
	
	// ToDo: Introduce emails here & change admin message as per selection
	$ajaxy  = array( 'reason' => __('Control photo verification completed.', 'ladystar'), 'reload' => true );
	devon_ajaxy_die($ajaxy, 'success'); 	
}

/**
 * AJAX: Approve the Ad
 */
add_action( 'wp_ajax_action_approve_an_ad', 'action_approve_an_ad' );
function action_approve_an_ad() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	} 

	parse_str($_POST['fields'], $fields);
	
	// If Post_id is not available
	if( !isset($_POST['post_id']) OR empty($_POST['post_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}

	// If listing_status is not available
	if( !isset($fields['listing_status']) OR empty($fields['listing_status']) ) {
		$ajaxy  = array('reason' => __('Please choose a listing status.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}

	// If justification_text is not available
	if( $fields['listing_status']=='rejected' && (!isset($fields['justification_text']) OR empty($fields['justification_text'])) ) {
		$ajaxy  = array('reason' => __('Please enter the justification text for rejecting the ad.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
	
	$status = get_post_meta($_POST['post_id'], 'listing_status', true); 
	if($fields['listing_status']==$status) {
		$ajaxy  = array('reason' => __('Status is already set to ' . $fields['listing_status'], 'ladystar') );
		devon_ajaxy_die( $ajaxy );
	}

	$updated = 0;
	foreach($fields as $key => $value) {
		$update = update_post_meta($_POST['post_id'], $key, $value);
		if($key=='listing_status' && $update)
			$updated++;
	}
	//If nothing above happens, let us update the status
	$message = '';
	$subject = '';
	if($updated) {
		switch($fields['listing_status']) {
			case 'approved':
				$post = array(
					'ID' => $_POST['post_id'],
					'post_status' => 'publish',
				);
				break;

			case 'rejected':
				$post = array(
					'ID' => $_POST['post_id'],
					'post_status' => 'draft',
				);
				break;

			case 'pending':
				$post = array(
					'ID' => $_POST['post_id'],
					'post_status' => 'draft',
				);
				break;
		}

		//Update the Post Status
		$post_id = wp_update_post($post);
		
		// Send emails for change of status
		$emails = get_post_meta($_POST['post_id'], 'email', true);
		$emails = !is_array($emails) ? array($emails) : $emails; 
		$emails = maybe_unserialize($emails);			
		$headers = devon_get_mail_headers(); 
		$email_setup = devon_get_email_body($_POST['post_id'], $fields['listing_status'], $fields['justification_text']); 

		foreach ($emails as $email) {
			$mail = wp_mail($email, $email_setup['subject'], $email_setup['body'], $headers);
		}
		
		// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
		// ToDo: Can be improved to update positions for particular location and category only
		$devon_positions = new DEVON_POSITIONS(); 
		$devon_positions->set_positions(); 
		
		$ajaxy  = array( 'reason' => __('Listing status changed successfully.', 'ladystar'), 'reload' => true );
		devon_ajaxy_die($ajaxy, 'success'); 
	}
	else {		
		$ajaxy  = array('reason' => __('Something failed, please try again' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
}


/**
 * AJAX: Approve a Transaction
 */
add_action( 'wp_ajax_action_approve_a_transaction', 'action_approve_a_transaction' );
function action_approve_a_transaction() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	} 

	parse_str($_POST['fields'], $fields);

	// If listing_status is not available
	if( !isset($fields['payment_status']) OR empty($fields['payment_status']) ) {
		$ajaxy  = array('reason' => __('Please choose a payment status.' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}

	if(ladystar_update_transaction_status($fields['id'], $fields['payment_status'])) {		
		
		// get transaction for this id to update user wallet ballance
		$t = devon_get_transaction($fields['id']); 
		$update_balance = devon_update_user_wallet_balance($t->user_id, $t->amount, '+'); 
		
		$ajaxy  = array( 'reason' => __('Bank Transfer status changed successfully.', 'ladystar'), 'reload' => true );
		devon_ajaxy_die($ajaxy, 'success'); 
	}
	else {		
		$ajaxy  = array('reason' => __('Something failed, please try again' , 'ladystar'));
		devon_ajaxy_die( $ajaxy );
	}
}


/**
 * AJAX: Promote User Listing
 */
add_action( 'wp_ajax_action_promote_user_listing', 'action_promote_user_listing' );
function action_promote_user_listing() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'),
			'reason' => __('Try again. Nothing Sent to server.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	// If Post_id is not available
	if( 
		!isset($_POST['post_id']) OR empty($_POST['post_id']) 
		OR !isset($_POST['promotion']) OR empty($_POST['promotion']) 
		OR !isset($_POST['price']) OR empty($_POST['price']) 
		OR !isset($_POST['time']) OR empty($_POST['time']) 
	) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'), 
			'reason' => __('Something went wrong, please reload.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}	
	
	// If Post_id is not available
	if( !isset($_POST['user_id']) OR empty($_POST['user_id']) ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'), 
			'reason' => __('Something went wrong, please reload.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	$is_activated = get_post_meta($_POST['post_id'], 'is_activated', true); 
	if( !isset($is_activated) || $is_activated!=1 ) {
		$ajaxy  = array(
			'title' => __('Inactive Ad', 'ladystar'), 
			'reason' => __('Please activate this ad before promoting.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	$listing_status = get_post_meta($_POST['post_id'], 'listing_status', true); 
	if( !isset($listing_status) || $listing_status!='approved' ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'), 
			'reason' => __('You can not promote an ad which is not yet approved by the admin. Please check FAQ.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	$wallet_balance = devon_get_user_wallet_amount($_POST['user_id']); 
	if(!$wallet_balance) {
		$url = pll_get_page_url('user') . '?action=wallet'; 
		$link = '<a href="'.$url.'">Add Balance</a>'; 
		$ajaxy  = array(
			'balance' => $wallet_balance,
			'title' => 'Insufficient Balance', 
			'reason' => __('Please add wallet balance to promote ad.' , 'ladystar'), 
			'link' => $link
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	$listing_status = get_post_meta($_POST['post_id'], 'listing_status', true); 
	if($listing_status != 'approved') {
		$ajaxy  = array(
			'title' => __('Unapproved Listing', 'ladystar'),
			'reason' => __('Listing must be Approved before Promotion: ' . ucwords($listing_status), 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	// USD 1 will be charged for promotion each time
	$promotion_charges = $_POST['price']; 
	$promotion = $_POST['promotion']; 
	$promotion_date_field = $promotion . '_date_field'; 
	// get expiry time by adding number of hours to current time
	$expiry_time = devon_modify_date('+', $_POST['time']); 
	$expiry_time = $expiry_time->format('Y-m-d H:i:s'); 
	
	if(update_post_meta($_POST['post_id'], $promotion_date_field, $expiry_time)) {
		// Update promotion_{type} key with expiry time
		update_post_meta($_POST['post_id'], 'promotion_'.$promotion, $expiry_time);
	
		if( ! $devon_wallet_history = get_user_meta($_POST['user_id'], 'devon_wallet_history', true) )
			$devon_wallet_history = array(); 
		
		$devon_wallet_history[] = array(
			'amount' => $promotion_charges, 
			'date' => current_time('Y-m-d H:i:s'), 
			'listing_id' => $_POST['post_id'], 
		);
		
		update_user_meta($_POST['user_id'], 'devon_wallet_history', $devon_wallet_history); 		
		$update_balance = devon_update_user_wallet_balance($_POST['user_id'], $promotion_charges, '-'); 
		
		// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
		// ToDo: Can be improved to update positions for particular location and category only
		$devon_positions = new DEVON_POSITIONS(); 
		$devon_positions->set_positions(); 
		
		$modified = devon_update_last_modified($_POST['post_id']); 		
			
		$ajaxy  = array( 
			'title' => 'Ad Promoted', 
			'reason' => __('Add promoted successfully.' , 'ladystar'), 
			'modified' => $modified, 
			// 'reload' => true 
		);
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	
	else {
		$ajaxy  = array(			
			'reason' => __('Seomething went wrong, please try again.' , 'ladystar'),
			// 'reload' => true
		);
		tjp_ajaxy_die($ajaxy); 		
	}	
}



/**
 * AJAX: Promote User Listing
 */
add_action( 'wp_ajax_action_refresh_ad', 'action_refresh_ad' );
function action_refresh_ad() {
	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'),
			'reason' => __('Try again. Nothing Sent to server.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	// If Post_id is not available
	if( !isset($_POST['post_id']) OR empty($_POST['post_id']) ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'), 
			'reason' => __('Something went wrong, please reload.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}	
	
	$is_activated = get_post_meta($_POST['post_id'], 'is_activated', true); 
	if( !isset($is_activated) || $is_activated!=1 ) {
		$ajaxy  = array(
			'title' => __('Inactive Ad', 'ladystar'), 
			'reason' => __('Please activate this ad before refreshing.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	$listing_status = get_post_meta($_POST['post_id'], 'listing_status', true); 
	if( !isset($listing_status) || $listing_status!='approved' ) {
		$ajaxy  = array(
			'title' => __('Oops!', 'ladystar'), 
			'reason' => __('You can not refresh an ad which is not yet approved by the admin. Please check FAQ.' , 'ladystar') 
		);
		wp_send_json_error( $ajaxy ); wp_die();
	}
	
	// Update Last Modified time here
	$modified = devon_update_last_modified($_POST['post_id']); 					
	
	// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
	// ToDo: Can be improved to update positions for particular location and category only
	$devon_positions = new DEVON_POSITIONS(); 
	$devon_positions->set_positions(); 
	
	$ajaxy  = array( 
		'title' => 'Ad Refreshed', 
		'reason' => __('Ad is refreshed, it should be on top of other non-promoted ads.' , 'ladystar'), 
		'modified' => $modified, 
		'reload' => true 
	);
	tjp_ajaxy_die($ajaxy, 'success'); 			
}


/**
 * AJAX: Activate User Listing
 */
add_action( 'wp_ajax_action_activate_user_listing', 'action_activate_user_listing' );
function action_activate_user_listing() {	
	// If Nothing is posted through AJAX
	if( !isset($_POST) ) {
		$ajaxy  = array('reason' => __('Try again. Nothing Sent to server.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	} 
	// If Post_id is not available
	if( !isset($_POST['post_id']) OR empty($_POST['post_id']) ) {
		$ajaxy  = array('reason' => __('Something went wrong, please reload.' , 'ladystar'));
		wp_send_json_error( $ajaxy ); wp_die();
	}

	if($_POST['doaction'] == 'activate') {
		update_post_meta($_POST['post_id'], 'is_activated', true); 				
		
		// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
		// ToDo: Can be improved to update positions for particular location and category only
		$devon_positions = new DEVON_POSITIONS(); 
		$devon_positions->set_positions(); 
		
		$ajaxy  = array( 'reason' => __('Add activated successfully.', 'ladystar'), 'reload' => true );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	elseif($_POST['doaction'] == 'deactivate') {
		update_post_meta($_POST['post_id'], 'is_activated',	 false); 				
		
		// ToDo: Needs to be done at several places (like adding & editing an ad, deactivating/rejecting and ad)
		// ToDo: Can be improved to update positions for particular location and category only
		$devon_positions = new DEVON_POSITIONS(); 
		$devon_positions->set_positions(); 
		
		$ajaxy  = array( 'reason' => __('Add deactivated successfully.', 'ladystar'), 'reload' => true );
		tjp_ajaxy_die($ajaxy, 'success'); 		
	}
	else {
		$ajaxy  = array( 'reason' => __('Seomething went wrong, please try again.', 'ladystar'), 'reload' => true );
		tjp_ajaxy_die($ajaxy); 		
	}	
}