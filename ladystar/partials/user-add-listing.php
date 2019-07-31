<?php 

global $devon_opts; 
$output = '';
$fields = array();

// Get user phones and emails data
$phones = devon_get_user_phones($user_id); 
$emails = devon_get_user_emails($user_id);

// Get All Taxonomies for dropdowns
$locations = get_terms(['taxonomy' => 'locations','hide_empty' => false]);
$service_locations = get_terms(['taxonomy' => 'service_locations','hide_empty' => false]);
$services = get_terms(['taxonomy' => 'services','hide_empty' => false]);
$languages = get_terms(['taxonomy' => 'languages','hide_empty' => false]);
$service_categories = get_terms(['taxonomy' => 'service_categories','hide_empty' => false]);
//print_r($service_categories); 

// Add Listing if the data is posted
if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='add-listing') {
	$output = action_add_new_listing(); 	
	$fields = $_POST;
}

$title = isset($fields['listingtitle']) ? sanitize_text_field($fields['listingtitle']) : '';
$description = isset($fields['description']) ? sanitize_text_field($fields['description']) : '';
$price = isset($fields['price']) ? sanitize_text_field($fields['price']) : '';
$age = isset($fields['age']) ? sanitize_text_field($fields['age']) : '';
$weight = isset($fields['weight']) ? sanitize_text_field($fields['weight']) : '';
$height = isset($fields['height']) ? sanitize_text_field($fields['height']) : '';
$hair_color = isset($fields['hair_color']) ? sanitize_text_field($fields['hair_color']) : '';
$eyes = isset($fields['eyes']) ? sanitize_text_field($fields['eyes']) : '';
$post_emails = isset($fields['email']) ? maybe_unserialize($fields['email']) : array();
$post_phones = isset($fields['phone']) ? maybe_unserialize($fields['phone']) : array();
$post_locations = isset($fields['location']) ? maybe_unserialize($fields['location']) : array();
$post_service_locations = isset($fields['service_location']) ? maybe_unserialize($fields['service_location']) : array();
$post_services = isset($fields['service']) ? maybe_unserialize($fields['service']) : array();
$post_languages = isset($fields['language']) ? maybe_unserialize($fields['language']) : array();
$post_service_categories = isset($fields['service_categories']) ? maybe_unserialize($fields['service_categories']) : '';

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
	<h2><?php echo esc_html__('Add Ad', 'ladystar') ?></h2>
	<?php if( !empty($output) ){ ?>
		<div class="alert alert-info">
			<?php 
				if(is_array($output))  {
					$e = array( 'action' => 'user', 'category'=>'add-listing', 'label'=>$fields['locations'][0]);  
					devon_send_event($e); 
					echo $output['message'];
				} 
				else {
					echo $output;
				}					
			?>
		</div>
	<?php } ?>
	
	<form class="add-new-listing-form" method="post" action="<?php the_permalink(); ?>?action=add-listing" enctype="multipart/form-data">
		
		<div class="row">			
			<!-- service_categories Input -->		
			<?php if(sizeof($service_categories)) { ?>
				<div class="form-group col-lg-3">
					<label for="service_categories"><?php echo esc_html__('Service Category', 'ladystar') ?></label>
					<select name="service_categories" class="form-control selectpicker" title="Nothing selected">
						<option value="" selected="selected">Choose Category</option>
						<?php echo ladystar_create_options_for_taxonomy($service_categories, $post_service_categories); ?>
					</select>
				</div>
			<?php } ?>
			
			<!-- location Input -->		
			<div class="form-group col-lg-3">
				<label for="location[]"><?php echo esc_html__('Location', 'ladystar') ?></label>
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
		
		<div class="form-group">
			<label for="listingtitle"><?php echo esc_html__('Title', 'ladystar') ?></label>
			<input type="text" name="listingtitle" class="form-control" aria-describedby="listingtitle" placeholder="Enter Title" value="<?php echo $title ?>" required>
		</div>
		<div class="form-group">
			<label for="description"><?php echo esc_html__('Description', 'ladystar') ?></label>
			<textarea name="description" class="form-control" rows="4" aria-describedby="description" placeholder="Enter Ad description" required><?php echo $description ?></textarea>
		</div>
		
		<div class="row">
		
			<!-- price Input -->		
			<div class="form-group col-lg-2">
				<label for="price"><?php echo esc_html__('Price BGN', 'ladystar') ?></label>
				<input type="number" name="price" class="form-control" aria-describedby="price" placeholder="Enter Price" value="<?php echo $price ?>" required>						
			</div>						
			
			<!-- age Input -->		
			<div class="form-group col-lg-2">
				<label for="age"><?php echo esc_html__('Age', 'ladystar') ?></label>
				<input type="number" name="age" class="form-control" aria-describedby="age" placeholder="Enter Age" value="<?php echo $age ?>" required>						
			</div>						
			
			<!-- weight Input -->		
			<div class="form-group col-lg-2">
				<label for="weight"><?php echo esc_html__('Weight', 'ladystar') ?></label>
				<input type="number" name="weight" class="form-control" aria-describedby="weight" placeholder="Enter Weight (Kgs)" value="<?php echo $weight ?>" required>
			</div>						
				
			<!-- height Input -->		
			<div class="form-group col-lg-2">
				<label for="height"><?php echo esc_html__('Height', 'ladystar') ?></label>
				<input type="number" name="height" class="form-control" aria-describedby="height" placeholder="Enter Height (cm)" value="<?php echo $height ?>" required>
			</div>
		
			<!-- hair_color Input -->		
			<div class="form-group col-lg-2">
				<label for="hair_color"><?php echo esc_html__('Hair Color', 'ladystar') ?></label>
				<select name="hair_color" class="form-control selectpicker" title="Nothing selected">
					<option value="" selected="selected">Choose Hair</option>
					<?php echo ladystar_create_options_from_list($devon_opts['hair_color'], $hair_color); ?>
				</select>				
			</div>		
			
			<!-- eyes Input -->		
			<div class="form-group col-lg-2">
				<label for="eyes"><?php echo esc_html__('Eyes', 'ladystar') ?></label>
				<select name="eyes" class="form-control selectpicker" title="Nothing selected">
					<option value="" selected="selected">Choose Eyes</option>
					<?php echo ladystar_create_options_from_list($devon_opts['eyes'], $eyes); ?>
				</select>				
			</div>
		</div>
		
		<div class="row">
			
			<!-- services Input -->		
			<?php if(sizeof($services)) { ?>
				<div class="form-group col-lg-12">
					<label for="service"><?php echo esc_html__('Services', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($services as $service) {
							$checked = (in_array($service->name, $post_services)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="service[]" value="<?php echo $service->name; ?>" <?php echo $checked; ?>> <?php echo $service->name; ?></label>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
			
			<!-- service_locations Input -->		
			<?php if(sizeof($service_locations)) { ?>
				<div class="form-group col-lg-6">
					<label for="service_location[]"><?php echo esc_html__('Service Location', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($service_locations as $service_location) { 
							$checked = (in_array($service_location->name, $post_service_locations)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="service_location[]" value="<?php echo $service_location->name; ?>" <?php echo $checked; ?>> <?php echo $service_location->name; ?></label>
						<?php } ?>						
					</div>
				</div>
			<?php } ?>				
			
			<!-- languages Input -->		
			<?php if(sizeof($languages)) { ?>
				<div class="form-group col-lg-6">
					<label for="language"><?php echo esc_html__('Spoken Languages', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($languages as $language) {
							$checked = (in_array($language->name, $post_languages)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="language[]" value="<?php echo $language->name; ?>" <?php echo $checked; ?>> <?php echo $language->name; ?></label>
						<?php } ?>
					</div>
				</div>
			<?php } ?>		
			
		</div>	
		
		<div class="row">
			<div class="col-lg-12">	
				<input type="hidden" name="submit-action" value="add-listing">
				<?php wp_nonce_field( 'add-listing-nonce', 'devon_wpnonce' ); ?>
				<button name="submit" class="btn btn-primary btn-add-new-listing"><?php echo esc_html__('Submit', 'ladystar') ?></button>
			</div>	
		</div>	
		
	</form>
</div>