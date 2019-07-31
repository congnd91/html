<?php

if ( ! function_exists( 'devon_custom_taxonomies' ) ) {

function devon_custom_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Service Locations', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Service Location', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Service Locations', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'service_locations', array( 'listings' ), $args );
	
	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Locations', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'locations', array( 'listings' ), $args );
	
	$labels = array(
		'name'                       => _x( 'Service Categories', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Service Category', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Service Categories', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'service_categories', array( 'listings' ), $args );
	
	$labels = array(
		'name'                       => _x( 'Services', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Service', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Services', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'services', array( 'listings' ), $args );
	
	$labels = array(
		'name'                       => _x( 'Languages', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Language', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Languages', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'languages', array( 'listings' ), $args );
	
	$labels = array(
		'name'                       => _x( 'Amenities', 'Taxonomy General Name', 'ladystar' ),
		'singular_name'              => _x( 'Amenity', 'Taxonomy Singular Name', 'ladystar' ),
		'menu_name'                  => __( 'Amenities', 'ladystar' ),
		'all_items'                  => __( 'All Items', 'ladystar' ),
		'parent_item'                => __( 'Parent Item', 'ladystar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ladystar' ),
		'new_item_name'              => __( 'New Item Name', 'ladystar' ),
		'add_new_item'               => __( 'Add New Item', 'ladystar' ),
		'edit_item'                  => __( 'Edit Item', 'ladystar' ),
		'update_item'                => __( 'Update Item', 'ladystar' ),
		'view_item'                  => __( 'View Item', 'ladystar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ladystar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ladystar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ladystar' ),
		'popular_items'              => __( 'Popular Items', 'ladystar' ),
		'search_items'               => __( 'Search Items', 'ladystar' ),
		'not_found'                  => __( 'Not Found', 'ladystar' ),
		'no_terms'                   => __( 'No items', 'ladystar' ),
		'items_list'                 => __( 'Items list', 'ladystar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ladystar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'amenities', array( 'leisure-rooms' ), $args );

}
add_action( 'init', 'devon_custom_taxonomies', 0 );

}