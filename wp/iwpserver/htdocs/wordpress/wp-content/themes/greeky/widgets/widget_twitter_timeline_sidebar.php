<?php
/************************************************************
Plugin Name: Greeky - Twitter Timeline 
Description:   Display twitter timeline in sidebar
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_twitter_timeline');
function greeky_register_widget_twitter_timeline(){
    register_widget('greeky_widget_twitter_timeline');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class greeky_widget_twitter_timeline extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'greeky_widget_twitter_timeline',
            'Greeky - Twitter Timeline ',
            array( 'description' =>esc_html('Display twitter timeline in sidebar','greeky'))
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
    $code = $instance['code'];
    echo $before_widget;
    ?>

<!--box-->
<div class="box">
    <div class="box-caption">
        <h2><span>
                <?php echo esc_attr($title);?></span></h2>
    </div>

    <div class="box-twitter">
        <?php echo do_shortcode($code); ?>

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
    $instance['title'] = $new_instance['title'];
    $instance['code'] = $new_instance['code'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'FOLLOW ME',
        'code' =>'',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('code')); ?>">
        <?php echo esc_html("Embed code","greeky"); ?></label>
    <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('code')); ?>" name="<?php echo esc_attr($this->get_field_name('code')); ?>"><?php echo esc_attr($instance['code']); ?></textarea>
</p>


<?php
    }
}
?>
