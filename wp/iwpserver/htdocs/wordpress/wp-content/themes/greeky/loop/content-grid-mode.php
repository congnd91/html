<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/

?>
<div class="grid-item">
    <article class="news-item-big">
        <?php if(has_post_thumbnail()){  ?>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_landscape');  ?>
        <div class="post-thumb">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_format( 'audio' ) ) { ?>
                <span class="post-format"> <i class="fa fa-music"></i></span>
                <?php } elseif ( has_post_format( 'video' ) ) { ?>
                <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                <span class="post-format"> <i class="fa fa-camera"></i></span>
                <?php } ?>
                <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
            </a>
        </div>
        <?php }  ?>
        <h3 class="post-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>
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
        <div class="post-des  dropcap">
            <p>
                <?php echo(get_the_excerpt()); ?>
            </p>
        </div>

    </article>
</div>
