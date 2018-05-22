<?php
/************************************************************
Plugin Name: MazPage - Social Icons Footer
Description:   Display social network icons 
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_social_footer');
function mazpage_register_widget_social_footer(){
    register_widget('mazpage_widget_social_footer');}
/*
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class mazpage_widget_social_footer extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_social_footer',
            'MazPage - Social Icons Footer',
            array( 'description' =>  esc_html('Display social network icons','mazpage'))
            );
    }
/**
* Display the widget
*/
function widget($args, $instance)
{
    extract($args);
    global $post;
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $google = $instance['google'];
    $youtube = $instance['youtube'];
    $pinterest = $instance['pinterest'];
    echo $before_widget;
    ?>

    <div class="social-footer">
        <a href="<?php echo esc_url($facebook); ?>"  title="Facebook" class="facebook">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="<?php echo esc_url($twitter); ?>" class="twitter" title="Twitter">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="<?php echo esc_url($google); ?>" class="google" title="Google Plus">
            <i class="fa fa-google"></i>
        </a>
        <a href="<?php echo esc_url($pinterest); ?>" class="pinterest" title="Pinterest">
            <i class="fa fa-pinterest-p"></i>
        </a>
        <a href="<?php echo esc_url($youtube); ?>" class="youtube" title="Youtube Channel">
            <i class="fa fa fa-youtube"></i>
        </a>
    </div>

    <?php  echo $after_widget; ?>
    <?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['facebook'] = $new_instance['facebook'];
    $instance['twitter'] = $new_instance['twitter'];
    $instance['google'] = $new_instance['google'];
    $instance['youtube'] = $new_instance['youtube'];
    $instance['pinterest'] = $new_instance['pinterest'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'facebook' =>'',
        'twitter' =>'',
        'google' =>'',
        'youtube' =>'',
        'pinterest' =>'',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('facebook')); ?>"> <?php echo esc_html("Facebook Link ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php echo esc_html("Twitter Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php echo esc_html("Google Plus Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" value="<?php echo esc_attr($instance['google']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php echo esc_html("Pinterest Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($instance['pinterest']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php echo esc_html("Youtube Channel Link ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($instance['youtube']); ?>" />
    </p>
    <?php
}
}
?>