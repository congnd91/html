<?php
/************************************************************
Plugin Name:   MazPage - Slider Home 
Description:   Display Slider by tags
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_slider_home');
function mazpage_register_widget_slider_home(){
	register_widget('mazpage_widget_slider_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_slider_home extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mazpage_widget_slider_home',
			'MazPage - Slider Home',
			array( 'description' => esc_html('Display Slider by tags','mazpage'))
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

		<!--home-slider-->
		<?php  if ($mazpage_thumbsposts->have_posts() ) { ?>

<div class="home-slider">
                    <div class="swiper-home">
                        <div class="swiper-next">
                        <?php echo esc_html("NEXT","mazpage"); ?>
                        </div>
                        <div class="swiper-prev">
                            <?php echo esc_html("PREV","mazpage"); ?>
                        </div>
                        <div class="swiper-wrapper">
                         <?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                            <div class="swiper-slide">
                                <article class="big-sticky-post">
                                    <div class="post-meta">
                                        <span class="post-date">
                                            JUNE 01,  2017
                                        </span>
                                        <span class="post-category">
                                            <a href="#">The World</a>
                                        </span>
                                    </div>
                                     <?php if(has_post_thumbnail()){  ?>
							<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>  <div class="ciz-thumb">
							        <a href="<?php the_permalink(); ?>">
                                      <img alt ="" src="<?php echo esc_url($thumb[0]); ?>"  />
                                      </a>
                                      </div>
							<?php }  ?>
                                    <h1>
                                       <a href="<?php the_permalink(); ?>">	<?php the_title(); ?>.</a>
                                    </h1>
                                    <div class="post-des">
                                         <p><?php echo(get_the_excerpt()); ?></p>
                                    </div>
                                </article>
                            </div>
                            	<?php endwhile; wp_reset_postdata(); ?>
                            

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            
            <?php } ?>
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
		'title' =>'HOME SLIDE',
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