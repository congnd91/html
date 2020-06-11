<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package belsip
*/
get_header(); ?>
  <section class="page-template">
    <div class="container">
      <div class="page-inner">

        <?php   while ( have_posts() ) : the_post(); ?>

        <h2>
          <?php the_title(); ?>
        </h2>
        <!--Because the_content() works only inside a WP Loop -->
        <?php the_content(); ?>
        <!-- Page Content -->
        <?php
                endwhile; //resetting the page loop ?>

          <br><br><br>
      </div>
    </div>
  </section>


  <?php
get_footer();
