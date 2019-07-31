<?php 
    /*
        * Template Name: Home Page
        * Page template for
        *
    */   
    get_header(); 
?>
<div class="devon-elementor">
    <div class="elementor elementor-37">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">

                <section class="home-section mt-4">
					<?php echo do_shortcode('[searchWidget]') ?>
                </section>

                <section class="home-section mt-4" style="margin-bottom:60px;">
                    <?php echo do_shortcode('[categoryBoxes]') ?>
                </section>
				
                <section class="home-section text-center mt-4">
                    <?php echo do_shortcode('[displayListings type="home-ads" img_size="home-ad" number=36]') ?>
					<a class="btn btn-primary mt-1 mb-3" href="<?php echo site_url('/ads'); ?>" title="<?php echo __('Browse All', 'ladystar'); ?>"><?php echo __('Browse All', 'ladystar'); ?></a>
                </section>
				
                <section class="home-section mt-4 hidden">
                    <?php echo do_shortcode('[showPosts]') ?>
                </section>
				
				<!-- Testimonials -->
                <section class="home-section mt-4">
					<div class="full-width-bg testimonials" style="margin-top:0; background-image: url('http://www.ladystar.eu/wp-content/themes/devon/assets/img/demo/testimonials-bg.jpg')">
						<div class="container">
							<div class="full-width-bg-inner">
								<p class="quotes lines">“</p>
								<div class="testimonials-slider">
									<article class="testimonial-item">
										<p class="testimonial-content">
											I've always loved the idea that you think you know what you're looking at from a distance, yet when you come up close, it gets intricate and nutty and obscene and provocative.</p>
										<div class="testimonial-author">
											<h4 class="name">Gloria Simson</h4>
											<p class="position">MANAGER</p>
										</div>
									</article>

									<article class="testimonial-item">
										<p class="testimonial-content">
											I had so much fun developing and launching my first fragrance with Avon, so for my second fragrance, I really wanted to add a little more edge. Outspoken Intense is a provocative blend of sexy confidence and daring femininity that captures the thrill and excitement of being centre stage.</p>
										<div class="testimonial-author">
											<h4 class="name">Gloria Simson</h4>
											<p class="position">MANAGER</p>
										</div>
									</article>

									<article class="testimonial-item">
										<p class="testimonial-content">
											I've always loved the idea that you think you know what you're looking at from a distance, yet when you come up close, it gets intricate and nutty and obscene and provocative.</p>
										<div class="testimonial-author">
											<h4 class="name">Gloria Simson</h4>
											<p class="position">MANAGER</p>
										</div>
									</article>
								</div>
							</div>
						</div>
					</div>									
                </section>
				<!-- End Testimonials -->

				<!-- Leisure Rooms -->
                <section class="home-section text-center mt-4">					
					<?php echo do_shortcode('[displayListings post_type="leisure-rooms" number=6 title="'.__('Leisure rooms for rent', 'ladystar').'"]') ?>
					<a class="btn btn-primary mt-1 mb-3" href="<?php echo pll_get_page_url('leisure-rooms'); ?>" title="<?php echo __('View Leisure Rooms', 'ladystar'); ?>"><?php echo __('View Leisure Rooms', 'ladystar'); ?></a>
                </section>
				<!-- End Leisure Rooms -->
				
				<!-- Dating -->
				<?php if(1) { ?>
					<section class="home-section mt-4">
						<h2 class="section-title lines"><span class=""><?php echo __('Most Viewed in Categories', 'ladystar'); ?></span></h2>
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<?php echo do_shortcode('[datingWidgets service_category="girl-looks-for-a-girl"]') ?>
								</div>
								<div class="col-md-3">
									<?php echo do_shortcode('[datingWidgets service_category="girl-looks-for-a-boy"]') ?>
								</div>
								<div class="col-md-3">
									<?php echo do_shortcode('[datingWidgets service_category="boy-looks-for-a-girl"]') ?>
								</div>
								<div class="col-md-3">
									<?php echo do_shortcode('[datingWidgets service_category="massages"]') ?>
								</div>
							</div>
						</div>
					</section>
				<?php } ?>
				<!-- End Dating -->

            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>