<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mazpage
 */

$mazpage_sidebar_position = get_theme_mod('sidebar_position');
$mazpage_social_visible = get_theme_mod('social_visible');
get_header(); ?>
    <?php
while ( have_posts() ) : the_post();

?>

        <div class="category-page">
            <div class="container">
                <div <?php post_class(); ?>>
                    <?php the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mazpage' ),
				'after'  => '</div>',
			) );
                ?>
                    <div class="clearfix"></div>
                </div>
                <!---->
                <?php 
// If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;
              ?>
            </div>
        </div>
        <?php
endwhile; // End of the loop.
?>
            <?php
get_footer();
