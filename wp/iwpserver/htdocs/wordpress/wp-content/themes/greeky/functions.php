<?php
/**
 * greeky functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package greeky
 */

if ( ! function_exists( 'greeky_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function greeky_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on greeky, use a find and replace
	 * to change 'greeky' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'greeky', get_template_directory() . '/languages' );

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
    add_image_size( 'greeky_portrait', 1172, 950, true );
	add_image_size( 'greeky_landscape', 1000, 600, true );
	add_image_size( 'greeky_small', 70, 60, true );
	add_image_size( 'greeky_nocrop', 1000, 9999, false );  // medium thumbnail no crop
	add_theme_support('post-formats', array( 'video', 'audio', 'gallery' ) );

	// Implements editor styling
	add_editor_style();
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Primary', 'greeky' ),
	) );
    
    register_nav_menus( array(
		'footer-menu' => esc_html__( 'Footer Menu', 'greeky' ),
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
	add_theme_support( 'custom-background', apply_filters( 'greeky_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'greeky_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greeky_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'greeky_content_width', 640 );
}
add_action( 'after_setup_theme', 'greeky_content_width', 0 );


/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function greeky_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'greeky' ),
		'id'            => 'greeky_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '<div id="%1$s" class="box box-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="box-caption"><h2><span>',
		'after_title'   => '</span></h2></div>',
		) );
    register_sidebar(array(
		'name' => esc_html__( 'Social Header Widgets', 'greeky' ),
		'id'            => 'greeky_social',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
    
     register_sidebar(array(
		'name' => esc_html__( 'Breaking News Widgets', 'greeky' ),
		'id'            => 'greeky_breaking_news',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
     register_sidebar(array(
		'name' => esc_html__( 'Social Footer Widgets', 'greeky' ),
		'id'            => 'greeky_social_footer',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
    register_sidebar(array(
		'name' => esc_html__( 'Home Big Content Widgets', 'greeky' ),
		'id'            => 'greeky_home_big',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
    	register_sidebar(array(
		'name' => esc_html__( 'Home Content Widgets', 'greeky' ),
		'id'            => 'greeky_home',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '<section id="%1$s" class="greeky-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));
         
   
   
	register_sidebar(array(
		'name' => esc_html__( 'Contact Page Widgets', 'greeky' ),
		'id'            => 'greeky_contact',
		'description'   => esc_html__( 'Add widgets here.', 'greeky' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
		));
	
	
}
add_action( 'widgets_init', 'greeky_widgets_init' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/widgets/widget_social_header.php';
require get_template_directory() . '/widgets/widget_breaking_news_header.php';
require get_template_directory() . '/widgets/widget_big_posts_home.php';
require get_template_directory() . '/widgets/widget_category_posts_home.php';
require get_template_directory() . '/widgets/widget_social_footer.php';
require get_template_directory() . '/widgets/widget_special_posts_sidebar.php';
require get_template_directory() . '/widgets/widget_popular_posts_sidebar.php';
require get_template_directory() . '/widgets/widget_advertisement_sidebar.php';
require get_template_directory() . '/widgets/widget_tab_posts_sidebar.php';
require get_template_directory() . '/widgets/widget_twitter_timeline_sidebar.php';
require get_template_directory() . '/widgets/widget_form_contact.php';
require get_template_directory() . '/widgets/widget_information_contact.php';







// Pagination 
if ( !function_exists('greeky_pagination') ) {
function greeky_pagination( $custom_query = false ){
	global $wp_query;
	
	if ( !$custom_query ) $custom_query = $wp_query;

	$big = 999999999; // need an unlikely integer
	$pagination = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $custom_query->max_num_pages,
		'type'			=> 'plain',
		'prev_text'    =>  esc_html('PREV','greeky') ,
		'next_text'    =>  esc_html('NEXT','greeky') ,
	) );
	
	if ( $pagination ) {
		echo '<div class="paging-outer"><div class="paging">';	
		echo $pagination;
		echo '</div></div>';
	}
}
}




// Custom body class
add_action('body_class','greeky_body_class');
if (!function_exists('greeky_body_class'))
{
	function greeky_body_class($classes){

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
function greeky_fonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'greeky' ) ) {
        $font_url = add_query_arg( 'family', urlencode('Open+Sans:400,400i,600,600i,700,700i,800,800i|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=greek,greek-ext,vietnamese'), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/**
* Enqueue scripts and styles.
*/

function greeky_scripts() {
	$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );
	wp_enqueue_style( 'greeky-fonts', greeky_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'greeky-style', get_stylesheet_uri() );
    
        
	wp_enqueue_style( 'font-ionicons', get_template_directory_uri() .'/css/ionicons.min.css' );
    
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'owl', get_template_directory_uri() .'/css/owl.carousel.min.css' );
    
    wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.min.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() .'/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'greeky-main', get_template_directory_uri() .'/css/main.css' );
    

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'greeky-main', get_template_directory_uri() . '/js/main.js', array('jquery'),$version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'greeky_scripts' );



add_action( 'tgmpa_register', 'greeky_plugin_activation' );
function greeky_plugin_activation() {

	$greeky_plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7', 
			'required'  => false,
			)
        ,


		); 

	$greeky_config = array(
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                     
		'is_automatic' => false,                   
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html( 'Install Required Plugins', 'greeky' ),
			'menu_title'                      => esc_html( 'Install Plugins', 'greeky' ),
'installing'                      => esc_html( 'Installing Plugin: %s', 'greeky' ), // %s = plugin name.
'oops'                            => esc_html( 'Something went wrong with the plugin API.', 'greeky' ),
'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'greeky' ), // %1$s = plugin name(s).
'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'greeky' ), // %1$s = plugin name(s).
'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'greeky' ), // %1$s = plugin name(s).
'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'greeky' ), // %1$s = plugin name(s).
'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'greeky' ), // %1$s = plugin name(s).
'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'greeky'), // %1$s = plugin name(s).
'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'greeky' ), // %1$s = plugin name(s).
'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'greeky' ), // %1$s = plugin name(s).
'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'greeky' ),
'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'greeky' ),
'return'                          => esc_html( 'Return to Required Plugins Installer', 'greeky' ),
'plugin_activated'                => esc_html( 'Plugin activated successfully.', 'greeky' ),
'complete'                        => esc_html( 'All plugins installed and activated successfully. %s', 'greeky' ), // %s = dashboard link.
'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
)
); // end $config
	tgmpa( $greeky_plugins, $greeky_config );

}

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function greeky_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'greeky_excerpt_more' );

function greeky_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'greeky_excerpt_length');

/**
 * Breadcrumb
 */
function greeky_breadcrumbs() {
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
function greeky_setpostviews($postID) {

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
function greeky_getpostviews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "";
    }
    elseif($count >= 1000) {
       return round(($count/1000),1) . esc_html__( ' K', 'greeky' );
    }
    elseif($count >= 1000) {
       return round(($count/1000000),1) . esc_html__( ' M', 'greeky' );
    }
    else {
        return $count;
    }
}
