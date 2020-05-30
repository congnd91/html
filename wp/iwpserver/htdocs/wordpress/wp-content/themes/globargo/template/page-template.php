<?php
/*
* Template Name: Page Template
*
*
*
* @package greeky
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
get_footer(); ?>
