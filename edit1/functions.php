<?php
/**
* Child theme stylesheet einbinden in Abhängigkeit vom Original-Stylesheet
* Custom JS - einbinden // https://calderaforms.com/2016/11/how-to-load-custom-javascript-in-wordpress/
*/

function child_theme_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array('parent-style'));
wp_enqueue_script( 'my-custom-script', get_stylesheet_directory_uri() . '/custom.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );


/**
* Event Tickets - Change Ticket Email Subject
*/
add_filter( 'tribe_rsvp_email_subject', 'tribe_change_rsvp_subject' );
function tribe_change_rsvp_subject( $subject ) {

	$subject = sprintf( __( 'Anmeldebestätigung - %s', 'event-tickets' ), get_bloginfo( 'name' ) );

	return $subject;
}

/** Text anpassungen **/
$custom_text = array(
'Your RSVP has been received! Check your email for your RSVP confirmation.' => 'Die bestätigung wurde erfolgreich versendet.',
);


/**
  * BCC site admin email on all Event Tickets' RSVP ticket emails so they get a copy of it too
  *
  * From https://gist.github.com/cliffordp/4f06f95dbff364242cf54a3b5271b182
  *
  * Reference: https://developer.wordpress.org/reference/functions/wp_mail/#using-headers-to-set-from-cc-and-bcc-parameters
  *
  */
function cliff_et_rsvp_bcc_admin_ticket() {
	// get site admin's email
	$bcc = sanitize_email( get_option( 'admin_email' ) );
	
	// set Headers to Event Tickets' default
	$headers = array( 'Content-type: text/html' );
	
	// add BCC email if it's a valid email address
	if ( is_email( $bcc ) ) {
		$headers[] = sprintf( 'Bcc: %s', $bcc );
	}
	
	return $headers;
}
add_filter( 'tribe_rsvp_email_headers', 'cliff_et_rsvp_bcc_admin_ticket' );


/*
* SVG Dateien erlauben
*/
function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter( 'wp_check_filetype_and_ext', function($filetype_ext_data, $file, $filename, $mimes) {
	if ( substr($filename, -4) === '.svg' ) {
		$filetype_ext_data['ext'] = 'svg';
		$filetype_ext_data['type'] = 'image/svg+xml';
	}
	return $filetype_ext_data;
}, 100, 4 );

/*
* Button zu allen Kursen nach den Suchergebniesen
*/

function insert_link_to_curse_list() {
if( is_search() ){
	echo '<a class="btn hfs-button-full" href="https://www.hfs.swiss/events/kategorie/hfs-kurse/list/">unsere aktuelle Kursliste</a>';
}
}

//add_filter('bright_theme_page_title', 'insert_link_to_curse_list');
add_action('bright_before_content', 'insert_link_to_curse_list', 10, 2);




/** The Event Calender (Veranstaltungen) Nach Datum durchsuchen https://rudrastyh.com/wordpress/date-range-filter.html **/

class arteeoDatePicker
{

    function __construct()
    {

        // if you do not want to remove default "by month filter", remove/comment this line
        //add_filter( 'months_dropdown_results', '__return_empty_array' );

        // Displey HTML of the filter if its match post_type
        $is_tribe_events = $_GET['post_type'];
        if ($is_tribe_events == 'tribe_events') {
            add_action('restrict_manage_posts', array($this, 'form'));
        }

        // the function that filters posts
        add_action('pre_get_posts', array($this, 'filterquery'));
    }


    /*
	 *  input fields with CSS/HTML
	 */
    function form()
    {

        $EventStartDate = (isset($_GET['EventStartDate']) && $_GET['EventStartDate']) ? $_GET['EventStartDate'] : '';
        echo '<style>
		input[name="EventStartDate"]{
			line-height: 28px;
			height: 28px;
			margin: 0;
			width:150px;
		}
		</style>
 
		<input type="date" name="EventStartDate" placeholder="2019-11-07" pattern="\d{4}-\d{1,2}-\d{1,2}" value="' . $EventStartDate . '" />
		<input type="submit" id="doaction" class="button action" value="Datum suchen">
 
		';
    }

    /*
	 * The main function that actually filters the posts
	 */
    function filterquery($admin_query)
    {
        global $pagenow;
        if (
            is_admin()
            && $admin_query->is_main_query()
            && in_array($pagenow, array('edit.php', 'upload.php'))
            && (!empty($_GET['EventStartDate']))
        ) {
           
			$admin_query->set( 'meta_query', array(
            array(
                'key'     => '_EventStartDate',
                'compare' => 'REGEXP',
                'value'   =>  $_GET['EventStartDate'].'\s\d\d:\d\d:\d\d',
                'type'    => 'DATETIME',
            )
        ) );  
        }

        return $admin_query;
    }
}
new arteeoDatePicker();