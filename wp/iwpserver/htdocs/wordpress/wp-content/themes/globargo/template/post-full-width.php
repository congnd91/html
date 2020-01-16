<?php
/*
Template Name:Post Full Width 
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
<div class="cols cols-full">
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

                    <?php if( has_post_thumbnail () ) :
                            the_post_thumbnail();
                             endif; ?>

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
                <div class="shares">
                    <div class="box-detail-caption">
                        <span>
                            <?php echo esc_html("Share To","greeky") ?> </span>
                    </div>
                    <div class="share-content">
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

    <div class="clearfix"></div>
</div>
<?php
endwhile; // End of the loop.
?>
<?php
get_footer();
