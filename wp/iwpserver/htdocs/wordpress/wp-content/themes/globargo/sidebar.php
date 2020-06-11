<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package belsip
 */

if ( ! is_active_sidebar( 'belsip_sidebar' ) ) {
return;
}
?>
<?php dynamic_sidebar( 'belsip_sidebar' ); ?>
