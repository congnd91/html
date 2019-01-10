<?php
/************************************************************
Plugin Name:   Greeky - Big Posts Home 
Description:   Display Big Posts Home 
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_big_posts_home');
function greeky_register_widget_big_posts_home(){
	register_widget('greeky_widget_big_posts_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class greeky_widget_big_posts_home extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'greeky_widget_big_posts_home',
			'Greeky - Big Posts Home',
			array( 'description' => esc_html('Display Big Posts Home','greeky'))
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
<?php  if ($greeky_thumbsposts->have_posts() ) {   $count = 1; ?>
<section class="grid-news">
    <div class="grid-news-inner">
        <?php while ($greeky_thumbsposts->have_posts()) : $greeky_thumbsposts->the_post(); ?>
        <?php if($count==1) { ?>

        <div class="gn-col gn-col1">
            <article class="gn-item">
                <div class="post-meta">
                    <span class="post-category">
                        <?php the_category( '<em>-</em>' ); ?>
                    </span>
                </div>
                <a href="<?php the_permalink(); ?>">

                    <?php if(has_post_thumbnail()){  ?>
                    <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_portrait');  ?>
                    <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                    <?php }  ?>
                    <div class="gn-caption">
                        <p>
                            <?php the_title(); ?>
                        </p>
                    </div>
                </a>
            </article>
        </div>
        <?php }  else { ?>


        <div class="gn-col gn-col2">
            <div class="gn-row">
                <article class="gn-item">
                    <div class="post-meta">
                        <span class="post-category">
                            <?php the_category( '<em>-</em>' ); ?>
                        </span>
                    </div>
                    <a href="<?php the_permalink(); ?>">

                        <?php if(has_post_thumbnail()){  ?>
                        <?php global $post; $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'greeky_landscape');  ?>
                        <img alt="" src="<?php echo esc_url($thumb[0]); ?>" />
                        <?php }  ?>
                        <div class="gn-caption">
                            <p>
                                <?php the_title(); ?>
                            </p>
                        </div>
                    </a>
                </article>
            </div>

        </div>
        <?php } ?>
        <?php  
               $count++;
               endwhile; wp_reset_postdata(); ?>


    </div>
    <div class="clearfix"></div>
</section>


<?php 	}  echo $after_widget; ?>
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
		'title' =>'Big News home',
		'number' =>'3',
		'tag' =>'bignews'
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
