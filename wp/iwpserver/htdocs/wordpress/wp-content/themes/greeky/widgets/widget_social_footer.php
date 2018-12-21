<?php
/************************************************************
Plugin Name: Greeky - Social Icons Footer
Description:   Display social network icons in footer 
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_social_footer');
function greeky_register_widget_social_footer(){
    register_widget('greeky_widget_social_footer');}
/*
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class greeky_widget_social_footer extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'greeky_widget_social_footer',
            'Greeky - Social Icons Footer',
            array( 'description' =>  esc_html('Display social network icons in footer ','greeky'))
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
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $google = $instance['rss'];
    $youtube = $instance['youtube'];
    $instagram = $instance['instagram'];
    $pinterest = $instance['pinterest'];
    $linkedin = $instance['linkedin'];
    echo $before_widget;
    ?>

<ul class="social-company">
    <li>
        <a href="<?php echo esc_url($facebook); ?>" title="Facebook" class="facebook">
            <i class="fa fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo esc_url($twitter); ?>" class="twitter" title="Twitter">
            <i class="fa fa-twitter"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo esc_url($youtube); ?>" class="google" title="Google Plus">
            <i class="fa fa-youtube"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo esc_url(instagram); ?>" class="google" title="Google Plus">
            <i class="fa fa-youtube"></i>
        </a>
    </li>
    <li>

        <a href="<?php echo esc_url(pinterest); ?>" class="google" title="Google Plus">
            <i class="fa fa-youtube"></i>
        </a>
    </li>
    <li>

        <a href="<?php echo esc_url(linkedin); ?>" class="google" title="Google Plus">
            <i class="fa fa-youtube"></i>
        </a>
    </li>
    <li>
        <a href="<?php echo esc_url($rss); ?>" class="youtube" title="RSS">
            <i class="fa fa-rss"></i>
        </a>
    </li>
</ul>

<?php  echo $after_widget; ?>
<?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['facebook'] = $new_instance['facebook'];
    $instance['twitter'] = $new_instance['twitter'];
    $instance['rss'] = $new_instance['google'];
    $instance['youtube'] = $new_instance['youtube'];
    $instance['instagram'] = $new_instance['instagram'];
    $instance['pinterest'] = $new_instance['pinterest'];
    $instance['linkedin'] = $new_instance['linkedin'];
  
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'SOCIAL NETWORK',
        'facebook' =>'',
        'twitter' =>'',
        'rss' =>'',
        'youtube' =>'',
        'instagram' =>'',
        'pinterest' =>'',
        'linkedin' =>'',

        );
    $instance = wp_parse_args($instance, $default);
    ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>">
        <?php echo esc_html("Facebook Link ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr($instance['facebook']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
        <?php echo esc_html("Twitter Link  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>">
        <?php echo esc_html("Instagram Link  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr($instance['instagram']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>">
        <?php echo esc_html("Pinterest Link  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($instance['pinterest']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>">
        <?php echo esc_html("LinkedIn Link  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr($instance['twitter']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>">
        <?php echo esc_html("Youtube Channel Link ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($instance['youtube']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('rss')); ?>">
        <?php echo esc_html("RSS Link  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" value="<?php echo esc_attr($instance['rss']); ?>" />
</p>

<?php
}
}
?>
