<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package mazpage
*/

$mazpage_sidebar_position = get_theme_mod('sidebar_position');
$mazpage_author_visible = get_theme_mod('author_visible');
$mazpage_social_visible = get_theme_mod('social_visible');
$mazpage_counter_visible = get_theme_mod('counter_visible');

get_header(); ?>
    <?php
while ( have_posts() ) : the_post();

?>



        <div class="categorypage">
            <div class="container">
                <article class="detail">
                    <div class="detail-title">
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                    </div>

                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html( 'Pages:', 'mazpage' ),
          'after'  => '</div>',
          ) );
          ?>
                    <div class="clearfix"></div>
                </article>
                <!---->







            </div>
        </div>
        <?php
endwhile; // End of the loop.
?>
            <?php
get_footer();
