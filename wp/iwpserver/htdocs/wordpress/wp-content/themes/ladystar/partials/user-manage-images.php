<?php 

// Get post_id from the query string
$id = $_GET['id'];
$post = get_post($id);

// ToDo: Not in use after drag and drop
if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='upload-control-photo') {
	$output = action_upload_control_photo(); 
}

$listing_images = devon_get_listing_attachments($id);
$action_url = pll_get_page_url('/user') . '?action=manage-images&id='.$id;
$post_thumbnail_id = get_post_thumbnail_id($id);
$url = get_the_post_thumbnail_url();

?>
<div class="listing-main" data-post_id="<?php echo $id; ?>">
	<h2>
		<?php echo esc_html__('Manage Images for', 'ladystar') ?> <?php echo get_the_title($id) ?> 
		<span class="btn btn-classic btn-hover btn-small pull-right" onclick="open_media_uploader_multiple_images()"><i class="fa fa-plus"></i><?php echo __('Add Images', 'ladystar'); ?></span>
		<a class="btn btn-classic btn-hover btn-small pull-right" style="vertical-align:middle;" href="<?php echo get_the_permalink($id); ?>" title="<?php _e('Go Back', 'ladystar'); ?>"><i class="fa fa-eye"></i><?php echo __('View Listing', 'ladystar'); ?></a>		
	</h2>
	<!--
	<div class="devon-image-upload">
		<div id="drop-area" data-post_id="<?php echo $id; ?>">
			<h3 class="drop-text">Drag and Drop Images Here</h3>
			<p class="ajax-alert"></p>
		</div>
	</div>-->	
	<!-- Ad Images Area -->
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="form-group devon-image-section" data-count="<?php echo sizeof($listing_images); ?>">
				
				<?php 
					// ToDo: Total Images text is hidden, should be removed from js and php files later 
					echo '<p class="text-center mb-0 attachment-count hidden" data-count="'.sizeof($listing_images).'">Total images with this ad: ' . sizeof($listing_images) . '</p>';
					foreach($listing_images as $image) { ?>
						<div class="devon-image devon-attachment devon-zoom">
							<img src="<?php echo $image['image_url']; ?>" data-id="<?php echo $image['id'] ?>">
							<?php if($post_thumbnail_id==$image['id']) { /*check if featured image*/ ?>
								<i title="<?php _e('Primary Image', 'ladystar'); ?>" class="fa fa-check-circle is-primary"></i>
							<?php } ?>
							<span class="btn btn-classic btn-small devon-img-options" data-id="<?php echo $image['id'] ?>" data-post_id="<?php echo $id; ?>">
								<?php if($post_thumbnail_id!=$image['id']) { /*show make primary if already not featured image*/ ?>
									<span class="devon-make-primary" data-swal-title="<?php echo __('Make this a primary image?', 'ladystar'); ?>" data-swal-text=""><?php _e('Make Primary', 'ladystar'); ?></span>
								<?php } ?>
								<span class="devon-remove pull-right" data-swal-title="<?php echo __('Are you sure?', 'ladystar'); ?>" data-swal-text="<?php echo __('The image will be permanently deleted!', 'ladystar'); ?>"><i class="fa fa-trash"></i></span>
								<i class="fa fa-spin fa-spinner" style="display:none;"></i>
							</span>
						</div>
					<?php } 
				?>
			</div>
		</div>
	</div>
	
	<div class="row mt-4 devon-image">
		<div class="col-md-12"> 
			<h3><?php _e('Control Photo', 'ladystar'); ?></h3>
			<p><?php _e('Upload control photo to receive verified badge for this ad. Once you upload the photo, admin will verify the authenticity of the image and a new badge will be added.', 'ladystar'); ?></p>
			<?php 
				$is_verified = get_post_meta($id, 'is_verified', true);		
				
				if(isset($is_verified)) print_r('Here: ' . $is_verified); 
				else echo 'not set'; 
				
				// ToDo: used quick fix here due to URL issue in months folder 
				if(!empty($output)) {
					// User has submitted a control photo, show him the $output 
					echo '<div class="alert alert-info mt-2 mb-2">'.$output.'</div>';
				}
				else {
					$control_photo_file = get_post_meta($id, 'control_photo_file', true); 
					if($is_verified==-1 && isset($control_photo_file) && !empty($control_photo_file)) {
						// is_verified== -1 control_phoot is just uploaded
						echo '<div class="control-photo-view p-2 border">';
							echo __('Your control photo is under review, once approved you will receive a "Verified" badge for this ad.', 'ladystar'); 
							echo '<img class="img thumbnail" src="'.site_url('/wp-content/uploads/control-photos/'.end(explode('/', $control_photo_file))).'">'; 
						echo '</div>';
					}
					elseif($is_verified==1) {
						// is_verified== 1 control_phoot is verified
						echo '<div class="control-photo-view p-2 border">';
							echo __('Great job! Your control photo is approved and a "Verifed" badge is assigned to this ad.', 'ladystar'); 							
							echo '<img class="img thumbnail" src="'.site_url('/wp-content/uploads/control-photos/'.end(explode('/', $control_photo_file))).'">'; 
						echo '</div>';
					}
					else { ?>
						<?php 
							if($is_verified==0 && $is_verified!='') {
								// is_verified==0 control_phoot is rejected
								$control_photo_justification_text = get_post_meta($id, 'control_photo_justification_text', true); 
								echo '<div class="control-photo-view p-2 border text-center">';
									echo __('Your control photo is rejected due to below reasons. Please upload a new control photo to get verified badge.', 'ladystar');
									echo '<img class="img thumbnail" src="'.site_url('/wp-content/uploads/control-photos/'.end(explode('/', $control_photo_file))).'">'; 
									echo '<div class="alert alert-info mt-2 mb-2">'.$control_photo_justification_text.'</div>';
								echo '</div>';
							}
						?>
						<!-- Control Photo Form --> 
						<form class="devon-upload-control-photo mt-1" method="post" enctype="multipart/form-data" action="<?php echo $action_url ?>">
							<div class="row">
								<div class="form-group col-md-6 devon-float-left">
									<input type="file" name="control-photo" id="files" required>						
								</div>					
								<div class="form-group col-md-3 devon-float-left">
									<input type="hidden" name="post_id" value="<?php echo $_GET['id'] ?>">
									<input type="hidden" name="submit-action" value="upload-control-photo">
									<input type="submit" name="upload-control-photo" class="btn btn-primary" value="<?php echo __('Upload', 'ladystar'); ?>">
								</div>
							</div>
						</form>
					<?php }
				}
				// ToDo: remove test code
				//echo 'is_verified: '. $is_verified; echo '<br>';echo $control_photo_file; echo '<br>';echo $control_photo_justification_text; 

			?>
		</div>
	</div>
	
</div>