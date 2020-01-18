<?php
/************************************************************
Plugin Name: Globargo - Home services
Description:   Display services in home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'globargo_register_widget_home_services');
function hrw_enqueue9()
{
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // moved the js to an external file, you may want to change the path
  wp_enqueue_script('hrw', '/wp-content/plugins/upload-image/main.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue9');
function globargo_register_widget_home_services(){
    register_widget('globargo_widget_home_services');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class globargo_widget_home_services extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'globargo_widget_home_services',
            'Globargo - Home Services',
            array( 'description' =>esc_html('Display services in home page','globargo'))
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
    $title1 = $instance['title1'];
    $description1 = $instance['description1'];
    $title2 = $instance['title2'];
    $description2 = $instance['description2'];
     $title3 = $instance['title3'];
    $description3 = $instance['description3'];
    echo $before_widget;
    ?>
    <section class="section services" id="services">
        <div class="services-inner">

            <div class="container">
                <div class="section-caption">
                    <h2>
                        <?php echo esc_attr($title); ?>
                    </h2>
                </div>
                <div class="container">


                    <div class="owl-carousel owl-services">
                        <div>


                            <div class="service-item">
                                <div class="si-img">
                                    <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon1.png">
                                </div>
                                <h3>
                                    <?php echo esc_attr($title1); ?>
                                </h3>
                                <p>
                                    <?php echo esc_attr($description1); ?>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="service-item">
                                <div class="si-img">
                                    <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon2.png">
                                </div>
                                <h3>
                                    <?php echo esc_attr($title2); ?>
                                </h3>
                                <p>
                                    <?php echo esc_attr($description2); ?>
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="service-item">
                                <div class="si-img">
                                    <img alt="" src="<?php echo get_template_directory_uri(); ?>/images/icon3.png">
                                </div>
                                <h3>
                                    <?php echo esc_attr($title3); ?>
                                </h3>
                                <p>
                                    <?php echo esc_attr($description3); ?>
                                </p>
                            </div>
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
    $instance['title1'] = $new_instance['title1'];
    $instance['description1'] = $new_instance['description1'];
     $instance['title2'] = $new_instance['title2'];
    $instance['description2'] = $new_instance['description2'];
     $instance['title3'] = $new_instance['title3'];
    $instance['description3'] = $new_instance['description3'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'Services',
        'title1' =>'Express',
        'description1' =>'We move goods in optimum conditions with the procedures and security suited to our industry requirements. Our strength are Express Services, same day or next day deliveries, across Europe for all sorts of Consumer Electronics, both road and air depending of the needs for each specific shipment.',
        'title2' =>'Freight',
        'description2' =>'Managing up to 4.000 Kg and multiple pallets per shipments, we can present and coordinate outstanding services for Freight transport with in-depth, expert knowledge of individual geographic trades and markets.',
        'title3' =>'International',
        'description3' =>'On demand, we can also cater services non-EU or international needs including customs clearance leveraging our international network of logistics partners which have been verified and tested and with whom we have been working for many years. With over 27 partners across the world, we count with offices and warehouses in Miami, New York, Singapore, Dubai and Hong Kong.',
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
            <label for="<?php echo esc_attr($this->get_field_id('title1')); ?>">
        <?php echo esc_html("title1 ","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title1')); ?>" name="<?php echo esc_attr($this->get_field_name('title1')); ?>" value="<?php echo esc_attr($instance['title1']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description1')); ?>">
        <?php echo esc_html("description1","globargo"); ?></label>
            <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description1')); ?>" name="<?php echo esc_attr($this->get_field_name('description1')); ?>"><?php echo esc_attr($instance['description1']); ?></textarea>
        </p>


        <br/>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title2')); ?>">
        <?php echo esc_html("title2 ","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title2')); ?>" name="<?php echo esc_attr($this->get_field_name('title2')); ?>" value="<?php echo esc_attr($instance['title2']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description1')); ?>">
        <?php echo esc_html("description2","globargo"); ?></label>
            <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description2')); ?>" name="<?php echo esc_attr($this->get_field_name('description2')); ?>"><?php echo esc_attr($instance['description2']); ?></textarea>
        </p>



        <br/>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title1')); ?>">
        <?php echo esc_html("title3 ","globargo"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title3')); ?>" name="<?php echo esc_attr($this->get_field_name('title3')); ?>" value="<?php echo esc_attr($instance['title3']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('description1')); ?>">
        <?php echo esc_html("description3","globargo"); ?></label>
            <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description3')); ?>" name="<?php echo esc_attr($this->get_field_name('description3')); ?>"><?php echo esc_attr($instance['description3']); ?></textarea>
        </p>

        <?php
    }
}
?>
