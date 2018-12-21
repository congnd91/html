<?php
/************************************************************
Plugin Name:   Greeky - Tab Posts
Description:   Display posts (Latest, popular, random) in sidebar
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_tab_posts');
function greeky_register_widget_tab_posts(){
	register_widget('greeky_widget_tab_posts');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_tab_posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'greeky_widget_tab_posts',
			'Greeky - Tab Posts',
			array( 'description' => esc_html('Display posts (Latest, popular, random) in sidebar','greeky'))
			);
	}
/**
* Display the widget
*/
function widget($args, $instance)
{
	extract($args);
	global $post;
	$title = $instance['title'];
	$number = $instance['number'];
	echo $before_widget;
	?>
<?php
//Random posts
	$greeky_random_posts =  new WP_Query(array(
		'showposts' => $number,
		'orderby' => 'rand',
		'ignore_sticky_posts' => '1',
		));

//Latest posts
	$greeky_latest_posts =  new WP_Query(array(
		'showposts' => $number,
		'post__not_in' => get_option( 'sticky_posts' ), 
		));
//Popular posts
$greeky_popular_posts =  new WP_Query(array(
                    'showposts' => $number,
                    'orderby' => 'comment_count',
                    'order' => 'DESC',
                    'ignore_sticky_posts' => '1',
                    ));
		?>


<div class="box">
    <div class="tab-caption">
        <ul role="tablist">
            <li class="active">
                <a href="#tab1" role="tab" data-toggle="tab">
                    <?php echo esc_html("LATEST","greeky"); ?>
                </a>
            </li>
            <li>
                <a href="#tab2" role="tab" data-toggle="tab">
                    <?php echo esc_html("POPULAR","greeky"); ?>
                </a>
            </li>

            <li>
                <a href="#tab3" role="tab" data-toggle="tab">
                    <?php echo esc_html("RANDOM","greeky"); ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab1">
            <ul class="list-news list-news-right">
                <?php while ($greeky_latest_posts->have_posts()) : $greeky_latest_posts->the_post(); ?>
                <li>
                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_small');  ?>
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                        </a>
                    </div>
                    <?php }  ?>

                    <h3 class="post-title"> <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>.</a></h3>
                    <div class="clearfix"></div>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane " id="tab2">
            <ul class="list-news list-news-right">
                <?php while ($greeky_popular_posts->have_posts()) : $greeky_popular_posts->the_post(); ?>
                <li>
                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_small');  ?>
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                        </a>
                    </div>
                    <?php }  ?>

                    <h3 class="post-title"> <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>.</a></h3>
                    <div class="clearfix"></div>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
        <div role="tabpanel" class="tab-pane " id="tab3">
            <ul class="list-news list-news-right">
                <?php while ($greeky_random_posts->have_posts()) : $greeky_random_posts->the_post(); ?>
                <li>
                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_small');  ?>
                    <div class="post-thumb">
                        <a href="<?php the_permalink(); ?>">
                            <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                        </a>
                    </div>
                    <?php }  ?>

                    <h3 class="post-title"> <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>.</a></h3>
                    <div class="clearfix"></div>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>
<?php  echo $after_widget; ?>
<?php
		}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
	$instance  = $old_instance;
	$instance['title'] = $new_instance['title'];
	$instance['number'] = $new_instance['number'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'POSTS TAB',
		'number' =>'5',
		);
	$instance = wp_parse_args($instance, $default);
	?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
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
