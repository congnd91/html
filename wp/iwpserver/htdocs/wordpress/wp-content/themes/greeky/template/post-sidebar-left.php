<?php
/*
Template Name:Post Sidebar Left
Template Post Type: post
*
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package greeky
*/

get_header(); ?>
<?php
while ( have_posts() ) : the_post();
greeky_setpostviews(get_the_ID() ); 
?>
<!--cols-->
<div class="cols sidebar-left">
    <!--colleft-->
    <div class="colleft">
        <!--detail -->
        <div class="box">
            <?php greeky_breadcrumbs(); ?>
            <article class="detail">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <div class="post-meta">
                    <span class="post-date">
                        <i class="ion-ios-clock">
                        </i>
                        <?php echo get_the_date(get_option('date_format'));?>
                    </span>
                    <span class="post-author">
                        <i class="ion-person">
                        </i>
                        <?php the_author_posts_link(); ?>
                    </span>
                </div>
                <div class="detail-thumbnail">
                    <?php if (has_post_format( 'audio' ) ) { ?>
                    <div class="sound">
                        <?php $greeky_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
                        <?php if(wp_oembed_get( $greeky_audio )) : ?>
                        <?php echo wp_oembed_get($greeky_audio); ?>
                        <?php else : ?>
                        <?php echo wp_kses_post( $greeky_audio ); ?>
                        <?php endif; ?>
                    </div>
                    <?php } elseif ( has_post_format( 'video' ) ) { ?>
                    <div class='embed-container'>
                        <?php $greeky_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
                        <?php if(wp_oembed_get( $greeky_video )) : ?>
                        <?php echo wp_oembed_get($greeky_video); ?>
                        <?php else : ?>
                        <?php echo wp_kses_post( $greeky_video ); ?>
                        <?php endif; ?>
                    </div>
                    <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                    <?php $greeky_gallery = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
                    <?php if($greeky_gallery) : ?>
                    <div class="owl-detail-wrap">
                        <div class="owl-carousel  owl-detail">
                            <?php foreach($greeky_gallery as $image) : ?>
                            <?php $the_image = wp_get_attachment_image_src( $image, 'greeky_landscape' ); ?>
                            <div>
                                <img src="<?php echo esc_url( $the_image[0] ); ?>" alt="<?php the_title(); ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php } else { ?>
                    <?php if( has_post_thumbnail () ) :
                            the_post_thumbnail();
                             endif; ?>
                    <?php } ?>
                </div>
                <div class="detail-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html( 'Pages:', 'greeky' ),
                            'after'  => '</div>',
                              ) );
                              ?>
                </div>
            </article>
            <div class="detail-bottom">
                <div class="single-share">
                    <div class="single-share-inner">
                        <span>
                            <?php echo esc_html("Share To","greeky") ?></span>
                        <a data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink());?>&p[images][0]=<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" title="<?php _e('Facebook','greeky');?>" class="share-link facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a data-href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo urlencode(get_the_title());?>" title="<?php _e('Twitter','greeky');?>" class="share-link twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="<?php _e('Pinterest','greeky');?>" class="share-link pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                        <a data-href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink());?>" title="<?php _e('Google+','greeky');?>" class="share-link google">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a data-href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink());?>" title="<?php _e('Linkedin','greeky');?>" class="share-link linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="mailto:?subject=<?php echo urlencode(get_permalink());?>" title="<?php _e('Email','greeky');?>" class="email">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </div>
                </div>
                <?php if( has_tag() ) {  ?>
                <div class="tags">
                    <div class="box-detail-caption">
                        <span>
                            <?php echo esc_html("Tags Cloud","greeky") ?> </span>
                    </div>
                    <div>
                        <?php echo the_tags( '', ' ' ); ?>
                    </div>
                </div>
                <?php }  ?>
            </div>
            <!--related-post-->
            <?php 
              get_template_part( 'template/related_posts' ); ?>
            <?php 
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;
              ?>
        </div>
    </div>
    <!--colright-->
    <div class="colright">
        <?php get_sidebar(); ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php
endwhile; // End of the loop.
?>
<?php
get_footer();
