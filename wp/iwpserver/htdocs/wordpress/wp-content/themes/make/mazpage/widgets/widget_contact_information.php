<?php
/************************************************************
Plugin Name: MazPage - Contact Information
Description:   Display information in contact page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_contact_information');
function mazpage_register_widget_contact_information(){
    register_widget('mazpage_widget_contact_information');}
/**
* mazpage_widget_contact_information class.
* This class handles everything that needs to be handled with the widget:
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class mazpage_widget_contact_information extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_contact_information',
            'MazPage - Contact Information',
            array( 'description' => esc_html('Display information in contact page','mazpage'))
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
    $address = $instance['address'];
    $email = $instance['email'];
    $phone = $instance['phone'];
    $time = $instance['time'];

    echo $before_widget;
    ?>
        <h3>
            <?php echo  esc_attr($title); ?> 
        </h3>
        <p> <?php echo esc_attr($description); ?></p>

        <ul class="list-infomation">

            <li><p> <i class="fa fa-building"></i>  <?php echo esc_attr($address); ?> </p></li>
            <li><p><i class="fa fa-envelope"></i>     <?php echo esc_attr($email); ?> </p></li>
            <li><p> <i class="fa fa-mobile"></i>   <?php echo esc_attr($phone); ?> </p></li>
            <li><p> <i class="fa fa-clock-o"></i>  <?php echo esc_attr($time ); ?> </p></li>
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
    $instance['description'] = $new_instance['description'];
    $instance['address'] = $new_instance['address'];
    $instance['email'] = $new_instance['email'];
    $instance['phone'] = $new_instance['phone'];
    $instance['time'] = $new_instance['time'];

    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'CONTACT INFORMATION',
        'description' =>'',
        'address' =>'',
        'email' =>'',
        'phone' =>'',
        'time' =>'',

        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('title')) ; ?>"><?php echo esc_html("Title ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')) ; ?>" name="<?php echo esc_attr($this->get_field_name('title')) ; ?>" value="<?php echo esc_attr($instance['title']) ; ?>" />
    </p>

    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('description')); ?>"> <?php echo esc_html("Desctiption ","mazpage"); ?></label>
        <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_attr($instance['description']); ?></textarea>
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('address')); ?>"> <?php echo esc_html("Address ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('email')); ?>"> <?php echo esc_html("Email ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('phone')) ; ?>"> <?php echo esc_html("Phone ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('phone')) ; ?>" name="<?php echo esc_attr($this->get_field_name('phone')) ; ?>" value="<?php echo esc_attr($instance['phone']) ; ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('time')) ; ?>"><?php echo esc_html("Time Open Hours  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('time')) ; ?>" name="<?php echo esc_attr($this->get_field_name('time')) ; ?>" value="<?php echo esc_attr($instance['time']) ; ?>" />
    </p>
    <?php
}
}
?>