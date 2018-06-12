<?php
/*
* Template Name: Contact Page
*
*
*
* @package mazpage
*/

get_header(); ?>

<div class="big-page-caption">
    <p>  <?php the_title(); ?> </p>
</div>
<div class="page-contact">
    <div class="row">

        <?php if(is_active_sidebar('mazpage_contact'))
        {
            dynamic_sidebar("mazpage_contact"); 
        }
        ?>

    </div>
    <div class="map">
        <div id="map">
            <?php   while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
                <?php the_content(); ?> <!-- Page Content -->
                <?php
                endwhile; //resetting the page loop ?>
         </div>
    </div>
</div>

<?php
get_footer();


