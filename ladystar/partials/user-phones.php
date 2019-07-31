<?php 
$phones = devon_get_user_phones($user_id); 
$emails = devon_get_user_emails($user_id); 
?>

<?php if(sizeof($phones) && !sizeof($emails)) { ?>
	<p class="alert alert-info">
		<?php _e('You have not added any emails to your profile yet. Please add them before you add an Ad.', 'ladystar'); ?> 
		<a class="btn btn-classic btn-small" href="<?php pll_get_page_url('user'); ?>?action=emails"><?php echo esc_html__('Add Emails', 'ladystar') ?></a>
	</p>
<?php } ?>

<div class="user-main">
	<h2><?php echo esc_html__('My Phones', 'ladystar') ?></h2>
	
	<table class="table table-border table-striped">
		<thead>
			<tr>
				<th><i class="fa fa-envelope"></i></th>
				<th><?php echo esc_html__('Phone ID', 'ladystar') ?></th>
				<th><?php echo esc_html__('Ads', 'ladystar') ?></th>
				<th><?php echo esc_html__('Added', 'ladystar') ?></th>
				<th><?php echo esc_html__('Modified', 'ladystar') ?></th>
				<th><?php echo esc_html__('Edit', 'ladystar') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php if(sizeof($phones)) { ?>
				<?php foreach($phones as $phone) { ?>
					<tr>
						<td><i class="fa fa-envelope"></i></td>
						<td><?php echo $phone['phone']; ?></td>
						<td><?php if(isset($phone['ads'])) echo sizeof($phone['ads']); ?></td>
						<td><?php echo $phone['date']; ?></td>
						<td><?php echo $phone['last_modified']; ?></td>
						<td>
							<span class="edit-phone" data-toggle="modal" data-target="#edit-phone-modal" data-user="<?php echo $user_id; ?>" data-phone="<?php echo $phone['phone']; ?>">
								<i class="fa fa-pencil"></i>
							</span>
							<span class="delete-phone" data-user="<?php echo $user_id; ?>" data-phone="<?php echo $phone['phone']; ?>" data-action="delete-phone">
								<i class="fa fa-trash"></i>
							</span>
						</td>
					</tr>						
				<?php } ?>
			<?php } else { ?>
				<tr>
					<td colspan=5 class="text-center">
						<?php _e('Please add atlest one phone number before you add an Ad.', 'ladystar'); ?> 
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
		
	<div class="form-container add-phone-container">
		<span data-toggle="modal" data-target="#add-phone-modal" class="btn btn-primary"><?php echo esc_html__('Add Phone', 'ladystar') ?></span>		
		
		<div class="modal fade modal-form devon-modal add-phone-modal" id="add-phone-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
					</div>
					<div class="modal-body search-form">
						<div class="sign-form-inner">
							<div class="form-wr log-in-form active">
								<p class="title"><?php echo esc_html__('Add New Phone', 'ladystar') ?></p>
								<form id="form-edit-phone" class="form">
									<div class="alerts-box"></div>
									<div class=" first-line">
										<div class="form-group">
											<input class="form-control" id="input-add-phone" name="phone" type="tel" value="" placeholder="Enter Phone" required>
										</div>
										<!-- /.form-group -->
									</div>

									<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">									

									<div class="form-group">
										<button type="submit" class="btn-classic no-margin load_ind submit-add-phone" data-user="<?php echo $user_id; ?>" data-action="add-phone">Add<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </button>
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
	
		<div class="modal fade modal-form devon-modal edit-phone-modal" id="edit-phone-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<span type="" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></span>
					</div>
					<div class="modal-body search-form">
						<div class="sign-form-inner">
							<div class="form-wr log-in-form active">
								<p class="title"><?php echo esc_html__('Edit Phone', 'ladystar') ?></p>
								<form id="form-edit-phone" class="form">
									<div class="alerts-box"></div>
									<div class=" first-line">
										<div class="form-group">
											<input class="form-control" id="input-edit-phone" name="phone" type="phone" value="" placeholder="Enter Phone" required>
										</div>
										<!-- /.form-group -->
									</div>

									<input class="hidden" id="widget_id" name="widget_id" type="text" value="1">									

									<div class="form-group">
										<button type="submit" class="btn-classic no-margin load_ind submit-edit-phone" data-user="<?php echo $user_id; ?>" data-phone="" data-action="edit-phone">Edit<i class="fa fa-spinner fa-spin fa-custom-ajax-indicator hidden"></i> </button>
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