<?php 
    get_header(); 
?>
	<?php include 'template-parts/search-filters.php'; ?>
	<?php echo do_shortcode('[topFiveAds]'); ?>   	
	<!-- Posts List -->
	<section class="container popular-models model-row-wrap models-list-item">
		<div class="loader-holder">
			<div class="loader"><div></div></div>
			<div class="loader"><div></div></div>
			<div class="loader"><div></div></div>
		</div>
		
		<?php echo __('My new string', 'ladystar'); ?>
		<h2 class="section-title lines"><span class=""><?php echo __('Ads', 'ladystar'); ?></span></h2>
		<div class="row ads-container">		
		<?php				
			if (have_posts()) :
				$count = 0;					
				while (have_posts()) : the_post();
					// get_template_part('template-parts/content', 'listings-public');
				endwhile;
				?>
				<div class="col-md-12 text-center">
					<?php // the_posts_pagination(); ?>
				</div>
			<?php
			else :
				get_template_part('template-parts/content', 'none');
			endif;
		?>            		
		<p class="text-center no-margin-bottom hidden">
			<a href="http://www.ladystar.eu/results-page/" class="button btn-classic btn-border"><?php echo esc_html__('Show More', 'ladystar') ?></a>
		</p>
	</div>
	</section>
	<!-- End Post List -->

<?php get_footer(); ?>