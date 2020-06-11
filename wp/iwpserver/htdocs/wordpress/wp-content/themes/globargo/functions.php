<?php
/**
 * belsip functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package belsip
 */

if ( ! function_exists( 'belsip_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function belsip_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on belsip, use a find and replace
	 * to change 'belsip' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'belsip', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'belsip_portrait', 1172, 950, true );
	add_image_size( 'belsip_landscape', 1000, 600, true );
	add_image_size( 'belsip_small', 70, 60, true );
	add_image_size( 'belsip_nocrop', 1000, 9999, false );  // medium thumbnail no crop
	add_theme_support('post-formats', array( 'video', 'audio', 'gallery' ) );

	// Implements editor styling
	add_editor_style();
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Primary', 'belsip' ),
	) );
    
    register_nav_menus( array(
		'footer-menu' => esc_html__( 'Footer Menu', 'belsip' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'belsip_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'belsip_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function belsip_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'belsip_content_width', 640 );
}
add_action( 'after_setup_theme', 'belsip_content_width', 0 );


/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function belsipa_widgets_init() {

    register_sidebar(array(
		'name' => esc_html__( 'Contact Left Widgets', 'belsipa' ),
		'id'            => 'belsipa_contact_left',
		'description'   => esc_html__( 'Add widgets here.', 'belsipa' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
     register_sidebar(array(
		'name' => esc_html__( 'Contact Right Widgets', 'belsipa' ),
		'id'            => 'belsipa_contact_right',
		'description'   => esc_html__( 'Add widgets here.', 'belsipa' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
    	
	
	
}
add_action( 'widgets_init', 'belsipa_widgets_init' );
require get_template_directory() . '/widgets/widget_contact_member.php';
require get_template_directory() . '/widgets/widget_contact_form.php';
require get_template_directory() . '/inc/customizer.php';








// Pagination 
if ( !function_exists('belsip_pagination') ) {
function belsip_pagination( $custom_query = false ){
	global $wp_query;
	
	if ( !$custom_query ) $custom_query = $wp_query;

	$big = 999999999; // need an unlikely integer
	$pagination = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $custom_query->max_num_pages,
		'type'			=> 'plain',
		'prev_text'    =>  esc_html('PREV','belsip') ,
		'next_text'    =>  esc_html('NEXT','belsip') ,
	) );
	
	if ( $pagination ) {
		echo '<div class="paging-outer"><div class="paging">';	
		echo $pagination;
		echo '</div></div>';
	}
}
}




// Custom body class
add_action('body_class','belsip_body_class');
if (!function_exists('belsip_body_class'))
{
	function belsip_body_class($classes){

	    if (is_page_template('template/home_boxed.php')) {
            $classes[] = 'layout-boxed';
        }
         elseif (is_page_template('template/home_custom_font.php')) {
            $classes[] = 'custom-font';
        }
         elseif (is_page_template('template/home_fixed_menu.php')) {
            $classes[] = 'fixed-style';
        }
         elseif (is_page_template('template/home_masonry.php')) {
            $classes[] = 'header_white';
        }
         else
            {
 			$classes[] = get_theme_mod('sidebar_position');
 			$classes[] = get_theme_mod('menu_visible');
         }

	return $classes;
}
}



/*
Register Fonts
*/
function belsip_fonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'belsip' ) ) {
        $font_url = add_query_arg( 'family', urlencode('Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|PT+Sans:400,400i,700,700i&display=swap'), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/**
* Enqueue scripts and styles.


*/

// include custom jQuery
function shapeSpace_include_custom_jquery() {

	

}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');



function belsip_scripts() {
	$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );
	wp_enqueue_style( 'belsip-fonts', belsip_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'belsip-style', get_stylesheet_uri() );
    
        

    
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() .'/css/owl.carousel.min.css' );
    
	wp_enqueue_style( 'belsip-main', get_template_directory_uri() .'/css/main.css' );
    
//	wp_deregister_script('jquery');
  //   wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'),null,true );

   
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.js', array('jquery'),$version, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),'' , true );
    
	
    
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'),$version, true );
    
	wp_enqueue_script( 'belsip-main', get_template_directory_uri() . '/js/main.js', array('jquery'),$version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'belsip_scripts' );



function belsip_excerpt_more( $more ) {
	return '...';
}

function belsip_excerpt_length($length) {
	return 25;
}


/**
 * Breadcrumb
 */
function belsip_breadcrumbs() {
    $delimiter = '<span><i class="fa fa-angle-right"></i></span>';
    $home = 'Home'; 
    $before = ''; 
    $after = '';
    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '<div class="sitemap">';
        global $post;
        $homeLink = get_bloginfo('home_url');
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        
        if ( is_single()) {
            
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
             
           
        } 
        echo '</div>';
    }
} // end dimox_breadcrumbs()


// Post Views Counter
function belsip_setpostviews($postID) {

    //check if user not administrator, if so execute code block within
    if( !current_user_can('administrator') ) {

        $user_ip = $_SERVER['REMOTE_ADDR']; //retrieve the current IP address of the visitor
        $key = $user_ip . 'x' . $postID; //combine post ID & IP to form unique key
        $value = array($user_ip, $postID); // store post ID & IP as separate values (see note)
        $visited = get_transient($key); //get transient and store in variable

        //check to see if the Post ID/IP ($key) address is currently stored as a transient
        if ( false === ( $visited ) ) {

            //store the unique key, Post ID & IP address for one minute if it does not exist
            set_transient( $key, $value, 60 );

            // now run post views function
            $count_key = 'post_views_count';
            $count = get_post_meta($postID, $count_key, true);
            if($count==''){
                $count = 0;
                delete_post_meta($postID, $count_key);
                add_post_meta($postID, $count_key, '0');
            }else{
                $count++;
                update_post_meta($postID, $count_key, $count);
            }
        }
    }
}
function belsip_getpostviews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "";
    }
    elseif($count >= 1000) {
       return round(($count/1000),1) . esc_html__( ' K', 'belsip' );
    }
    elseif($count >= 1000) {
       return round(($count/1000000),1) . esc_html__( ' M', 'belsip' );
    }
    else {
        return $count;
    }
}
