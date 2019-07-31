<?php

function devon_get_globals($type='') {
	if(empty($type)) return; 
	
	$globals = array(); 
	global $devon_opts; 
	
	switch($type) {
		case 'taxonomies-listings': 
			$globals = array('services', 'locations', 'service_locations', 'languages', 'service_categories'); 
			break; 		
		case 'taxonomies-leisure-rooms': 		
			$globals = array('amenities', 'locations'); 
			break; 			
		case 'promotions' : 
			$globals = array(
				array(
					'name' => 'PROMO',
					'price' => $devon_opts['promo-price'],
					'time' => $devon_opts['promo-time'],
					'features' => array(
						__('Display above normal Ads', 'ladystar'), 
						intval($devon_opts['promo-time']/24) . ' ' . __('days period as Promo Ad', 'ladystar'), 
						__('Total cost of', 'ladystar') . ' <span class="color-pink font-weight-bold">2 BGN</span> ' . __('incl. VAT', 'ladystar'), 
						__('Displayed as Normal Ad after', 'ladystar'). ' '. intval($devon_opts['promo-time']/24).' ' . __('days', 'ladystar'), 
					),
					'btn_text' => $devon_opts['promo-btn_text'],
				),
				array(
					'name' => 'TOP',
					'price' => $devon_opts['top-price'],
					'time' => $devon_opts['top-time'],
					'features' => array(
						__('Displayed on Top of all Ads', 'ladystar'), 
						intval($devon_opts['top-time']/24) . ' ' . __('day as Top Ad', 'ladystar'),  
						__('Total cost of', 'ladystar'). ' <span class="color-pink font-weight-bold">1 BGN</span> ' . __('incl. VAT', 'ladystar'), 
						__('Displayed as Normal Ad after', 'ladystar'). intval($devon_opts['top-time']/24). ' ' . __('day', 'ladystar'), 
					),
					'btn_text' => $devon_opts['top-btn_text'],
				),
				array(
					'name' => 'HOME',
					'price' => $devon_opts['home-price'],
					'time' => $devon_opts['home-time'],
					'features' => array(
						__('Display above Home page', 'ladystar'), 
						intval($devon_opts['home-time']/24) . ' ' . __('days period as Home Ad', 'ladystar'),  
						__('Total cost of', 'ladystar') . ' <span class="color-pink font-weight-bold">3 BGN</span> ' . __('incl. VAT', 'ladystar'), 
						//'Displayed as normal ad after 3 days',
						__('Displayed in chronological order', 'ladystar'), 
					),			
					'btn_text' => $devon_opts['home-btn_text'],
				),
			);
			break; 
	}
	
	return $globals; 
}