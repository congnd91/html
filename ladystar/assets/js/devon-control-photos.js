var controlPhotosDataTables;
jQuery(document).ready(function() {
	if(jQuery('.control-photos-datatable').length) {
		controlPhotosDataTables = jQuery('.control-photos-datatable').DataTable( {
			"pagingType": "simple_numbers",
			"order": [[ 2, "desc" ]],
			"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
	        "processing":true,
			"dom": '<"top"flrtip<"clear">>rt<"bottom"pl<"clear">>',
	        "language": {
				'processing': "<div class='tjp-loading'>Loading</div>",
			},
			columnDefs: [ 
				{ sortable: false, "class": "index", targets: 0 },
			],
	        "serverSide":true,
	        "deferRender": true,
	        "ajax": {
				'url' : ajax_url_4,
				'data' : function(d) {
					d.name = jQuery('.search_col_name_pending').val();
				},
			}
		});
	}
	
	jQuery(document).on('click', '.btn-reload', function() {
		controlPhotosDataTables.ajax.reload(null, false);
	});
	jQuery(document).on('change', '.search_col_name_all', function() {
		controlPhotosDataTables.ajax.reload(null, false);
	});
	
	jQuery(document).on('click', '.btn-reset-filter_all', function() {
		jQuery('.all-custom-filter').val('');	
		controlPhotosDataTables.ajax.reload(null, false);
	});

	if(jQuery('.control-photo-datatable').length) {
		time = jQuery('.datatable-load-time').val();
		window.setInterval(function () {
		    controlPhotosDataTables.ajax.reload(null, false);
		}, time);
	}
	
	
	jQuery(document).on('change', '.is_verified', function() {
		controlPhotosDataTables.ajax.reload(null, false);
	});
	
});

	