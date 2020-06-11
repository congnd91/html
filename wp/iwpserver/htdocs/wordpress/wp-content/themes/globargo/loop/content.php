<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package belsip
*/

?>



<article <?php post_class('category-item');?> >
    <div class="row">
        <?php if(has_post_thumbnail()){  ?>
        <?php  $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'belsip_landscape');  ?>
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
            <article class="news-item-big">
                <div class="post-thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_format( 'audio' ) ) { ?>
                        <span class="post-format"> <i class="fa fa-music"></i></span>
                        <?php } elseif ( has_post_format( 'video' ) ) { ?>
                        <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                        <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                        <?php } ?>
                        <img alt="" src="<?php echo esc_url($thumb[0]); ?>" class="img-responsive" />
                    </a>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
            <?php }  else {
        ?>
            <div class="col-md-12 col-xs-12 col-fix">
                <?php }?>
                <div>
                    <h3 class="post-title"><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?></a></h3>
                    <div class="post-meta">
                        <span class="post-date">
                            <i class="ion-ios-clock">
                            </i>
                            <?php echo get_the_date(get_option('date_format'));?>
                        </span>
                        <span class="post-category">
                            <i class="ion-folder"></i>
                            <?php the_category( '<em>-</em>' ); ?>
                        </span>
                    </div>
                    <div class="post-des">
                        <p>
                            <?php echo(get_the_excerpt()); ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
</article>
