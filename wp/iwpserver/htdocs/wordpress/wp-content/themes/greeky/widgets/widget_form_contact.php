<?php
/************************************************************
Plugin Name: Greeky - Contact Form
Description:   Display form in contact page
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_contact_form');
function greeky_register_widget_contact_form(){
    register_widget('greeky_widget_contact_form');}
/**
* 
* the settings, form, display, and update.  Nice!
*
* @since 0.1
*/
class greeky_widget_contact_form extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'greeky_widget_contact_form',
            'Greeky - Contact Form',
            array( 'description' =>esc_html('Display form in contact page','greeky'))
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
    echo $before_widget;
    ?>
<div class="col-md-6 col-sm-12">
    <h3>
        <?php echo esc_attr($title); ?>
    </h3>
    <?php echo do_shortcode( $description ); ?>

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
    $instance['description'] = $new_instance['description'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'CONTACT FORM',
        'description' =>'',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>

<p>
    <label for="<?php echo esc_attr($this->get_field_id('description')); ?>">
        <?php echo esc_html("Contact Form 7 text here","greeky"); ?></label>
    <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_attr($instance['description']); ?></textarea>
</p>


<?php
    }
}
?>
