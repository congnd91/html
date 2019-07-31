<?php

define('THEME_FOLDER', get_stylesheet_directory());
define('THEME_URI', get_stylesheet_directory_uri());
define('LS_VERSION', '1.0.0');

require_once(THEME_FOLDER . '/lib/includes/post-types.php');
require_once(THEME_FOLDER . '/lib/includes/taxonomies.php');
require_once(THEME_FOLDER . '/lib/includes/devon-functions.php');
require_once(THEME_FOLDER . '/lib/includes/devon-emails.php');
require_once(THEME_FOLDER . '/lib/includes/shortcodes.php');
require_once(THEME_FOLDER . '/lib/includes/all-globals.php');
require_once(THEME_FOLDER . '/lib/includes/wp-helpers.php');
require_once(THEME_FOLDER . '/lib/includes/wp-cron.php');
require_once(THEME_FOLDER . '/lib/includes/ajax-functions.php');

require_once(THEME_FOLDER . '/lib/includes/classes/class.positions.php');
//require_once( THEME_FOLDER . '/lib/includes/translation.php'); 

require_once(THEME_FOLDER . '/lib/admin/admin-pages.php');
require_once(THEME_FOLDER . '/lib/admin/functions-database.php');


if (!class_exists('ReduxFramework')) {
    require_once(dirname(__FILE__) . '/lib/admin/ReduxCore/framework.php');
}

if (file_exists(dirname(__FILE__) . '/lib/admin/options-init.php')) {
    require_once(dirname(__FILE__) . '/lib/admin/options-init.php');
}

//add_action('login_form', function() { header('Location: /auth/'); });

add_action('wp_init', 'devon_wp_init');
function devon_wp_init()
{

    if (isset($_GET['success']) && $_GET['success'] == 'email') {
        $e = array('action' => 'user', 'category' => 'login', 'label' => 'regular-user');
        devon_send_event($e);
    }

}

;

add_action('after_setup_theme', 'devon_after_setup_theme');
function devon_after_setup_theme()
{

    add_filter('show_admin_bar', '__return_false');

    $lang_dir = get_stylesheet_directory() . '/locale';
    //$lang_dir = dirname(__FILE__). "/locale";
    load_theme_textdomain('ladystar', $lang_dir);

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    /* TBD Image Sizes */
    add_image_size('thumb-image', 300, 200, true);
    add_image_size('listings-table', 180, 180, true);
    add_image_size('details-ad', 578, 640, true);
    add_image_size('top-ad', 210, 240, true);
    add_image_size('home-ad', 170, 180, true);

    /* END Image Sizes */
    register_nav_menus(array(
        'top' => __('Top Menu', 'ladystar'),
    ));

    add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}

;

/**
 * Enqueue scripts and styles.
 */
function devon_scripts() {
    wp_enqueue_style('bootstrap-grid', get_stylesheet_directory_uri() . '/assets/css/bootstrap-grid.css', '', '4.0');
    wp_enqueue_style('bootstrap-reboot', get_stylesheet_directory_uri() . '/assets/css/bootstrap-reboot.min.css', '', '4.0');
    //wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri()  . 'assets//css/bootstrap.min.css', '', '4.1' );
    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', '', '4.7.0');
    wp_enqueue_style('ionicons', get_stylesheet_directory_uri() . '/assets/css/ionicons.min.css', '', '4.1.2');
    wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/assets/fonts/main-fonts.css', '', '1.0');
    wp_enqueue_style('blueimp-gallery', get_stylesheet_directory_uri() . '/assets/css/blueimp-gallery.min.css');
    wp_enqueue_style('sweet-alert', get_stylesheet_directory_uri() . '/assets/css/sweetalert.css');

    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/assets/libraries/slick/slick.css');
    wp_enqueue_style('slick-theme', get_stylesheet_directory_uri() . '/assets/libraries/slick/slick-theme.css');
    wp_enqueue_style('datatable', 'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css');
    wp_enqueue_style('ladystar-style', get_stylesheet_uri());
    wp_enqueue_style('ladystar-style-html', get_stylesheet_directory_uri() . '/assets/css/style.css');
    //wp_enqueue_style('elementor-style', get_stylesheet_directory_uri() . '/assets/css/elementor-style.css');
    wp_enqueue_style('wp-style', get_stylesheet_directory_uri() . '/assets/css/wp-style.css');
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_style('bs4-helpers', get_stylesheet_directory_uri() . '/assets/css/bs4-helpers.css');
    wp_enqueue_style('custom-media', get_stylesheet_directory_uri() . '/assets/css/custom-media.css');
    //wp_enqueue_style( 'map', LOCAL_CSS . '/map.css' );
    wp_enqueue_script('jquery-moment', get_stylesheet_directory_uri() . '/assets/js/moment.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-pagination', get_stylesheet_directory_uri() . '/assets/js/pagination.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-momenttz', get_stylesheet_directory_uri() . '/assets/js/momenttz.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-cookie', get_stylesheet_directory_uri() . '/assets/js/jquery.cookie.js', array('jquery'), '', true);
    wp_enqueue_script('blueimp-gallery', get_stylesheet_directory_uri() . '/assets/js/blueimp-gallery.js', array('jquery'), '', true);
    wp_register_script('nouislider', get_stylesheet_directory_uri() . '/assets/libraries/nouislider/nouislider.js', false, false, true);
    wp_enqueue_script('nouislider');

    wp_register_script('winterTree', get_stylesheet_directory_uri() . '/assets/js/winterTree.js', false, false, true);
    wp_enqueue_script('winterTree');
	
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/libraries/bootstrap/js/bootstrap.min.js', '', '4.1', false, false, true);
    wp_enqueue_script('datatable', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js');
    wp_enqueue_script('facebook', get_stylesheet_directory_uri() . '/assets/js/facebook.js', false, false, true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/assets/libraries/slick/slick.js', array('jquery'), '1.0', true);
    wp_enqueue_script('slider', get_stylesheet_directory_uri() . '/assets/js/slider.js', array('jquery'), '1.0', true);
    wp_enqueue_style('nouislider', get_stylesheet_directory_uri() . '/assets/libraries/nouislider/nouislider.css');
    wp_enqueue_script('common-js', get_stylesheet_directory_uri() . '/assets/js/common.js', array('jquery'), '1.0', true);
    wp_enqueue_script('sweetalert', get_stylesheet_directory_uri() . '/assets/js/sweetalert2.js', array('jquery'), '1.0', true);

    wp_enqueue_script('my-ajax-mail', get_stylesheet_directory_uri() . '/assets/js/ajax_js.js');
    $localize = array(
        'ajaxurl' => admin_url('admin-ajax.php')
    );
    wp_localize_script('my-ajax-mail', 'MyAjaxMail', $localize);

    wp_register_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
    wp_enqueue_script('custom-js');

}

add_action('wp_enqueue_scripts', 'devon_scripts');

add_action('admin_enqueue_scripts', 'devon_admin_scripts');
function devon_admin_scripts($hook)
{

    wp_register_style('daterangepicker', get_stylesheet_directory_uri() . '/assets/js/bootstrap-daterangepicker-master/daterangepicker.css');
    wp_enqueue_style('daterangepicker');

    wp_register_script('momentdaterange', get_stylesheet_directory_uri() . '/assets/js/bootstrap-daterangepicker-master/moment.js');
    wp_enqueue_script('momentdaterange');

    wp_register_script('daterangepicker', get_stylesheet_directory_uri() . '/assets/js/bootstrap-daterangepicker-master/daterangepicker.js');
    wp_enqueue_script('daterangepicker');

    global $page_hooks;
    if (!in_array($hook, $page_hooks)) return;

    $page = (isset($_GET) && isset($_GET['page'])) ? $_GET['page'] : '';

    wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css', '', '4.7.0');

    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('datatable', 'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css');

    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('datatable', 'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js');

    wp_register_script('devon-admin-ajax', get_stylesheet_directory_uri() . '/assets/js/devon-admin-ajax.js');
    wp_enqueue_script('devon-admin-ajax');

    wp_register_style('devon-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');
    wp_enqueue_style('devon-admin-style');

    if ($page == 'listing') {
        wp_enqueue_script('devon-listing', get_stylesheet_directory_uri() . '/assets/js/devon-listing.js');
        wp_localize_script('devon-listing', 'ajax_url', admin_url('admin-ajax.php?action=listing_datatable'));
    } elseif ($page == 'pending-listing') {
        wp_enqueue_script('devon-pending', get_stylesheet_directory_uri() . '/assets/js/devon-pending.js');
        wp_localize_script('devon-pending', 'ajax_url_1', admin_url('admin-ajax.php?action=pending_datatable'));
    } elseif ($page == 'transaction') {
        wp_enqueue_script('devon-transaction', get_stylesheet_directory_uri() . '/assets/js/devon-transaction.js');
        wp_localize_script('devon-transaction', 'ajax_url_2', admin_url('admin-ajax.php?action=transaction_datatable'));
    } elseif ($page == 'bank-transfers') {
        wp_enqueue_script('devon-bank_transfers', get_stylesheet_directory_uri() . '/assets/js/devon-bank_transfers.js');
        wp_localize_script('devon-bank_transfers', 'ajax_url_3', admin_url('admin-ajax.php?action=bank_transfers_datatable'));
    } elseif ($page == 'control-photos') {
        wp_enqueue_script('devon-control-photo', get_stylesheet_directory_uri() . '/assets/js/devon-control-photos.js');
        wp_localize_script('devon-control-photo', 'ajax_url_4', admin_url('admin-ajax.php?action=control_photos_datatable'));
    }
}

add_action('admin_init', 'devon_custom_dashboard_access_handler');
function devon_custom_dashboard_access_handler()
{
    if (defined('DOING_AJAX') && DOING_AJAX) {

    } else {
        global $current_user;
        wp_get_current_user();

        // Check if the current user has admin capabilities
        if ($current_user->roles[0] == 'subscriber') {
            wp_redirect(home_url());
            exit;
        }
    }
}

add_action('admin_menu', 'devon_admin_menu');
function devon_admin_menu()
{
    global $page_hooks;
    $page_hooks[] = add_menu_page('Ads cPanel', 'Ads cPanel', 'manage_options', 'listing', 'devon_get_pending_listing', 'dashicons-admin-home', 1);
    $page_hooks[] = add_submenu_page('listing', 'All Listing', 'View All Listing', 'manage_options', 'listing', 'devon_get_pending_listing');
    $page_hooks[] = add_submenu_page('listing', 'Pending Listing', 'Pending Listing', 'manage_options', 'pending-listing', 'devon_get_pending_listing');
    $page_hooks[] = add_submenu_page('listing', 'Control Photos', 'Control Photos', 'manage_options', 'control-photos', 'devon_get_control_photos');
    $page_hooks[] = add_submenu_page('listing', 'Transactions', 'Transactions', 'manage_options', 'transaction', 'devon_get_transactions');
    $page_hooks[] = add_submenu_page('listing', 'Bank Transfers', 'Bank Transfers', 'manage_options', 'bank-transfers', 'devon_get_bank_transfers');
}

add_action('wp_head', 'devon_wp_head');
function devon_wp_head()
{
    global $devon_opts;

    // Add header-scripts for theme options
    if (isset($devon_opts['header-scripts']) && !empty($devon_opts['header-scripts'])) {
        echo $devon_opts['header-scripts'];
    }
}

add_filter('wpseo_title', 'devon_user_wp_title', 15);
add_filter('pre_get_document_title', 'devon_user_wp_title', 10);
function devon_user_wp_title($title) {
    if(!is_page('user')) { return $title; }
		
	if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
		// ToDo: Translate here with switch and hard-coded page titles for user parts
		$title = ucwords(str_replace('-', ' ', $_REQUEST['action']));
	}
	
	return $title . ' | ' . get_bloginfo('name');
}

//define ajax_url
add_action('wp_head', 'get_ajaxurl');
function get_ajaxurl() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}

//search filters

add_action('wp_ajax_load-filter', 'load_filter');
add_action('wp_ajax_nopriv_load-filter', 'load_filter');
function load_filter()
{
    //echo $_REQUEST['form_data'];
    parse_str($_REQUEST['form_data'], $filters);

    //print_r($filters); // Only for print array
    // construct the tax-query:
    $tax_query = array('relation' => 'AND');
    $meta_query = array('relation' => 'AND');

    // check if service taxonomy is to be included
    if ($filters['category']) {
        $tax_query[] = array(
            'taxonomy' => 'service_categories',
            'field' => 'term_id',
            'terms' => $filters['category']
        );
    }

    if ($filters['services']) {
        $filters['services'] = explode(',', $filters['services']);
        foreach($filters['services'] as $service_name) {
			$tax_query[] = array(
				'taxonomy' => 'services',
				'field' => 'term_id',
				'terms' => $service_name
			);		
		}
    }
	

    // check if actor location is to be included
    if ($filters['location']) {
        $tax_query[] = array(
            'taxonomy' => 'locations',
            'field' => 'term_id',
            'terms' => $filters['location']
        );
    }
    // check if actor service_locations is to be included
    if ($filters['venue']) {
        $tax_query[] = array(
            'taxonomy' => 'service_locations',
            'field' => 'term_id',
            'terms' => $filters['venue']
        );
    }

    // check if actor service_locations is to be included
    if ($filters['hair']) {
        $meta_query[] = array(
            'key' => 'hair_color',
            'value' => $filters['hair'],
            'compare' => '='
        );
    }

    if ($filters['price']) {
        $exp = explode('-', $filters['price']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'price',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }

    if ($filters['weight']) {
        $exp = explode('-', $filters['weight']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'weight',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }

    if ($filters['age']) {
        $exp = explode('-', $filters['age']);
        $min = $exp[0];
        $max = $exp[1];
        $meta_query[] = array(
            'key' => 'age',
            'value' => array($min, $max),
            'type' => 'numeric',
            'compare' => 'BETWEEN'
        );
    }

    // add meta_query for public ads (activated and approved)
    $public_ad_args = devon_get_public_ad_args('taxonomy');
    $meta_query = array_merge($meta_query, $public_ad_args);

    $adsMetaTotal = array(
        'post_type' => 'listings',
        'meta_key' => 'promotion_promo',
        'meta_type' => 'DATETIME',
        'orderby' => array('meta_value' => 'DESC', 'modified' => 'DESC'),
        'tax_query' => $tax_query,
        'meta_query' => $meta_query
    );
    $adsMeta = array_merge($adsMetaTotal, array(
        'posts_per_page' => 10,
        'paged' => $_REQUEST['pageNum']
    ));

    //echo "<pre>"; print_r($adsMeta); echo "</pre>";

    $queryAdsMetaTotal = new WP_Query($adsMetaTotal);
    $queryAdsMeta = new WP_Query($adsMeta);
	$output = ''; 
	$template_ads = '';
    //echo $queryAdsMeta->max_num_pages;
    //echo "<pre>";
    //$output .= print_r($adsMetaTotal, true);

    $output .= '<div class="col-md-12 text-center">';
		$output .= '<div class="pagination m-0">';
			$output .= paginate_links(array(
				//'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'base' => add_query_arg(array('u' => '%#%'), $base),
				'total' => $queryAdsMeta->max_num_pages,
				'current' => max(1, $_REQUEST['pageNum']),
				'format' => '?u=%#%',
				'show_all' => false,
				'type' => 'plain',
				'end_size' => 2,
				'mid_size' => 1,
				'prev_next' => true,
				'prev_text' => '<i class="fa fa-angle-left m-0"></i>',
				'next_text' => '<i class="fa fa-angle-right m-0"></i>',
				'add_args' => true,
				'add_fragment' => '',
			));
		$output .= '</div>';
    $output .= '</div>';	
	
    if ($queryAdsMeta->have_posts()) {
		ob_start();		
		
		while ($queryAdsMeta->have_posts()) {
			$queryAdsMeta->the_post();			
			get_template_part('template-parts/content', 'listings-public');		
		}
		
		$template_ads = ob_get_clean(); 
		$output .= $template_ads;         
	}
    else {
        $output .= '<h3 class="title">'.__('No Ads found').'</h3>';
    }

    //devon_var_dump($filters); devon_var_dump($_REQUEST['pageNum']);
    global $wp, $wp_rewrite, $wp_query;
    $base = add_query_arg($filters, pll_get_page_url('ads'));

    $output .= '<div class="col-md-12 text-center">';
		$output .= '<div class="pagination">';
			$output .= paginate_links(array(
				//'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
				'base' => add_query_arg(array('u' => '%#%'), $base),
				'total' => $queryAdsMeta->max_num_pages,
				'current' => max(1, $_REQUEST['pageNum']),
				'format' => '?u=%#%',
				'show_all' => false,
				'type' => 'plain',
				'end_size' => 2,
				'mid_size' => 1,
				'prev_next' => true,
				'prev_text' => '<i class="fa fa-angle-left m-0"></i>',
				'next_text' => '<i class="fa fa-angle-right m-0"></i>',
				'add_args' => true,
				'add_fragment' => '',
			));
		$output .= '</div>';
    $output .= '</div>';
	
	// Prepare Top Ads HTML here from the shortcode	
	$top_ads_filters = '';
	foreach($filters as $key=>$value) {
		$value = (is_array($value)) ? trim(implode(',', $value)) : $value; 
		$top_ads_filters .= ' ' . $key . '="'.$value.'"'; 
	}
	//$output .= $top_ads_filters; $output .= '<hr>'; $output .= print_r($filters, true);
	$top_ads = do_shortcode('[topFiveAds '.$top_ads_filters.']');	
	
	$data = array(
		'ads_container_html' => $output,
		'total_posts' => $queryAdsMetaTotal->found_posts,
		'top_ads_html' => $top_ads
	); 
	
	wp_reset_postdata();
	
	wp_send_json_success($data); 
    wp_die(); 
}

add_action('wp_ajax_store-filter-status', 'store_filter_status');
add_action('wp_ajax_nopriv_store-filter-status', 'store_filter_status');
function store_filter_status()
{
    session_start();
    $_SESSION['filterStatus'] = $_POST['sess'];
    wp_die();
}

add_action('wp_ajax_assign-attachments', 'assign_attachments');
add_action('wp_ajax_nopriv_assign-attachments', 'assign_attachments');
function assign_attachments()
{
    $output = wp_update_post(array(
            'ID' => $_POST['image_id'],
            'post_parent' => $_POST['post_id']
        )
    );

    $output .= '
		<div class="devon-image devon-attachment devon-zoom">
			<img src="' . wp_get_attachment_url($_POST['image_id']) . '" data-id="' . $_POST['image_id'] . '">
			<span class="btn btn-classic btn-small devon-img-options" data-id="' . $_POST['image_id'] . '" data-post_id="' . $_POST['post_id'] . '">
				<span class="devon-make-primary" data-swal-title="'.__('Make this a primary image?', 'ladystar').'" data-swal-text="">' . __('Make Primary', 'ladystar') . '</span>
				<span class="devon-remove pull-right" data-swal-title="'.__('Are you sure?', 'ladystar').'" data-swal-text="'.__('The image will be permanently deleted!', 'ladystar').'"><i class="fa fa-trash"></i></span>
				<i class="fa fa-spin fa-spinner" style="display:none;"></i>
			</span>
		</div>
	';
    echo $output;
    wp_die();
}

function enqueue_media_uploader()
{
    //this function enqueues all scripts required for media uploader to work
    wp_enqueue_media();
}

add_action("wp_enqueue_scripts", "enqueue_media_uploader");

//Remove tab of media uploaded on front end
add_filter('media_view_strings', 'custom_media_uploader');
function custom_media_uploader($strings)
{
    //echo '<pre>';print_r($strings);//die();
    unset($strings['createVideoPlaylistTitle']); //Media Library
    unset($strings['insertVideoPlaylist']); //Media Library
    unset($strings['createPlaylistTitle']); //Media Library
    unset($strings['createNewPlaylist']); //Media Library
    unset($strings['addToPlaylist']); //Media Library
    unset($strings['createPlaylist']); //Media Library
    unset($strings['insertPlaylist']); //Media Library
    unset($strings['mediaLibraryTitle']); //Media Library
    unset($strings['createGalleryTitle']); //Create Gallery
    unset($strings['editImage']); //Create Gallery
    //unset( $strings['setFeaturedImageTitle'] ); //Set Featured Image
    unset($strings['insertFromUrlTitle']); //Insert from URL
    return $strings;
}

// Limit media library can see own images
add_filter('ajax_query_attachments_args', 'wpb_show_current_user_attachments');

function wpb_show_current_user_attachments($query)
{
    $user_id = get_current_user_id();
    if ($user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts')) {
        $query['author'] = $user_id;
    }
    return $query;
}

function boot_session()
{
    session_start();
}

add_action('wp_loaded', 'boot_session');
function allow_subscriber_media()
{
    $role = 'subscriber';
    if (!current_user_can($role) || current_user_can('upload_files'))
        return;
    $subscriber = get_role($role);
    $subscriber->add_cap('upload_files');
}

add_action('admin_init', 'allow_subscriber_media');

function devon_mailtrap($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '96d6f69426b296';
    $phpmailer->Password = '3fe270583136ee';
}

//add_action('phpmailer_init', 'devon_mailtrap');

/**
 * This function returns a page permalink
 * for the current website language.
 *
 * @author  Mauricio Gelves <mg@maugelves.com>
 * @param   $page_slug      string          WordPress page slug
 * @return                  string|false    Page Permalink or false if the page is not found
 */
function pll_get_page_url( $page_slug ) {
	// Check parameter
	if( empty( $page_slug ) ) return false;
	
	// Get the page
	$page = get_page_by_path( $page_slug );
	// Check if the page exists
	if( empty( $page ) || is_null( $page ) ) return false;
	// Get the URL
	$page_ID_current_lang = pll_get_post( $page->ID );
	// Return the current language permalink
	return empty($page_ID_current_lang) ? get_permalink( $page->ID ) : get_permalink( $page_ID_current_lang );
}