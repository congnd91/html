<?php
/**
 * mazpage functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mazpage
 */

if ( ! function_exists( 'mazpage_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mazpage_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on mazpage, use a find and replace
	 * to change 'mazpage' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mazpage', get_template_directory() . '/languages' );

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
	add_image_size( 'mazpage_landscape', 1000, 600, true );
	add_image_size( 'mazpage_small', 80, 60, true );
	add_image_size( 'mazpage_nocrop', 1000, 9999, false );  // medium thumbnail no crop
	add_theme_support('post-formats', array( 'video', 'audio', 'gallery' ) );

	// Implements editor styling
	add_editor_style();
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Primary', 'mazpage' ),
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
	add_theme_support( 'custom-background', apply_filters( 'mazpage_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'mazpage_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mazpage_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mazpage_content_width', 640 );
}
add_action( 'after_setup_theme', 'mazpage_content_width', 0 );


/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function mazpage_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mazpage' ),
		'id'            => 'mazpage_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		) );
	register_sidebar(array(
		'name' => esc_html__( 'Home Content Widgets', 'mazpage' ),
		'id'            => 'mazpage_home',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));


	
	
}
add_action( 'widgets_init', 'mazpage_widgets_init' );

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/widgets/widget_posts_by_tag.php';
require get_template_directory() . '/widgets/widget_sticky_post.php';
require get_template_directory() . '/widgets/widget_posts_by_tag_home.php';
require get_template_directory() . '/widgets/widget_social.php';
require get_template_directory() . '/widgets/widget_subscribe.php';
require get_template_directory() . '/widgets/widget_advertisement.php';
require get_template_directory() . '/widgets/widget_trending_posts.php';
require get_template_directory() . '/widgets/widget_tab_posts.php';
require get_template_directory() . '/widgets/widget_social_footer.php';
require get_template_directory() . '/widgets/widget_instagram.php';
require get_template_directory() . '/widgets/widget_category_home.php';
require get_template_directory() . '/widgets/widget_social_about_page.php';
require get_template_directory() . '/widgets/widget_contact_form.php';
require get_template_directory() . '/widgets/widget_contact_information.php';
require get_template_directory() . '/widgets/widget_slider_home.php';
require get_template_directory() . '/woocommerce/hooks.php';



/**
* Hides the custom post template for pages on WordPress 4.6 and older
*
* @param array $post_templates Array of page templates. Keys are filenames, values are translated names.
* @return array Filtered array of page templates.
*/
function mazpage_exclude_page_templates( $post_templates ) {
	if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
		unset( $post_templates['template/post-sidebar-left.php'] );
		unset( $post_templates['template/post-center-content.php'] );
		unset( $post_templates['template/post-full-width.php'] );
		unset( $post_templates['template/post-basic.php'] );
	}

	return $post_templates;
}

add_filter( 'theme_page_templates', 'mazpage_exclude_page_templates' );




// Pagination 
if ( !function_exists('mazpage_pagination') ) {
function mazpage_pagination( $custom_query = false ){
	global $wp_query;
	
	if ( !$custom_query ) $custom_query = $wp_query;

	$big = 999999999; // need an unlikely integer
	$pagination = paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $custom_query->max_num_pages,
		'type'			=> 'plain',
		'prev_text'    =>  esc_html('PREV','mazpage') ,
		'next_text'    =>  esc_html('NEXT','mazpage') ,
	) );
	
	if ( $pagination ) {
		echo '<div class="paging-outer"><div class="paging">';	
		echo $pagination;
		echo '</div></div>';
	}
}
}







/*
Register Fonts
*/
function mazpage_fonts_url() {
    $font_url = '';
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'mazpage' ) ) {
        $font_url = add_query_arg( 'family', urlencode('Bangers|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,800,800i,900,900i'), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

/**
* Enqueue scripts and styles.
*/

function mazpage_scripts() {
	$version = wp_get_theme( wp_get_theme()->template )->get( 'Version' );
	wp_enqueue_style( 'mazpage-fonts', mazpage_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'mazpage-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/fontawesome-all.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
    
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.css' );
	wp_enqueue_style( 'carousel', get_template_directory_uri() .'/css/owl.carousel.css' );
    	wp_enqueue_style( 'bxslider', get_template_directory_uri() .'/css/jquery.bxslider.css' );
	wp_enqueue_style( 'mazpage-main', get_template_directory_uri() .'/css/main.css' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'),$version, true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', array('jquery'),$version, true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'mazpage-main', get_template_directory_uri() . '/js/main.js', array('jquery'),$version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mazpage_scripts' );
