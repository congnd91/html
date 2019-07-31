<?php 

global $devon_opts; 
$id = $_GET['id'];
$post = get_post($id);
$content = $post->post_content;
$custom = get_post_custom($id);
$taxonomies = devon_wp_get_post_terms($id); 

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
$service_locations = get_terms(['taxonomy' => 'service_locations','hide_empty' => false]);
$services = get_terms(['taxonomy' => 'services','hide_empty' => false]);
$languages = get_terms(['taxonomy' => 'languages','hide_empty' => false]);
$service_categories = get_terms(['taxonomy' => 'service_categories','hide_empty' => false]);

// Prepare Post Taxonomies of the current post - to check the 
// already selected taxonomies
foreach($taxonomies['services'] as $service) {
	$post_services[] = $service['name'];
}
foreach($taxonomies['service_locations'] as $service_location) {
	$post_service_locations[] = $service_location['name'];
}
foreach($taxonomies['locations'] as $location) {
	$post_locations[] = $location['term_id'];
}
foreach($taxonomies['languages'] as $language) {
	$post_languages[] = $language['name'];
}
if ($service_categories) {
    foreach ($taxonomies['service_categories'] as $category) {
        $post_service_categories[] = $category['term_id'];
    }
}

$output = ''; 
if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='edit-listing') {
	$output = action_edit_listing(); 
}
?>

<div class="user-main">
	<h2><?php echo esc_html__('Edit Ad', 'ladystar') ?></h2>
	<?php if( !empty($output) ){ ?>
		<div class="alert alert-info">
			<?php echo $output; ?>
		</div>
	<?php } ?>
	<form class="add-new-listing-form" method="post" action="<?php echo pll_get_page_url('user'); ?>?action=edit-listing&id=<?php echo $id ?>" enctype="multipart/form-data">
		
		<div class="row">
			<!-- service_categories Input -->		
			<?php if($service_categories) { ?>
				<div class="form-group col-lg-3">
					<label for="service_categories"><?php echo esc_html__('Service Category', 'ladystar') ?></label>
					<select name="service_categories" class="form-control selectpicker" title="Nothing selected">
						<option value="" selected="selected"><?php echo __('Choose Category', 'ladystar'); ?></option>
						<?php echo ladystar_create_options_for_taxonomy($service_categories, $post_service_categories[0]); ?>
					</select>
				</div>
			<?php } ?>
			
			<!-- location Input -->		
			<div class="form-group col-lg-3">
				<label for="location[]"><?php echo esc_html__('Location', 'ladystar') ?></label>
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
			
			<!-- phone Input -->		
			<div class="form-group col-lg-3">
				<label for="phone"><?php echo esc_html__('Phone', 'ladystar') ?></label>
				<select name="phone[]" class="form-control custom-select" required>
					<option value=""><?php echo esc_html__('Choose Phone', 'ladystar') ?></option>
					<?php 
						if(sizeof($phones)) {
							foreach($phones as $phone) { 
								$selected = '';
								if(in_array($phone['phone'], $post_phones)) 
									$selected = 'selected'; ?>
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
							$selected = '';
							if(in_array($email['email'], $post_emails)) 
								$selected = 'selected'; ?>
								<option value="<?php echo $email['email']; ?>" <?php echo $selected ?>><?php echo $email['email']; ?></option>
							<?php }
						}
					?>
				</select>
			</div>
			
		</div>
		
		<div class="form-group">
			<label for="listingtitle"><?php echo esc_html__('Title', 'ladystar') ?></label>
			<input type="text" name="listingtitle" class="form-control" aria-describedby="listingtitle" placeholder="Enter Title" value="<?php echo get_the_title($id) ?>" required>
		</div>
		<div class="form-group">
			<label for="description"><?php echo esc_html__('Description', 'ladystar') ?></label>
			<textarea name="description" class="form-control" rows="4" aria-describedby="description" placeholder="Enter Listing description" required><?php echo $content ?></textarea>
		</div>
			
		<div class="row">
				
			<!-- price Input -->		
			<div class="form-group col-lg-2">
				<label for="price"><?php echo esc_html__('Price BGN', 'ladystar') ?></label>
				<input type="text" name="price" class="form-control" aria-describedby="price" placeholder="Enter Price" value="<?php echo $custom['price'][0] ?>" required>	
			</div>						
			
			<!-- age Input -->		
			<div class="form-group col-lg-2">
				<label for="age"><?php echo esc_html__('Age', 'ladystar') ?></label>
				<input type="text" name="age" class="form-control" aria-describedby="age" placeholder="Enter Age" value="<?php echo $custom['age'][0] ?>" required>	
			</div>						
			
			<!-- weight Input -->		
			<div class="form-group col-lg-2">
				<label for="weight"><?php echo esc_html__('Weight', 'ladystar') ?></label>
				<input type="text" name="weight" class="form-control" aria-describedby="weight" placeholder="Enter Weight" value="<?php echo $custom['weight'][0] ?>" required>
			</div>						
			
			<!-- height Input -->		
			<div class="form-group col-lg-2">
				<label for="height"><?php echo esc_html__('Height', 'ladystar') ?></label>
				<input type="text" name="height" class="form-control" aria-describedby="height" placeholder="Enter Height(cm)" value="<?php echo $custom['height'][0] ?>" required>
			</div>
			
			<!-- hair_color Input -->		
			<div class="form-group col-lg-2">
				<label for="hair_color"><?php echo esc_html__('Hair Color', 'ladystar') ?></label>
				<select name="hair_color" class="form-control selectpicker" title="Nothing selected">
					<option value="" selected="selected">Choose Hair</option>
					<?php echo ladystar_create_options_from_list($devon_opts['hair_color'], $custom['hair_color'][0]); ?>
				</select>				
			</div>
			
			<!-- eyes Input -->		
			<div class="form-group col-lg-2">
				<label for="eyes"><?php echo esc_html__('Eyes', 'ladystar') ?></label>
				<select name="eyes" class="form-control selectpicker" title="Nothing selected">
					<option value="" selected="selected"><?php echo __('Choose Eyes', 'ladystar'); ?></option>
					<?php echo ladystar_create_options_from_list($devon_opts['eyes'], $custom['eyes'][0]); ?>
				</select>
			</div>
			
		</div>
		
		<div class="row">
			<!-- services Input -->		
			<?php if(sizeof($services)) { ?>
				<div class="form-group col-lg-12">
					<label for="service"><?php echo esc_html__('Services', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($services as $service) { ?>
							<?php $checked = (in_array($service->name, $post_services)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="service[]" value="<?php echo $service->name; ?>" <?php echo $checked; ?>> <?php echo $service->name; ?></label>
						<?php } ?>						
					</div>
				</div>
			<?php } ?>
			
			<!-- language Input -->		
			<?php if(sizeof($languages)) { ?>
				<div class="form-group col-lg-6">
					<label for="language"><?php echo esc_html__('Spoken Languages', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($languages as $language) { ?>
							<?php $checked = (in_array($language->name, $post_languages)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="language[]" value="<?php echo $language->name; ?>" <?php echo $checked; ?>> <?php echo $language->name; ?></label>
						<?php } ?>						
					</div>
				</div>
			<?php } ?>
			
			<!-- service_location Input -->		
			<?php if(sizeof($service_locations)) { ?>
				<div class="form-group col-lg-6">
					<label for="service_location[]"><?php echo esc_html__('Service Location', 'ladystar') ?></label>
					<div class="checkboxes">
						<?php foreach($service_locations as $service_location) { ?>
							<?php $checked = (in_array($service_location->name, $post_service_locations)) ? 'checked' : ''; ?>
							<label><input type="checkbox" name="service_location[]" value="<?php echo $service_location->name; ?>" <?php echo $checked; ?>> <?php echo $service_location->name; ?></label>
						<?php } ?>						
					</div>
				</div>
			<?php } ?>
		
		</div>
		
		<div class="row">
			<div class="col-lg-12">	
				<input type="hidden" name="post_id" value="<?php echo $id ?>">
				<input type="hidden" name="submit-action" value="edit-listing">
				<?php wp_nonce_field( 'edit-listing-nonce', 'devon_wpnonce' ); ?>
				<button name="submit" class="btn btn-primary btn-add-new-listing"><?php echo esc_html__('Update', 'ladystar') ?></button>
			</div>
		</div>
		
	</form>
</div>