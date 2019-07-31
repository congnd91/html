<?php 

$username = $current_user->user_login; 
$user_email = $current_user->user_email; 

if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='change-password' ) {
	require_once( get_stylesheet_directory() . '/lib/actions/profile.php');
	$update = devon_update_password(); 
}
	
?>

<div class="user-main">
	<h2><?php echo esc_html__('Change Password', 'ladystar') ?></h2>	
	<?php 	
		if(isset($_POST) && isset($_POST['submit-action']) && $_POST['submit-action']=='change-password' ) {
			
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
	
	<form class="update-user-profile" method="post" action="<?php echo devon_get_user_page('change-password'); ?>">
		<div class="form-group">
			<label for="current_password"><?php echo esc_html__('Current Password*', 'ladystar') ?></label>
			<input type="password" name="current_password" class="form-control" id="current_password" value="<?php echo devon_get_post_param('current_password'); ?>">
		</div>
		<div class="form-group">
			<label for="password"><?php echo esc_html__('Password*', 'ladystar') ?></label>
			<input type="password" name="password" class="form-control" id="password">
		</div>
		<div class="form-group">
			<label for="confirm_password"><?php echo esc_html__('Confirm Password*', 'ladystar') ?></label>
			<input type="password" name="confirm_password" class="form-control" id="confirm_password">
		</div>
		<input type="hidden" name="submit-action" value="change-password">
		<?php wp_nonce_field( 'devon_update_password', 'dnonce' ); ?>		
		<button name="submit" class="btn btn-primary"><?php echo esc_html__('Submit', 'ladystar') ?></button>
		<a class="btn pull-right" href="<?php echo devon_get_user_page('user-settings'); ?>" title="<?php _e('Settings', 'ladystar'); ?>"><?php _e('Change Password', 'ladystar'); ?></a>
	</form>
</div>