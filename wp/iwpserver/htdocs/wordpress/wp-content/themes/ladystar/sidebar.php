<?php 

$categories = get_the_category();
$posttags = get_the_tags();

?>

<div id="search-2" class="widget widget_search side">
	<form role="search" method="get" class="search-wr" action="http://www.ladystar.eu/">
	    <input type="search" required="required" class="input" id="search-form-5cda5bc33ccac" name="s" placeholder="Enter Keywords" value="">
    	<button type="submit" class="submit" value=""><i class="icon ion-ios-search"></i></button>
  	</form>
</div>

<div id="recent-posts-2" class="widget widget_recent_entries side">
  	<h2 class="widget-title"><span>Pages</span></h2>
  	<ul>
	  	<?php $pages = get_pages();
	  	foreach($pages as $page) { ?>
	     	<li>
	        	<a href="<?php the_permalink($page->ID) ?>"><?php echo $page->post_title ?></a>
	     	</li>
	 	<?php } ?>
  	</ul>
</div>

<?php if(sizeof($categories)) { ?>
	<div id="categories-2" class="widget widget_categories side">
		<h2 class="widget-title"><span>Categories</span></h2>
		<ul>
			<?php 		  	
				foreach($categories as $category) {
					echo '<li class="cat-item cat-item-4"><a href="'.get_category_link($category->term_id).'">'.ucwords($category->name) . '</a></li>';
				} 
			?>
		</ul>
	</div>
<?php } ?>

<?php if(sizeof($posttags)) { ?>
	<div id="meta-2" class="widget widget_meta side">
		<h2 class="widget-title"><span>Tags</span></h2>
		<ul>
			<?php   		
			foreach($posttags as $tag) {
				echo '<li><a href="'.get_tag_link($tag->term_id).'">'.$tag->name . '</a></li>';
			} ?>
		</ul>
	</div>
<?php } ?>

<div id="meta-2" class="widget widget_meta side"><h2 class="widget-title"><span>Meta</span></h2>
	<ul>
		<li><a href="<?php echo pll_get_page_url('auth') ?>">Register</a></li>
		<li><a href="<?php echo pll_get_page_url('auth') ?>">Log in</a></li>
		<li><a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a></li>
	</ul>
</div>