<?php
/**
* Template part for displaying posts
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/

?>

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="post-item">
            <div class="post-meta">
                <span class="post-category">
                      <?php the_category( '<em>-</em>' ); ?>
                        </span>
                <?php if (has_post_format( 'audio' ) ) { ?>
                <span class="post-format"> <i class="fa fa-music"></i></span>
                <?php } elseif ( has_post_format( 'video' ) ) { ?>
                <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                <span class="post-format"> <i class="fa fa-camera"></i></span>
                <?php } ?>
            </div>
            <a href="<?php the_permalink(); ?>">

                <?php if(has_post_thumbnail()){  ?>
                <?php  $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>

                <div class="post-img">
                    <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                    <div class="pi-overlay">
                    </div>
                    <div class="pi-des">
                        <p>
                            <?php echo(get_the_excerpt()); ?>
                        </p>
                    </div>
                </div>
                <?php } ?>
                <h2>
                    <?php the_title(); ?>
                </h2>
            </a>
        </div>
    </div>
