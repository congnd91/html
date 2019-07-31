<?php 
    /*
        * Template Name: Browse Page
        * Page template for browse page
        *
    */   
    get_header();
?>
	<?php include(dirname(__FILE__)."/../template-parts/search-filters.php"); ?>
	<div class="top-ads-container"></div>
	<!-- Posts List -->
	<section class="container popular-models model-row-wrap models-list-item">
		<div class="loader-holder">
			<div class="loader"><div></div></div>
			<div class="loader"><div></div></div>
			<div class="loader"><div></div></div>
		</div>	
		<h2 class="section-title lines mb-3"><span class="num-post"></span> <span><?php echo __('Ads', 'ladystar'); ?></span></h2>
		<div class="row ads-container">		
		    	
			<p class="text-center no-margin-bottom hidden">
				<a href="http://www.ladystar.eu/results-page/" class="button btn-classic btn-border"><?php echo esc_html__('Show More', 'ladystar') ?></a>
			</p>
		</div>
	</section>
	<!-- End Post List -->
	
<?php get_footer() ?>