<?php
/************************************************************
Plugin Name: Globargo - Home contact
Description:   Display contact in home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'globargo_register_widget_home_contact');
function hrw_enqueue2()
{
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // moved the js to an external file, you may want to change the path
  wp_enqueue_script('hrw', '/wp-content/plugins/upload-image/main.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue2');
function globargo_register_widget_home_contact(){
    register_widget('globargo_widget_home_contact');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class globargo_widget_home_contact extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'globargo_widget_home_contact',
            'Globargo - Home contact',
            array( 'description' =>esc_html('Display contact in home page','globargo'))
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
    $address = $instance['address'];
    $phone = $instance['phone'];
    $email = $instance['email'];
   
    echo $before_widget;
    ?>
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-caption">
                <h2>
                    <?php echo esc_attr($title); ?>
                </h2>
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="contact-item">
                            <div class="ci-img">
                                <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon-map.png">




                            </div>
                            <p>
                                <?php echo esc_attr($address); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="contact-item">
                            <div class="ci-img">
                                <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon-phone.png">
                            </div>
                            <p>
                                <?php echo esc_attr($phone); ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="contact-item">
                            <div class="ci-img">
                                <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon-email.png">
                            </div>
                            <p>
                                <?php echo esc_attr($email); ?>
                            </p>
                        </div>
                    </div>
                </div>



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
    $instance['address'] = $new_instance['address'];
     $instance['phone'] = $new_instance['phone'];
     $instance['email'] = $new_instance['email'];
      
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'contact us',
        'address' =>'West Holywood 500 Los Angeles, USA',
        'phone' =>'+5 000 000 000',
        'email' =>'mail@globargo.com',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>


        <br/>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>">
        <?php echo esc_html("address","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" value="<?php echo esc_attr($instance['address']); ?>" />
        </p>

        <br/>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>">
        <?php echo esc_html("phone","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($instance['phone']); ?>" />
        </p>

        <br/>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">
        <?php echo esc_html("email","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr($instance['email']); ?>" />
        </p>




        <?php
    }
}
?>
