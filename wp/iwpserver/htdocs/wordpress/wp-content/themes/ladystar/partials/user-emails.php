<?php 
$emails = devon_get_user_emails($user_id); 
$phones = devon_get_user_phones($user_id); 
?>

<?php if(sizeof($emails) && !sizeof($phones)) { ?>
	<p class="alert alert-info">
		<?php _e('You have not added any phone numbers to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
		<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=phones"><?php echo esc_html__('Add Phones', 'ladystar') ?></a>
	</p>
<?php } ?>

<div class="user-main">
	<h2><?php echo esc_html__('My Emails', 'ladystar') ?></h2>
	
	<table class="table table-border table-striped">
		<thead>
			<tr>
				<th><i class="fa fa-envelope"></i></th>
				<th><?php echo esc_html__('Email ID', 'ladystar') ?></th>
				<th><?php echo esc_html__('Ads', 'ladystar') ?></th>
				<th><?php echo esc_html__('Added', 'ladystar') ?></th>
				<th><?php echo esc_html__('Modified', 'ladystar') ?></th>
				<th><?php echo esc_html__('Edit', 'ladystar') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(sizeof($emails)) { ?>
				<?php foreach($emails as $email) { ?>
					<tr>
						<td><i class="fa fa-envelope"></i></td>
						<td><?php echo $email['email']; ?></td>
						<td><?php if(isset($email['ads'])) echo sizeof($email['ads']); ?></td>
						<td><?php echo $email['date']; ?></td>
						<td><?php echo $email['last_modified']; ?></td>
						<td>
							<span class="edit-email" data-toggle="modal" data-target="#edit-email-modal" data-user="<?php echo $user_id; ?>" data-email="<?php echo $email['email']; ?>">
								<i class="fa fa-pencil"></i>
							</span>
							<span class="delete-email" data-user="<?php echo $user_id; ?>" data-email="<?php echo $email['email']; ?>" data-action="delete-email">
								<i class="fa fa-trash"></i>
							</span>
						</td>
					</tr>						
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan=5 class="text-center">
						<?php _e('Please add atlest one phone number before you add a listing.', 'ladystar'); ?> 
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
		
	<div class="form-container add-email-container">
		<span data-toggle="modal" data-target="#add-email-modal" class="btn btn-primary"><?php echo esc_html__('Add Email', 'ladystar') ?></span>		
		
		<div class="modal fade modal-form devon-modal add-email-modal" id="add-email-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
					</div>
					<div class="modal-body search-form">
						<div class="sign-form-inner">
							<div class="form-wr log-in-form active">
								<p class="title"><?php echo esc_html__('Add New Email', 'ladystar') ?></p>
								<form id="form-edit-email" class="form">
									<div class="alerts-box"></div>
									<div class=" first-line">
										<div class="form-group">
											<input class="form-control" id="input-add-email" name="email" type="email" value="" placeholder="Enter Email" required>
										</div>
										<!-- /.form-group -->
									</div>

									<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">									

									<div class="form-group">
										<button type="submit" class="btn-classic no-margin load_ind submit-add-email" data-user="<?php echo $user_id; ?>" data-action="add-email">Add<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </button>
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
	
		<div class="modal fade modal-form devon-modal edit-email-modal" id="edit-email-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
					</div>
					<div class="modal-body search-form">
						<div class="sign-form-inner">
							<div class="form-wr log-in-form active">
								<p class="title"><?php echo esc_html__('Edit Email', 'ladystar') ?></p>
								<form id="form-edit-email" class="form">
									<div class="alerts-box"></div>
									<div class=" first-line">
										<div class="form-group">
											<input class="form-control" id="input-edit-email" name="email" type="email" value="" placeholder="Enter Email" required>
										</div>
										<!-- /.form-group -->
									</div>

									<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">									

									<div class="form-group">
										<button type="submit" class="btn-classic no-margin load_ind submit-edit-email" data-user="<?php echo $user_id; ?>" data-email="" data-action="edit-email">Edit<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </button>
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
	</div>
	
</div>