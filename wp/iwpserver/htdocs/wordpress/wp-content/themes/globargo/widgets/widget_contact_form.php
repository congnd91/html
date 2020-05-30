<?php
/************************************************************
Plugin Name: belsip - Contact Form
Description:   Display form in contact page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'belsip_register_widget_contact_form');
function belsip_register_widget_contact_form(){
    register_widget('belsip_widget_contact_form');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class belsip_widget_contact_form extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'belsip_widget_contact_form',
            'belsip - Contact Form',
            array( 'description' =>esc_html('Display form in contact page','belsip'))
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
    $description = $instance['description'];
    $shortcode = $instance['shortcode'];
    echo $before_widget;
    ?>


  <h3>
    <?php echo esc_attr($title); ?>
  </h3>
  <?php echo do_shortcode($description); ?>

  <?php echo do_shortcode( $shortcode ); ?>



  <?php  echo $after_widget; ?>
  <?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['description'] = $new_instance['description'];
   $instance['shortcode'] = $new_instance['shortcode'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'Get In Touch',
        'description' =>'',
       'shortcode' =>'',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","belsip"); ?></label>
      <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
      <label for="<?php echo esc_attr($this->get_field_id('description')); ?>">
        <?php echo esc_html("Description","belsip"); ?></label>
      <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_attr($instance['description']); ?></textarea>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('shortcode')); ?>">
        <?php echo esc_html("Contact Form 7 text here","belsip"); ?></label>
      <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('shortcode')); ?>" name="<?php echo esc_attr($this->get_field_name('shortcode')); ?>"><?php echo esc_attr($instance['shortcode']); ?></textarea>
    </p>


    <?php
    }
}
?>
