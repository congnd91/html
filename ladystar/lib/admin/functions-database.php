<?php

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Store our table name in $wpdb with correct prefix
 * Prefix will vary between sites so hook onto switch_blog too
 * @since 1.0
*/
function ladystar_register_activity_log_table(){
    global $wpdb;
    $wpdb->transaction = "{$wpdb->prefix}transaction";
}
add_action( 'init', 'ladystar_register_activity_log_table',1);
add_action( 'switch_blog', 'ladystar_register_activity_log_table');


/**
 * Update DB Check
 * @since 1.4
*/
add_action( 'admin_init', 'ladystar_update_db_check' );
add_action( 'plugins_loaded', 'ladystar_update_db_check' );
function ladystar_update_db_check() {
	
	//Version of currently activated plugin
	$current_version = LS_VERSION;
	//Database version - this may need upgrading.
	$installed_version = get_option('ladystar_db_version');
	
	// Disable After Development
	ladystar_log_tables();
	//$mail = wp_mail('om.akdeveloper@gmail.com','Testing22 Table: Before Not Compare: '.$installed_version,'hello baby ji');	
	
	if( !$installed_version ){
		//No installed version - we'll assume its just been freshly installed
		ladystar_log_tables();
		add_option('ladystar_db_version', $current_version);
	}
	elseif( $installed_version != $current_version ){
        
		if( version_compare($current_version, $installed_version) ){
			//$mail = wp_mail('om.akdeveloper@gmail.com','Testing22 Table: Not Compare','hello baby ji');	
			ladystar_log_tables();
		}
 
		//Database is now up to date: update installed version to latest version
		update_option('ladystar_db_version', $current_version);
   }
}

function ladystar_log_tables() {
	
	// Create Certificate Log Table
	$table_name = "transaction";	
	$table_columns = "
	id bigint(20) unsigned NOT NULL auto_increment,
		user_id bigint(20) unsigned NOT NULL default '0',
		payment_type varchar(50) NOT NULL default '',		
		payment_status varchar(50) NOT NULL default '',		
		amount bigint(10) unsigned NOT NULL default '0',		
		transaction_id varchar(256) NOT NULL default '',
		date_added datetime NOT NULL default '0000-00-00 00:00:00'";		
		
	$table_keys = "
		PRIMARY KEY  (id)";
	$dbresults = create_table($table_name, $table_columns, $table_keys);	
	
}

function ladystar_get_log_table_columns($table_name='', $keys=false){
    
    switch($table_name) {
	case 'transaction': 
		$cols = array(
			'id'=> '%d',
			'user_id'=>'%d',			
			'payment_type'=>'%s',
			'payment_status'=>'%s',
			'amount'=>'%f',			
			'transaction_id'=>'%s',
			'date_added'=>'%s'
		);
		break;
	}
	
	return (($keys) ? array_keys($cols) : $cols);
}

function create_table($table_name, $table_columns, $table_keys = null, $db_prefix = true, $charset_collate = null) {
	
	global $wpdb;

	if($charset_collate == null)
		$charset_collate = $wpdb->get_charset_collate();
	$table_name = ($db_prefix) ? $wpdb->prefix.$table_name : $table_name;
	$table_columns = strtolower($table_columns);

	if($table_keys)
		$table_keys =  ", $table_keys";

	$table_structure = "( $table_columns $table_keys )";

	$search_array = array();
	$replace_array = array();

	$search_array[] = "`";
	$replace_array[] = "";

	$table_structure = str_replace($search_array,$replace_array,$table_structure);

	$sql = "CREATE TABLE $table_name $table_structure $charset_collate;";
	
	//wp_die($sql); 

	// Rather than executing an SQL query directly, we'll use the dbDelta function in wp-admin/includes/upgrade.php (we'll have to load this file, as it is not loaded by default)
	require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

	// The dbDelta function examines the current table structure, compares it to the desired table structure, and either adds or modifies the table as necessary
	return dbDelta($sql);
}