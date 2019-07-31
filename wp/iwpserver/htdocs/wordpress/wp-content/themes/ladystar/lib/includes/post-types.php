<?php

// Register Custom Post Type
function devon_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Ads', 'Post Type General Name', 'ladystar' ),
		'singular_name'         => _x( 'Ad', 'Post Type Singular Name', 'ladystar' ),
		'menu_name'             => __( 'Ads', 'ladystar' ),
		'name_admin_bar'        => __( 'Ads', 'ladystar' ),
		'archives'              => __( 'Ads Archives', 'ladystar' ),
		'attributes'            => __( 'Ads Attributes', 'ladystar' ),
		'parent_item_colon'     => __( 'Parent Ads:', 'ladystar' ),
		'all_items'             => __( 'All Ads', 'ladystar' ),
		'add_new_item'          => __( 'Add New Ads', 'ladystar' ),
		'add_new'               => __( 'Add New', 'ladystar' ),
		'new_item'              => __( 'New Ads', 'ladystar' ),
		'edit_item'             => __( 'Edit Ads', 'ladystar' ),
		'update_item'           => __( 'Update Ads', 'ladystar' ),
		'view_item'             => __( 'View Ads', 'ladystar' ),
		'view_items'            => __( 'View Ads', 'ladystar' ),
		'search_items'          => __( 'Search Ads', 'ladystar' ),
		'not_found'             => __( 'Not found', 'ladystar' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ladystar' ),
		'featured_image'        => __( 'Featured Image', 'ladystar' ),
		'set_featured_image'    => __( 'Set featured image', 'ladystar' ),
		'remove_featured_image' => __( 'Remove featured image', 'ladystar' ),
		'use_featured_image'    => __( 'Use as featured image', 'ladystar' ),
		'insert_into_item'      => __( 'Insert into item', 'ladystar' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ladystar' ),
		'items_list'            => __( 'Ads list', 'ladystar' ),
		'items_list_navigation' => __( 'Ads list navigation', 'ladystar' ),
		'filter_items_list'     => __( 'Filter ads list', 'ladystar' ),
	);
	$args = array(
		'label'                 => __( 'Ad', 'ladystar' ),
		'description'           => __( 'Ads type posts.', 'ladystar' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author' ),
		'taxonomies'            => array( 'location', ' services', ' languages' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capabilities' => array(
            'edit_post' => 'edit_listing',
			'edit_posts' => 'edit_listings',
			'edit_others_posts' => 'edit_other_listings',
			'publish_posts' => 'publish_listings',
			'read_post' => 'read_listing',
			'read_private_posts' => 'read_private_listings',
			'delete_post' => 'delete_listing'         
        ),
		'map_meta_cap'			=> true,
		'show_in_rest'          => true,
	);
	register_post_type( 'listings', $args );

	$labels = array(
		'name'                  => _x( 'Leisure Rooms', 'Post Type General Name', 'ladystar' ),
		'singular_name'         => _x( 'Leisure Room', 'Post Type Singular Name', 'ladystar' ),
		'menu_name'             => __( 'Leisure Rooms', 'ladystar' ),
		'name_admin_bar'        => __( 'Leisure Rooms', 'ladystar' ),
		'archives'              => __( 'Leisure Rooms Archives', 'ladystar' ),
		'attributes'            => __( 'Leisure Rooms Attributes', 'ladystar' ),
		'parent_item_colon'     => __( 'Parent Leisure Rooms:', 'ladystar' ),
		'all_items'             => __( 'All Leisure Rooms', 'ladystar' ),
		'add_new_item'          => __( 'Add New Leisure Rooms', 'ladystar' ),
		'add_new'               => __( 'Add New', 'ladystar' ),
		'new_item'              => __( 'New Leisure Rooms', 'ladystar' ),
		'edit_item'             => __( 'Edit Ads', 'ladystar' ),
		'update_item'           => __( 'Update Leisure Rooms', 'ladystar' ),
		'view_item'             => __( 'View Leisure Rooms', 'ladystar' ),
		'view_items'            => __( 'View Leisure Rooms', 'ladystar' ),
		'search_items'          => __( 'Search Leisure Rooms', 'ladystar' ),
		'not_found'             => __( 'Not found', 'ladystar' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ladystar' ),
		'featured_image'        => __( 'Featured Image', 'ladystar' ),
		'set_featured_image'    => __( 'Set featured image', 'ladystar' ),
		'remove_featured_image' => __( 'Remove featured image', 'ladystar' ),
		'use_featured_image'    => __( 'Use as featured image', 'ladystar' ),
		'insert_into_item'      => __( 'Insert into item', 'ladystar' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ladystar' ),
		'items_list'            => __( 'Leisure Rooms list', 'ladystar' ),
		'items_list_navigation' => __( 'Leisure Rooms list navigation', 'ladystar' ),
		'filter_items_list'     => __( 'Filter leisure-rooms list', 'ladystar' ),
	);
	$args = array(
		'label'                 => __( 'Leisure Room', 'ladystar' ),
		'description'           => __( 'Leisure Rooms type posts.', 'ladystar' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author' ),
		'taxonomies'            => array( 'location', ' services', ' languages' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capabilities' => array(
			'edit_post' => 'edit_leisure-room',
			'edit_posts' => 'edit_leisure-rooms',
			'edit_others_posts' => 'edit_other_leisure-rooms',
			'publish_posts' => 'publish_leisure-rooms',
			'read_post' => 'read_leisure-room',
			'read_private_posts' => 'read_private_leisure-rooms',
			'delete_post' => 'delete_leisure-room'
		),
		'map_meta_cap'			=> true,
		'show_in_rest'          => true,
	);
	register_post_type( 'leisure-rooms', $args );
}
add_action( 'init', 'devon_custom_post_type', 0 );

function devon_add_custom_caps() {	
	$admins = get_role( 'administrator' );
    $admins->add_cap( 'edit_leisure-room' ); 
    $admins->add_cap( 'edit_leisure-rooms' ); 
    $admins->add_cap( 'edit_other_leisure-rooms' ); 
    $admins->add_cap( 'publish_leisure-rooms' ); 
    $admins->add_cap( 'read_leisure-room' ); 
    $admins->add_cap( 'read_private_leisure-rooms' ); 
    $admins->add_cap( 'delete_leisure-room' ); 	
	
	$admins->add_cap( 'edit_listing' ); 
    $admins->add_cap( 'edit_listings' ); 
    $admins->add_cap( 'edit_other_listings' ); 
    $admins->add_cap( 'publish_listings' ); 
    $admins->add_cap( 'read_listing' ); 
    $admins->add_cap( 'read_private_listings' ); 
    $admins->add_cap( 'delete_listing' ); 

	$subscribers = get_role( 'subscriber' );		
	$subscribers->add_cap( 'edit_leisure-room' ); 
    $subscribers->add_cap( 'edit_leisure-rooms' ); 
    $subscribers->add_cap( 'read_leisure-room' );     
    $subscribers->add_cap( 'delete_leisure-room' ); 
	
	$subscribers->add_cap( 'edit_listing' ); 
    $subscribers->add_cap( 'edit_listings' ); 
    $subscribers->add_cap( 'read_listing' );     
    $subscribers->add_cap( 'delete_listing' ); 
}
add_action( 'admin_init', 'devon_add_custom_caps');

/*
 * example usage: $results = reset_role_wpse_82378( 'subscriber' );
 * per add_role() (WordPress Codex):
 * $results "Returns a WP_Role object on success, null if that role already exists."
 *
 * possible $role values:
 * 'administrator'
 * 'editor'
 * 'author'
 * 'contributor'
 * 'subscriber'
 */
function reset_role_wpse_82378( $role ) {
    $default_roles = array(
        'administrator' => array(
            'switch_themes' => 1,
            'edit_themes' => 1,
            'activate_plugins' => 1,
            'edit_plugins' => 1,
            'edit_users' => 1,
            'edit_files' => 1,
            'manage_options' => 1,
            'moderate_comments' => 1,
            'manage_categories' => 1,
            'manage_links' => 1,
            'upload_files' => 1,
            'import' => 1,
            'unfiltered_html' => 1,
            'edit_posts' => 1,
            'edit_others_posts' => 1,
            'edit_published_posts' => 1,
            'publish_posts' => 1,
            'edit_pages' => 1,
            'read' => 1,
            'level_10' => 1,
            'level_9' => 1,
            'level_8' => 1,
            'level_7' => 1,
            'level_6' => 1,
            'level_5' => 1,
            'level_4' => 1,
            'level_3' => 1,
            'level_2' => 1,
            'level_1' => 1,
            'level_0' => 1,
            'edit_others_pages' => 1,
            'edit_published_pages' => 1,
            'publish_pages' => 1,
            'delete_pages' => 1,
            'delete_others_pages' => 1,
            'delete_published_pages' => 1,
            'delete_posts' => 1,
            'delete_others_posts' => 1,
            'delete_published_posts' => 1,
            'delete_private_posts' => 1,
            'edit_private_posts' => 1,
            'read_private_posts' => 1,
            'delete_private_pages' => 1,
            'edit_private_pages' => 1,
            'read_private_pages' => 1,
            'delete_users' => 1,
            'create_users' => 1,
            'unfiltered_upload' => 1,
            'edit_dashboard' => 1,
            'update_plugins' => 1,
            'delete_plugins' => 1,
            'install_plugins' => 1,
            'update_themes' => 1,
            'install_themes' => 1,
            'update_core' => 1,
            'list_users' => 1,
            'remove_users' => 1,
            'add_users' => 1,
            'promote_users' => 1,
            'edit_theme_options' => 1,
            'delete_themes' => 1,
            'export' => 1,
        ),
        'editor' => array(
            'moderate_comments' => 1,
            'manage_categories' => 1,
            'manage_links' => 1,
            'upload_files' => 1,
            'unfiltered_html' => 1,
            'edit_posts' => 1,
            'edit_others_posts' => 1,
            'edit_published_posts' => 1,
            'publish_posts' => 1,
            'edit_pages' => 1,
            'read' => 1,
            'level_7' => 1,
            'level_6' => 1,
            'level_5' => 1,
            'level_4' => 1,
            'level_3' => 1,
            'level_2' => 1,
            'level_1' => 1,
            'level_0' => 1,
            'edit_others_pages' => 1,
            'edit_published_pages' => 1,
            'publish_pages' => 1,
            'delete_pages' => 1,
            'delete_others_pages' => 1,
            'delete_published_pages' => 1,
            'delete_posts' => 1,
            'delete_others_posts' => 1,
            'delete_published_posts' => 1,
            'delete_private_posts' => 1,
            'edit_private_posts' => 1,
            'read_private_posts' => 1,
            'delete_private_pages' => 1,
            'edit_private_pages' => 1,
            'read_private_pages' => 1,
        ),
        'author' => array(
            'upload_files' => 1,
            'edit_posts' => 1,
            'edit_published_posts' => 1,
            'publish_posts' => 1,
            'read' => 1,
            'level_2' => 1,
            'level_1' => 1,
            'level_0' => 1,
            'delete_posts' => 1,
            'delete_published_posts' => 1,
        ),
        'contributor' => array(
            'edit_posts' => 1,
            'read' => 1,
            'level_1' => 1,
            'level_0' => 1,
            'delete_posts' => 1,
        ),
        'subscriber' => array(
            'read' => 1,
            'level_0' => 1,           
        ),
        'user' => array(
            'edit_posts' => 1,
            'read' => 1,
        ),
        'display_name' => array(
            'administrator' => 'Administrator',
            'editor'        => 'Editor',
            'author'        => 'Author',
            'contributor'   => 'Contributor',
            'subscriber'    => 'Subscriber',
        ),
    );
    $role = strtolower( $role );
    remove_role( $role );
    return add_role( $role, $default_roles['display_name'][$role], $default_roles[$role] );
} 