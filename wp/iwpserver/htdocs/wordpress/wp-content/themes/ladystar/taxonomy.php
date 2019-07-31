<?php 
    get_header(); 
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
?>

	<?php include 'template-parts/search-filters.php'; ?>	
	<?php echo do_shortcode('[topFiveAds]'); ?>
    <!-- Posts List -->
    <!--<section class="container popular-models model-section">-->
	<section class="container popular-models model-row-wrap models-list-item">
		<h2 class="section-title lines"><span class=""><?php echo esc_html__('Ads in', 'ladystar') . ' ' . $term->name; ?></span></h2>
        <div class="row listings-search hidden"><?php devon_get_search_filters() ?></div>
		<div class="row">
			<?php				
				if (have_posts()) :
					$count = 0;					
                    while (have_posts()) : the_post();
						set_query_var( 'position_counter', ++$count);		
						set_query_var( 'total_positions', $wp_query->post_count);		
						get_template_part('template-parts/content', 'listings-public');
                    endwhile;
                    ?>
                    <div class="col-md-12 text-center">
                        <?php the_posts_pagination(); ?>
                    </div>
                <?php
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
			?>            
		</div>
		<p class="text-center no-margin-bottom hidden">
			<a href="http://www.ladystar.eu/results-page/" class="button btn-classic btn-border"><?php echo esc_html__('Show More', 'ladystar') ?></a>
		</p>
	</section>
    <!-- End Post List -->

<?php get_footer(); ?>