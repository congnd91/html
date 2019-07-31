<?php 

$username = $current_user->user_login; 
$user_email = $current_user->user_email; 

$page_url = pll_get_page_url('user') . '?action=user-settings'; 
$change_password_url = pll_get_page_url('user') . '?action=change-password'; 

if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='update-profile' ) {
	require_once( get_stylesheet_directory() . '/lib/actions/profile.php');
	$update = devon_update_profile(); 
}

$languages = array(
	'en' => __('English', 'ladystar'), 
	'bg' => __('Bulgarian', 'ladystar'), 
); 
$current_language = get_user_meta($current_user->ID, 'preferred_language', true); 
	
?>

<div class="user-main">
	<h2><?php echo esc_html__('My Profile', 'ladystar') ?></h2>	
	<?php 	
		if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='update-profile' ) {
			
			if($update['reload']) {
				echo "<script>setTimeout(function() {location.reload();}, 1500);</script>";
			}
			
			$username = $_POST['username'];
			$user_email = $_POST['user_email'];
			
			if(sizeof($update['errors'])) {
				echo '<ul>'; 
					foreach($update['errors'] as $error) echo '<li>'.$error.'</li>';
				echo '</ul>'; 
			}
			if(sizeof($update['success'])) {
				echo '<ul>'; 
					foreach($update['success'] as $s) echo '<li>'.$s.'</li>';
				echo '</ul>'; 
			}
			
		}
	?>
	
	<form class="update-user-profile" method="post" action="<?php echo devon_get_user_page('user-settings'); ?>">
		<div class="form-group">
			<label for="username"><?php echo esc_html__('Username*', 'ladystar') ?></label>
			<input type="text" name="username" class="form-control" aria-describedby="usernameHelp" placeholder="Enter username" value="<?php echo $username; ?>">
		</div>
		<div class="form-group">
			<label for="user_email"><?php echo esc_html__('Email address*', 'ladystar') ?></label>
			<input type="email" name="user_email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $user_email; ?>">
			<small id="emailHelp" class="form-text text-muted hidden">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="preferred_language"><?php echo esc_html__('Preferred Language*', 'ladystar') ?></label>
			<select class="form-control" name="preferred_language">
				<?php echo ladystar_create_options_from_array($languages, $current_language); ?>
			</select>
		</div>
		<input type="hidden" name="submit-action" value="update-profile">
		<?php wp_nonce_field( 'devon_update_profile', 'dnonce' ); ?>		
		<button name="submit" class="btn btn-primary"><?php echo esc_html__('Submit', 'ladystar') ?></button>
		
		<a class="btn pull-right" href="<?php echo devon_get_user_page('change-password'); ?>" title="<?php _e('Change Password', 'ladystar'); ?>"><?php _e('Change Password', 'ladystar'); ?></a>
	</form>
</div>