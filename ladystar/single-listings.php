<?php get_header(); ?>



<?php
/* Start the Loop */
while ( have_posts() ) : the_post();

	global $current_user;
	wp_get_current_user();
	$user_id = $current_user->ID; 
	//$action_url = site_url('/user?action=edit-listing&id='.get_the_ID());
	//$manage_image_url = site_url('/user?action=manage-images&id='.get_the_ID());
	$action_url = pll_get_page_url('user') . '?action=edit-listing&id='.get_the_ID();
	$manage_image_url = pll_get_page_url('user') . '?action=manage-images&id='.get_the_ID();
	$author_id = get_post_field( 'post_author', get_the_ID() );

	$meta_fields = array('age', 'height', 'weight', 'hair_color', 'eyes'); 
	$url = get_the_permalink(); 
	$custom = get_post_custom(); 

	$price = isset($custom['price'][0]) ? $custom['price'][0] : '';
	$ad_position = (isset($custom['ad_position'][0]) && !empty($custom['ad_position'][0])) ? $custom['ad_position'][0] : 0; 
	$featured_in_listings = (isset($custom['featured_in_listings'][0]) && $custom['featured_in_listings'][0]) ? $custom['featured_in_listings'][0] : 0; 
	$viewed_in_detail = (isset($custom['viewed_in_detail'][0]) && $custom['viewed_in_detail'][0]) ? $custom['viewed_in_detail'][0] : 0; 
	$listing_status = isset($custom['listing_status'][0]) ? $custom['listing_status'][0] : 'pending';
	devon_update_meta( get_the_ID(), 'viewed_in_detail', 1, '+');	
	
	// setup phone and email
	$phone = isset($custom['phone'][0]) ? maybe_unserialize($custom['phone'][0]) : array();
	$email = isset($custom['email'][0]) ? maybe_unserialize($custom['email'][0]) : array();
	
	//$taxonomies = devon_get_terms(); 
	$taxonomies = devon_wp_get_post_terms(); 

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
	
	$promotions = devon_get_globals('promotions'); 
?>
	<!-- Breadcrumbs -->
	<div class="container">
		<div class="wrapper-breadcrumbs">
			<div id="breadcrumbs">
				<?php if(isset($taxonomies['service_categories'][0])) { ?>
					<?php echo devon_get_terms_link($taxonomies['service_categories'], 'service_categories'); ?>
				<?php } ?>
				<?php if(isset($taxonomies['locations'][0])) { ?>
					<i class="icon ion-android-arrow-forward separator"></i>
					<?php echo devon_get_terms_link($taxonomies['locations'], 'locations'); ?>
				<?php } ?>	
				<i class="icon ion-android-arrow-forward separator"></i>
				<?php the_title(); ?>
			</div>
			<nav class="profile-nav-link">
				<?php if (!empty( $prev_post )){ ?>
					<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="previus">
						<i class="icon ion-ios-arrow-thin-left"></i>
					</a>
				<?php } ?>
				<?php if (!empty( $next_post )){ ?>
					<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="next">
						<i class="icon ion-ios-arrow-thin-right"></i>
					</a>
				<?php } ?>				
			</nav>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	<?php previous_post_link_plus( array('end_post' => true, 'in_same_meta'=>'is_approved') ); // outputs the first post ?>
	<?php next_post_link_plus( array('end_post' => true, 'in_same_meta'=>'is_approved') ); // outputs the last post ?> 
	
	<!-- User Panel -->
	<?php if (current_user_can('administrator') OR current_user_can('edit_listings', get_the_ID()) ) { ?>
		<div class="container">
			<div class="wrapper">			
				<div id="user-links">
					
					<?php if (current_user_can('administrator')) { ?>
						<span class="btn btn-classic btn-small pull-right mr-1 cursor btn-border approve-ad" data-toggle="modal" data-target="#approve-ad-modal"><?php echo __('Approve/Reject', 'ladystar') ?></span>
					<?php } ?>
					
					<a href="<?php echo pll_get_page_url('user') . '?action=my-ads'; ?>" class="btn btn-classic btn-small pull-right mr-1 cursor"><?php echo __('My Ads', 'ladystar'); ?></a>
			
					<a href="#" class="btn btn-classic btn-small pull-right mr-1 cursor" data-toggle="modal" data-target="#modal-ad-options"><?php echo __('Manage Your Ad', 'ladystar') ?></a>
					
					<a href="#" class="btn btn-classic btn-small pull-right mr-1 cursor" data-toggle="modal" data-target="#modal-promote-options"><?php echo __('Promote Ad', 'ladystar') ?></a>
					
					<?php if($listing_status!='approved') { ?>
						<span class="tag tag-status-<?php echo strtolower($listing_status) ?> listing-status" style="cursor:no-drop"><?php echo __('Status: '. ucwords(str_replace('_', ' ', $listing_status)), 'ladystar') ?></span>
					<?php } ?>
					
					<?php echo devon_promote_modal(get_the_ID()); ?>
					
					<!-- Manage Ad Modal -->
					<div class="modal fade modal-form devon-modal modal-ad-options" id="modal-ad-options" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h3><?php echo __('Ad Options', 'ladystar'); ?></h3>									
									<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
								</div>
								<div class="modal-body">
									<a href="<?php echo $action_url ?>" title="Edit Ad" class="btn-classic btn-no-shadow btn-small d-block mb-2"><i class="fa fa-edit"></i> <?php echo __('Edit Ad', 'ladystar'); ?></a>
									
									<a href="<?php echo $manage_image_url ?>" title="Manage Images" class="btn-classic btn-no-shadow btn-small d-block mb-2"><i class="fa fa-picture-o"></i> <?php echo __('Manage Images', 'ladystar'); ?></a>
									
									<?php if($listing_status=='approved') {
										if(devon_if_activated()) { ?>
											<?php echo __('You can disable the Ad to hide it from the searches.', 'ladystar'); ?>
											<a href="#" title="Deactivate Ad" class="btn-classic btn-border btn-no-shadow btn-small d-block mb-2 btn-activate-listing" data-action="deactivate" data-id="<?php echo get_the_ID(); ?>"><?php echo __('Deactivate Listing', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
										<?php } else { ?>
											<?php echo __('You need to activate the Ad to make it visible to the users.', 'ladystar'); ?>
											<a href="#" title="Activate Ad" class="btn-classic btn-border btn-no-shadow btn-small d-block mb-2 btn-activate-listing" data-action="activate" data-id="<?php echo get_the_ID(); ?>"><?php echo __('Activate Listing', 'ladystar') ?> <i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </a>
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
																		'pending' => __('Pending', 'ladystar'),
																		'rejected' => __('Rejected', 'ladystar'),
																		'approved' => __('Approved', 'ladystar'),
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
	
	<?php if(sizeof($listing_images)) { ?>
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
	<?php } ?>

	<!-- Posts List -->
	<div class="profile-reviews container listing-preview-wp">

		<div class="row blog-entry-wr">
			<div class="col-lg-9">

				<div class="profile-entry">
					<div class="profile-info">
						<header class="profile-header">
							<h2 class="profile-title"><?php the_title(); ?> <span class="ad-price">(<?php echo $price . ' ' . __('BGN', 'ladystar'); ?>)</span></h2>
							<p class="rating hidden">
								<i class="fa fa-star active" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</p>
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
						</div>
						<div class="model-description"><?php echo get_the_content(); ?></div>
					</div>
				</div>

				<div class="devon_sw_win_wrapper">
					<div class="ci sw_widget sw_wrap">
						<div class="bootstrap-wrapper" id="listing-preview">
							<div class="widget widget-box box-container widget-overview visible-sm visible-xs field_1">
								<div class="widget-header text-uppercase">
									<h2 class="CATEGORY"><?php echo __('Overview', 'ladystar'); ?></h2>
								</div>

								<div class="model-attr">

									<?php if(is_array($taxonomies['locations']) && sizeof($taxonomies['locations'])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo __('Locations', 'ladystar'); ?>: </span>
											<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['locations'], 'locations'); ?></span>
										</p>
									<?php } ?>												
									
									<?php if(is_array($taxonomies['services']) && sizeof($taxonomies['services'])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo __('Services', 'ladystar'); ?>: </span>
											<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['services'], 'services'); ?></span>
										</p>
									<?php } ?>												
								
									<?php if(is_array($taxonomies['languages']) && sizeof($taxonomies['languages'])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo __('Languages', 'ladystar'); ?>: </span>
											<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['languages'], 'languages'); ?></span>
										</p>
									<?php } ?>
									
									<?php if(is_array($taxonomies['service_locations']) && sizeof($taxonomies['service_locations'])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo __('Service Locations', 'ladystar'); ?>: </span>
											<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['service_locations'], 'service_locations'); ?></span>
										</p>
									<?php } ?>
									
									<?php if(is_array($taxonomies['service_categories']) && sizeof($taxonomies['service_categories'])) { ?>
										<p class="attr-item">
											<span class="attr-name"><?php echo __('Service Categories', 'ladystar'); ?>: </span>
											<span class="attr-value"><?php echo devon_get_terms_link($taxonomies['service_categories'], 'service_categories'); ?></span>
										</p>
									<?php } ?>
									
								</div>

							</div>
							<!-- /. widget-category -->						
						</div>
					</div>
				</div>
				
				<div class="devon_sw_win_wrapper">
					<div class="ci sw_widget sw_wrap">
						<div class="bootstrap-wrapper" id="listing-preview">
							<div class="widget widget-box box-container widget-overview visible-sm visible-xs field_1">
								<div class="widget-header text-uppercase">
									<h2 class="CATEGORY"><?php echo __('Contact', 'ladystar'); ?></h2>
								</div>

								<div class="model-attr">

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

							</div>
							<!-- /. widget-category -->						
						</div>
					</div>
				</div>
				
				<?php if(0) { // disabled reviews and related listings ?>					
					<hr style="margin:30px 0;">
					<?php include_once('partials/single-listing/reviews-template.php'); ?>				
					<hr style="margin:30px 0;">							
					<?php include_once('partials/single-listing/related-listings.php'); ?>				
				<?php } ?>
				
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
					<?php 
						if (current_user_can('administrator') OR $user_id==$author_id OR current_user_can('edit_listing', get_the_ID()) ) {
							echo '<div style="border-top: 1px solid #ea1d5e; border-bottom: 1px solid #ea1d5e; padding: 8px 0">';
								if($current_user->roles[0] == 'subscriber') 
									echo '<h3 style="text-align:center;">'.__('This is your ad.', 'ladystar').'</h3>';
								else 
									echo '<h3 style="text-align:center;">'.__('Administrator', 'ladystar').'</h3>'; ?>
							</div>
							<div id="listings-meta" class="widget widget_archive side">
								<table class="table table-responsive table-border">
									<tbody>
										<tr>
											<td class="font-weight-bold"><?php echo __('Posted on', 'ladystar'); ?></td>
											<td><?php echo devon_dater(get_the_date(), 'default', 'j M, Y'); ?></td>
										</tr>
										<?php if(isset($custom['listing_status'][0])) { ?>
										<tr>
											<td class="font-weight-bold"><?php echo __('Status', 'ladystar'); ?></td>
											<td><span class="color-<?php echo $custom['listing_status'][0]; ?>"><?php echo devon_ucwords($custom['listing_status'][0]); ?></span></td>
										</tr>
										<?php } ?>
										<tr>
											<td class="font-weight-bold"><?php echo __('Position', 'ladystar'); ?></td>
											<td><?php echo $ad_position; ?></td>
										</tr>
										<tr>
											<td class="font-weight-bold"><?php echo __('Featured in Ads', 'ladystar'); ?></td>
											<td><?php echo $featured_in_listings; ?></td>
										</tr>
										<tr>
											<td class="font-weight-bold"><?php echo __('Viewed in Detail', 'ladystar'); ?></td>
											<td><?php echo $viewed_in_detail; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							
							<a href="#" class="btn btn-classic btn-small mr-1 d-block cursor" data-toggle="modal" data-target="#modal-ad-options" style="height:auto;"><?php echo __('Ad Options', 'ladystar') ?></a>					
					<?php } 
					else { 
						$args = array( 'hide_empty=1' );						 
						$terms = get_terms( 'locations', $args );
						if ( !empty($terms) && !is_wp_error($terms) ) {
							$count = count( $terms ); $i = 0;
							$term_list = '';
							$term_list .= '<div id="locations_index" class="widget wiget_categories widget_archive widget_locations_index side">'; 
								$term_list .= '<h2 class="widget-title"><span>'.__('Locations', 'ladystar').'</span></h2>'; 
								$term_list .= '<ul id="locations_index" class="locations_index">';
									foreach ( $terms as $term ) {
										$i++;
										$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'ladystar' ), $term->name ) ) . '">' . $term->name . '</a></li>';
									}
								$term_list .= '</ul>';
							$term_list .= '</div>'; 
							
							echo $term_list; 
						}
					} ?>
					
				</div>
				<!-- /.widget-ads-->
			</aside>
		</div>
	</div>
	<!-- End Post List -->
	
	<div class="related-ads container mt-4">	
		<?php 
			$slug = $taxonomies['service_categories'][0]['slug']; 
			$name = 'More in category '.$taxonomies['service_categories'][0]['name']; 
			echo do_shortcode('[displayListings number="6" title="'.$name.'" service_category="'.$slug.'"]'); 
		?>
	</div>
	
	
	<!-- Dating -->
	<section class="home-section mt-4">
		<h2 class="section-title lines"><span class=""><?php echo __('Random Top Picks', 'ladystar'); ?></span></h2>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<?php echo do_shortcode('[datingWidgets service_category="woman-looking-for-man"]') ?>
				</div>
				<div class="col-md-3">
					<?php echo do_shortcode('[datingWidgets service_category="man-looking-for-man"]') ?>
				</div>
				<div class="col-md-3">
					<?php echo do_shortcode('[datingWidgets service_category="woman-looking-for-man	"]') ?>
				</div>
				<div class="col-md-3">
					<?php echo do_shortcode('[datingWidgets service_category="massage"]') ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Dating -->


<?php endwhile; ?>
<?php get_footer(); ?>