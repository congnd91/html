<?php
/************************************************************
Plugin Name:   MazPage - Sticky Post
Description:   Display one sticky post
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_sticky_post');
function mazpage_register_widget_sticky_post(){
	register_widget('mazpage_widget_sticky_post');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_sticky_post extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mazpage_widget_sticky_post',
			'MazPage - Sticky Post',
			array( 'description' => esc_html('Display one sticky post','mazpage'))
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
	echo $before_widget;
	?>
	<?php $mazpage_thumbsposts =  new WP_Query(array(
		 	'posts_per_page' => 1,
			 'post__in'  => get_option( 'sticky_posts'),
            'ignore_sticky_posts' => 1
		));
		?>
		 <!--sticky post-->
		  <?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
		  	 <article class="big-sticky-post">
                    <div class="post-meta">
                          <span class="post-date">
                                   <?php echo get_the_date(get_option('date_format'));?>
                                </span>
                          <span class="post-category">
                                       <?php the_category( ' '); ?>
                                </span>
                    </div>
                   

                    <?php if(has_post_thumbnail()){  ?>
							<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
							 <div class="post-thumb">
                                   <a href="<?php the_permalink(); ?>">
                                      <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                    </a>
                                </div>
							<?php }  ?>

							
                    <h1>
                       <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                            </a>
                    </h1>
                    <div class="post-des">
                        <p><?php echo(get_the_excerpt()); ?></p>
                    </div>
                </article>

        
<?php endwhile; wp_reset_postdata(); ?>
		<?php  echo $after_widget; ?>
		<?php
	}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
	$instance  = $old_instance;
	$instance['title'] = $new_instance['title'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'STICKY POST',
		);
	$instance = wp_parse_args($instance, $default);
	?>
	<p>
		<label for ="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html("Title ","mazpage"); ?></label>
		<input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
	</p>
	<?php
}
}
?>