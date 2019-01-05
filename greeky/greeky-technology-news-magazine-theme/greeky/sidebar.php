<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greeky
 */

if ( ! is_active_sidebar( 'greeky_sidebar' ) ) {
return;
}
?>
<?php dynamic_sidebar( 'greeky_sidebar' ); ?>
