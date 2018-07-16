<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package mazpage
*/



get_header(); ?>
    <?php
while ( have_posts() ) : the_post();?>
        <div class="middle">


            <div class="single-box">

                <h1>

                    <?php the_title(); ?>
                </h1>

                <?php if(has_post_thumbnail ())  { ?>
                <?php  $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                <div class="sb-img" style="background-image: url(<?php echo esc_url($thumb[0]); ?>);">
                    <?php } else { ?>

                    <div class="sb-img">

                        <?php } ?>



                    </div>

                    <div class="container sb-content-wrap">
                        <div class="sb-content">
                            <div class="sb-left">

                                <div class="sb-bar">
                                    <span><?php echo get_the_date(); ?></span>
                                    <div class="pull-right" style="float:right;margin-top:-15px;width:92px;height:50px;">
                                        <?php echo DISPLAY_ULTIMATE_PLUS(); ?>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="sb-detail">
                                    <?php the_content(); ?>
                                </div>
                                <?php 
              get_template_part( 'template/related_posts' ); ?>




                            </div>

                            <div class="sb-right">

                                <?php get_sidebar(); ?>



                                <!--  <?php if( has_tag() ) {  ?>



                                <div class="box-tags">
                                    <h2>TAG CLOUD</h2>

                                    <?php echo the_tags( '', ' ' ); ?>
                                </div>





                                <?php }  ?>-->


                            </div>
                            <div class="clearfix"></div>


                        </div>
                    </div>


                </div>

            </div>
            <?php
endwhile; // End of the loop.
?>
                <?php
get_footer();
