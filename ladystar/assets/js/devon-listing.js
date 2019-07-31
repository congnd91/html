var allDataTables;
jQuery(document).ready(function() {
	if(jQuery('.listings-datatable').length) {
		allDataTables = jQuery('.listings-datatable').DataTable( {
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
				'url' : ajax_url,
				'data' : function(d) {
					d.name = jQuery('.search_col_name_all').val(); 
					d.status = jQuery('.search_col_status').val(); 
				},
			}
		});
	}

	
	jQuery(document).on('click', '.btn-reload', function() {
		allDataTables.ajax.reload(null, false);
	});
	
	jQuery(document).on('change', '.search_col_name_all, .search_col_status', function() {
		allDataTables.ajax.reload(null, false);
	});
	
	jQuery(document).on('click', '.btn-reset-filter_all', function() {
		jQuery('.all-custom-filter').val('');	
		allDataTables.ajax.reload(null, false);
	});

	if(jQuery('.listings-datatable').length) {
		time = jQuery('.datatable-load-time').val();
		window.setInterval(function () {
		    allDataTables.ajax.reload(null, false);
		}, time);
	}
});

	