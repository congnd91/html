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
* @package belsip
*/
$belsip_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>
    <!--sliderhome-->
    <section class="home-slider" id="home">
        <div class="owl-carousel owl-home">
            <?php
    if ( is_home() && is_active_sidebar( 'globargo_home_slider_content'))
    dynamic_sidebar('globargo_home_slider_content'); ?>




        </div>
    </section>

    <?php
    if ( is_home() && is_active_sidebar( 'globargo_home_content'))
    dynamic_sidebar('globargo_home_content'); ?>




        <?php
get_footer();
