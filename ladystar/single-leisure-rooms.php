<?php get_header(); ?>

<?php
/* Start the Loop */
while ( have_posts() ) : the_post();

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	$action_url = site_url('/user?action=edit-room&id='.get_the_ID());
	$manage_image_url = site_url('/user?action=manage-images&id='.get_the_ID());
	$author_id = get_post_field( 'post_author', get_the_ID() );

	$meta_fields = array('price', 'location'); 
	$url = get_the_permalink(); 
	$custom = get_post_custom(); 

	$price = isset($custom['price'][0]) ? $custom['price'][0] : '';
	$listing_status = isset($custom['listing_status'][0]) ? $custom['listing_status'][0] : 'pending';
	
	// setup phone and email
	$phone = isset($custom['phone'][0]) ? maybe_unserialize($custom['phone'][0]) : array();
	$email = isset($custom['email'][0]) ? maybe_unserialize($custom['email'][0]) : array();
	
	//$taxonomies = devon_get_terms(); 
	$taxonomies = devon_wp_get_post_terms('', 'leisure-rooms'); 

	$prev_post = get_previous_post();
	$next_post = get_next_post();	

	$thumbnail_url = (has_post_thumbnail()) ? get_the_post_thumbnail_url(null, 'details-ad') : ''; 	
	//wp_die(var_dump($listing_images));
	$listing_images = array();
	$listing_images[] = array('image_url' => isset($thumbnail_url) ? $thumbnail_url : '',"id" => get_post_thumbnail_id());
	$images = devon_get_listing_attachments(get_the_ID(), 'details-ad');
	foreach($images as $image) {
		$listing_images[] = $image;
	}
?>
	
	<?php previous_post_link_plus( array('end_post' => true, 'in_same_meta'=>'is_approved') ); // outputs the first post ?>
	<?php next_post_link_plus( array('end_post' => true, 'in_same_meta'=>'is_approved') ); // outputs the last post ?> 
	
	<!-- User Panel -->
	<?php if (current_user_can('administrator') OR current_user_can('edit_listings', get_the_ID()) ) { ?>
		<div class="container">
			<div class="wrapper">			
				<div id="user-links">
					
					<?php if (current_user_can('administrator')) { ?>
						<span class="btn btn-classic btn-small pull-right mr-1 cursor btn-border approve-ad" data-toggle="modal" data-target="#approve-ad-modal"><?php echo esc_html__('Approve/Reject', 'ladystar') ?></span>
					<?php } ?>
					
					<a href="<?php echo site_url('/user?action=my-ads'); ?>" class="btn btn-classic btn-small pull-right mr-1 cursor"><?php _e('My Ads', 'ladystar'); ?></a>
			
					<a href="#" class="btn btn-classic btn-small pull-right mr-1 cursor" data-toggle="modal" data-target="#modal-ad-options"><?php echo esc_html__('Manage Your Ad', 'ladystar') ?></a>
					
					<?php if($listing_status!='approved') { ?>
						<span class="tag tag-status-<?php echo strtolower($listing_status) ?> listing-status" style="cursor:no-drop"><?php echo esc_html__('Status: '. ucwords(str_replace('_', ' ', $listing_status)), 'ladystar') ?></span>
					<?php } ?>
					
					<!-- Manage Ad Modal -->
					<div class="modal fade modal-form devon-modal modal-ad-options" id="modal-ad-options" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3>Ad Options</h3>									
									<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
								</div>
								<div class="modal-body">
									<a href="<?php echo $action_url ?>" title="Edit Ad" class="btn-classic btn-no-shadow btn-small d-block mb-2"><i class="fa fa-edit"></i> Edit Ad</a>
									
									<a href="<?php echo $manage_image_url ?>" title="Manage Images" class="btn-classic btn-no-shadow btn-small d-block mb-2"><i class="fa fa-picture-o"></i> Manage Images</a>
									
									<?php if($listing_status=='approved') {
										if(devon_if_activated()) { ?>
											<?php echo __('You can disable the Ad to hide it from the searches.', 'ladystar'); ?>
											<a href="#" title="Deactivate Ad" class="btn-classic btn-border btn-no-shadow btn-small d-block mb-2 btn-activate-listing" data-action="deactivate" data-id="<?php echo get_the_ID(); ?>"><?php echo esc_html__('Deactivate Listing', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
										<?php } else { ?>
											<?php echo __('You need to activate the Ad to make it visible to the users.', 'ladystar'); ?>
											<a href="#" title="Activate Ad" class="btn-classic btn-border btn-no-shadow btn-small d-block mb-2 btn-activate-listing" data-action="activate" data-id="<?php echo get_the_ID(); ?>"><?php echo esc_html__('Activate Listing', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
										<?php } 
									} ?>										
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>						
					
					<?php if (current_user_can('administrator')) { ?>			
						<!-- Approve Ad Modal -->
						<div class="modal fade modal-form devon-modal approve-ad-modal" id="approve-ad-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h3><?php echo esc_html__('Approve/Reject Ad', 'ladystar') ?></h3>
										<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
									</div>
									<div class="modal-body search-form">
										<div class="sign-form-inner">
											<div class="form-wr log-in-form active devon-form">												
												<form id="form-approve-ad" class="form">
													<div class="alerts-box"></div>
													<div class=" first-line">
														<div class="form-group">
															<select name="listing_status" class="listing_status">
																<option value=""><?php echo esc_html__('Choose Status', 'ladystar') ?></option>
																<?php
																	$statuses = array(
																		'pending' => 'Pending',
																		'rejected' => 'Rejected',
																		'approved' => 'Approved'
																	);
																	foreach ($statuses as $key => $value) {
																		$selected = '';
																		if($key == $listing_status)
																			$selected = 'selected';
																		echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
																	}
																?>
															</select>
														</div>
														<div class="form-group">
															<textarea name="justification_text" class="justification_text" placeholder="Enter the justification text"></textarea>
														</div>
														<!-- /.form-group -->
													</div>

													<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">									

													<div class="form-group">
														<button type="submit" class="btn-classic no-margin load_ind submit-approve-ad" data-post_id="<?php echo get_the_ID(); ?>"><?php echo esc_html__('Submit', 'ladystar') ?><i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </button>
													</div>
													<!-- /.form-group -->
												</form>
											</div>
											<!-- End Log In -->
										</div>
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
					<?php } ?>				
				</div>			
			</div>
		</div>
		<!-- User Panel -->
	<?php } ?>
	
	<!-- Model Profile -->
	<div class="profile-entry container profile-entry-images">

		<div class="profile-photos">
			<div class="row-sm">
				<div class="col-lg-6 profile-photos-container">
					<?php foreach($listing_images as $image) { ?>
						<div class="">
							<img class="main-photo" src="<?php echo $image['image_url']; ?>" alt="">
						</div>
					<?php } ?>	
				</div>
				<div class="col-lg-6 thumbnail-photo">
					<div class="row-sm justify-content-center">
						<?php foreach($listing_images as $image) { ?>
							<div class="col-6 col-sm-4 devon-zoom">
								<img height="20px" src="<?php echo $image['image_url']; ?>" alt="">
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Model Profile -->

	<!-- Posts List -->
	<div class="profile-reviews container listing-preview-wp">

		<div class="row blog-entry-wr">
			<div class="col-lg-9">

				<div class="profile-entry">
					<div class="profile-info">
						<header class="profile-header">
							<h2 class="profile-title"><?php the_title(); ?> <span class="ad-price">(<?php echo $price . ' BGN'; ?>)</span></h2>
						</header>						
							
						<div class="model-attr">
						
							<?php 
								foreach($meta_fields as $field) {
									if(isset($custom[$field][0]) && !empty($custom[$field][0])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo str_replace('_', ' ', ucwords($field)); ?>: </span>
											<span class="attr-value"><?php echo $custom[$field][0]; ?></span>
										</p>
								<?php }
								}
							?>
							
							<?php if(is_array($taxonomies['amenities']) && sizeof($taxonomies['amenities'])) { ?>
								<p class="attr-item">
									<span class="attr-name"><?php echo __('Amenities', 'ladystar'); ?>: </span>
									<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['amenities'], 'amenities'); ?></span>
								</p>
							<?php } ?>

							<?php if(sizeof($phone)) { ?>
								<p class="attr-item">
									<span class="attr-name"><i class="fa fa-phone"></i></span>											
									<span class="attr-value"><a title="Contact on Phone" href="tel:<?php echo $phone[0]; ?>"><?php echo $phone[0]; ?></a></span>
								</p>
							<?php } ?>	
							
							<?php if(0 AND (sizeof($email) OR sizeof($email))) { ?>
								<p class="attr-item">
									<span class="attr-name"><i class="fa fa-envelope"></i></span>							
									<span class="attr-value"><a title="Send an email" href="mailto:<?php echo $email[0]; ?>"><?php echo $email[0]; ?></a></span>
								</p>
							<?php } ?>	
							
						</div>
						
						<div class="model-description mt-3"><?php echo get_the_content(); ?></div>
					</div>
				</div>
			</div>
			<aside class="col-lg-3 sidebar widgets">
				<div class="profile-entry">
					<p class="soc-icons">
						<a href="https://www.facebook.com/share.php?u='<?php echo $url; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-facebook-f"></i>
						</a>
						<a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $url; ?>&amp;title=<?php echo get_the_title(); ?>&amp;summary=&amp;source=" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-linkedin"></i>
						</a>
						<a href="https://twitter.com/home?status=<?php echo $url; ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
							<i class="fa fa-twitter"></i>
						</a>
					</p> 
				</div>
				<!-- /.widget-ads-->
			</aside>
		</div>
	</div>
	<!-- End Post List -->
	
<?php endwhile; ?>
<?php get_footer(); ?>