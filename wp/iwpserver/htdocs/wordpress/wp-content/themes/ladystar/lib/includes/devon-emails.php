<?php

/* 
	Send analytics event 
	Created as a function for changing gtag to analytics.js, if required
	Alternative: https://github.com/theiconic/php-ga-measurement-protocol
*/
function devon_send_event($event=array()) {
	$event = wp_parse_args($event, array('action'=>'', 'category'=>'', 'label'=>'', 'value'=>''));  
	if(empty($event['action'])) return; 
	extract($event); 
	echo "<script>gtag('event', '{$action}', {'event_category': '{$category}', 'event_label': '{$label}', 'value': '{$value}'});</script>";
}

function devon_get_admin_email() {
	return "kristian.smilenov@gmail.com";	
	return "admin@ladystar.eu";	
	return 'om.akdeveloper@gmail.com'; 
}

/**
 * Returns Headers
 * @param NOne
 * @param None
 
 * @return  $headers for SendStatusMail
 * Called in SendStatusMail
 */
function devon_get_mail_headers($cc_list="", $bcc_list="") {
	$details['cc_list'] = ($cc_list!='') ? 'CC: ' .$cc_list : '';
	$details['bcc_list'] = ($cc_list!='') ? 'BCC: ' .$cc_list : '';
	$details['reply_to'] = "info@ladystar.com";
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= $details['cc_list']."\r\n";
	if(isset($details['bcc_list'])) 
		$headers .= $details['bcc_list']."\r\n";
	
	if(isset($details['reply_to']))
		$headers .= $details['reply_to']."\r\n";
	
	return $headers;
}


function devon_get_email_body($post_id, $status, $justification_text='') {
	$subject = 'Status change for ' . get_the_title($post_id). ': '. ucwords($status);
	$body = ''; 
	$body .= 'The status of your listing has been changed to: <span class="font-weight-bold">'. devon_ucwords($status) . '.</span>'; 
	
	switch($status) {
		case 'approved': 
			$body .= ' <a href="'.get_the_permalink().'">View '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 'rejected': 
			$body .= '<h3>Rejection Reasons</h3>'; 
				$body .= '<p>'. $justification_text . '</p>'; 
			break; 
		case 'pending': 
			$body .= 'Your '.__('Ad', 'ladystar').' has been set for approval by admin. Please wait for further notification.'; 
			break; 
	}		
	
	$body = devon_get_email_footer($body); 
	
	$return = array(
		'subject' => $subject, 
		'body' => $body, 
	);
	
	return $return; 
}

function devon_get_email($post_id, $status) {
	
	switch($status) {
		case 'new-post': 
			$subject = 'New Ad has been posted: ' . get_the_title($post_id); 
			$body = 'A new ad has been posted, please moderate it: <a href="'.admin_url('admin.php?page=pending-listing').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 're-approval': 
			$subject = get_the_title($post_id) . ' has been edited'; 
			$body = 'An '.__('Ad', 'ladystar').' has been edited, please moderate it again: <a href="'.admin_url('admin.php?page=pending-listing').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 'approved': 
			$subject = get_the_title($post_id) . ' has been approved.'; 
			$body = 'An '.__('Ad', 'ladystar').' has been edited, please moderate it again: <a href="'.admin_url('admin.php?page=pending-listing').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 'rejected': 
			$subject = get_the_title($post_id) . ' has been rejected'; 
			$body = 'An '.__('Ad', 'ladystar').' has been edited, please moderate it again: <a href="'.admin_url('admin.php?page=pending-listing').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 'promoted': 
			$subject = get_the_title($post_id) . ' has been promoted'; 
			$body = 'An '.__('Ad', 'ladystar').' has been edited, please moderate it again: <a href="'.admin_url('admin.php?page=pending-listing').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 
		case 'new-room': 
			$subject = 'New Leisure rooms has been posted: ' . get_the_title($post_id); 
			$body = 'A New Leisure rooms has been posted, please moderate it: <a href="'.admin_url('admin.php?page=pending-rooms').'">View Pending '.__('Ad', 'ladystar').'</a>'; 
			break; 		
	}		
	
	$body = devon_get_email_header($body); 
	$body = devon_get_email_footer($body); 
	
	$return = array(
		'subject' => $subject, 
		'body' => $body, 
	);
	
	return $return; 
}


function devon_get_email_footer($body) {
	
	$body .= '<br><br><br>';
	$body .= 'Webmaster @ LadyWeb<br>';
	$body .= pll_home_url();
	
	return $body; 
}

function devon_get_email_header($body) {
	
	$header = '<h3>Dear User</h3>';
	$header .= '<p></p>';
	
	return $header . $body; 
}