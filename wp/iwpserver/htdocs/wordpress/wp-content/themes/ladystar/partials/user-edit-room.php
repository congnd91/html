<?php 

global $devon_opts; 
$id = $_GET['id'];
$post = get_post($id);
$content = $post->post_content;
$custom = get_post_custom($id);
$taxonomies = devon_wp_get_post_terms($id, 'leisure-rooms'); 

// Get Post Thumbnail and URL
$url = get_the_post_thumbnail_url();
$attachment_id = get_post_thumbnail_id();

// Get Listing Phone and Email
$post_phones = maybe_unserialize($custom['phone'][0]);
$post_emails = maybe_unserialize($custom['email'][0]);

// Get user phones and emails data
$phones = devon_get_user_phones($user_id); 
$emails = devon_get_user_emails($user_id);

// Get All Taxonomies for dropdowns
$locations = get_terms(['taxonomy' => 'locations','hide_empty' => false]);
$amenities = get_terms(['taxonomy' => 'amenities','hide_empty' => false]);

// Prepare Post Taxonomies of the current post - to check the 
// already selected taxonomies
foreach($taxonomies['amenities'] as $amenity) {
	$post_amenities[] = $amenity['name'];
}

$output = ''; 
if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='edit-room') {
	$output = action_edit_room(); 
}

foreach($taxonomies['locations'] as $location) {
	$post_locations[] = $location['term_id'];
}
?>

<div class="user-main">
	<h2><?php echo esc_html__('Edit Leisure Room', 'ladystar') ?></h2>
	<?php if( !empty($output) ){ ?>
		<div class="alert alert-info">
			<?php echo $output; ?>
		</div>
	<?php } ?>
	<form class="add-new-listing-form" method="post" action="<?php echo pll_get_page_url('user'); ?>?action=edit-room&id=<?php echo $id ?>" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="listingtitle"><?php echo esc_html__('Title', 'ladystar') ?></label>
			<input type="text" name="listingtitle" class="form-control" aria-describedby="listingtitle" placeholder="Enter Title" value="<?php echo get_the_title($id) ?>" required>
		</div>
		<div class="form-group">
			<label for="description"><?php echo esc_html__('Description', 'ladystar') ?></label>
			<textarea name="description" class="form-control" rows="4" aria-describedby="description" placeholder="Enter Listing description" required><?php echo $content ?></textarea>
		</div>
			
		<div class="row">
				
			<!-- location Input -->		
			<div class="form-group col-lg-2">
				<label for="location"><?php echo esc_html__('Location', 'ladystar') ?></label>
				<!--<input type="text" name="location" class="form-control" aria-describedby="location" placeholder="Enter Price" value="<?php // echo $custom['location'][0] ?>" required>-->
				<select name="location[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Location', 'ladystar') ?></option>
					<?php 
						if($locations) {
							foreach($locations as $location) { 
								$selected = '';
								if(in_array($location->term_id, $post_locations))
									$selected = 'selected'; ?>
								<option value="<?php echo $location->term_id; ?>" <?php echo $selected ?>><?php echo $location->name; ?></option>
							<?php }
						}
					?>
				</select>
			</div>		
			
			<!-- price Input -->		
			<div class="form-group col-lg-2">
				<label for="price"><?php echo esc_html__('Price BGN', 'ladystar') ?></label>
				<input type="text" name="price" class="form-control" aria-describedby="price" placeholder="Enter Price" value="<?php echo $custom['price'][0] ?>" required>	
			</div>	
			
			<!-- phone Input -->		
			<div class="form-group col-lg-3">
				<label for="phone"><?php echo esc_html__('Phone', 'ladystar') ?></label>
				<select name="phone[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Phone', 'ladystar') ?></option>
					<?php 
						if(sizeof($phones)) {
							foreach($phones as $phone) { 
								$selected = (isset($phone['phone']) && in_array($phone['phone'], $post_phones)) ? 'selected' : ''; ?>
								<option value="<?php echo $phone['phone']; ?>" <?php echo $selected ?>><?php echo $phone['phone']; ?></option>
							<?php }
						}
					?>
				</select>
			</div>
			
			<!-- email Input -->		
			<div class="form-group col-lg-3">
				<label for="email"><?php echo esc_html__('Email Address', 'ladystar') ?></label>
				<select name="email[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Email', 'ladystar') ?></option>
					<?php 
						if(sizeof($emails)) {
							foreach($emails as $email) { 
							$selected = (isset($email['email']) && in_array($email['email'], $post_emails)) ? 'selected' : ''; ?>
								<option value="<?php echo $email['email']; ?>" <?php echo $selected ?>><?php echo $email['email']; ?></option>
							<?php }
						}
					?>
				</select>
			</div>
			
		</div>
		
		<div class="row">
			<!-- amenities Input -->		
			<?php if(sizeof($amenities)) { ?>
				<div class="form-group col-lg-12">
					<label for="amenity"><?php echo esc_html__('Amenities', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($amenities as $amenity) { ?>
							<?php $checked = (in_array($amenity->name, $post_amenities)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="amenity[]" value="<?php echo $amenity->name; ?>" <?php echo $checked; ?>> <?php echo $amenity->name; ?></label>
						<?php } ?>						
					</div>
				</div>
			<?php } ?>
			
		</div>
		
		<div class="row">
			<div class="col-lg-12">	
				<input type="hidden" name="post_id" value="<?php echo $id ?>">
				<input type="hidden" name="submit-action" value="edit-room">
				<?php wp_nonce_field( 'edit-room-nonce', 'devon_wpnonce' ); ?>
				<button name="submit" class="btn btn-primary btn-add-new-listing"><?php echo esc_html__('Update', 'ladystar') ?></button>
			</div>
		</div>
		
	</form>
</div>