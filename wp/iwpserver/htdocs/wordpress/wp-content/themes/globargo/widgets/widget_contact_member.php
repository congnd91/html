<?php
/************************************************************
Plugin Name: belsipa - Contact Member Infomation
Description:   Display information in contact page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'belsipa_register_widget_contact_member');
function belsipa_register_widget_contact_member(){
    register_widget('belsipa_widget_contact_member');}
/**
* belsipa_widget_contact_member class.
* This class handles everything that needs to be handled with the widget:
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class belsipa_widget_contact_member extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'belsipa_widget_contact_member',
            'belsipa - Contact member',
            array( 'description' => esc_html('Display member in contact page','belsipa'))
            );
    }
/**
* Display the widget
*/
function widget($args, $instance)
{
    extract($args);
    global $post;
    $title = $instance['name'];
    $description = $instance['description'];
    $email_url = $instance['email_url'];
    $email = $instance['email'];
   
    echo $before_widget;
    ?>


  <div class="box">
    <h3>
      <?php echo  esc_attr($name); ?> </h3>
    <p>
      <?php echo esc_attr($description); ?>
    </p>
    <p>
      <a href=" <?php echo esc_attr($email_url); ?>">
        <?php echo esc_attr($email); ?>
      </a>
    </p>
  </div>




  <?php  echo $after_widget; ?>
  <?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['name'] = $new_instance['name'];
    $instance['description'] = $new_instance['description'];
    $instance['email'] = $new_instance['email'];
    $instance['email_url'] = $new_instance['email_url'];
  

    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'name' =>'Florence Devleeschauwer',
        'description' =>'Chairwoman and Board Member',
        'email' =>'devleeschauwer@belsipa.be',
        'email_url' =>'#',

        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('name')) ; ?>">
        <?php echo esc_html("name ","belsipa"); ?></label>
      <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('name')) ; ?>" name="<?php echo esc_attr($this->get_field_name('name')) ; ?>" value="<?php echo esc_attr($instance['name']) ; ?>" />
    </p>


    <p>
      <label for="<?php echo esc_attr($this->get_field_id('description')); ?>">
        <?php echo esc_html("Description ","belsipa"); ?></label>
      <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>" value="<?php echo esc_attr($instance['description']); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">
        <?php echo esc_html("Email ","belsipa"); ?></label>
      <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('email_url')) ; ?>">
        <?php echo esc_html("Email Url","belsipa"); ?></label>
      <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('email_url')) ; ?>" name="<?php echo esc_attr($this->get_field_name('email_url')) ; ?>" value="<?php echo esc_attr($instance['email_url']) ; ?>" />
    </p>

    <?php
}
}
?>
