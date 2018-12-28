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
	register_sidebar(array(
		'name' => esc_html__( 'Social Footer Widgets', 'mazpage' ),
		'id'            => 'mazpage_social_footer',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));


	register_sidebar(array(
		'name' => esc_html__( 'Home Big Content Widgets', 'mazpage' ),
		'id'            => 'mazpage_home_big',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));

	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets Column 1', 'mazpage' ),
		'id'            => 'mazpage_footer_column_1',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets Column 2', 'mazpage' ),
		'id'            => 'mazpage_footer_column_2',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets Column 3', 'mazpage' ),
		'id'            => 'mazpage_footer_column_3',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));

	register_sidebar(array(
		'name' => esc_html__( 'About Social Widgets', 'mazpage' ),
		'id'            => 'mazpage_about',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title col-caption"><span>',
		'after_title'   => '</span></div>',
		));
	register_sidebar(array(
		'name' => esc_html__( 'Contact Page Widgets', 'mazpage' ),
		'id'            => 'mazpage_contact',
		'description'   => esc_html__( 'Add widgets here.', 'mazpage' ),
		'before_widget' => '<section id="%1$s" class="mazpage-widget %2$s col-md-6 col-sm-12">',
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




// Custom body class
add_action('body_class','mazpage_body_class');
if (!function_exists('mazpage_body_class'))
{
	function mazpage_body_class($classes){

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

// Category Style Field
add_filter('category_edit_form_fields', 'mazpage_category_fields');
add_filter('category_add_form_fields', 'mazpage_category_fields');
function mazpage_category_fields($tag) {
	$t_id = $tag->term_id;
	$cat_meta = get_option( "category_$t_id");
	?>
	<table class="form-table">
		<tr class="form-field">
			<th scope="row" valign="top"><label for="Cat_meta[layout]"><?php esc_html_e('Category Layout', 'mazpage'); ?></label></th>
			<td>
				<select name="Cat_meta[layout]" id="Cat_meta[layout]">
					<option value="default" <?php echo ($cat_meta['layout'] == "default") ? 'selected="selected"': ''; ?>><?php esc_html_e('Default Style', 'mazpage'); ?></option>
					<option value="small-thumb" <?php echo ($cat_meta['layout'] == "small-thumb") ? 'selected="selected"': ''; ?>><?php esc_html_e('Small Thumbnail', 'mazpage'); ?></option>

					<option value="masonry" <?php echo ($cat_meta['layout'] == "masonry") ? 'selected="selected"': ''; ?>><?php esc_html_e('Masonry Style', 'mazpage'); ?></option>
						
				</select>
				<p class="description"><?php esc_html_e( 'Select Category Layout', 'mazpage' ); ?></p>
			</td>
		</tr>
	</table>
	<?php
}
add_action ( 'edited_category', 'mazpage_save_extra_category_fileds');
add_action ( 'create_category', 'mazpage_save_extra_category_fileds');
function mazpage_save_extra_category_fileds( $term_id ) {
	if ( isset( $_POST['Cat_meta'] ) ) {
		$t_id = $term_id;
		$cat_meta = get_option( "category_$t_id");
		$cat_keys = array_keys($_POST['Cat_meta']);
		foreach ($cat_keys as $key){
			if (isset($_POST['Cat_meta'][$key])){
				$cat_meta[$key] = $_POST['Cat_meta'][$key];
			}
		}
//save the option array
		update_option( "category_$t_id", $cat_meta );
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
        $font_url = add_query_arg( 'family', urlencode('Lora:400,400i,700,700i|Oswald:200,300,400,500,600,700&amp;subset=cyrillic,cyrillic-ext,latin-ext,vietnamese'), "//fonts.googleapis.com/css" );
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
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() .'/css/swiper.min.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() .'/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'mazpage-main', get_template_directory_uri() .'/css/main.css' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array('jquery'),$version, true );
	wp_enqueue_script( 'mazpage-main', get_template_directory_uri() . '/js/main.js', array('jquery'),$version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mazpage_scripts' );



add_action( 'tgmpa_register', 'mazpage_plugin_activation' );
function mazpage_plugin_activation() {

	$mazpage_plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7', 
			'required'  => false,
			),
		array(
'name'                  => esc_html__( 'Vafpress Post Formats UI', 'mazpage' ), // The plugin name
'slug'                  => 'vafpress-post-formats-ui-develop', // The plugin slug (typically the folder name)
'source'   				=> get_template_directory_uri() . '/inc/vafpress-post-formats-ui-develop.zip',// The plugin source
'required'              => true, // If false, the plugin is only 'recommended' instead of required
'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
'external_url'          => '', // If set, overrides default API URL and points to an external URL
),

		); 

	$mazpage_config = array(
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                     
		'is_automatic' => false,                   
		'message'      => '',
		'strings'      => array(
			'page_title'                      => esc_html( 'Install Required Plugins', 'mazpage' ),
			'menu_title'                      => esc_html( 'Install Plugins', 'mazpage' ),
'installing'                      => esc_html( 'Installing Plugin: %s', 'mazpage' ), // %s = plugin name.
'oops'                            => esc_html( 'Something went wrong with the plugin API.', 'mazpage' ),
'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'mazpage' ), // %1$s = plugin name(s).
'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'mazpage' ), // %1$s = plugin name(s).
'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'mazpage' ), // %1$s = plugin name(s).
'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'mazpage' ), // %1$s = plugin name(s).
'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'mazpage' ), // %1$s = plugin name(s).
'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'mazpage'), // %1$s = plugin name(s).
'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'mazpage' ), // %1$s = plugin name(s).
'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'mazpage' ), // %1$s = plugin name(s).
'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'mazpage' ),
'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'mazpage' ),
'return'                          => esc_html( 'Return to Required Plugins Installer', 'mazpage' ),
'plugin_activated'                => esc_html( 'Plugin activated successfully.', 'mazpage' ),
'complete'                        => esc_html( 'All plugins installed and activated successfully. %s', 'mazpage' ), // %s = dashboard link.
'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
)
); // end $config
	tgmpa( $mazpage_plugins, $mazpage_config );

}

require get_template_directory() . '/inc/class-tgm-plugin-activation.php';

function mazpage_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'mazpage_excerpt_more' );

function mazpage_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'mazpage_excerpt_length');

// Post Views Counter
function mazpage_setpostviews($postID) {

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
function mazpage_getpostviews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "";
    }
    elseif($count >= 1000) {
       return round(($count/1000),1) . esc_html__( ' K', 'mazpage' );
    }
    elseif($count >= 1000) {
       return round(($count/1000000),1) . esc_html__( ' M', 'mazpage' );
    }
    else {
        return $count;
    }
}


