<?php 
    /*
        * Template Name: Favorites
        * Page template for
        *
    */   
    get_header(); 
?>
	
	<!-- Posts List -->
	<section class="container popular-models model-row-wrap models-list-item">		
		<h2 class="section-title lines mb-3"><span class="num-post"></span> <span><?php echo __('My Favorite Ads', 'ladystar'); ?></span></h2>
		<div class="row ads-container">		
			<?php 
				$name = 'ladystar_favorites'; 
				$favorites = devon_cookie_reader($name);
				if(is_null($favorites) || !is_array($favorites)) { 					
					get_template_part('template-parts/content', 'none');
				}
				else {
					$posts_per_page = 5;
					$offset = (get_query_var('paged')) ? ((get_query_var('paged')-1) * $posts_per_page) : 0; 
					$public_ad_args = devon_get_public_ad_args('taxonomy');
					$tax_query = array( 'relation' => 'AND' );
					$meta_query = array( 'relation' => 'AND' );				
					$meta_query = array_merge($meta_query, $public_ad_args);
					$args = array(
						'post_type'  => array('listings', 'leisure-rooms'),
						'posts_per_page' => $posts_per_page,
						'offset' => $offset,
						'post__in' => $favorites, 
						'tax_query' => $tax_query,
						'meta_query' => $meta_query,
					);	
					
					$query = new WP_Query($args);	
					
					if($query->have_posts()) {
						while($query->have_posts()) {
							$query->the_post();
							$post_type = get_post_type(get_the_ID()); 
							set_query_var('reload', true); 
							// Check post type and decide the template-part to include
							if('listings'==$post_type) get_template_part('template-parts/content', 'listings-public');							
							elseif('leisure-rooms'==$post_type)  get_template_part('template-parts/content', 'rooms-public');							
						} ?>
						<div class="col-md-12 text-center">
							<?php 
								echo '<div class="col-md-12 text-center">';
									echo '<div class="pagination m-0">';		
										echo paginate_links( array(
											'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
											'total'        => $query->max_num_pages,
											'current'      => max( 1, get_query_var('paged')),
											'format'       => '?paged=%#%',
											'show_all'     => false,
											'type'         => 'plain',
											'end_size'     => 2,
											'mid_size'     => 1,
											'prev_next'    => true,
											'prev_text'    => '<i class="fa fa-angle-left m-0"></i>',
											'next_text'    => '<i class="fa fa-angle-right m-0"></i>',
											'add_args'     => true,
											'add_fragment' => '',
										) );
									echo '</div>';
								echo '</div>';
							?>
						</div>
					<?php
					} else {
						get_template_part('template-parts/content', 'none');
					}
				}
			?>
		</div>
	</section>
	<!-- End Post List -->
	
<?php get_footer() ?>