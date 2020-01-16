<?php
/************************************************************
Plugin Name: Globargo - Home mission
Description:   Display mission in home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'globargo_register_widget_home_mission');


function globargo_register_widget_home_mission(){
    register_widget('globargo_widget_home_mission');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class globargo_widget_home_mission extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'globargo_widget_home_mission',
            'Globargo - Home mission',
            array( 'description' =>esc_html('Display mission in home page','globargo'))
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
    $content = $instance['content'];
  
    echo $before_widget;
    ?>
    <section class="section mission" id="mission">
        <div class="container">
            <div class="section-caption">
                <h2>
                    <?php echo esc_attr($title); ?>
                </h2>
            </div>
            <div class="container">

                <div class="mission-des">
                    <?php echo do_shortcode( $content ); ?> </div>


            </div>
        </div>
    </section>
    <?php  echo $after_widget; ?>
    <?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['content'] = $new_instance['content'];
     
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'mission',
        'content' =>'',
      
        );
    $instance = wp_parse_args($instance, $default);
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
        <?php echo esc_html("Content","globargo"); ?></label>
            <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_attr($instance['content']); ?></textarea>
        </p>

        <?php
    }
}
?>
