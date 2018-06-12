<?php
/************************************************************
Plugin Name: MazPage - Subcribe Newslleter
Description:   Form subcribe newslleter  
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_subscribe');
function mazpage_register_widget_subscribe(){
    register_widget('mazpage_widget_subscribe');}
/**
* The settings, form, display, and update. !
*
* @since 0.1
*/
class mazpage_widget_subscribe extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_subscribe',
            'MazPage - Subcribe Newslleter',
            array( 'description' => esc_html('Form subscribe newslleter','mazpage'))
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

   

  <!-- subcribe box-->
    <div class="col-caption">
                            <span> <?php echo esc_html($title,"mazpage" ); ?> </span>
                        </div>
                        
                    <div class="subcribe-box">
                      
                        <p class="des">
                            <?php echo esc_html( $description,"mazpage" ); ?> 
                        </p>
                        <?php echo do_shortcode( $shortcode ); ?>
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
    $instance['shortcode'] = $new_instance['shortcode'];

    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'NEWSLETTER',
        'description' =>'Enter your email address below to subscribe to my newsletter',
        'shortcode' =>'',

        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php echo esc_html("Title ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('description')); ?>"> <?php echo esc_html("Desciption ","mazpage"); ?></label>
        <textarea class="widefat" style="width:100%;height: 100px" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr($this->get_field_name('description')); ?>"><?php echo esc_html($instance['description'],"mazpage"); ?></textarea>

    </p>

    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('shortcode')); ?>"> <?php echo esc_html("Shortcode MailChimp for WP  ","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('shortcode')); ?>" name="<?php echo esc_attr($this->get_field_name('shortcode')); ?>" value="<?php echo esc_attr($instance['shortcode']); ?>" />
    </p>
    <?php
}
}
?>