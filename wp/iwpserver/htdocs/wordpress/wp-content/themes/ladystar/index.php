<?php
	get_header(); 
?>
    <!-- Posts List -->
    <section class="container popular-models model-section index">
		<h2 class="section-title lines"><span class=""><?php echo __('Ads', 'ladystar'); ?></span></h2>
        <div class="row listings-search"><?php devon_get_search_filters(); ?></div>
		<div class="row">
			<?php
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'listings-public');
                    endwhile;
                    ?>
                    <div class="col-md-12 text-center">
                        <?php the_posts_pagination(); ?>
                    </div>
                <?php
                else :
                    get_template_part('template-parts/post/content', 'none');
                endif;
			?>            
		</div>
		<p class="text-center no-margin-bottom hidden">
			<a href="http://www.ladystar.eu/results-page/" class="button btn-classic btn-border"><?php echo esc_html__('Show More', 'ladystar') ?></a>
		</p>
	</section>
    <!-- End Post List -->

<?php get_footer(); ?>