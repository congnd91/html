<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function devon_get_transactions() {

	global $devon_opts;

	$output = '';
	$output .= '<div class="wrap row">';
		$output .= '<div class="col-md-12">';
			$output .= '<h3>'. esc_html__('Transactions', 'ladystar').'</h3>';
		$output .= '</div>';
	$output .= '</div>';

	$output .= '<div class="row">';
		if(1) {
			$output .= '<div class="col-md-12 my-2">';
				$output .= '<div class="col-md-3 float-left d-block">';
					$output .= '<input tupe="text" class="form-control search_col_user all-custom-filter" placeholder="Enter User name" value="">';
					$output .= '<input type="hidden" class="datatable-load-time" value="'.$devon_opts['load-duration'].'">';
				$output .= '</div>';
				$output .= '<div id="devon-daterangepicker" class="col-md-3 float-left all-custom-filter" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">';
					$output .= '<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;';
					$output .= '<span class="search_col_date"></span> <b class="caret"></b>';
				$output .= '</div>';
				$output .= '<div class="col-md-2 float-left d-block">';
					$output .= '<button class="btn btn-warning btn-reset-filter">Reset</button>';
				$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<div class="col-md-12 mt-2">';
			$output .= '<table class="table cell-border text-center transaction-datatable">';
				$output .= '<thead>';
					$output .= '<tr>';
						$output .= '<th>No.</th>';
						$output .= '<th>Date Added</th>';
						$output .= '<th>Payment Type</th>';
						$output .= '<th>Payment Status</th>';
						$output .= '<th>Amount</th>';
						$output .= '<th>User</th>';
					$output .= '</tr>';
				$output .= '</thead>';
			$output .= '</table>';
		$output .= '</div>';
	$output .= '</div>';

	echo $output;
}

add_action('wp_ajax_transaction_datatable', 'devon_transactions_server_side_callback');
function devon_transactions_server_side_callback() {

	header("Content-Type: application/json");
 
    $request= $_GET;
	global $current_user;
	$user_id = $current_user->ID;

	$search_args = ' AND payment_status NOT LIKE "pending"';

	if( !empty($request['search']['value']) ) { // When datatables search is used
        $search_args .= ' AND payment_type LIKE "'.$request['search']['value'].'"';
    }
    if( !empty($request['user']) ) { // When title based search is used
    	$user_data = get_user_by('login', strtolower($request['user']));
    	
    	$user_id = $user_data->ID;
        $search_args .= ' AND user_id = "'.$user_id.'"';
    }
    if( !empty($request['date']) ) { // When title based search is used
    	if(strpos($request['date'], '-')) {
    		$date = explode('-', $request['date']);
    	}
		$fromdate = trim($date[0]); 
		$todate = trim($date[1]);
    	$date_object = DateTime::createFromFormat('F j, Y', $fromdate);
    	$todate_object = DateTime::createFromFormat('F j, Y', $todate);
    	$fromdate = $date_object->format('Y-m-d');
    	$todate = $todate_object->format('Y-m-d');
        $search_args .= ' AND date_added BETWEEN "'.$fromdate.'" AND "'.$todate.'"';
    }

    $limit_query = 'LIMIT '. $request['length']. ' OFFSET '. $request['start'];

	$transactions  = devon_get_user_transactions($search_args, $limit_query);
	if(sizeof($transactions)) {
		$count = 0; 
		foreach($transactions as $transaction) {
			$user_info = get_userdata($transaction->user_id); 
			$user_name = $user_info->user_login; 
			
	        $nestedData = array();
			$nestedData[] = ++$count;
	        $nestedData[] = $transaction->date_added;
	      	$nestedData[] = $transaction->payment_type;
	        $nestedData[] = $transaction->payment_status;
	        $nestedData[] = $transaction->amount;
	        $nestedData[] = ucwords($user_name);

	    	//tjp_ajaxy_die($nestedData);
	    	$result_data[] = $nestedData;
	        wp_reset_query();
		}
		$limit_query = '';
		$total_transactions = devon_get_user_transactions($search_args, $limit_query);
		$totalData = sizeof($total_transactions);

		$json_data = array(
	        "draw" => intval($request['draw']),
	        "recordsTotal" => intval($totalData),
	        "recordsFiltered" => intval($totalData),
	        "data" => $result_data
	    );

	    echo json_encode($json_data);
	}
	else {
	    $json_data = array(
	        "data" => array(),
	    );

	    echo json_encode($json_data);
	}
	wp_die();

	return $output;
}



function devon_get_bank_transfers() {

	global $devon_opts;

	$output = '';
	$output .= '<div class="wrap row">';
		$output .= '<div class="col-md-12">';
			$output .= '<h3>'. esc_html__('Pending Bank Transfers', 'ladystar').'</h3>';
		$output .= '</div>';
	$output .= '</div>';

	$output .= '<div class="row">';
		if(1) {
			$output .= '<div class="col-md-12 my-2">';
				$output .= '<div class="col-md-2 float-left d-block">';
					$output .= '<input tupe="text" class="form-control bt_search_col_user bt-custom-filter" placeholder="Enter User name" value="">';
					$output .= '<input type="hidden" class="datatable-load-time" value="'.$devon_opts['load-duration'].'">';
				$output .= '</div>';
				$output .= '<div id="devon-daterangepicker" class="col-md-3 float-left bt-custom-filter" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">';
					$output .= '<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;';
					$output .= '<span class="bt_search_col_date"></span> <b class="caret"></b>';
				$output .= '</div>';
				$output .= '<div class="col-md-2 float-left d-block">';
					$output .= '<button class="btn btn-warning btn-reset-bt-filter">Reset</button>';
				$output .= '</div>';
				$output .= '<div class="col-md-2 float-right d-block">';
					$output .= '<button class="btn btn-info float-right btn-reload"><i class="fa fa-refresh"></i></button>';
				$output .= '</div>';
			$output .= '</div>';
		}
		$output .= '<div class="col-md-12 mt-2">';
			$output .= '<table class="table cell-border text-center bank-transfer-datatable">';
				$output .= '<thead>';
					$output .= '<tr>';
						$output .= '<th>No.</th>';
						$output .= '<th>Date Added</th>';
						$output .= '<th>Payment Type</th>';
						$output .= '<th>Payment Status</th>';
						$output .= '<th>Amount</th>';
						$output .= '<th>Transaction ID</th>';
						$output .= '<th>User</th>';
						$output .= '<th>Action</th>';
					$output .= '</tr>';
				$output .= '</thead>';
			$output .= '</table>';
		$output .= '</div>';
	$output .= '</div>';

	echo $output;
}

add_action('wp_ajax_bank_transfers_datatable', 'devon_bank_transfers_server_side_callback');
function devon_bank_transfers_server_side_callback() {

	header("Content-Type: application/json");
 
    $request= $_GET;
	global $current_user;
	$user_id = $current_user->ID;

	$search_args = ' AND payment_status LIKE "pending" AND payment_type = "bank_transfer"';

	// Filter: Custom Filter Username
    if( !empty($request['user']) ) { 
    	$user_data = get_user_by('login', strtolower($request['user']));
    	
    	$user_id = $user_data->ID;
        $search_args .= ' AND user_id = "'.$user_id.'"';
    }
	
	// Filter: DateRange Picker
    if( !empty($request['date']) ) { 
    	if(strpos($request['date'], '-')) {
    		$date = explode('-', $request['date']);
    	}
		$fromdate = trim($date[0]); 
		$todate = trim($date[1]);
    	$date_object = DateTime::createFromFormat('F j, Y', $fromdate);
    	$todate_object = DateTime::createFromFormat('F j, Y', $todate);
    	$fromdate = $date_object->format('Y-m-d');
    	$todate = $todate_object->format('Y-m-d');
        //$search_args .= ' AND date_added BETWEEN "'.$fromdate.'" AND "'.$todate.'"';
    }

    $limit_query = 'LIMIT '. $request['length']. ' OFFSET '. $request['start'];
	$transactions  = devon_get_user_transactions($search_args, $limit_query);
	
	if(sizeof($transactions)) {
		$count = 0; 
		foreach($transactions as $transaction) {
			
			$user_info = get_userdata($transaction->user_id); 
			$user_name = $user_info->user_login; 
			
			$nestedData = array();
	        $nestedData[] = ++$count;
	        $nestedData[] = $transaction->date_added;
	      	$nestedData[] = $transaction->payment_type;
	        $nestedData[] = $transaction->payment_status;
	        $nestedData[] = $transaction->amount;
	        $nestedData[] = $transaction->transaction_id;
	        $nestedData[] = ucwords($user_name);
	        $nestedData[] = devon_modal_approve_bank_transfer($transaction->id, $transaction->transaction_id, $transaction->amount, $transaction->user_id, $transaction->payment_status);

	    	//tjp_ajaxy_die($nestedData);
	    	$result_data[] = $nestedData;
	        wp_reset_query();
		}
		$limit_query = '';
		$total_transactions = devon_get_user_transactions($search_args, $limit_query);
		$totalData = sizeof($total_transactions);

		$json_data = array(
	        "draw" => intval($request['draw']),
	        "recordsTotal" => intval($totalData),
	        "recordsFiltered" => intval($totalData),
	        "data" => $result_data
	    );

	    echo json_encode($json_data);
	}
	else {
	    $json_data = array(
			"draw" => intval($request['draw']),
	        "data" => array(),
			"recordsTotal" => 0,
			"recordsFiltered" => 0,
	    );
		
	    echo json_encode($json_data);
	}
	wp_die();

	return $output;
}

function devon_modal_approve_bank_transfer($id, $transaction_id, $amount, $user_id, $status) {
	
	$user_name = $user_id; 
	$user_info = get_userdata($user_id); 
	$user_name = $user_info->user_login; 
	
	$output = '';
	$output .= '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#action-modal'.$transaction_id.'" >Approve</button>';
    $output .= '<div class="modal fade" id="action-modal'.$transaction_id.'">';
		$output .= '<div class="modal-dialog modal-dialog-centered">';
			$output .= '<div class="modal-content">';
				$output .= '<div class="modal-header">';
					$output .= '<h3 class="modal-title"><span class="label label-info">Approve Bank Transfer</span></h3>';
					$output .= '<span class="close" data-dismiss="modal">';
						$output .= '<i class="fa fa-times fa-border"></i>';
					$output .= '</span>';
				$output .= '</div>';
				$output .= '<form class="form-approve-transaction p-1" method="POST" action="/">';
					$output .= '<div class="modal-body">';
						$output .= '<div class="row">';
							$output .= '<div class="col-md-12 d-inline-block">';
								$output .= '<table class="table">';
									$output .= '<tr>';
										$output .= '<th>Transaction ID</th>'; 
										$output .= '<td>'. $transaction_id . '</td>';
									$output .= '</tr>';
									$output .= '<tr>';
										$output .= '<th>Amount</th>'; 
										$output .= '<td>'. $amount . '</td>';
									$output .= '</tr>';
									$output .= '<tr>';
										$output .= '<th>Username (ID)</th>'; 
										$output .= '<td>'. $user_name . ' (' . $user_id . ')</td>';
									$output .= '</tr>';
									$output .= '<tr>';
										$output .= '<th>Status</th>'; 
										$output .= '<td>';
											$output .= '<input type="hidden" name="user_id" value="'.$user_id.'">';
											$output .= '<input type="hidden" name="amount" value="'.$amount.'">';
											$output .= '<input type="hidden" name="transaction_id" value="'.$transaction_id.'">';
											$output .= '<input type="hidden" name="id" value="'.$id.'">';
											$output .= '<select class="custom-select payment_status" style="height: inherit" name="payment_status">';
												$options = array(''=>'Choose Status', 'success'=>'Success', 'pending'=>'Pending');
												foreach($options as $key=>$value) {
													$selected = $key==$status ? ' selected' : '';
													$output .= '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
												}
											$output .= '</select>';
										$output .= '</td>';
									$output .= '</tr>';
								$output .= '</table>';										
							$output .= '</div>';							
						$output .= '</div>';							
					$output .= '</div>';
					$output .= '<div class="modal-footer">';
						$output .= '<div class="alerts-box" style="padding: 0.25rem;margin-bottom: 0;"></div>';
						$output .= '<button name="approve_transaction" class="btn btn-sm btn-info mt-2 btn-approve_transaction">Submit <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator ml-1 d-none"></i></button>';
						//$output .= '<button type="button" class="btn btn-tjp-reporting btn-danger" data-dismiss="modal" style="color: white;">Close</button>';
					$output .= '</div>';
				$output .= '</form>';
			$output .= '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}

function devon_get_pending_listing() {
	
	$output = '';
	global $devon_opts;

	$title = __('All Ads', 'ladystar'); 
	$cl = 'all';
	$class = 'listings-datatable';
	$no_post_message = __('No ads yet.', 'ladystar'); 
	$args = array(
		'post_type'=>'listings',
		'posts_per_page' => '-1',
	);
	
	$page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 'listing'; 		
	if($page=='pending-listing') {
		$cl = 'pending';
		$title = __('Pending Listing', 'ladystar'); 
		$class = 'pending-datatable';
		$no_post_message = __('Great job, no pending listings', 'ladystar'); 
		$args['meta_query'] = array(
			array('key'=>'listing_status', 'compare'=>'LIKE', 'value' => 'pending' ),		
		);
	}

	$output .= '<div class="wrap row">';
		$output .= '<div class="col-md-12">';
			$output .= '<h3>'. esc_html__($title, 'ladystar').'</h3>';
		$output .= '</div>';
	$output .= '</div>';
	
	$output .= '<div class="row">';
		$output .= '<div class="col-md-12 my-2">';
			$output .= '<div class="col-md-2 float-left d-block">';
				$output .= '<input tupe="text" class="form-control search_col_name_'.$cl.' all-custom-filter" placeholder="Enter Listing title" value="">';
				$output .= '<input type="hidden" class="datatable-load-time" value="'.$devon_opts['load-duration'].'">';
			$output .= '</div>';
			if($page != 'pending-listing') {
				$output .= '<div class="col-md-2 float-left d-block">';
					$output .= '<select class="form-control custom-select search_col_status all-custom-filter" style="height:37px">';
						$output .= '<option value="">Choose Listing Status</option>';
						$output .= '<option value="pending">Pending</option>';
						$output .= '<option value="rejected">Rejected</option>';
						$output .= '<option value="approved">Approved</option>';
					$output .= '</select>';
				$output .= '</div>';
			}
			$output .= '<div class="col-md-2 float-left d-block">';
				$output .= '<button class="btn btn-warning btn-reset-filter_'.$cl.'">Reset</button>';
			$output .= '</div>';
			$output .= '<div class="col-md-2 float-right d-block">';
				$output .= '<button class="btn btn-info float-right btn-reload"><i class="fa fa-refresh"></i></button>';
			$output .= '</div>';
			
		$output .= '</div>';
		$output .= '<div class="col-md-12 mt-2">';
			$output .= '<table class="table cell-border text-center '.$class.'">';
				$output .= '<thead>';
					$output .= '<tr>';
						$output .= '<th>No.</th>';
						$output .= '<th>Primary Image</th>';
						$output .= '<th>Title</th>';
						$output .= '<th>Status</th>';
						$output .= '<th>Location</th>';
						$output .= '<th>Date</th>';
						$output .= '<th>Moderate</th>';
					$output .= '</tr>';
				$output .= '</thead>';
	
			$output .= '</table>';
		$output .= '</div>';
	$output .= '</div>';

	echo $output;
}

add_action('wp_ajax_listing_datatable', 'devon_datatables_server_side_callback');
function devon_datatables_server_side_callback() {

	header("Content-Type: application/json");
 
    $request= $_GET;

    $columns = array('image', 'title', 'status', 'location', 'date', 'moderate');

	//WP Query	
	$args = array(
		'post_type'         => array( 'listings' ),
		'post_status'       => 'any',
		'posts_per_page'    => $request['length'],	
		'offset'			=> $request['start'],
		'order'				=> strtoupper($request['order'][0]['dir']),
	);	

    if( !empty($request['search']['value']) ) { // When datatables search is used
        $args['s'] = $request['search']['value'];
    }
    if( !empty($request['name']) ) { // When title based search is used
        $args['s'] = $request['name'];
    }
	
	$count = 0; 
	$result_data = array();

	if( !empty($request['status']) ) { // When Listing Status based search is used
        $args['meta_query'] = array(
        	'relation'    => 'AND',
			array(
				'key' => 'listing_status',
	        	'compare' => 'LIKE',
	        	'value' => $request['status']
			)
        );
    }

	//devon_ajaxy_die($args);

	$the_query = new WP_Query( $args );
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { 
			$the_query->the_post(); 
			$post_id = get_the_ID();
			
			$custom = get_post_custom($post_id);
			$listing_status = isset($custom['listing_status'][0]) ? $custom['listing_status'][0] : 'pending';
						
			$taxonomies = devon_wp_get_post_terms(get_the_ID()); 
			$locations = '';
			if(is_array($taxonomies['locations']) && sizeof($taxonomies['locations'])) {
				$locations = devon_get_terms_link($taxonomies['locations'], 'locations', false); 
			}
			
			$featured_image = ''; 
			if(has_post_thumbnail()) {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_the_post_thumbnail_url(get_the_ID(), 'listings-table').'"></a>';
			}
			else {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_stylesheet_directory_uri() . '/assets/img/dumm-img-admin.png"></a>';
			}
			
			// add hover effect
			$featured_image = '<div class="hovereffect">'.$featured_image.'</div>'; 

			$output = '';
			$output .= '<span class="font-weight-bold d-block">'; 	
				$output .= get_the_title() . ' ('.$custom['price'][0].' BGN) (' . $custom['is_activated'][0] . ')';
			$output .= '</span>'; 
			$output .= '<div class="row-actions">'; 
				$output .= '<a target="_blank" title="Edit Ad" href="'.pll_get_page_url('user') . '?action=edit-listing&id='.get_the_ID().'">'.esc_html__('Edit', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="View Listing" href="'.get_the_permalink().'">'.esc_html__('View', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="Manage Images" href="'.pll_get_page_url('user') . '?action=manage-images&id='.get_the_ID().'">'.esc_html__('Manage Images', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<i title="Delete Ad" class="fa fa-trash delete-ad cursor" style="cursor:pointer;color:red;" data-post_id="'.get_the_ID().'"></i>';
			$output .= '</div>'; 
			
			$col4 = '';
			$col4 .= '<span class="btn btn-primary btn-sm listing-status approve-ad cursor" data-toggle="modal" data-target="#action-modal-'.get_the_ID().'">'.esc_html__('Approve/Reject', 'ladystar').'</span>';
			$col4 .= '<div class="modal fade modal-form action-modal" id="action-modal-'.get_the_ID().'" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">';
				$col4 .= '<div class="modal-dialog" role="document">';
					$col4 .= '<div class="modal-content">';
						$col4 .= '<div class="modal-header">';
							$col4 .= '<span>'. esc_html__('Approve Listing', 'ladystar') .': '.get_the_title().'</span>';
							$col4 .= '<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>';
						$col4 .= '</div>';
						$col4 .= '<div class="modal-body search-form">';
							$col4 .= '<form id="form-approve-ad" class="form">';
								$col4 .= '<div class="alerts-box"></div>';
								$col4 .= '<div class=" first-line">';
									$col4 .= '<div class="form-group">';
										$col4 .= '<select name="listing_status" class="form-control custom-select listing_status" style="height:37px; padding: 5px">';
											$col4 .= '<option value="">'. esc_html__('Choose Status', 'ladystar').'</option>';
												$statuses = array(
													'pending' => 'Pending',
													'rejected' => 'Rejected',
													'approved' => 'Approved'
												);
												foreach ($statuses as $key => $value) {
													$selected = '';
													if($key == $listing_status) 
														$selected = 'selected';
													$col4 .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
												}
										$col4 .= '</select>';
									$col4 .= '</div>';
									$col4 .= '<div class="form-group">';
										$col4 .= '<label class="pull-left mt-1 mb-0"><small>Rejection Reasons (only when rejected)</small></label>'; 
										$col4 .= '<textarea name="justification_text" class="justification_text form-control" placeholder="Enter the justification text"></textarea>';										
									$col4 .= '</div>';
								$col4 .= '</div>';

								$col4 .= '<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">';									

								$col4 .= '<div class="form-group">';
									$col4 .= '<button type="submit" class="btn btn-primary no-margin load_ind submit-approve-ad" data-post_id="'.get_the_ID().'">'. esc_html__('Submit', 'ladystar').'<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator ml-1 d-none"></i> </button>';
								$col4 .= '</div>';
							$col4 .= '</form>';
						$col4 .= '</div>';
					$col4 .= '</div>';
				$col4 .= '</div>';
			$col4 .= '</div>';
			
			$nestedData = array();
            $nestedData[] = ++$count;
            $nestedData[] = $featured_image;
          	$nestedData[] = $output;
            $nestedData[] = devon_ucwords($listing_status);
            $nestedData[] = $locations; 
            $nestedData[] = devon_dater(get_the_date(), 'get_the_date', 'M j, Y');
            $nestedData[] = $col4;
 
	    	//tjp_ajaxy_die($nestedData);
	    	$result_data[] = $nestedData;
	        wp_reset_query();
		}

		$args['posts_per_page'] = -1;
		$total_query = new WP_Query($args);
		$totalData = $total_query->found_posts;

		$json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $result_data
        );
 
        echo json_encode($json_data);
	}
	else {
        $json_data = array(
            "data" => array(),
        );
 
        echo json_encode($json_data);
    }
    wp_die();
}

add_action('wp_ajax_pending_datatable', 'devon_pending_datatables_server_side_callback');
function devon_pending_datatables_server_side_callback() {

	header("Content-Type: application/json");
 
    $request= $_GET;

    $columns = array('image', 'title', 'status', 'location', 'date', 'moderate');

	//WP Query	
	$args = array(
		'post_type'         => array( 'listings' ),
		'post_status'       => 'any',
		'posts_per_page'    => $request['length'],	
		'offset'			=> $request['start'],
		'order'				=> strtoupper($request['order'][0]['dir']),
	);	

    if( !empty($request['search']['value']) ) { // When datatables search is used
        $args['s'] = $request['search']['value'];
    }
    if( !empty($request['name']) ) { // When title based search is used
        $args['s'] = $request['name'];
    }
	
	$count = 0; 
	$result_data = array();

    $args['meta_query'] = array(
    	'relation'    => 'AND',
		array(
			'key' => 'listing_status',
        	'compare' => 'LIKE',
        	'value' => 'pending'
		)
    );

	//devon_ajaxy_die($args);

	$the_query = new WP_Query( $args );
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { 
			$the_query->the_post(); 
			$post_id = get_the_ID();
			
			$custom = get_post_custom($post_id);
			$listing_status = $custom['listing_status'][0];
			
			$taxonomies = devon_wp_get_post_terms(get_the_ID()); 
			$locations = '';
			if(is_array($taxonomies['locations']) && sizeof($taxonomies['locations'])) {
				$locations = devon_get_terms_link($taxonomies['locations'], 'locations', false); 
			}
			
			$featured_image = ''; 
			if(has_post_thumbnail()) {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_the_post_thumbnail_url(get_the_ID(), 'listings-table').'"></a>';
			}
			else {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_stylesheet_directory_uri() . '/assets/img/dumm-img-admin.png"></a>';
			}
			
			// add hover effect
			$featured_image = '<div class="hovereffect">'.$featured_image.'</div>'; 

			$output = '';
			$output .= '<span class="font-weight-bold d-block">'; 	
				$output .= get_the_title() . ' (' . get_post_status() . ')';
			$output .= '</span>'; 

			$output .= '<div class="row-actions">'; 
				$output .= '<a target="_blank" title="Edit Ad" href="'.pll_get_page_url('user') . '?action=edit-listing&id='.get_the_ID().'">'.esc_html__('Edit', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="View Listing" href="'.get_the_permalink().'">'.esc_html__('View', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="Manage Images" href="'.pll_get_page_url('user') . '?action=manage-images&id='.get_the_ID().'">'.esc_html__('Manage Images', 'ladystar').'</a>'; 
			$output .= '</div>';

			$col4 = '';
			$col4 .= '<span class="btn btn-primary btn-sm listing-status approve-ad cursor" data-toggle="modal" data-target="#action-modal-'.get_the_ID().'">'.esc_html__('Approve/Reject', 'ladystar').'</span>';
			$col4 .= '<div class="modal fade modal-form action-modal" id="action-modal-'.get_the_ID().'" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">';
				$col4 .= '<div class="modal-dialog" role="document">';
					$col4 .= '<div class="modal-content">';
						$col4 .= '<div class="modal-header">';
							$col4 .= '<span>'. esc_html__('Approve Listing', 'ladystar') .': '.get_the_title().'</span>';
							$col4 .= '<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>';
						$col4 .= '</div>';
						$col4 .= '<div class="modal-body search-form">';
							$col4 .= '<form id="form-approve-ad" class="form">';
								$col4 .= '<div class="alerts-box"></div>';
								$col4 .= '<div class=" first-line">';
									$col4 .= '<div class="form-group">';
										$col4 .= '<select name="listing_status" class="form-control custom-select listing_status" style="height:37px; padding: 5px">';
											$col4 .= '<option value="">'. esc_html__('Choose Status', 'ladystar').'</option>';
												$statuses = array(
													'pending' => 'Pending',
													'rejected' => 'Rejected',
													'approved' => 'Approved'
												);
												foreach ($statuses as $key => $value) {
													$selected = '';
													if($key == $listing_status) 
														$selected = 'selected';
													$col4 .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
												}
										$col4 .= '</select>';
									$col4 .= '</div>';
									$col4 .= '<div class="form-group">';
										$col4 .= '<label class="pull-left mt-1 mb-0"><small>Rejection Reasons (only when rejected)</small></label>'; 
										$col4 .= '<textarea name="justification_text" class="justification_text form-control" placeholder="Enter the justification text"></textarea>';
									$col4 .= '</div>';
								$col4 .= '</div>';

								$col4 .= '<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">';									

								$col4 .= '<div class="form-group">';
									$col4 .= '<button type="submit" class="btn btn-primary no-margin load_ind submit-approve-ad" data-post_id="'.get_the_ID().'">'. esc_html__('Submit', 'ladystar').'<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator ml-1 d-none"></i> </button>';
								$col4 .= '</div>';
							$col4 .= '</form>';
						$col4 .= '</div>';
					$col4 .= '</div>';
				$col4 .= '</div>';
			$col4 .= '</div>';

            $nestedData = array();
            $nestedData[] = ++$count;
            $nestedData[] = $featured_image;
          	$nestedData[] = $output;
            $nestedData[] = devon_ucwords($listing_status);
            $nestedData[] = $locations; 
            $nestedData[] = devon_dater(get_the_date(), 'get_the_date', 'M j, Y');
            $nestedData[] = $col4;
 
	    	//tjp_ajaxy_die($nestedData);
	    	$result_data[] = $nestedData;
	        wp_reset_query();
		}

		$args['posts_per_page'] = -1;
		$total_query = new WP_Query($args);
		$totalData = $total_query->found_posts;

		$json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $result_data
        );
 
        echo json_encode($json_data);
	}
	else {
        $json_data = array(
            "data" => array(),
        );
 
        echo json_encode($json_data);
    }
    wp_die();
}

function devon_get_control_photos() {
	
	$output = '';
	global $devon_opts;

	$title = __('Control Photos', 'ladystar'); 
	$cl = 'all';
	$class = 'control-photos-datatable';
	$no_post_message = __('No Control Photos uploaded yet yet.', 'ladystar'); 
	
	$output .= '<div class="wrap row">';
		$output .= '<div class="col-md-12">';
			$output .= '<h3>'. esc_html__($title, 'ladystar').'</h3>';
		$output .= '</div>';
	$output .= '</div>';
	
	$output .= '<div class="row">';
		$output .= '<div class="col-md-12 my-2">';
			$output .= '<div class="col-md-2 float-left d-block">';
				$output .= '<input tupe="text" class="form-control search_col_name_'.$cl.' all-custom-filter" placeholder="Enter Listing title" value="">';
				$output .= '<input type="hidden" class="datatable-load-time" value="'.$devon_opts['load-duration'].'">';
			$output .= '</div>';
			$output .= '<div class="col-md-2 float-left d-block">';
				$output .= '<button class="btn btn-warning btn-reset-filter_'.$cl.'">Reset</button>';
			$output .= '</div>';
			$output .= '<div class="col-md-2 float-right d-block">';
				$output .= '<button class="btn btn-info float-right btn-reload"><i class="fa fa-refresh"></i></button>';
			$output .= '</div>';
		$output .= '</div>';
		$output .= '<div class="col-md-12 mt-2">';
			$output .= '<table class="table cell-border text-center '.$class.'">';
				$output .= '<thead>';
					$output .= '<tr>';
						$output .= '<th>No.</th>';
						$output .= '<th>Primary Image</th>';
						$output .= '<th>Title</th>';
						$output .= '<th>Ad Status</th>';
						$output .= '<th>Control Photo</th>';
					$output .= '</tr>';
				$output .= '</thead>';	
			$output .= '</table>';
		$output .= '</div>';
	$output .= '</div>';

	echo $output;
}

add_action('wp_ajax_control_photos_datatable', 'devon_control_photos_server_side_callback');
function devon_control_photos_server_side_callback() {

	header("Content-Type: application/json");
 
    $request= $_GET;

    $columns = array('image', 'title', 'status', 'location', 'date', 'moderate');

	//WP Query	
	$args = array(
		'post_type'         => array( 'listings' ),
		'post_status'       => 'any',
		'posts_per_page'    => $request['length'],	
		'offset'			=> $request['start'],
		'order'				=> strtoupper($request['order'][0]['dir']),
	);	

    if( !empty($request['search']['value']) ) { // When datatables search is used
        $args['s'] = $request['search']['value'];
    }
    if( !empty($request['name']) ) { // When title based search is used
        $args['s'] = $request['name'];
    }

	$result_data = array();
	$count = 0; 

    $args['meta_query'] = array(
    	'relation'    => 'AND',
		array(
			'key' => 'control_photo_url',
        	'compare' => 'EXISTS'
		),
		array(
			'key' => 'is_verified',
			'compare' => '=',
			'value' => -1	
		)
    );

	//devon_ajaxy_die($args);

	$the_query = new WP_Query( $args );
	if( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) { 
			$the_query->the_post(); 
			$post_id = get_the_ID();
			
			$custom = get_post_custom($post_id);
			$listing_status = $custom['listing_status'][0];
			$is_verified = $custom['is_verified'][0];
			$control_photo_justification_text = isset($custom['control_photo_justification_text'][0]) ? $custom['control_photo_justification_text'][0] : '';
			
			$featured_image = ''; 
			if(has_post_thumbnail()) {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_the_post_thumbnail_url(get_the_ID(), 'listings-table').'"></a>';
			}
			else {
				$featured_image = '<a href="'.get_the_permalink().'" title=""><img style="max-height:140px;width:100%" src="'.get_stylesheet_directory_uri() . '/assets/img/dumm-img-admin.png"></a>';
			}
			
			// add hover effect
			$featured_image = '<div class="hovereffect">'.$featured_image.'</div>'; 
			
			$output = '';
			$output .= '<span class="font-weight-bold d-block">'; 	
				$output .= '<a target="_blank" title="View Listing" href="'.get_the_permalink().'">' . get_the_title() . '</a>';
			$output .= '</span>'; 

			$output .= '<div class="row-actions">'; 
				$output .= '<a target="_blank" title="Edit Ad" href="'.pll_get_page_url('user') . '?action=edit-listing&id='.get_the_ID().'">'.esc_html__('Edit', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="View Listing" href="'.get_the_permalink().'">'.esc_html__('View', 'ladystar').'</a>'; 
				$output .= ' | '; 
				$output .= '<a target="_blank" title="Manage Images" href="'.pll_get_page_url('user') . '?action=manage-images&id='.get_the_ID().'">'.esc_html__('Manage Images', 'ladystar').'</a>'; 
			$output .= '</div>';

			$col4 = '';
			$col4 .= '<span class="btn btn-primary btn-sm cursor" data-toggle="modal" data-target="#action-modal-'.get_the_ID().'">'.esc_html__('Verify/Reject', 'ladystar').'</span>';
			$col4 .= '<div class="modal fade modal-form action-modal" id="action-modal-'.get_the_ID().'" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">';
				$col4 .= '<div class="modal-dialog modal-lg" role="document">';
					$col4 .= '<div class="modal-content">';
						$col4 .= '<div class="modal-header">';
							$col4 .= '<span>'. esc_html__('Verify Control Photo', 'ladystar') .': '.get_the_title().'</span>';
							$col4 .= '<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>';
						$col4 .= '</div>';
						$col4 .= '<div class="modal-body search-form">';
							$col4 .= '<form id="form-approve-ad" class="form">';
								$col4 .= '<div class="alerts-box"></div>';
								$col4 .= '<div class="first-line">';
									
									$col4 .= '<div class="form-group col-md-6 pull-left text-center">';
										$control_photo_file = get_post_meta(get_the_ID(), 'control_photo_file', true); 
										$col4 .= '<img class="img thumbnail" width=200 height=200 src="'.site_url('/wp-content/uploads/control-photos/'.end(explode('/', $control_photo_file))).'">'; 						
									$col4 .= '</div>';
									
									$col4 .= '<div class="form-group col-md-6 pull-left">';									
										$col4 .= '<label for="is_verified" class="font-weight-bold">'.__('Verify Control Photo', 'ladystar').'</label>';									
										$col4 .= '<select name="is_verified" class="form-control custom-select mb-2" style="height:37px; padding: 5px">';
											$statuses = array(
												0 => __('Reject (Justification required)', 'ladystar'), 
												1 => __('Verify (No Justification Required)', 'ladystar'), 
											);
											foreach ($statuses as $key => $value) {
												$selected = ($key==$is_verified) ? 'selected' : ''; 
												$col4 .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
											}
										$col4 .= '</select>';									
									
										$col4 .= '<label class="pull-left mt-1 mb-0"><small>Rejection Reasons (only when rejected)</small></label>'; 
										$col4 .= '<textarea name="control_photo_justification_text" height="150px" class="control_photo_justification_text form-control" placeholder="Enter the justification text">'.$control_photo_justification_text.'</textarea>';										
									$col4 .= '</div>';
									
								$col4 .= '</div>';

								$col4 .= '<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">';									

								$col4 .= '<div class="form-group">';
									$col4 .= '<button type="submit" class="btn btn-info no-margin pull-right load_ind submit-control-photo-verification" data-post_id="'.get_the_ID().'">'. esc_html__('Submit', 'ladystar').'<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator ml-1 d-none"></i> </button>';
								$col4 .= '</div>';
							$col4 .= '</form>';
						$col4 .= '</div>';
					$col4 .= '</div>';
				$col4 .= '</div>';
			$col4 .= '</div>';

            $nestedData = array();
            $nestedData[] = ++$count;
            $nestedData[] = $featured_image;
          	$nestedData[] = $output;
            $nestedData[] = devon_ucwords($listing_status);                        
            $nestedData[] = $col4;
 
	    	//tjp_ajaxy_die($nestedData);
	    	$result_data[] = $nestedData;
	        wp_reset_query();
		}

		$args['posts_per_page'] = -1;
		$total_query = new WP_Query($args);
		$totalData = $total_query->found_posts;

		$json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalData),
            "data" => $result_data
        );
 
        echo json_encode($json_data);
	}
	else {
        $json_data = array(
			"draw" => intval($request['draw']),
            "recordsTotal" => 0,
            "recordsFiltered" => 0,
            "data" => array(),
        );
 
        echo json_encode($json_data);
    }
    wp_die();
}
