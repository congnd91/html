<?php 

$url = ''; 
if(has_post_thumbnail()) {
	$url = get_the_post_thumbnail_url(); 	
}

$meta_fields = array('age', 'height', 'weight', 'hair_color', 'eyes'); 
$custom = get_post_custom(); 

$col_class = "col-sm-6 col-lg-3"; 
if(is_page() OR is_singular()) {
	$col_class= "col-sm-6 col-lg-4 pull-left";
}

$row_class= ''; 
if(devon_if_promoted()) {
	$row_class .= ' devon-featured-row'; 
}

devon_update_meta(get_the_ID(), 'featured_in_listings', 1, '+');	

?>
	
	<article class="<?php echo $col_class; ?><?php echo $row_class ?>">	
		<a href="<?php the_permalink(); ?>" class="item-wr">
			<div class="model-item" style="background-image: url('<?php echo $url; ?>')">
				<div class="model-info">
					<?php 
						foreach($meta_fields as $field) {
							if(isset($custom[$field][0]) && !empty($custom[$field][0])) { ?>
								<p class="archive-attr-item"><?php echo str_replace('_', ' ', ucwords($field)); ?>: 
									<span class="archive-attr-value"><?php echo $custom[$field][0]; ?></span>
								</p>
						<?php }
						}
					?>
					<p class="rating">
						<i class="fa fa-star active" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
					</p>
				</div>
			</div>
			<h3 class="title"><?php the_title(); ?></h3>
		</a>
	</article>