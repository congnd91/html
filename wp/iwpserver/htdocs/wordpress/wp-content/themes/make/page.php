<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mazpage
 */

$mazpage_sidebar_position = get_theme_mod('sidebar_position');
$mazpage_social_visible = get_theme_mod('social_visible');
get_header(); ?>
<?php
while ( have_posts() ) : the_post();
mazpage_setpostviews(get_the_ID() ); 
?>

  <div class="detail-page">

    <div class="detail-title">
      <h1><?php the_title(); ?></h1>
    </div>

    <div class="detail-meta">
      <div class="post-meta">
        <span class="post-date">
          <?php echo get_the_date(get_option('date_format'));?>
        </span>
        <span class="post-category">
          <?php the_author_posts_link(); ?>
        </span>
      </div>

 <?php if($mazpage_social_visible=="yes") {?>
      <div class="post-dot">
        <span>&#9830;</span>
      </div>
      <div class="detai-social">
        <a data-href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink());?>&p[images][0]=<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" title="<?php _e('Facebook','mazpage');?>" class="share-link facebook">
          <i class="fa fa-facebook-square"></i>
        </a>

        <a data-href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink());?>&amp;text=<?php echo urlencode(get_the_title());?>" title="<?php _e('Twitter','mazpage');?>" class="share-link twitter">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" title="<?php _e('Pinterest','mazpage');?>" class="share-link pinterest">
          <i class="fa fa-pinterest"></i>
        </a>
        <a data-href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink());?>" title="<?php _e('Google+','mazpage');?>" class="share-link google">
          <i class="fa fa-google-plus-square"></i>
        </a>
      </div>
<?php }?>
    </div>

    <div class="post-thumbnail post-thumbnail-large">
      <?php if (has_post_format( 'audio' ) ) { ?>
      <div class="sound">
        <?php $mazpage_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
        <?php if(wp_oembed_get( $mazpage_audio )) : ?>
          <?php echo wp_oembed_get($mazpage_audio); ?>
        <?php else : ?>
          <?php echo wp_kses_post( $mazpage_audio ); ?>
        <?php endif; ?>
      </div>
      <?php } elseif ( has_post_format( 'video' ) ) { ?>
      <div class='embed-container'>
        <?php $mazpage_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
        <?php if(wp_oembed_get( $mazpage_video )) : ?>
          <?php echo wp_oembed_get($mazpage_video); ?>
        <?php else : ?>
          <?php echo wp_kses_post( $mazpage_video ); ?>
        <?php endif; ?> 
      </div>
      <?php } elseif ( has_post_format( 'gallery' ) ) { ?>

      <?php $mazpage_gallery = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>    
      <?php if($mazpage_gallery) : ?>
        <div class="swiper-gallery">
          <div class="swiper-next">
            <?php echo esc_html("NEXT","mazpage"); ?>
          </div>
          <div class="swiper-prev">
            <?php echo esc_html("PREV","mazpage"); ?>
          </div>
          <div class="swiper-wrapper">
            <?php foreach($mazpage_gallery as $image) : ?>                          
              <?php $the_image = wp_get_attachment_image_src( $image, 'mazpage_landscape' ); ?>
              <div class="swiper-slide">
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
               <div  <?php  post_class(); ?>>
              <article class="detail" >

                <?php the_content(); 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mazpage' ),
				'after'  => '</div>',
			) );
                ?>
                  
                   <div class="clearfix"></div>
              </article>
               </div>
              <!---->
              <?php 
// If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;
              ?>
            </div>
            <!--colright-->
            <div class="colright">
              <?php get_sidebar(); ?>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <?php
endwhile; // End of the loop.
?>
<?php
get_footer();

