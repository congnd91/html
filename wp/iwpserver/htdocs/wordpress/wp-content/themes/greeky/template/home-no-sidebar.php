<?php
/*
* Template Name: Home Sidebar Left
*
*
*
* @package greeky
*/

get_header(); ?>

<?php
    if ( is_home() && is_active_sidebar( 'greeky_home_big'))
    dynamic_sidebar('greeky_home_big'); ?>
<!--cols-->
<div class="cols cols-full">
    <!--colleft-->
    <div class="colleft">

        <?php if (is_home() && is_active_sidebar('greeky_home'))
            { 
            dynamic_sidebar('greeky_home');
            }
            else 
            {
                if ( have_posts() ) { ?>
        <div class="box">
            <div class="list-item-category">
                <?php
                while ( have_posts() ) : the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
            </div>
        </div>
        <?php
                echo  greeky_pagination();
            }
            else 
            {
                get_template_part( 'loop/content', 'none' );
            }
        }
        ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
get_footer();
