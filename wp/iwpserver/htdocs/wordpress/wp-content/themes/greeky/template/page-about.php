<?php
/*
* Template Name: About Page
*
*
*
* @package mazpage
*/

get_header(); ?>

 <div class="about-me">

<?php  while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
     <div class="about-img">
                      <?php if( has_post_thumbnail () ) :
the_post_thumbnail();
endif; ?> 
                    </div>

                  <h2><?php the_title(); ?></h2>
                    <p>
                    <?php  the_content();  ?>
                    </p>


<?php
                endwhile; //resetting the page loop ?>


  
        <?php if(is_active_sidebar('mazpage_about'))
        {
            dynamic_sidebar("mazpage_about"); 
        }
        ?>
  
                   
             
    </div>
    <?php
    get_footer();


    