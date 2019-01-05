<?php
/************************************************************
Plugin Name:   Greeky - Post By Category In Home Page
Description:   Display  posts by category in Home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_category_home');
function greeky_register_widget_category_home(){
    register_widget('greeky_widget_category_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_category_home extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'greeky_widget_category_home',
            'Greeky - Posts By Category In Home Page',
            array( 'description' => esc_html('Display  posts by category in home page','greeky'))
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
<?php $greeky_thumbsposts =  new WP_Query(array(
        'showposts' =>$number,
        'cat'=>$category,
        ));
        $count = 1;?>
<!--box-->
<div class="box">
    <div class="box-caption">
        <h2><a>
                <?php if (get_cat_name($category)) echo esc_attr(get_cat_name($category));else echo esc_html("uncategorized") ;?> </a></h2>
    </div>

    <?php if($style=="one_post_large_style_1") { ?>
    <?php   while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
    <?php if($count==1) { ?>


    <div class="row row-fix">
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
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
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
            <ul class="list-news list-news-right">
                <?php } else {?>
                <li>
                    <?php if(has_post_thumbnail()){  ?>
                    <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_small');  ?>
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
                    <h3> <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a></h3>
                </li>
                <?php } ?>
                <?php  $count++;
                 endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>

    <?php } elseif($style=="one_post_large_style_2") { ?>

    <?php   while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
    <?php if($count==1) { ?>

    <div class="row row-fix">
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">
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
            </article>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 col-fix">

            <div>
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
                <div class="post-des ">
                    <p>
                        <?php echo(get_the_excerpt()); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <ul class="list-news list-news-two">
        <?php } else {?>
        <li>
            <?php if(has_post_thumbnail()){  ?>
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_small');  ?>
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
            <h3> <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a></h3>
        </li>
        <?php } ?>
        <?php  $count++;
                 endwhile; wp_reset_postdata(); ?>
    </ul>
    <div class="clearfix"></div>



    <?php } elseif($style=="all_post_large") { ?>
    <div class="grid-outer">
        <div class="grid">
            <?php   while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>

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


            <?php  $count++;
                 endwhile; wp_reset_postdata(); ?>

        </div>
    </div>

    <?php } elseif($style=="post_slider") { ?>
    <div class="owl-category-wrap">
        <div class="owl-carousel  owl-category">
            <?php   while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
            <div>
                <article>
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
                    <div class="owl-category-caption">
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

                    </div>

                </article>
            </div>
            <?php  $count++;
                 endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
    <?php } ?>
</div>
<?php  echo $after_widget; ?>
<?php }
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
    <label for="<?php echo esc_attr($this->get_field_id('category')); ?>">
        <?php echo esc_html("Choose Category ","greeky"); ?></label>
    <select id="<?php echo esc_attr($this-> get_field_id('category')); ?>" class="widefat categories" style="width:100%;" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
        <?php $category = get_categories('hide_empty=0&depth=1&type=post');  ?>
        <?php foreach ($category as $category ) { ?>
        <option value='<?php echo esc_attr($category->term_id); ?>' <?php if ($category->term_id == $instance['category']) echo esc_html('selected="selected"') ; ?>>
            <?php echo esc_attr($category->cat_name);  ?>
        </option>
        <?php } ?>
    </select>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('style')); ?>">
        <?php echo esc_html("Choose Style ","greeky"); ?></label>
    <select id="<?php echo esc_attr($this-> get_field_id('style')); ?>" class="widefat categories" style="width:100%;" name="<?php echo esc_attr($this->get_field_name('style')); ?>">
        <option value='one_post_large_style_1' <?php selected('one_post_large_style_1', $instance['style']); ?> >
            One posts large 1
        </option>
        <option value='one_post_large_style_2' <?php selected('one_post_large_style_2', $instance['style']); ?>>
            One posts large style 2
        </option>
        <option value='all_post_large' <?php selected('all_post_large', $instance['style']); ?>>
            All posts large
        </option>

        <option value='post_slider' <?php selected('post_slider', $instance['style']); ?>>
            Posts slider
        </option>
    </select>
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
        <?php echo esc_html("Number of Posts ","greeky"); ?></label>
    <input type="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
</p>

<?php
}
}
?>
