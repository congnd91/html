<?php
/************************************************************
Plugin Name: Globargo - Home slider
Description:   Display slider in home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'globargo_register_widget_home_slider');
function hrw_enqueue5()
{
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // moved the js to an external file, you may want to change the path
  wp_enqueue_script('hrw', '/wp-content/plugins/upload-image/main.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue5');
function globargo_register_widget_home_slider(){
    register_widget('globargo_widget_home_slider');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class globargo_widget_home_slider extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'globargo_widget_home_slider',
            'Globargo - Home slider',
            array( 'description' =>esc_html('Display slider in home page','globargo'))
            );
    }
/**
* Display the widget
*/
function widget($args, $instance)
{
    extract($args);
    global $post;
    $content = $instance['content'];
    $image_uri = $instance['image_uri'];
    echo $before_widget;
    ?>
    <div class="item">
        <div class="home-slider-item" style="background-image: url(<?php echo esc_attr($image_uri);?>);">
            <div class="slider-caption">
                <div class="container">
                    <div class="sc">
                        <div class="sc-inner">
                            <div class="sc-text">
                                <?php echo do_shortcode( $content ); ?>

                            </div>
                        </div>
                    </div>
                </div>
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
  
    $instance['content'] = $new_instance['content'];
       $instance['image_uri'] = $new_instance['image_uri'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(

        'content' =>'',
        'image_uri' =>'',
        );
    $instance = wp_parse_args($instance, $default);
    ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
        <?php echo esc_html("Content","globargo"); ?></label>
            <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_attr($instance['content']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>">
        <?php echo esc_html("Images ","globargo"); ?></label> <br/>
            <input type="text" class="img" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php echo esc_attr($instance['image_uri']); ?>" />
            <input type="button" class="select-img" value="Select Image" />
        </p>
        <?php
    }
}
?>
