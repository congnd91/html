<?php
/*
* Template Name: Home Sidebar Left
*
*

*
* @package mazpage
*/

get_header(); ?>

<?php
if ( is_home() && is_active_sidebar( 'mazpage_home_big'))?>
<?php dynamic_sidebar('mazpage_home_big'); ?>
<!--cols-->
    <div class="cols sidebar-left">
            <!--colleft-->
            <div class="colleft">
                <?php
                if (is_active_sidebar('mazpage_home')){ ?>
                <?php dynamic_sidebar('mazpage_home'); ?>
                <?php
            }
            else 
            {
                if ( have_posts() ) { ?>
              <div class="list-item-category">

                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
                 </div>

                <?php
                echo  mazpage_pagination();
            }
            else 
            {
                get_template_part( 'loop/content', 'none' );
            }

        }
        ?>

    </div>
    <!--colright-->
    <div class="colright">
    <?php get_sidebar(); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();

