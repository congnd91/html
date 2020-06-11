<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package belsip
 */

?>

<section class="no-results not-found">

    <h1 class="text-center">
        <?php esc_html_e( 'Nothing Found', 'belsip' ); ?>
    </h1>


    <div class="no-results-content text-center">
        <?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p>
            <?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'belsip' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
        </p>

        <?php elseif ( is_search() ) : ?>

        <p>
            <?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'belsip' ); ?>
        </p>
        <?php

		else : ?>

        <p>
            <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'belsip' ); ?>
        </p>
        <?php

		endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->
