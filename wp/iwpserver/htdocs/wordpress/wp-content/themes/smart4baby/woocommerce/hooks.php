<?php

if ( !class_exists( 'Mazpage_WooCommerce' ) ) :
/**
* WooCommerce class
*
* @since 1.0
*/
class Mazpage_WooCommerce
{   

/**
* Construct
*/
public function __construct() {
}

/**
* The one instance of class
*
* @since 1.0
*/
private static $instance;

/**
* Instantiate or return the one class instance
*
* @since 1.0
*
* @return class
*/
public static function instance() {
    if ( is_null( self::$instance ) ) {
        self::$instance = new self();
    }

    return self::$instance;
}

/**
* Initiate the class
* contains action & filters
*
* @since 1.0
*/
public function init() {

    add_action( 'wp_enqueue_scripts', array( $this, 'mazpage_enqueue' ) );

// .container wrapper
    add_action('woocommerce_before_single_product', array( $this, 'mazpage_wrapper_start' ), 10);

// .product thumnail
    add_action( 'woocommerce_before_shop_loop_item', array( $this, 'mazpage_content_product_thumbnail_open' ), 9 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );
    add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'mazpage_content_product_thumbnail_close' ), 12 );

// Add to cart button
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11 );

// Sale Flash
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 14 );

// Custom title
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
    add_action( 'woocommerce_shop_loop_item_title', array( $this, 'mazpage_content_product_title' ), 10 );

// single images markup
    add_filter('loop_shop_columns', function( $column ) { return 3; } , 999);
    add_filter( 'woocommerce_product_thumbnails_columns', function( $column ) { return 2; } ) ;

// cart content count
    add_filter('add_to_cart_fragments', 'mazpage_woocommerce_header_add_to_cart_fragment');

}

function mazpage_enqueue() {

    wp_enqueue_style( 'mazpage-woocommerce', get_template_directory_uri() . '/css/woocommerce.css');
}
function mazpage_content_product_thumbnail_open() {

    echo '<div class="product-thumbnail"><div class="product-thumbnail-inner">';

}

function mazpage_content_product_thumbnail_close() {

    echo '</div></div>';

}

function mazpage_content_product_title() {

    echo '<h3 class"product-title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h3>';

}

function mazpage_wrapper_start() {

    echo '<h1 class="page-title">'.  esc_html("Product","mazpage") .'</h1> ';

}

function mazpage_woocommerce_header_add_to_cart_fragment( $fragments )
{

    global $woocommerce; 
    ob_start(); 
    ?>
    <?php 
    if($woocommerce->cart->cart_contents_count==0)
        { ?>

    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'mazpage'); ?>">
        <p>
            <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mazpage'), $woocommerce->cart->cart_contents_count);?> -
            <?php echo $woocommerce->cart->get_cart_total(); ?>
        </p>
    </a>
    <?php
}
else
{
    ?>
        <a class="cart-contents cart-contents-show" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'mazpage'); ?>">
            <p>
                <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'mazpage'), $woocommerce->cart->cart_contents_count);?> -
                <?php echo $woocommerce->cart->get_cart_total(); ?>
            </p>
        </a>
        <?php
}
?>
        <?php 
$fragments['a.cart-contents'] = ob_get_clean();
return $fragments; 
}
}
Mazpage_WooCommerce::instance()->init();
endif;
