var pendingDataTables;
jQuery(document).ready(function() {
	if(jQuery('.pending-datatable').length) {
		pendingDataTables = jQuery('.pending-datatable').DataTable( {
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
				{ sortable: false, targets: [1,-1] } 				
			],
	        "serverSide":true,
	        "deferRender": true,
	        "ajax": {
				'url' : ajax_url_1,
				'data' : function(d) {
					d.name = jQuery('.search_col_name_pending').val();
				},
			}
		});
	}
	
	
	jQuery(document).on('click', '.btn-reload', function() {
		pendingDataTables.ajax.reload(null, false);
	});

	jQuery(document).on('change', '.search_col_name_pending', function() {
		pendingDataTables.ajax.reload(null, false);
	});
	
	jQuery(document).on('click', '.btn-reset-filter_pending', function() {
		jQuery('.all-custom-filter').val('');	
		pendingDataTables.ajax.reload(null, false);
	});

	if(jQuery('.pending-datatable').length) {
		time = jQuery('.datatable-load-time').val();
		window.setInterval(function () {
		    pendingDataTables.ajax.reload(null, false);
		}, time);
	}
});

	