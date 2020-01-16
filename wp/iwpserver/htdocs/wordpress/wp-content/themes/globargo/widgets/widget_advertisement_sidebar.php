<?php
/************************************************************
Plugin Name: Greeky - Advertisement
Description:   Display Advertisement Image
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'greeky_register_widget_advertisement');
function greeky_register_widget_advertisement(){
    register_widget('greeky_widget_advertisement');}
/**
* The settings, form, display, and update. !
*
* @since 0.1
*/
class greeky_widget_advertisement extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'greeky_widget_advertisement',
            'Greeky - Advertisement',
            array( 'description' => esc_html('Display Advertisement Image','greeky'))
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
    $link_url = $instance['link_url'];
    $image_url = $instance['image_url'];
    echo $before_widget;
    ?>


<div class="box-caption">
    <h2><span>
            <?php echo esc_attr($title);?>
        </span>
    </h2>
</div>
<div class="box-advertising">
    <a href="<?php echo esc_url($link_url," greeky" ); ?>" target="_blank">
        <img alt="" src="<?php echo esc_url($image_url," greeky" ); ?>" />
    </a>
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
    $instance['link_url'] = $new_instance['link_url'];
    $instance['image_url'] = $new_instance['image_url'];


    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'Advertisement',
        'link_url' =>'http://www.cizthemes.com',
        'image_url' =>'http://www.cizthemes.com/template/greeky/images/ads.jpg',

        );
    $instance = wp_parse_args($instance, $default);
    ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
        <?php echo esc_html("Title ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('link_url')); ?>">
        <?php echo esc_html("Link Url ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('link_url')); ?>" name="<?php echo esc_attr($this->get_field_name('link_url')); ?>" value="<?php echo esc_attr($instance['link_url']); ?>" />
</p>


<p>
    <label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>">
        <?php echo esc_html("Image Url (350px x 350px)  ","greeky"); ?></label>
    <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" value="<?php echo esc_attr($instance['image_url']); ?>" />
</p>
<?php
}
}
?>
