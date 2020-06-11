<?php
$categories = get_the_category($post->ID);
if ($categories):
    $category_ids = array();
foreach($categories as $individual_category):
    $category_ids[] = $individual_category->term_id;
$args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'showposts'=>3,
    'ignore_sticky_posts'=>1,
    'orderby'=>'rand');
$my_query = new wp_query($args);
endforeach;
if( $my_query->have_posts() ):
    if( is_single() ):?>
<div class="related-post">
    <div class="box-detail-caption">
        <span>
            <?php echo esc_html("YOU MIGHT ALSO LIKE","belsip") ?></span>
    </div>



    <div class="tags-three">
        <div class="row">
            <?php while ($my_query->have_posts()):
        $my_query->the_post();?>
            <div class="col-md-4 col-xs-12">
                <article class="three-item">
                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'belsip_landscape');  ?>
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
                    <?php } ?>
                    <h3 class="post-title"> <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?> </a></h3>

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

                </article>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; endif; endif; wp_reset_postdata();  ?>
