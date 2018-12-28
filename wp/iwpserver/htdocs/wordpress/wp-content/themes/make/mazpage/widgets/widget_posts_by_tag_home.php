<?php
/************************************************************
Plugin Name:   MazPage -  Posts By Tag Home Page
Description:   Display posts by tags in Home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_posts_by_tag_home');
function mazpage_register_widget_posts_by_tag_home(){
	register_widget('mazpage_widget_posts_by_tag_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_posts_by_tag_home extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'mazpage_widget_posts_by_tag_home',
			'MazPage - Posts By Tag Home Page',
			array( 'description' => esc_html('Display  Posts By Tag In Home Page','mazpage'))
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
  $tag=  $instance['tag'];
  $number = $instance['number'];
	echo $before_widget;
	?>
	<?php $mazpage_thumbsposts =  new WP_Query(array(
    'showposts' => $number,
    'tag' => $tag,
    'ignore_sticky_posts' => '1',
    ));
    ?>


  <!--hightlight news-->
                <div class="tag-news-caption">
                    <p class="fixtext"><?php echo esc_attr($title);?></p>
                </div>
                <div class="tags-three">
                    <div class="row">
                      <?php while ($mazpage_thumbsposts->have_posts()) : $mazpage_thumbsposts->the_post(); ?>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <article class="ciz-post">
                                 <?php if(has_post_thumbnail()){  ?>
							<?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'mazpage_landscape');  ?>
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
                                   <a href="<?php the_permalink(); ?>">	<?php the_title(); ?>.</a>
                                </h3>
                                <div class="post-meta">
                                   <span class="post-date">
                                <?php echo get_the_date(get_option('date_format'));?>
                                </span>
                                  
                                   <span class="post-category">
                                 <?php the_category( '<em>-</em>' ); ?>
                                </span>
                                </div>
                                <div class="post-des">
                                      <p><?php echo(get_the_excerpt()); ?></p>
                                </div>
                            </article>
                        </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>


  <!--Latest posts-->
         
           

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
		'title' =>'#HIGHLIGHTS NEWS',
		'number' =>'3',
    'tag' =>'highlight'
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