<?php 

global $devon_opts; 
$output = '';
$fields = array();

// Get user phones and emails data
$phones = devon_get_user_phones($user_id); 
$emails = devon_get_user_emails($user_id);

// Get All Taxonomies for dropdowns
$amenities = get_terms(['taxonomy' => 'amenities','hide_empty' => false]);
$locations = get_terms(['taxonomy' => 'locations','hide_empty' => false]);

// Add Listing if the data is posted
if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='add-listing') {
	$output = action_add_new_room(); 	
	$fields = $_POST;
}

$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
$location = isset($fields['location']) ? sanitize_text_field($fields['location']) : '';
$post_emails = isset($fields['email']) ? maybe_unserialize($fields['email']) : array();
$post_phones = isset($fields['phone']) ? maybe_unserialize($fields['phone']) : array();
$post_amenities = isset($fields['amenity']) ? maybe_unserialize($fields['amenity']) : array();

?>

<?php // User Notices if the emails and/or phones are not added already ?>
<?php if(!sizeof($phones) or !sizeof($emails)) { ?>
	<div class="my-ads-container" style="overflow:hidden;">
		<?php if(!sizeof($phones) && !sizeof($emails)) { ?>
			<p class="alert alert-info">
				<?php _e('Please add atlese one phone number and one email to your profile before you add an Ad.', 'ladystar'); ?> 
				<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=phones"><?php echo esc_html__('Add Phones', 'ladystar') ?></a>
			</p>
		<?php } else if(!sizeof($phones)) { ?>
			<p class="alert alert-info">
				<?php _e('You have not added any phone numbers to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
				<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=phones"><?php echo esc_html__('Add Phones', 'ladystar') ?></a>
			</p>
		<?php } else if(!sizeof($emails)) { ?>
			<p class="alert alert-info">
				<?php _e('You have not added any emails to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
				<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=emails"><?php echo esc_html__('Add Emails', 'ladystar') ?></a>
			</p>
		<?php } ?>
	</div>
<?php } ?>

<!-- Add Listing Form --> 
<div class="user-main">
	<h2><?php echo esc_html__('Add Leisure Room', 'ladystar') ?></h2>
	<?php if( !empty($output) ){ ?>
		<div class="alert alert-info">
			<?php 
				if(is_array($output))  {
					$e = array( 'action' => 'user', 'category'=>'add-room', 'label'=>$fields['amenities'][0]);  
					devon_send_event($e); 
					echo $output['message'];
				} 
				else {
					echo $output;
				}					
			?>
		</div>
	<?php } ?>
	
	<form class="add-new-listing-form" method="post" action="<?php the_permalink(); ?>?action=add-room" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="listingtitle"><?php echo esc_html__('Title', 'ladystar') ?></label>
			<input type="text" name="listingtitle" class="form-control" aria-describedby="listingtitle" placeholder="Enter Title" value="<?php echo $title ?>" required>
		</div>
		<div class="form-group">
			<label for="description"><?php echo esc_html__('Description', 'ladystar') ?></label>
			<textarea name="description" class="form-control" rows="4" aria-describedby="description" placeholder="Enter Ad description" required><?php echo $description ?></textarea>
		</div>
		
		<div class="row">		
			
			<!-- location Input -->		
			<div class="form-group col-lg-3">
				<label for="location[]"><?php echo esc_html__('Location', 'ladystar') ?></label>
				<?php // Input text: echo '<input type="text" name="location" class="form-control" aria-describedby="location" placeholder="Enter Location" value=".'$location.'" required>'; ?>
				<select name="location[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Location', 'ladystar') ?></option>
					<?php 
						if(sizeof($locations)) {
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
			<div class="form-group col-lg-3">
				<label for="price"><?php echo esc_html__('Price BGN', 'ladystar') ?></label>
				<input type="number" name="price" class="form-control" aria-describedby="price" placeholder="Enter Price" value="<?php echo $price ?>" required>						
			</div>							

			<!-- phone Input -->		
			<div class="form-group col-lg-3">
				<label for="phone"><?php echo esc_html__('Phone', 'ladystar') ?></label>
				<select name="phone[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Phone', 'ladystar') ?></option>
					<?php if(sizeof($phones)) { ?>
						<?php foreach($phones as $phone) { ?>
							<?php $selected = (in_array($phone['phone'], $post_phones)) ? 'selected' : ''; ?>
							<option value="<?php echo $phone['phone']; ?>"<?php echo $selected ?>><?php echo $phone['phone']; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>
			
			<!-- email Input -->		
			<div class="form-group col-lg-3">
				<label for="email"><?php echo esc_html__('Email Address', 'ladystar') ?></label>
				<select name="email[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Email', 'ladystar') ?></option>
					<?php if(sizeof($emails)) { ?>
						<?php foreach($emails as $email) { ?>
							<?php $selected = (in_array($email['email'], $post_emails)) ? 'selected' : ''; ?>
							<option value="<?php echo $email['email']; ?>"<?php echo $selected ?>><?php echo $email['email']; ?></option>
						<?php } ?>
					<?php } ?>
				</select>
			</div>			
			
		</div>
		
		<div class="row">
			
			<!-- services Input -->		
			<?php if(sizeof($amenities)) { ?>
				<div class="form-group col-lg-12">
					<label for="amenity"><?php echo esc_html__('Amenities', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($amenities as $amenity) {
							$checked = (in_array($amenity->name, $post_amenities)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="amenity[]" value="<?php echo $amenity->name; ?>" <?php echo $checked; ?>> <?php echo $amenity->name; ?></label>
						<?php } ?>
					</div>
				</div>
			<?php } ?>				
			
		</div>	
		
		<div class="row">
			<div class="col-lg-12">	
				<input type="hidden" name="submit-action" value="add-listing">
				<?php wp_nonce_field( 'add-room-nonce', 'devon_wpnonce' ); ?>
				<button name="submit" class="btn btn-primary btn-add-new-room"><?php echo esc_html__('Submit', 'ladystar') ?></button>
			</div>	
		</div>	
		
	</form>
</div>