<?php
/*
* Template Name: Home Big Slider
*
*
*

*
*  @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>

<?php $mazpage_thumbsposts =  new WP_Query(array(
             'showposts' => 3,
             'tag' => "news",
             'ignore_sticky_posts' => '1',
        ));
        ?>

        <!--home-slider-->
                <?php  if ($mazpage_thumbsposts->have_posts() ) { ?>

<div class="home-slider">
                    <div class="swiper-home">
                        <div class="swiper-next">
                        <?php echo esc_html("NEXT","mazpage"); ?>
                        </div>
                        <div class="swiper-prev">
                            <?php echo esc_html("PREV","mazpage"); ?>
                        </div>
                        <div class="swiper-wrapper">
                         <?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                            <div class="swiper-slide">
                                <article class="big-sticky-post">
                                    <div class="post-meta">
                                        <span class="post-date">
                                            JUNE 01,  2017
                                        </span>
                                        <span class="post-category">
                                            <a href="#">The World</a>
                                        </span>
                                    </div>
                                     <?php if(has_post_thumbnail()){  ?>
                            <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>  <div class="ciz-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                      <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                      </a>
                                      </div>
                            <?php }  ?>
                                    <h1>
                                       <a href="<?php the_permalink(); ?>"> <?php the_title(); ?>.</a>
                                    </h1>
                                    <div class="post-des">
                                         <p><?php echo(get_the_excerpt()); ?></p>
                                    </div>
                                </article>
                            </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            
            <?php } ?>
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