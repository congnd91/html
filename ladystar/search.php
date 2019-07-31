<?php 
    get_header(); 
    //var_dump($_POST);
    // if(isset($_POST) AND isset($_POST['devon-action']) AND $_POST['devon-action'] == 'devon-custom-search') {
       // devon_search_listing();
    //}
	
	$search_title = ''; 
    if(isset($_REQUEST['s']) && !empty($_REQUEST['s'])) {
        $search_title = ' For: "' . $_REQUEST['s'] . '"';
    }

?>
<?php include 'template-parts/search-filters.php'; ?>
    <!-- Posts List -->
	<section class="container popular-models model-row-wrap models-list-item">
		<h2 class="section-title lines">
            <span class="">
                <span class="num-post"><?php echo $wp_query->found_posts; ?></span> <?php _e( 'Search Results Found', 'locale' ); ?> <?php echo $search_title; ?>
            </span>
        </h2>
        <div class="row listings-search"><?php //devon_get_search_filters() ?></div>
		<div class="row ads-container">
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
                    get_template_part('template-parts/content', 'none');
                endif;
			?>            
		</div>
		<ul id="pagination" class="pagination"></ul>
		<p class="text-center no-margin-bottom hidden">
			<a href="http://www.ladystar.eu/results-page/" class="button btn-classic btn-border"><?php echo esc_html__('Show More', 'ladystar') ?></a>
		</p>
	</section>
    <!-- End Post List -->

<?php get_footer(); ?>