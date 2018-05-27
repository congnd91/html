<?php
/**
* The template for displaying archive pages
*
* @link https://codex.wordpress.org/Template_Hierarchy
*
* @package mazpage
*/
$mazpage_sidebar_position = get_theme_mod('sidebar_position');
get_header(); ?>
<?php
if ( have_posts() ) { ?>
<div class="big-page-caption"><p>
	<?php	single_term_title();?>
	<?php if(is_author()){ ?>
	<?php the_author_posts_link(); ?>
	<?php } ?>
</p>
</div>
<?php } ?>
<!--cols-->
<?php if($mazpage_sidebar_position=="left"):?>
	<div class="cols sidebar-left">
	<?php elseif($mazpage_sidebar_position=="none"):?>
		<div class="cols cols-full">
		<?php else:?>
			<div class="cols">
			<?php endif;?>
			<!--colleft-->
			<div class="colleft">
				<?php
				if ( have_posts() ) { ?>
				<div class="list-item-category">
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
					get_template_part( 'loop/content', get_post_format() );
					endwhile; ?>
				</div>
				<?php
				echo  mazpage_pagination();
			}
			else 
			{
				get_template_part( 'loop/content', 'none' );
			}
			?>
		</div>
		<!--colright-->
		<div class="colright">
			<?php get_sidebar(); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php
	get_footer();