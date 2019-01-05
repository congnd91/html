<?php
/************************************************************
Plugin Name:   Greeky - Breaking News
Description:   Display Posts Breaking News
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_breaking_news');
function greeky_register_widget_breaking_news(){
	register_widget('greeky_widget_breaking_news');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_breaking_news extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'greeky_widget_breaking_news',
			'Greeky - Breaking News',
			array( 'description' => esc_html('Display Posts Breaking News','greeky'))
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
	$tag = $instance['tag'];
	$number = $instance['number'];
	echo $before_widget;
	?>
<?php $greeky_thumbsposts =  new WP_Query(array(
		'showposts' => $number,
		'tag' => $tag,
		'ignore_sticky_posts' => '1',
		));
		?>
<section class="breaking-news">
    <span class="breaking-news-caption">
        <?php echo esc_attr($title);?>
    </span>
    <div class="owl-breaking-wrap">
        <div class="owl-carousel  owl-breaking">
            <?php while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
            <div>
                <p>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>.</a>
                </p>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php  echo $after_widget; ?>
<?php 
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
	$instance  = $old_instance;
	$instance['title'] = $new_instance['title'];
	$instance['tag'] = $new_instance['tag'];
	$instance['number'] = $new_instance['number'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'BEAKING NEWS',
		'number' =>'5',
		'tag' =>'breaking news'
		);
	$instance = wp_parse_args($instance, $default);
	?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('tag')); ?>">
        <?php echo esc_html("Tag ","greeky"); ?></label>
    <input type="tag" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('tag')); ?>" name="<?php echo esc_attr($this->get_field_name('tag')); ?>" value="<?php echo esc_attr($instance['tag']); ?>" />
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
