<?php
/*
Template Name:Post Full Width Special
Template Post Type: post
*
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/
$mazpage_author_visible = get_theme_mod('author_visible');
$mazpage_social_visible = get_theme_mod('social_visible');
$mazpage_counter_visible = get_theme_mod('counter_visible');
get_header(); ?>
<?php
while ( have_posts() ) : the_post();
mazpage_setpostviews(get_the_ID() ); 
?>

<!--cols-->

<div class="cols cols-full">
<!--colleft-->
<div class="colleft">
 <div class="article-fullpage">
                    <div class="article-bar">
                      <span class="post-date">
<?php echo get_the_date(get_option('date_format'));?>
</span>

 <?php if($mazpage_social_visible=="yes") {?>
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

                <h1><?php the_title(); ?></h1>
                

                    <div class="sapo">
                         <p><?php echo(get_the_excerpt()); ?></p>
                    </div>
                    <div class="post-content text-justify">
                        <?php the_content(); ?>
                               <?php wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html( 'Pages:', 'mazpage' ),
          'after'  => '</div>',
          ) );
          ?>
           <div class="clearfix"></div>
                    </div>

                </div>
<!---->
<div class="detail-bottom">
                <?php if( has_tag() ) {  ?>

                <div class="single-tag single-info">
                  <p class="caption"><span> <?php echo esc_html("Tags Cloud","mazpage") ?> </span> </p>
                  <div class="tags">
                    <?php echo the_tags( '', ' ' ); ?>
                  </div>

                </div>

                <?php }  ?>
                <div class="row">
                <?php if($mazpage_counter_visible=="yes") {?>
                  <div class="col-md-6 col-sm-12">
                    <div class="single-info">
                      <p class="caption"><span> <?php echo esc_html("Rating","mazpage") ?></span> </p>
                      <div class="single-rating">
                        <div class="rating-item">
                          <strong> <?php echo esc_attr(mazpage_getpostviews(get_the_ID())); ?>
                          </strong>
                          <span><?php echo esc_html("VIEWS","mazpage") ?></span>
                        </div>
                        <div class="rating-item">
                          <strong> <?php echo  esc_attr(get_comments_number()); ?> </strong>
                          <span><?php echo esc_html("COMMENTS","mazpage") ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }?>
                   <?php if($mazpage_social_visible=="yes") {?>

                  <div class="col-md-6 col-sm-12">
                    <div class="single-info">
                      <p class="caption"><span> <?php echo esc_html("Share To","mazpage") ?></span> </p>
                      <div class="single-share">
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
                    </div>
                  </div>
                    <?php }?>
                </div>
              </div>
<?php if($mazpage_author_visible=="yes") {?>
              <div class="author-single">

                <div class="author-single-inner">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' ), 140 ); ?>

                  <h3 class="title"><?php the_author_posts_link(); ?></h3>
                  <p><?php the_author_meta( 'description' ); ?></p>
                  <div class="clearfix"></div>
                </div>
              </div>
                 <?php }?>
<!--related-post-->
<?php 
get_template_part( 'template/related_posts' ); ?>
<?php 
// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) :
comments_template();
endif;
?>
</div>
<!--colright-->
<div class="clearfix"></div>
</div>
<?php
endwhile; // End of the loop.
?>
<?php
get_footer();
