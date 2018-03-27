<?php
/************************************************************
Plugin Name:   MazPage - Post By Category In Home Page
Description:   Display  posts by category
Author: CizThemes
Author URI: http://congnd91.com
***************************************************************************************/
/**
* Add function to widgets_init that'll load our widget.
* @since 0.1
*/
add_action('widgets_init', 'mazpage_register_widget_category_home');
function mazpage_register_widget_category_home(){
    register_widget('mazpage_widget_category_home');}
/**
* Settings, form, display, and update.
*
* @since 0.1
*/
class mazpage_widget_category_home extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'mazpage_widget_category_home',
            'MazPage - Post By Category In Home Page',
            array( 'description' => esc_html('Display  posts by category in home page','mazpage'))
            );
    }
/**
* Display the widget
*/
function widget($args, $instance)
{
    extract($args);
    global $post;
    $category = $instance['category'];
    $title = $instance['title'];
    $number = $instance['number'];
    echo $before_widget;
    ?>
    <?php $mazpage_thumbsposts =  new WP_Query(array(
        'showposts' =>$number,
        'cat'=>$category,
        ));
        $count = 1;?>
    <div class="container">
        <div class="box-cate">
            <div class="box-cate-caption">
                <h2>
                    <?php echo  html_entity_decode(esc_html($title)); ?> </h2>
            </div>
            <?php 
if( $term = get_term_by( 'id', $category, 'product_cat' ) ){
echo do_shortcode("[products orderby='date' order='desc' category='+$term->name+']");
}  ?>
        </div>

    </div>
    <?php  echo $after_widget; ?>
    <?php
            }
/**
* Update the widget settings.
*/
function update($new_instance, $old_instance){
    $instance  = $old_instance;
    $instance['category'] = $new_instance['category'];
    $instance['title'] = $new_instance['title'];
    $instance['number'] = $new_instance['number'];
    return $instance;
console.log($instance['category']);
}
/* Widget form*/
function form($instance){
    $default = array(
        'category' =>'all',
        'title' =>'',
        'number' =>'5',
        );
    $instance = wp_parse_args($instance, $default);
    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php echo esc_html("Choose Category ","mazpage"); ?></label>
            <select id="<?php echo esc_attr($this-> get_field_id('category')); ?>" class="widefat categories" style="width:100%;" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
            <?php 
            $orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
$product_categories = get_terms( 'product_cat', $cat_args );
            ?>
            <?php foreach ($product_categories as $product_categories ) { ?>
            <option value='<?php echo esc_attr($product_categories->term_id); ?>' <?php if ($product_categories->term_id == $instance['category']) echo esc_html('selected="selected"') ; ?>>
                <?php echo esc_attr($product_categories->name);  ?>
            </option>
            <?php } ?>
        </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"> <?php echo esc_html("Title of Posts ","mazpage"); ?></label>
            <input type="text" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"> <?php echo esc_html("Number of Posts ","mazpage"); ?></label>
            <input type="number" class="widefat" style="width: 100%;" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
        </p>
        <?php
}
}
?>
