<?php
/*
* Template Name: Full Width Page
*
*
*
* @package mazpage
*/


get_header(); ?>
<?php
if ( have_posts() ) { ?>
<div class="big-page-caption"><p>
   <?php the_title(); ?>
</p>
</div>
<?php } ?>
<!--cols-->

        <div class="cols cols-full">
            <!--colleft-->
            <div class="colleft">
                <?php
                if ( have_posts() ) { ?>
                <div class="list-item-category">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                  
 the_content(); 
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mazpage' ),
                'after'  => '</div>',
            ) );
              
                  
                  
                    endwhile; ?>
                </div>
                <?php
             
            }
            else 
            {
                get_template_part( 'loop/content', 'none' );
            }
            ?>
        </div>
       
        <div class="clearfix"></div>
    </div>
    <?php
    get_footer();


    