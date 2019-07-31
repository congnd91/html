<?php

function devon_update_profile() {
	
	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 	
	$errors = array(); 
	$success = array();
	$reload = false; 	

	if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='update-profile' ) {
		
		if ( ! isset( $_POST['dnonce'] ) || ! wp_verify_nonce( $_POST['dnonce'], 'devon_update_profile' ) ) {
			$errors[] = esc_html__('Security check failed, please refresh the page.', 'ladystar'); 
		}
		else {
			if(!isset($_POST['username']) OR empty($_POST['username'])) {
				$errors[] = esc_html__('Please enter Username', 'ladystar'); 
			}	
			if(!isset($_POST['user_email']) OR empty($_POST['user_email'])) {
				$errors[] = esc_html__('Please enter Email', 'ladystar'); 
			}			
			if(!isset($_POST['preferred_language']) OR empty($_POST['preferred_language'])) {
				$errors[] = esc_html__('Please choose a preferrend language', 'ladystar'); 
			}
			
			if(!sizeof($errors)) {	

				update_user_meta($user_id, 'preferred_language', $_POST['preferred_language']);
				
				if($current_user->user_email != $_POST['user_email']) {
					global $wpdb; 
					$query = "SELECT * FROM $wpdb->users WHERE user_email = '" . $_POST['user_email'] ."'"; 
					$results = $wpdb->get_results( $query, OBJECT );			
					if(sizeof($results)) {
						$errors[] = __('An account with this email ID already exists', 'ladystar'); 
					}				
					else {
						$update_user = wp_update_user( array( 'ID' => $user_id, 'user_email' => $_POST['user_email'] ) );
						if ( is_wp_error( $update_user ) ) {
							$errors[] = __('Email ID could not be updated, please try again.', 'ladystar'); 
						}
						else {
							$success[] = __('Email ID updated sucessfully', 'ladystar'); 
						}
					}
				}			
				
				if($current_user->user_login != $_POST['username']) {
					global $wpdb; 
					$query = "SELECT * FROM $wpdb->users WHERE user_login = '" . $_POST['username'] ."'"; 
					$results = $wpdb->get_results( $query, OBJECT );			
				
					if(sizeof($results)) {
						$errors[] = __('Username not available, please try a different username', 'ladystar'); 
					}				
					else {
						if($wpdb->update($wpdb->users, array('user_login' => $_POST['username']), array('ID' => $user_id))) {
							$success[] = __('Username updated successfully, you will need to login again', 'ladystar'); 
							$reload = true; 
						}
					}				
				}			
				
			}
		}
			
		// if(isset($reload)) { wp_safe_redirect(pll_get_page_url('auth')); }
	}
	
	return array(
		'errors' => $errors, 
		'success' => $success,
		'reload' => $reload 
	);
}

function devon_update_password() {
	
	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 	
	$errors = array(); 
	$success = array();
	$reload = false; 	

	if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='change-password' ) {
		
		if ( ! isset( $_POST['dnonce'] ) || ! wp_verify_nonce( $_POST['dnonce'], 'devon_update_password' ) ) {
			$errors[] = esc_html__('Security check failed, please refresh the page.', 'ladystar'); 
		}
		else {
			
			if(!isset($_POST['current_password']) OR empty($_POST['current_password'])) {
				$errors[] = esc_html__('Please enter current password', 'ladystar'); 
			}	
			else if(!isset($_POST['password']) OR empty($_POST['password'])) {
				$errors[] = esc_html__('Please enter new password', 'ladystar'); 
			}	
			else if(!isset($_POST['confirm_password']) OR empty($_POST['confirm_password'])) {
				$errors[] = esc_html__('Please enter confirm password', 'ladystar'); 
			}	
			else if(wp_check_password( $_POST['password'], $current_user->user_pass, $user_id)) {
				$errors[] = esc_html__('Incorrect Old Password', 'ladystar');			
			}
			else if(!empty($_POST['password'])) {
				if($_POST["password"] !== $_POST["confirm_password"]) {
					$errors[] = esc_html__('Passwords do not match', 'ladystar');			
				}
				if(strlen($_POST["password"]) < 8) {
					$errors[] = esc_html__('Passwords should be of minimum 8 characters', 'ladystar');			
				}
			}
			
			if(!sizeof($errors)) {	
				if(!empty($_POST['password'])) {				
					wp_set_password($_POST['password'], $user_id);
					$success[] = 'Password updated successfully'; 
					$reload = true; 
				}							
			}
		}
			
		// if(isset($reload)) { wp_safe_redirect(pll_get_page_url('auth')); }
	}
	
	return array(
		'errors' => $errors, 
		'success' => $success,
		'reload' => $reload 
	);
}