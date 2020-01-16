<?php
/************************************************************
Plugin Name:   Greeky - Popular Posts 
Description:   Display popular post in sidebar
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_popular_posts');
function greeky_register_widget_popular_posts(){
	register_widget('greeky_widget_popular_posts');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_popular_posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'greeky_widget_popular_posts',
			'Greeky - Popular Posts ',
			array( 'description' => esc_html('Display popular post in sidebar','greeky'))
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
<?php $greeky_thumbsposts =  new WP_Query(array(
			  'showposts' => $number,
                    'orderby' => 'comment_count',
                    'order' => 'DESC',
                    'ignore_sticky_posts' => '1',
        
		));
		?>
<!--home-slider-->
<?php  if ($greeky_thumbsposts->have_posts() ) { ?>

<!--box-->

<div class="box-caption">
    <h2><span>
            <?php echo esc_attr($title);?></span></h2>
</div>
<ul class="list-news list-news-right list-news-meta">

    <?php while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
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
    </li>
    <?php endwhile; wp_reset_postdata(); ?>

</ul>




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
	
	$instance['number'] = $new_instance['number'];
	return $instance;
}
/* Widget form*/
function form($instance){
	$default = array(
		'title' =>'POPULAR NEWS',
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
