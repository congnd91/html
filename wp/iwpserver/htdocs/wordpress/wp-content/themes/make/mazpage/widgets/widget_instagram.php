<?php
/************************************************************
Plugin Name: MazPage - Instagram
Description:   Instagram photos stream 
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_instagram');
function mazpage_register_instagram(){
register_widget('mazpage_instagram');}
/**
* The settings, form, display, and update. !
*
* @since 0.1
*/
class mazpage_instagram extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_instagram',
            'MazPage - Instagram',
            array( 'description' => esc_html('Instagram photos stream ','mazpage'))
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
    $username = $instance['username'];
    $number = $instance['number'];
    echo $before_widget;
    ?>

     <div class="col-caption"> <span>  <?php echo esc_attr($title);?></span></div>
        <?php  if( $username != '' ) {
            $media_array = $this->scrape_instagram( $username, $number );
            if ( is_wp_error( $media_array ) ) {
                echo htmlspecialchars_decode( $media_array->get_error_message() );
            } else {
                $media_array = array_filter( $media_array );
                echo '<ul class="instagram-pics">';
                foreach ( $media_array as $item ) {
                   echo '<li><a href="'. esc_url( $item['link'] ) .'" target="_blank"><img src="'. esc_url( $item['small'] ) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'"></a></li>';
                }
                echo '</ul>';
            }
        }   
         ?>             

    <?php  echo $after_widget; ?>
    <?php
}
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['username'] = $new_instance['username'];
      $instance['number'] = $new_instance['number'];
    return $instance;
}
/* Widget form*/
function form($instance){
    $default = array(
        'title' =>'Instagram',
        'username' =>'quangvinh',
          'number' =>'6',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php echo esc_html("Desciption site ","mazpage"); ?></label>
        <input type ="title" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('username')); ?>"><?php echo esc_html("Username","mazpage"); ?></label>
        <input type ="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('username')); ?>" name="<?php echo esc_attr($this->get_field_name('username')); ?>" value="<?php echo esc_attr($instance['username']); ?>" />
    </p>

    <p>
        <label for ="<?php echo esc_attr($this->get_field_id('number')); ?>"> <?php echo esc_html("Number","mazpage"); ?></label>
        <input type ="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
    </p>


    <?php
}
  function scrape_instagram( $username, $slice = 6 ) {
        $username = strtolower( $username );
        $username = str_replace( '@', '', $username );
        $remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );
        if ( is_wp_error( $remote ) ) {
            return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'mazpage' ) );
        }
        if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
            return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'mazpage' ) );
        }
        $shards = explode( 'window._sharedData = ', $remote['body'] );
        $insta_json = explode( ';</script>', $shards[1] );
        $insta_array = json_decode( $insta_json[0], TRUE );
        if ( ! $insta_array ) {
            return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'mazpage' ) );
        }
        if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
            $images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
        } else {
            return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'mazpage' ) );
        }
        if ( ! is_array( $images ) ) {
            return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'mazpage' ) );
        }
        $instagram = array();
        foreach ( $images as $image ) {
            $image['thumbnail_src'] = preg_replace( "/^https:||http:/i", "", $image['thumbnail_src'] );
            // handle both types of CDN url
            if ( (strpos( $image['thumbnail_src'], 's640x640' ) !== false ) ) {
                $image['small'] = str_replace( 's640x640', 's200x200', $image['thumbnail_src'] );
            } else {
                $urlparts = parse_url( $image['thumbnail_src'] );
                $pathparts = array_values( array_filter( explode( '/', $urlparts['path'] ) ) );
                $image['small'] = untrailingslashit( '//' . $pathparts[0] . '/' . $pathparts[1] . '/s200x200/' . $pathparts[2] . '/' . $pathparts[3] . '/' . $pathparts[4] );
            }
            $caption = esc_html__( 'Instagram Image', 'mazpage' );
            if ( ! empty( $image['caption'] ) ) {
                $caption = $image['caption'];
            }
            $instagram[] = array(
                'description'   => $caption,
                'link'          => trailingslashit( '//instagram.com/p/' . $image['code'] ),
                'small'         => $image['small']
            );
        }
        return array_slice( $instagram, 0, $slice );
    }    


}
?>