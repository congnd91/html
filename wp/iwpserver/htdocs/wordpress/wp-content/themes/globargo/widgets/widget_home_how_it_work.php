<?php
/************************************************************
Plugin Name: Globargo - Home how it work
Description:   Display how_it_work in home page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'globargo_register_widget_home_how_it_work');
function hrw_enqueue1()
{
  wp_enqueue_style('thickbox');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('thickbox');
  // moved the js to an external file, you may want to change the path
  wp_enqueue_script('hrw', '/wp-content/plugins/upload-image/main.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue1');
function globargo_register_widget_home_how_it_work(){
    register_widget('globargo_widget_home_how_it_work');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class globargo_widget_home_how_it_work extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'globargo_widget_home_how_it_work',
            'Globargo - Home how it work',
            array( 'description' =>esc_html('Display how it work in home page','globargo'))
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
    $image_uri = $instance['image_uri'];
    echo $before_widget;
    ?>
    <section class="section how-it-work" id="how-it-work">
        <div class="container">
            <div class="section-caption">
                <h2>
                    <?php echo esc_attr($title); ?>
                </h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="hiw-img">
                            <img alt="" src=" <?php echo esc_attr($image_uri); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="hiw-des">
                            <?php echo do_shortcode( $content ); ?>
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
    $instance['content'] = $new_instance['content'];
       $instance['image_uri'] = $new_instance['image_uri'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'HOW IT WORKS',
        'content' =>'',
        'image_uri' =>'',
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
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>">
        <?php echo esc_html("Images ","globargo"); ?></label> <br/>
            <input type="text" class="img" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" value="<?php echo esc_attr($instance['image_uri']); ?>" />
            <input type="button" class="select-img" value="Select Image" />
        </p>
        <?php
    }
}
?>
