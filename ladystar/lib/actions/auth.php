<?php

function auth_login() {
	return wp_signon( array('user_login' => $_POST['username'], 'user_password' => $_POST['password']), false );
}

function auth_register() {
	
	if (isset($_POST['terms'])) {
		if(empty($_POST['password']) OR empty($_POST['confirm_password'])) {
			$error_reg = esc_html__('Enter your password', 'ladystar');
			return $error_reg; 
		}
		if($_POST["password"] !== $_POST["confirm_password"]) {
			$error_reg = esc_html__('Passwords do not match', 'ladystar');			
			return $error_reg; 
		}
		if(strlen($_POST["password"]) < 8) {
			$error_reg = esc_html__('Passwords should be of minimum 8 characters', 'ladystar');			
			return $error_reg; 
		}
		
		//recaptcha
		$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
		curl_setopt_array($ch, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_POST => 1,
			CURLOPT_POSTFIELDS => [
				'secret' => '6LeXMZsUAAAAAAYoNV1ItHnBkMBBbvgRibmToh-S',
				'response' => $_POST['g-recaptcha-response']
			]
		]);
		$res = json_decode(curl_exec($ch));
		
		// ToDo: Remove 1 OR condition when moving to live site with the recaptcha key 
		// working
		if (1 OR devon_if_local() OR $res->success == true) {

			$reg_login = '';
			$reg_email = '';
			$terms_accept = 1;

			if ( isset($_POST['username']) && is_string( $_POST['username'] ) ) {
				$reg_login = $_POST['username'];
			}

			if ( isset($_POST['email']) && is_string( $_POST['email'] ) ) {
				$reg_email = wp_unslash( $_POST['email'] );
			}
			
			$user_id = register_new_user( $reg_login, $reg_email );
			if ( ! is_wp_error( $user_id ) ) {
				wp_set_password($_POST['password'], $user_id); 
				devon_add_email_to_user($user_id, $reg_email); 				
				update_user_meta('preferred_language', 'en'); 
				return false;
			} else {
				$error_reg = $user_id->get_error_messages()[0];
			}
		} else {
			$error_reg = esc_html__('Please prove you are not a robot', 'ladystar');
		}
	} else {
		$error_reg = esc_html__('Please confirm that you accept our Terms & Conditions', 'ladystar');
	}

	return $error_reg;
}

function auth_forget() {
	if (isset($_POST['email']) && $_POST['email'] != '' && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$user_data = get_user_by( 'email', trim( wp_unslash( $_POST['email'] ) ) );
		if ( empty( $user_data ) ) {
			$error_forget = __( '<strong>ERROR</strong>: There is no account with that username or email address.', 'ladystar' );
		}

		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		$key = get_password_reset_key( $user_data );

		$message = __( 'Someone has requested a password reset for the following account:', 'ladystar' ) . "\r\n\r\n";
		
		$message .= sprintf( __( 'Username: %s' ), $user_login ) . "\r\n\r\n";
		$message .= __( 'If this was a mistake, just ignore this email and nothing will happen.' ) . "\r\n\r\n";
		$message .= __( 'To reset your password, visit the following address:' ) . "\r\n\r\n";
		$message .= '<' . network_site_url( "/auth/?key=$key&login=" . rawurlencode( $user_login )."#sw_recover", 'login' ) . ">\r\n";

		$title = __( 'Password Reset' );

		if ( $message && ! wp_mail( $user_email, wp_specialchars_decode( $title ), $message ) ) {
			wp_die( __( 'The email could not be sent.', 'ladystar' ) . "<br />\n" . __( 'Possible reason: your host may have disabled the mail() function.', 'ladystar' ) );
		}

		return false;


	} else {
		$error_forget = esc_html__('Please provide correct email', 'ladystar');
	}

	return $error_forget;
}

function auth_recover() {


	$user = check_password_reset_key( $_GET['key'], $_GET['login'] );

	if ( ! $user || is_wp_error( $user ) ) {
		
		if ( $user && $user->get_error_code() === 'expired_key' ) {
			return esc_html__('Key expired', 'ladystar');
		} else {
			return esc_html__('Key is invalid', 'ladystar');
		}
	}

	if ($user) {
		reset_password( $user, $_POST['password'] );
	}

	return false;
}