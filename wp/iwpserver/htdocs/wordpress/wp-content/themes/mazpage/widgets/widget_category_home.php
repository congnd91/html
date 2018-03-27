<?php
/************************************************************
Plugin Name:   MazPage - Post By Category In Home Page
Description:   Display  posts by category
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_category_home');
function mazpage_register_widget_category_home(){
    register_widget('mazpage_widget_category_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_category_home extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_category_home',
            'MazPage - Post By Category In Home Page',
            array( 'description' => esc_html('Display  posts by category in home page','mazpage'))
            );
    }
/**
* Display the widget
*/
function widget($args, $instance)
{
    extract($args);
    global $post;
    $category = $instance['category'];
    $style = $instance['style'];
    $number = $instance['number'];

    echo $before_widget;
    ?>
    <?php $mazpage_thumbsposts =  new WP_Query(array(
        'showposts' =>$number,
        'cat'=>$category,
        ));
        $count = 1;?>
        <div class="box-category">
            <div class="col-caption">
                <span> <?php if (get_cat_name($category)) echo esc_attr(get_cat_name($category));else echo esc_html("uncategorized") ;?></span>
            </div>
            <?php if($style=="big_thumnail") { ?>
            <?php   while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                <?php if($count==1) { ?>
                <article class="category-big-post">
                    <?php if(has_post_thumbnail()){  ?>
                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_format( 'audio' ) ) { ?>
                            <span class="post-format"> <i class="fa fa-music"></i></span>
                            <?php } elseif ( has_post_format( 'video' ) ) { ?>
                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                            <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                            <span class="post-format"> <i class="fa fa-camera"></i></span>
                            <?php } ?>
                            <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                        </a>
                    </div>
                    <?php }  ?>
                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="post-meta">
                        <span class="post-date">
                            <?php echo get_the_date(get_option('date_format'));?>
                        </span>
                        <span class="post-category">
                            <?php the_author_posts_link(); ?>
                        </span>
                    </div>

                    <div class="post-des  dropcap">
                        <p><?php echo(get_the_excerpt()); ?></p>
                    </div>
                </article>
                <div class="three-articles">
                    <div class="row">
                        <?php } else {?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="three-item">
                                <?php if(has_post_thumbnail()){  ?>
                                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_format( 'audio' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-music"></i></span>
                                        <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                        <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                        <?php } ?>
                                        <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                    </a>
                                </div>
                                <?php }  ?>
                                <h3>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </article>
                        </div>
                        <?php } ?>

                        <?php  $count++;
                        endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>

                <?php } elseif($style=="two_columns_style_1") { ?>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php   while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                            <?php if($count==1) { ?>
                            <article class="category-mid-post">
                                <?php if(has_post_thumbnail()){  ?>
                                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_format( 'audio' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-music"></i></span>
                                        <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                        <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                        <?php } ?>
                                        <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                    </a>
                                </div>
                                <?php }  ?>
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <?php echo get_the_date(get_option('date_format'));?>
                                    </span>
                                    <span class="post-category">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </div>

                                <div class="post-des  dropcap">
                                    <p><?php echo(get_the_excerpt()); ?></p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <ul class="category-list-post">
                                <?php } else {?>
                                <li>
                                    <?php if(has_post_thumbnail()){  ?>
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_format( 'audio' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-music"></i></span>
                                            <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                            <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-camera"></i></span>
                                            <?php } ?>
                                            <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                        </a>
                                    </div>
                                    <?php }  ?>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                </li>
                                <?php } ?>
                                <?php  $count++;
                                endwhile; wp_reset_postdata(); ?>
                            </ul>
                        </div>
                    </div>

                    <?php }elseif($style=="two_columns_style_2") {?>
                  <div class="row">
                        <?php   while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                            <?php if($count==1) { ?>

                                <?php if(has_post_thumbnail()){  ?>
 <div class="col-md-6 col-xs-12">

                                <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                  <div class="category-mid-post">
                                <div class="post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_format( 'audio' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-music"></i></span>
                                        <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                        <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                        <span class="post-format"> <i class="fa fa-camera"></i></span>
                                        <?php } ?>
                                        <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                    </a>
                                </div>
                                 </div>
                                </div>
                                 <div class="col-md-6 col-xs-12">
                                <?php }  else { ?>
 <div class="col-md-12 col-xs-12">
                                <?php } ?>
                                  <div class="category-mid-post-two">
                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>
                                <div class="post-meta">
                                    <span class="post-date">
                                        <?php echo get_the_date(get_option('date_format'));?>
                                    </span>
                                    <span class="post-category">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </div>

                                <div class="post-des  dropcap">
                                    <p><?php echo(get_the_excerpt()); ?></p>
                                </div>
                           </div>
                      </div>
                      </div>
                            <ul class="category-list-post category-list-post-two">
                                <?php } else {?>
                                <li>
                                     <div>
                                    <?php if(has_post_thumbnail()){  ?>
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_format( 'audio' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-music"></i></span>
                                            <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                            <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-camera"></i></span>
                                            <?php } ?>
                                            <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                        </a>
                                    </div>
                                    <?php }  ?>
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>
                                     </div>
                                </li>
                                <?php } ?>
                                <?php  $count++;
                                endwhile; wp_reset_postdata(); ?>
                           </ul>
                            <div class="clearfix"></div>

                             <?php }elseif($style=="two_columns_masonry") {?>

                              <div class="grids-outer">
                                <div class="grids">

                                   <?php   while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>

                                    <div class="grids-item">
                                        <article class="ciz-post">
                                           <?php if(has_post_thumbnail()){  ?>
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_format( 'audio' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-music"></i></span>
                                            <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                            <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-camera"></i></span>
                                            <?php } ?>
                                            <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
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
                                        <?php echo get_the_date(get_option('date_format'));?>
                                    </span>
                                    <span class="post-category">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </div>

                                <div class="post-des  dropcap">
                                    <p><?php echo(get_the_excerpt()); ?></p>
                                </div>
                                        </article>
                                    </div>

 <?php      endwhile; wp_reset_postdata(); ?>


                                   <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    <?php }elseif($style=="slider_carousel") {?>
                       <div class="box-review">
                                <div class="swiper-review">
                                    <div class="swiper-next">
                                        NEXT
                                    </div>
                                    <div class="swiper-prev">
                                        PREV
                                    </div>
                                    <div class="swiper-wrapper">

 <?php   while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                                        <div class="swiper-slide">
                                            <article class="review-item">
                                                <?php if(has_post_thumbnail()){  ?>
                                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if (has_post_format( 'audio' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-music"></i></span>
                                            <?php } elseif ( has_post_format( 'video' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-video-camera"></i></span>
                                            <?php } elseif ( has_post_format( 'gallery' ) ) { ?>
                                            <span class="post-format"> <i class="fa fa-camera"></i></span>
                                            <?php } ?>
                                            <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                        </a>
                                    </div>
                                    <?php }  ?>

                                                <div class="review-des">
                                                    <h2>
                                                    <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a></h2>

                                                  <div class="post-meta">
                                    <span class="post-date">
                                        <?php echo get_the_date(get_option('date_format'));?>
                                    </span>
                                    <span class="post-category">
                                        <?php the_author_posts_link(); ?>
                                    </span>
                                </div>
                                                </div>
                                            </article>
                                        </div>
                                         <?php      endwhile; wp_reset_postdata(); ?>

                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>

                            </div>
                    <?php }else {?>

                    <?php } ?>

                </div>
                <?php  echo $after_widget; ?>
                <?php
            }
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['category'] = $new_instance['category'];
    $instance['style'] = $new_instance['style'];
    $instance['number'] = $new_instance['number'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'category' =>'all',
        'style' =>'',
        'number' =>'5',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php echo esc_html("Choose Category ","mazpage"); ?></label>
        <select id="<?php echo esc_attr($this-> get_field_id('category')); ?>" class="widefat categories" style="width:100%;"  name="<?php echo esc_attr($this->get_field_name('category')); ?>">
            <?php $category = get_categories('hide_empty=0&depth=1&type=post');  ?>
            <?php foreach ($category as $category ) { ?>
            <option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['category']) echo esc_html('selected="selected"') ; ?>>
                <?php echo esc_attr($category->cat_name);  ?>
            </option>
            <?php } ?>
        </select>
    </p>
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('style')); ?>"><?php echo esc_html("Choose Style ","mazpage"); ?></label>
        <select id="<?php echo esc_attr($this-> get_field_id('style')); ?>" class="widefat categories" style="width:100%;"  name="<?php echo esc_attr($this->get_field_name('style')); ?>">
            <option value='big_thumnail' <?php selected('big_thumnail', $instance['style']); ?> >
                Big thumnail
            </option>
            <option value='two_columns_style_1' <?php selected('two_columns_style_1', $instance['style']); ?>>
                Two Columns Style 1
            </option>
            <option value='two_columns_style_2' <?php selected('two_columns_style_2', $instance['style']); ?>>
                Two Columns Style 2
            </option>
            <option value='slider_carousel' <?php selected('slider_carousel', $instance['style']); ?>>
                Slider Carousel
            </option>
            <option value='two_columns_masonry' <?php selected('two_columns_masonry', $instance['style']); ?>>
                Two Columns Masonry
            </option>
        </select>
    </p>

    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('number')); ?>"> <?php echo esc_html("Number of Posts ","mazpage"); ?></label>
        <input type ="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
    </p>

    <?php
}
}
?>