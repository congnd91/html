<?php
/**
* The template for displaying 404 pages (not found)
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package mazpage
*/

get_header(); ?>
<div class="page-404">
	<h1><?php echo esc_html("404","mazpage"); ?></h1>
	<h3><?php echo esc_html("Page Not Found","mazpage"); ?></h3>
	<p>
		<?php echo esc_html("The page requested couldn't be found.","mazpage");?><br />
		<?php echo esc_html(" This could a spelling error in the URL or a removed page.","mazpage");?>
	</p>
	<a href="<?php echo esc_url(home_url( '/' ) ); ?>" class="my-btn my-btn-dark btn-go-home">
		<?php  echo esc_html("GO HOME","mazpage"); ?> </a>
	</div>
	<?php
get_footer();
