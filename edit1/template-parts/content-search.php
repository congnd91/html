<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bright
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bright-article'); ?>>
	<figure>
		<?php if( has_post_thumbnail() ):?>
			<?php if ( !is_single() ) : ?>
				<a href="<?php the_permalink();?>">
					<?php the_post_thumbnail('bright-article-thumb')?>
				</a>
			<?php else: ?>
				<?php the_post_thumbnail('bright-article-thumb')?>
			<?php endif; ?>	
		<?php endif;?>
		<figcaption>
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				echo "<h2>";
				if ( 'tribe_events' === get_post_type() ) { echo tribe_get_start_date($post, false); }
				echo "</h2>";
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php bright_wp_post_meta(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
					if( is_single() ){
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bright' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					}else{
						the_excerpt();
					}

					if( function_exists('bright_bootstrap_link_pages') ){
						bright_bootstrap_link_pages( array(
							'before' => '<nav class="ep_theme_paignation bright-theme-page-links page-links">' . esc_html__( 'Pages:', 'bright' ) . '<ul class="pager">',
							'after'  => '</ul></nav>',
						) );
					}else{
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bright' ),
							'after'  => '</div>',
						) );
					}
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer clearfix">
				<?php bright_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</figcaption>
	</figure>
</article><!-- #post-## -->
