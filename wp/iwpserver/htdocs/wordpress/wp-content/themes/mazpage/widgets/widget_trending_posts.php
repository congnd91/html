<?php
/************************************************************
Plugin Name:   MazPage - Trending Posts
Description:   Display trending posts
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_trending_posts');
function mazpage_register_widget_trending_posts(){
	register_widget('mazpage_widget_trending_posts');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_trending_posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mazpage_widget_trending_posts',
			'MazPage - Trending Posts',
			array( 'description' => esc_html('Display trending posts','mazpage'))
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
	<?php $mazpage_thumbsposts =  new WP_Query(array(
		'showposts' => $number,
		'meta_key' => 'post_views_count',
		'orderby' => 'meta_value_num',
		'ignore_sticky_posts' => 1,
		'order' => 'DESC',
		));
	$count = 1;
	?>
	<!--box trending-->
	<div class="col-caption">
		<span> 	<?php echo esc_attr($title);?></span>
	</div>
	<div class="box-trending">
		<?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post();
		global $post;
		if($count==1) {
			?>
			<article class="trending-item">

				<?php if(has_post_thumbnail()){  ?>
				<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
				<div class="post-thumb">
					<a href="<?php the_permalink(); ?>">
						<span class="post-format">
							<i class="fa fa-camera"></i>
						</span>
						<img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
					</a>
				</div>
				<?php }  ?>
				<h3>  <a href="<?php the_permalink(); ?>">	<?php the_title(); ?></a></h3>
				</article>
				<ul class="list-trending">
					<?php   } else {
						?>
						<li>
							<?php if(has_post_thumbnail()){  ?>
							<div class="post-thumb">

								<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_small');  ?>
								<img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
							</div>
							<?php }  ?>
							<h3 class="post-title">  <a href="<?php the_permalink(); ?>">	<?php the_title(); ?></a></h3>
							</li>

							<?php }
							$count++;
							?>
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
	$instance['number'] = $new_instance['number'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'TRENDING',
		'number' =>'5',
		);
	$instance = wp_parse_args($instance, $default);
	?>
	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html("Title ","mazpage"); ?></label>
		<input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('number')); ?>"> <?php echo esc_html("Number of Posts ","mazpage"); ?></label>
		<input type ="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
	</p>
	<?php
}
}
?>