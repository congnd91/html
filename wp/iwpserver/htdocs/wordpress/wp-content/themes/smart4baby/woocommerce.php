<?php
/**
 * The template for displaying WooCommerce pages according to their documentation
 * https://docs.woothemes.com/document/third-party-custom-theme-compatibility/*
*
*
* @package mazpage
*/
get_header(); ?>

<div id="page-wrapper">
        <?php
        // Start the loop.
        if ( have_posts() ) :

            woocommerce_content();

        // End the loop.
        endif;
        ?>
</div><!-- #page-wrapper -->
    
<?php get_footer();