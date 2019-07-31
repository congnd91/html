<?php 
    get_header(); 
?>

    <!-- Posts List -->
    <section class="container popular-models model-row-wrap models-list-item">
		<h2 class="section-title lines"><span class=""><?php echo esc_html__('Leisure Rooms', 'ladystar') ?></span></h2>
        <div class="row ads-container">
			<?php				
			    if (have_posts()) :
					$count = 0;					
                    while (have_posts()) : the_post();
						get_template_part('template-parts/content', 'rooms-public');
                    endwhile;
                    ?>
                    <div class="col-md-12 text-center"><?php the_posts_pagination(); ?></div>
                <?php
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
			?>            
		</div>
	</section>
    <!-- End Post List -->

<?php get_footer(); ?>