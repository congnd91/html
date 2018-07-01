<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package mazpage
*/



get_header(); ?>
    <?php
while ( have_posts() ) : the_post();?>
        <div class="middle middle-page">


            <div class="container">

                <div class="page-content">


                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <?php
endwhile; // End of the loop.
?>

            <?php
get_footer();
