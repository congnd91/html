jQuery(document).ready(function($) { // wait for page to finish loading 

	var table = jQuery('.devon-datatable').DataTable();
	
	// Issue 53: Fixed by using .on('click') event on the table class
	jQuery(document).on('click', '.submit-approve-ad', function(e) {		
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 				
		parentModal = $btnClicked.closest('.modal').attr('id');
		parentModal = jQuery('#' + parentModal); 
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		formFields = optionBox.serialize();		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('d-none'); 
		
		jQuery.post(
			ajaxurl,
			{
				action : 'action_approve_an_ad',
				post_id : $btnClicked.data('post_id'),
				fields : formFields
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					ajaxAlert.addClass('alert alert-success');
					parentModal.modal('hide'); 
					jQuery('.btn-reload').click(); 
				}
				else {
					ajaxAlert.addClass('alert alert-danger');
				}		
				spinner.addClass('d-none'); 
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){  jQuery('.btn-reload').click(); }, 1500); 
				}
			}  
		);
	}); 
	
	// Issue 53: Fixed by using .on('click') event on the table class
	jQuery(document).on('click', '.submit-control-photo-verification', function(e) {		
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 				
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		formFields = optionBox.serialize();		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('d-none'); 
		
		jQuery.post(
			ajaxurl,
			{
				action : 'action_verify_control_photo',
				post_id : $btnClicked.data('post_id'),
				fields : formFields
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					ajaxAlert.addClass('alert alert-success');
					jQuery('.btn-reload').click(); 
				}
				else {
					ajaxAlert.addClass('alert alert-danger');
				}		
				spinner.addClass('d-none'); 
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						jQuery('.btn-reload').click(); 
					}, 1500);
				}
			}  
		);
	}); 
	
	// delete-ad under listing title 
	jQuery('.listings-datatable').on('click', '.delete-ad', function(e) {		
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 				
		
		if(! tjp_warn_him('delete')) {
			return false; 
		}
		
		jQuery.post(
			ajaxurl,
			{
				action : 'action_delete_an_ad',
				post_id : $btnClicked.data('post_id')				
			},
			function( response ) {	
				if(response.success === true) {
					
				}
				else {
					
				}	
				
				alert(response.data.reason);				
				if(response.data.reload ) {
					setTimeout(function(){ location.reload(); }, 1500);
				}
			}  
		);
	}); 

	// Used .on('click') event on the document
	jQuery(document).on("click", ".btn-approve_transaction", function(e) {		
		e.preventDefault();
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 				
		parentModal = $btnClicked.closest('.modal').attr('id');
		parentModal = jQuery('#' + parentModal); 
		// Set Ajax Alert
		ajaxAlert = jQuery('.alerts-box');
		formFields = optionBox.serialize();		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('d-none'); 
		
		jQuery.post(
			ajaxurl,
			{
				action : 'action_approve_a_transaction',
				fields : formFields
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					ajaxAlert.addClass('alert alert-success');
					parentModal.modal('hide'); 
					jQuery('.btn-reload').click(); 
				}
				else {
					ajaxAlert.addClass('alert alert-danger');
				}		
				spinner.addClass('d-none'); 
				ajaxAlert.html(response.data.reason).show();
				$btnClicked.removeClass("disabled").addClass("active");				
				if( response.data.reload ) {
					jQuery('.btn-reload').click(); 
				}
			}  
		);

	});
	
});

function tjp_warn_him(action_button) {		
	WRN_PROFILE_DELETE = 'Are you sure?';  
	if(action_button !== undefined) {
		WRN_PROFILE_DELETE = action_button;  
		
		if(action_button == 'delete') {
			WRN_PROFILE_DELETE = 'Are you sure you want to delete?';  
		}
	}

	var check = confirm(WRN_PROFILE_DELETE); 	
	return check; 
}