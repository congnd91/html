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


    <div class="sb-relate">
        <h2>Related Stories</h2>


        <div class="row">
            <?php while ($my_query->have_posts()):
        $my_query->the_post();?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="relate-item">
                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                    <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                    <?php } ?>
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?> </a>
                    </h3>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <?php endif; endif; endif; wp_reset_postdata();  ?>
