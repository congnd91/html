<?php
/*
* Template Name:  All Post
*
*
*
* @package greeky
*/

get_header(); ?>

    <!--middle-->
    <div class="middle">
        <div class="container">
            <div class="row">
                <?php $mazpage_thumbsposts =  new WP_Query(array(
            'post_status' => 'publish',
            'ignore_sticky_posts' => '1',
            'paged' =>  is_front_page() ? get_query_var('page') : get_query_var('paged'),
            ));
            ?>

                <div class="col-lg-9 col-sm-12">
                    <div class="list-post">
                        <div class="row">
                            <?php
                /* Start the Loop */
                while ( $mazpage_thumbsposts -> have_posts() ) : $mazpage_thumbsposts-> the_post();
                get_template_part( 'loop/content', get_post_format() );
                endwhile; ?>
                        </div>
                    </div>
                    <?php
               
                    
                    
                         echo  greeky_pagination($mazpage_thumbsposts);
            ?>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <?php get_sidebar(); ?>

                </div>


            </div>





        </div>
    </div>

    <?php
get_footer();
