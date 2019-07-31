jQuery(document).ready(function($) { // wait for page to finish loading 

	jQuery('.btn-view-position').click(function(e) {
		e.preventDefault(); 
		$btnClicked = jQuery(this); 
		$parent = $btnClicked.parent().parent(); 		
		$parent.find('.view-position-text').toggle('slow'); 
	});

	var momentDates = jQuery('.momentjs-time'); 
	jQuery.each(momentDates, function() {
		date = jQuery(this); 
		var dateTime = new Date(date.html());
		//dateMoment = moment(dateTime, "YYYY-MM-DD HH:mm:ss"); 		
		//date.html(dateMoment.fromNow()); 
	});	

	var historyTable = jQuery('.wallet-history-table'); 
	if(historyTable.length) {
		historyTable.DataTable({
			'searching' : false, 			 
			"lengthChange": false
		});
	}

	jQuery(document).on('click', '.add-favorites-action', function(e) {
	//jQuery('.add-favorites-action').on('click', function(e) {
		e.preventDefault();		
		$btnClicked = jQuery(this); 		
		var reload = $btnClicked.attr('data-reload'); 
		var self_parent = $btnClicked.parent()
		$parent = $btnClicked.closest('.row-models-list-item'); 		
		
		self_parent.addClass('loading');
		$post_id = $parent.attr('data-id'); 
		
		ladystar_add_to_favorites($post_id); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_add_to_favorites',
				post_id : $post_id,
				favorites : favorites,
				task : 'add'
			},
			function( response ) {
				if( response.success === true ) {
					self_parent.find("a.add-favorites-action").addClass('hidden');
					self_parent.find("a.remove-favorites-action").removeClass('hidden');
				}
				else {
					self_parent.find("a.add-favorites-action").removeClass('hidden');
					self_parent.find("a.remove-favorites-action").addClass('hidden');
				}
				if(reload==true) { setTimeout(function() { location.reload(); }, 1); }
				self_parent.removeClass('loading');
			}  
		);
	});
	
	jQuery(document).on('click', '.remove-favorites-action', function(e) {
		e.preventDefault();		
		$btnClicked = jQuery(this); 		
		var reload = $btnClicked.attr('data-reload'); 
		var self_parent = $btnClicked.parent()
		$parent = $btnClicked.closest('.row-models-list-item'); 		
		
		self_parent.addClass('loading');
		$post_id = $parent.attr('data-id'); 
		
		ladystar_remove_from_favorites($post_id); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_add_to_favorites',
				post_id : $post_id,
				task : 'remove'
			},
			function( response ) {
				if( response.success === true ) {
					self_parent.find("a.remove-favorites-action").addClass('hidden');
					self_parent.find("a.add-favorites-action").removeClass('hidden');
				}
				else {
					self_parent.find("a.add-favorites-action").addClass('hidden');
					self_parent.find("a.remove-favorites-action").removeClass('hidden');
					
				}
				if(reload==true) { setTimeout(function() { location.reload(); }, 1); }
				self_parent.removeClass('loading');
			}  
		);
	});
	
	jQuery('.btn-bank-transfer').on('click', function(e) {
		e.preventDefault();		
		$btnClicked = jQuery(this); 		
		$spinner = $btnClicked.find('.ajax-spinner');
		$parentForm = $btnClicked.closest('form'); 		
		$result = $parentForm.find('.ajax-result'); 		
		
		$result.slideUp('slow'); 		
		$spinner.show(); 
		$btnClicked.attr('disabled', 'disabled'); 
		data = $parentForm.serialize(); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_submit_bank_transfer',
				data : data,
			},
			function( response ) {
				if( response.success === true ) {
					$btnClicked.remove(); 
					location.href = $btnClicked.attr('data-url');					
				}
				else {
					$btnClicked.removeAttribute('disabled'); 
				}
				$spinner.hide(); 
				$result.html(response.data.reason).slideDown('slow'); 
			}  
		);
	});

	jQuery('.devon-image-section').on('click', '.devon-remove', function() {

		$btnClicked = jQuery(this);
		$imgOptions = $btnClicked.closest('.devon-img-options'); 
		$spinner = $imgOptions.find('.fa-spin'); 
		
		$attachment_count = jQuery('.devon-image-section .attachment-count'); 
		count = jQuery('.devon-image-section').attr('data-count'); 
		$spinner.show(); 
		
		swal({
			title: $btnClicked.attr('data-swal-title'),
			text: $btnClicked.attr('data-swal-text'),
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				jQuery.post(
					MyAjaxMail.ajaxurl,
					{
						action : 'action_remove_attached_image',
						attachment_id : $imgOptions.data('id'),					
					},
					function( response ) {
						if( response.success === true ) {
							$imgOptions.parent(".devon-image").slideUp('slow').remove();
							count = parseInt(count)-1; 
							jQuery('.devon-image-section').attr('data-count', count); 
							$attachment_count.text('Total images with this ad: ' + count); 
							//swal(response.data.reason, { icon: "success", });
						}
						else {
							swal(response.data.reason, {
								icon: "danger",
							});
						}						
					}  
				);
			} else {
				// Do something if user clicks cancel
			};
			
			$spinner.hide(); 
		});
	});

	jQuery('.devon-image-section').on('click', '.devon-make-primary', function() {

		$btnClicked = jQuery(this);
		$imgOptions = $btnClicked.closest('.devon-img-options'); 
		$spinner = $imgOptions.find('.fa-spin'); 
		
		$attachment_count = jQuery('.devon-image-section .attachment-count'); 
		count = jQuery('.devon-image-section').attr('data-count'); 
		$spinner.show(); 
		
		swal({
			title: $btnClicked.attr('data-swal-title'),
			text: $btnClicked.attr('data-swal-text'),
			icon: "info",
			buttons: true,
			dangerMode: false,
		})
		.then((willDelete) => {
			if (willDelete) {
				jQuery.post(
					MyAjaxMail.ajaxurl,
					{
						action : 'action_make_primary_image',
						attachment_id : $imgOptions.data('id'),					
						post_id : $imgOptions.data('post_id'),
					},
					function( response ) {
						if( response.success === true ) {
							if( response.data.reload ) {
								location.reload(); 
							} else {
								swal(response.data.reason, {
									icon: "success",
								});
							}
						}
						else {
							swal(response.data.reason, {
								icon: "danger",
							});
						}						
					}  
				);
			} else {
				// Do something if user clicks cancel
			};
			
			$spinner.hide(); 
		});
	});

	jQuery(".wallet-add-balance").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_update_user_wallet_balance',
				user_id : $btnClicked.data('user'),					
			},
			function( response ) {	
				console.log(response); 
				
				if( response.success === true ) {
				}
				else {
				}		
				
				spinner.addClass('hidden'); 				
				
				if( response.data.reload ) {
					location.reload(); 
				}
			}  
		);
	});

	jQuery(".btn-promote-listing").click( function(e) {
		e.preventDefault();
		
		$btnClickedLink = jQuery(this);
		spinner = $btnClickedLink.find('.fa-custom-ajax-indicator');
		swal({
			title: $btnClickedLink.attr('data-swal-title'),
			text: $btnClickedLink.attr('data-swal-text'),
			icon: "info",
			buttons: true
		})
		.then((willDelete) => {
			if (willDelete) {			
				
				$btnClickedLink.removeClass("active").addClass("disabled");
				spinner.removeClass('hidden'); 

				jQuery.post(
					MyAjaxMail.ajaxurl,
					{
						post_id : $btnClickedLink.data('id'),
						user_id : $btnClickedLink.data('user'),					
						promotion : $btnClickedLink.data('promotion'),	
						price : $btnClickedLink.data('price'),					
						time : $btnClickedLink.data('time'),					
						action : 'action_promote_user_listing',
					},
					function( response ) {	
						console.log(response); 
						
						if( response.success === true ) {
							gtag('event', 'user', {'event_category': 'promote','event_label': $btnClickedLink.data('promotion'),'value': $btnClickedLink.data('price')});
						}
						else {
							swal({
								title: response.data.title,
								text: response.data.reason,
							});
						}		
						
						spinner.addClass('hidden'); 
						if( response.data.reload ) {
							setTimeout(function(){
								location.reload(); 
							}, 1500);
						}
					}  
				);
			}
		});
	});

	jQuery(".btn-refresh-ad").click( function(e) {
		e.preventDefault();
		
		$btnClickedLink = jQuery(this);
		spinner = $btnClickedLink.find('.fa-custom-ajax-indicator');
		
		$btnClickedLink.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_refresh_ad',
				post_id : $btnClickedLink.data('id'),
				user_id : $btnClickedLink.data('user'),									
			},
			function( response ) {	
				console.log(response); 
				
				if( response.success === true ) {
					gtag('event', 'user', {'event_category': 'refresh','event_label': 'refreshed'});
				}
				else {
					swal({
						title: response.data.title,
						text: response.data.reason,
					});
				}		
				
				spinner.addClass('hidden'); 
				if( response.data.reload ) {
					setTimeout(function(){
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});

	jQuery(".btn-activate-listing").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		spinner = $btnClicked.find('.fa-custom-ajax-indicator');
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_activate_user_listing',
				post_id : $btnClicked.data('id'),
				doaction : $btnClicked.data('action'),
			},
			function( response ) {	
				console.log(response); 
				
				if( response.success === true ) {
				}
				else {
				}		
				swal(response.data.reason);
				spinner.addClass('hidden'); 				
				
				if( response.data.reload ) {
					setTimeout(function(){
						location.reload(); 
					}, 1000);
				}
			}  
		);
	});
	
	jQuery(".edit-email").click( function(e) {
		$btnClicked = jQuery(this);
		user_id = $btnClicked.data('user'); 
		email = $btnClicked.data('email'); 
		jQuery(".submit-edit-email").attr('data-email', email); 
		jQuery('#input-edit-email').val(email); 		
	});
	
	jQuery(".submit-add-email").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		inputField = optionBox.find('#input-add-email'); 
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		ajaxAlert.html(''); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		if(ajaxAlert.hasClass('alert-danger')) ajaxAlert.removeClass('alert-danger');
		
		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_update_user_emails_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				email : inputField.val(),			
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					inputField.val(''); 
					ajaxAlert.addClass('alert-success');
				}
				else {
					ajaxAlert.addClass('alert-danger');
				}		
				spinner.addClass('hidden'); 				
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});
	
	jQuery(".submit-edit-email").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		inputField = optionBox.find('#input-edit-email'); 
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		ajaxAlert.html(''); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		if(ajaxAlert.hasClass('alert-danger')) ajaxAlert.removeClass('alert-danger');
		
		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_update_user_emails_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				existing_email : $btnClicked.data('email'),	
				email : inputField.val(),			
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					jQuery('#email').val(''); 
					ajaxAlert.addClass('alert-success');
					inputField.val(''); 
				}
				else {
					ajaxAlert.addClass('alert-danger');
				}		
				spinner.addClass('hidden'); 				
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});
	
	jQuery(".delete-email").click( function(e) {
		e.preventDefault();
		
		if(tjp_warn_him('delete') != true) {
			return false; 
		}
		
		$btnClicked = jQuery(this);
		tr = jQuery(this).closest("tr");
		spinner = $btnClicked.find('i.fa'); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.addClass('fa-spin'); 

		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_delete_user_emails_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				email : $btnClicked.data('email'),	
			},
			function( response ) {	
				
				console.log(response); 
				
				if( response.success === true ) {
					tr.slideUp('slow', function () {
						tr.remove(); 
					}); 
				}
				else {
					// ajaxAlert.addClass('alert-danger');
					swal(response.data.reason, {
						icon: "warning",
					});
				}		
				
				$btnClicked.addClass("active").removeClass("disabled");
				spinner.removeClass('fa-spin'); 
				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
				
				
			}  
		);
	});
	
	jQuery(".edit-phone").click( function(e) {
		$btnClicked = jQuery(this);
		user_id = $btnClicked.data('user'); 
		phone = $btnClicked.data('phone'); 
		jQuery(".submit-edit-phone").attr('data-phone', phone); 
		jQuery('#input-edit-phone').val(phone); 		
	});
	
	jQuery(".submit-add-phone").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		inputField = optionBox.find('#input-add-phone'); 
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		ajaxAlert.html(''); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		if(ajaxAlert.hasClass('alert-danger')) ajaxAlert.removeClass('alert-danger');
		
		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_update_user_phones_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				phone : inputField.val(),			
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					inputField.val(''); 
					ajaxAlert.addClass('alert-success');
				}
				else {
					ajaxAlert.addClass('alert-danger');
				}		
				spinner.addClass('hidden'); 				
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});
	
	jQuery(".submit-edit-phone").click( function(e) {
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		inputField = optionBox.find('#input-edit-phone'); 
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');
		ajaxAlert.html(''); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		if(ajaxAlert.hasClass('alert-danger')) ajaxAlert.removeClass('alert-danger');
		
		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_update_user_phones_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				existing_phone : $btnClicked.data('phone'),	
				phone : inputField.val(),			
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					jQuery('#phone').val(''); 
					ajaxAlert.addClass('alert-success');
					inputField.val(''); 
				}
				else {
					ajaxAlert.addClass('alert-danger');
				}		
				spinner.addClass('hidden'); 				
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});
	
	jQuery(".submit-approve-ad").click( function(e) {		
		e.preventDefault();
		
		$btnClicked = jQuery(this);
		optionBox = jQuery(this).closest("form");
		spinner = $btnClicked.find('.fa-custom-ajax-indicator'); 		
		
		// Set Ajax Alert
		ajaxAlert = optionBox.find('.alerts-box');

		formFields = optionBox.serialize();
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.removeClass('hidden'); 

		if(ajaxAlert.hasClass('alert-danger')) ajaxAlert.removeClass('alert alert-danger');
		
		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_approve_an_ad',
				post_id : $btnClicked.data('post_id'),
				fields : formFields
			},
			function( response ) {	
				console.log(response); 
				if( response.success === true ) {
					jQuery('#phone').val(''); 
					ajaxAlert.addClass('alert alert-success');
				}
				else {
					ajaxAlert.addClass('alert alert-danger');
				}		
				spinner.addClass('hidden'); 				
				ajaxAlert.html(response.data.reason).show();				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
			}  
		);
	});
	
	jQuery(".delete-phone").click( function(e) {
		e.preventDefault();
		
		if(tjp_warn_him('delete') != true) {
			return false; 
		}
		
		$btnClicked = jQuery(this);
		tr = jQuery(this).closest("tr");
		spinner = $btnClicked.find('i.fa'); 
		
		$btnClicked.removeClass("active").addClass("disabled");
		spinner.addClass('fa-spin'); 

		// Serialize Form Fields
		console.log('fields: Action: '+$btnClicked.data('action')); 
		
		jQuery.post(
			MyAjaxMail.ajaxurl,
			{
				action : 'action_delete_user_phones_data',
				ajax_action : $btnClicked.data('action'),
				user_id : $btnClicked.data('user'),	
				phone : $btnClicked.data('phone'),	
			},
			function( response ) {	
				
				console.log(response); 
				
				if( response.success === true ) {
					tr.slideUp('slow', function () {
						tr.remove(); 
					}); 
				}
				else {
					// ajaxAlert.addClass('alert-danger');
					swal(response.data.reason, {
						icon: "warning",
					});
				}		
				
				$btnClicked.addClass("active").removeClass("disabled");
				spinner.removeClass('fa-spin'); 
				
				if( response.data.reload ) {
					setTimeout(function(){ 
						location.reload(); 
					}, 1500);
				}
				
				
			}  
		);
	});
	
	jQuery("#drop-area").on('dragenter', function (e){
		e.preventDefault();
		jQuery(this).css('background', '#BBD5B8');
	});

	jQuery("#drop-area").on('dragover', function (e){
		e.preventDefault();
	});

	jQuery("#drop-area").on('drop', function (e){
		
		e.preventDefault();
		$dropArea = jQuery(this); 
		jQuery(this).css('background', '#D8F9D3');
		$ajaxAlert = jQuery(this).find('.ajax-alert'); 
		
		var post_id = jQuery(this).attr("data-post_id"); 		
		var img = e.originalEvent.dataTransfer.files;		
		var formImage = new FormData();
		i=0; 
		
		$ajaxAlert.html("<i class='fa fa-spin fa-spinner' style='color:blue;'></i>"); 
		
		formImage.append('userImage', img); 
		jQuery.each(img, function(key, value) {
			formImage.append('userImage_' + i, img[i]); 
			i++; 
		}); 
		
		jQuery.ajax({
			url : MyAjaxMail.ajaxurl + '/?action=action_add_remove_images&count='+i+'&post_id='+post_id,
			action : 'action_add_remove_images',
			type: "POST",
			action : 'action_add_remove_images',
			data: formImage,
			dataType: "json",
			contentType: false,
			processData: false,
			cache: false,
			success: function(response){
				//console.log(response);
				if(response.success) {
					$dropArea.css('background', 'transparent');
					jQuery('.devon-image-section').html(response.data.output); 
					$ajaxAlert.addClass("success").html(response.data.reason); 
					jQuery('.devon-image-section').attr('data-count', response.data.count); 
				}
				else {
					$dropArea.css('background', '#f9dcdc');
					$ajaxAlert.addClass("danger").html(response.data.reason); 
				}
			},
			error: function(response) {
				$ajaxAlert.addClass("danger").html(response.data.reason); 
			}
		});			
		
	});
	
	jQuery('.dropbtn').click( function(e) {
		$btnClicked = jQuery(this); 
		$btnClicked.toggleClass('show'); 
		
		var dropdowns = jQuery(".dropdown-content");
		jQuery.each(dropdowns, function(index) {
			if(jQuery(this).hasClass('show')) jQuery(this).removeClass('show'); 
		}); 
	});	
	
	
	jQuery('.btn-view-position').click(function(e) {
		$parent = $btnClicked.closest('.devon-row');
		jQuery(this).toggleClass('active'); 
		$parent.find('.view-position-text').toggle('slow'); 	
	});
	
	dropdowns = jQuery('.wrapper-dropdown:not(.btn-view-position)'); 
	dropdowns.click(function(e) {
		$btnClicked = jQuery(this); 
		if(!$btnClicked.find('.link').length)
			e.preventDefault(); 
		
		$btnClicked.addClass('clicked'); 
		$parent = $btnClicked.closest('.devon-row'); 		
		
		dropdowns.each(function(index) {
			if(! jQuery(this).hasClass('clicked')) jQuery(this).removeClass('active'); 
		});		
		
		if(jQuery(this).hasClass('clicked')) {
			jQuery(this).toggleClass('active').removeClass('clicked'); 
		}
		
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

/**
* Function: ladystar_add_to_favorites
**/ 
function ladystar_add_to_favorites($post_id) {
	cookieName = 'ladystar_favorites'; 
	favorites = jQuery.cookie(cookieName); 
	console.log('favorites here before: ' + favorites); 
	
	if(favorites !== undefined) {
		favorites = favorites.split(","); 
		favorites.push($post_id); 
	}	
	else favorites = [$post_id]; 
	
	jQuery.cookie(cookieName, favorites, {path: '/'});
	console.log('favorites here: ' + favorites); 
}

/**
* Function: ladystar_remove_from_favorites
**/ 
function ladystar_remove_from_favorites($post_id) {
	
	cookieName = 'ladystar_favorites'; 
	favorites = jQuery.cookie(cookieName); 
	console.log('favorites here before: ' + favorites); 
	
	if(favorites === undefined) {
		favorites = []; 
	}	
	else {
		favorites = favorites.split(",");
		favorites = jQuery.grep(favorites, function(value) {
			return value != $post_id;
		})
	}
	
	jQuery.cookie(cookieName, favorites, {path: '/'});
	console.log('favorites here: ' + favorites); 
}


