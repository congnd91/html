<?php
/************************************************************
Plugin Name: MazPage - Social Icons About Page
Description:   Display social network icons 
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_social_about_page');
function mazpage_register_widget_social_about_page(){
    register_widget('mazpage_widget_social_about_page');}
/*
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class mazpage_widget_social_about_page extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_social_about_page',
            'MazPage - Social Icons About Page',
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
    $instagram = $instance['instagram'];
    $pinterest = $instance['pinterest'];
    $linkedin = $instance['linkedin'];
    $soundcloud = $instance['soundcloud'];
    echo $before_widget;
    ?>
  <div class="about-social">
                       <?php if($facebook !="") { ?>
                        <a href="<?php echo esc_url($facebook); ?>">
                            <i class="fa fa-facebook"></i>
                        </a>
                          <?php }?>
                        <?php if($twitter !="") { ?>
                        <a href="<?php echo esc_url($twitter); ?>">
                            <i class="fa fa-twitter"></i>
                        </a>
                           <?php }?>
                        <?php if($google !="") { ?>
                        <a href="<?php echo esc_url($google); ?>">
                            <i class="fa fa-google"></i>
                        </a>
                          <?php }?>
                          <?php if($youtube !="") { ?>
                        <a href="<?php echo esc_url($youtube); ?>">
                            <i class="fa fa-youtube"></i>
                        </a>
                          <?php }?>
                        <?php if($instagram !="") { ?>
                        <a href="<?php echo esc_url($instagram); ?>">
                            <i class="fa fa-instagram"></i>
                        </a>
                           <?php }?>
                        <?php if($pinterest !="") { ?>
                        <a href="<?php echo esc_url($pinterest); ?>">
                            <i class="fa fa-pinterest"></i>
                        </a>
                          <?php }?>
                        <?php if($linkedin !="") { ?>
                        <a href="<?php echo esc_url($linkedin); ?>">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <?php }?>
                        <?php if($soundcloud !="") { ?>
                        <a href="<?php echo esc_url($soundcloud); ?>">
                            <i class="fa fa-soundcloud"></i>
                        </a>
                         <?php }?>
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
    $instance['instagram'] = $new_instance['instagram'];
    $instance['pinterest'] = $new_instance['pinterest'];
    $instance['linkedin'] = $new_instance['linkedin'];
    $instance['soundcloud'] = $new_instance['soundcloud'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'facebook' =>'',
        'twitter' =>'',
        'google' =>'',
        'youtube' =>'',
        'instagram' =>'',
         'pinterest' =>'',
         'linkedin' =>'',
          'soundcloud' =>'',
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
        <label for ="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php echo esc_html("Youtube Channel Link ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($instance['youtube']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php echo esc_html("Instagram  Link ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr($instance['instagram']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php echo esc_html("Pinterest Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($instance['pinterest']); ?>" />
    </p>

     <p>
        <label for ="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php echo esc_html("Linkedin Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr($instance['linkedin']); ?>" />
    </p>

     <p>
        <label for ="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>"><?php echo esc_html("SoundCloud Link  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" value="<?php echo esc_attr($instance['soundcloud']); ?>" />
    </p>
    
    <?php
}
}
?>