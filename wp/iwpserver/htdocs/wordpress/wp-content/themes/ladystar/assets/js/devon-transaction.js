var transactionDatatable;
jQuery(document).ready(function() {
	if(jQuery('.transaction-datatable').length) {
		transactionDatatable = jQuery('.transaction-datatable').DataTable( {
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
				'url' : ajax_url_2,
				'data' : function(d) {
					d.user = jQuery('.search_col_user').val(); 
					d.date = jQuery('.search_col_date').text(); 
				},
			}
		});
	}
	
	
	jQuery(document).on('click', '.btn-reload', function() {
		transactionDatatable.ajax.reload(null, false);
	});

	jQuery(document).on('change', '.search_col_user', function() {
		transactionDatatable.ajax.reload(null, false);
	});
	
	jQuery(document).on('click', '.btn-reset-filter', function() {
		jQuery('.all-custom-filter').val('');	
		transactionDatatable.ajax.reload(null, false);
	});

	if(jQuery('.transaction-datatable').length) {
		time = jQuery('.datatable-load-time').val();
		window.setInterval(function () {
		   transactionDatatable.ajax.reload(null, false);
		}, time);
	}
});

jQuery(function() {
	var start = moment().subtract(29, 'days');
	var end = moment();

	function tb(start, end) {
	    jQuery('#devon-daterangepicker span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	}
	jQuery('#devon-daterangepicker').daterangepicker({
	    startDate: start,
	    endDate: end,
	    ranges: {
	       'Today': [moment(), moment()],
	       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	       '2 days ago': [moment().subtract(2, 'days'), moment().subtract(2, 'days')],
	       'Last 7 Days': [moment().subtract(7, 'days'), moment()],
	       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	       'This Month': [moment().startOf('month'), moment().endOf('month')],           
	       'All Time': ['January 1, 2014', end]
	    }
	}, tb);
	jQuery('#devon-daterangepicker').on('apply.daterangepicker', function(ev, picker) {
		transactionDatatable.ajax.reload(null, false);
	});

	tb(start, end); 
});
	