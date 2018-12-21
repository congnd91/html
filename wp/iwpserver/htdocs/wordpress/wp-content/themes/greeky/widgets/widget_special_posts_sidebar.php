<?php
/************************************************************
Plugin Name:   Greeky - Special Posts 
Description:   Display special  posts in sidebar
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_special_posts');
function greeky_register_widget_special_posts(){
	register_widget('greeky_widget_special_posts');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_special_posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'greeky_widget_special_posts',
			'Greeky - Special Posts ',
			array( 'description' => esc_html('Display special  posts in sidebar','greeky'))
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
<!--home-slider-->
<?php  if ($greeky_thumbsposts->have_posts() ) { ?>

<!--box-->
<div class="box">
    <div class="box-caption">
        <h2><span>
                <?php echo esc_attr($title);?></span></h2>
    </div>
    <div class="box-special">
        <div class="owl-special-wrap">
            <div class="owl-carousel owl-special">
                <?php while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
                <div>
                    <article class="news-item-big">
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
                            <span class="post-category">
                                <i class="ion-folder"></i>
                                <?php the_category( '<em>-</em>' ); ?>
                            </span>
                        </div>
                    </article>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>

            </div>
        </div>
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
		'title' =>'SPECIAL NEWS',
		'number' =>'5',
		'tag' =>'special'
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
