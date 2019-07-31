<?php get_header(); the_post();	?>

<div class="container">
	<div class="col-lg-12">
		<article class="single-post-content blog-entry">	
			<h1 class="post-title"><?php the_title(); ?></h1>
			<div>
				<?php the_content(); ?>
			</div>
		</article>
	</div>
</div>

<?php get_footer(); ?>