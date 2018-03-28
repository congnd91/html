<?php
/**
 * The template for displaying WooCommerce pages according to their documentation
 * https://docs.woothemes.com/document/third-party-custom-theme-compatibility/*
*
*
* @package mazpage
*/
get_header(); ?>

    <div class="woocommerce">
        <?php
        // Start the loop.
      

            woocommerce_content();

        // End the loop.
      
        ?>
    </div>
    <!-- #page-wrapper -->

    <?php get_footer();
