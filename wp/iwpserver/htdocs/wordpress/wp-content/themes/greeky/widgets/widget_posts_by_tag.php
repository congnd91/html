<?php
/************************************************************
Plugin Name:   MazPage - Posts By Tag
Description:   Display posts by tags
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_post_by_tag');
function mazpage_register_widget_post_by_tag(){
	register_widget('mazpage_widget_post_by_tag');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_post_by_tag extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mazpage_widget_post_by_tag',
			'MazPage - Posts By Tag',
			array( 'description' => esc_html('Display posts by tags','mazpage'))
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
	<?php $mazpage_thumbsposts =  new WP_Query(array(
		'showposts' => $number,
		'tag' => $tag,
		'ignore_sticky_posts' => '1',
		));
		?>
		<!--box post by tags-->
		<div class="col-caption">
			<span>  <?php echo esc_attr($title);?></span>
		</div>
		<div class="box-news-by-tags">
			<ul>
				<?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
					<li>
						<p>  <a href="<?php the_permalink(); ?>">	<?php the_title(); ?>.</a></p>
					</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
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
	$instance['tag'] = $new_instance['tag'];
	$instance['number'] = $new_instance['number'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'POST BY TAG',
		'number' =>'5',
		'tag' =>'news'
		);
	$instance = wp_parse_args($instance, $default);
	?>
	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html("Title ","mazpage"); ?></label>
		<input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('tag')); ?>"> <?php echo esc_html("Tag ","mazpage"); ?></label>
		<input type ="tag" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('tag')); ?>" name="<?php echo esc_attr($this->get_field_name('tag')); ?>" value="<?php echo esc_attr($instance['tag']); ?>" />
	</p>

	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('number')); ?>"> <?php echo esc_html("Number of Posts ","mazpage"); ?></label>
		<input type ="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
	</p>
	<?php
}
}
?>