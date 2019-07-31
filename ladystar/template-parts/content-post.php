<?php 
$thumbnail_id = get_post_thumbnail_id();
$thumbnail_src = wp_get_attachment_image_src($thumbnail_id, 'large', false);
$thumbnail_url = $thumbnail_src[0];
$url = ''; 
$attachments = array();
$images = get_attached_media('image', get_the_ID()); 
foreach($images as $image) {
	$class = "post-attachment mime-" . sanitize_title( $image->post_mime_type );
	$img_src = wp_get_attachment_image_src($image->ID, 'large', false);
	$attachments[] = $img_src[0];
}
?>	
	<div class="row">
		<div class="col-md-9">
			<article class="single-post-content blog-entry">
		      	<p class="post-category"><a href="http://www.ladystar.eu/category/news/" rel="category tag">News</a></p>
		      	<h1 class="post-title"><?php the_title(); ?></h1>
		      	<div class="publish-age">
		         	<span class="date"><?php echo get_the_date(); ?></span>
		      	</div>
		      	<div class="single-post-img">
		         	<?php echo '<img width="1280" height="853" src="'.$thumbnail_url.'" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" srcset="'.$thumbnail_url.', '.$thumbnail_url.', '.$thumbnail_url.'" sizes="(max-width: 1280px) 100vw, 1280px">' ?>		
		      	</div>
		      	<div class="post-content">
		         	<div class="gallery-container" id="custom-gallery">
		            	<div data-target="#modal-gallery" data-toggle="modal-gallery" class="row images-gallery">
			            	<?php foreach($attachments as $img_url) { ?>
				               <div class="gallery-columns gallery-columns-3">
				                  <div class="preview-img">
				                     <a data-description="" data-gallery="gallery" href="<?php echo $img_url ?>" title="news-3" download="<?php echo $img_url ?>" class="preview show-icon">
				                     <img src="<?php echo $img_url ?>" data-src="<?php echo $img_url ?>" alt="" class="gallery-image">
				                     </a>
				                  </div>
				                  <p class="text"></p>
				               </div>
			               <?php } ?>
		            	</div>
		         	</div>
		         	<div class="">
		            	<p><?php echo get_the_content() ?></p>
		            	<p></p>
		         	</div>
		      	</div>
		   	</article>
		</div>
		<aside class="col-lg-3 widgets">
			<?php get_sidebar() ?>
		</aside>
	</div>