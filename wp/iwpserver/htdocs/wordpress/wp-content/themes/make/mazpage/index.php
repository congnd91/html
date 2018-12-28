<?php
/**
* The main template file
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>

    <?php
if ( is_home() && is_active_sidebar( 'mazpage_home_big'))?>
        <?php dynamic_sidebar('mazpage_home_big'); ?>
        <!--cols-->

        <?php if($mazpage_sidebar_position=="left"):?>
        <div class="cols sidebar-left">
            <?php elseif($mazpage_sidebar_position=="none"):?>
            <div class="cols cols-full">
                <?php else:?>
                <div class="cols">
                    <?php endif;?>

                    <!--colleft-->
                    <div class="colleft">
                        <?php
                if (is_home() && is_active_sidebar('mazpage_home')){ ?>
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
