<?php
/*
* Template Name: Contact Page
*
*
*
* @package greeky
*/

get_header(); ?>
<!--cols-->
<div class="cols cols-full">
    <div class="box">
        <div class="page-contact">
            <div class="row">

                <?php if(is_active_sidebar('greeky_contact'))
        {
            dynamic_sidebar("greeky_contact"); 
        }
        ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<div class="map">
    <div id="map">
        <?php   while ( have_posts() ) : the_post(); ?>
        <!--Because the_content() works only inside a WP Loop -->
        <?php the_content(); ?>
        <!-- Page Content -->
        <?php
                endwhile; //resetting the page loop ?>
    </div>
</div>
<?php
get_footer(); ?>
