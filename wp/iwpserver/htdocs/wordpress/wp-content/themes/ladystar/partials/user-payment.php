<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require_once(dirname(__FILE__).'/../lib/actions/payment.php');

	$amount = abs($_POST['amount']);
	$name = isset($_POST['fullname'])?$_POST['fullname']:'';
	switch ($_POST['payment_method']) {
		case 'epay':
			ladystar_payment_epay($user_id, $amount);
			break;
		case 'epay_terminal':
			ladystar_payment_epay_terminal($user_id, $amount);
			break;
		case 'bank_transfer':
			ladystar_payment_bank_transfer($user_id, $amount);
			break;
		case 'debug':
			ladystar_add_transaction($user_id, 'debug', $amount, 'success');
			break;
		case 'easypay':
			ladystar_payment_easypay($user_id, $amount, $name);
			break;
		case 'bpay':
			ladystar_payment_bpay($user_id, $amount, $name);
			break;
	}

	//echo '<script>location.href="'.site_url('/user/?action=wallet').'";</script>';
	exit;
}


?>

<div class="user-main">
	<h2><?php echo esc_html__('Add Balance', 'ladystar') ?></h2>
	
	<form action="" method="post">
		<div class="form-group payment_method">
			<h3><?php echo esc_html__('Payment Method', 'ladystar') ?></h3>
			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="epay_terminal" id="epay_terminal" checked="checked">
				<label for="epay_terminal" class="form-check-label" ><?php echo esc_html__('Credit Card', 'ladystar') ?></label>
			</div>
			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="epay" id="epay">
				<label for="epay" class="form-check-label" ><?php echo esc_html__('EPay', 'ladystar') ?></label>
			</div>
			
			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="easypay" id="easypay">
				<label for="easypay" class="form-check-label" ><?php echo esc_html__('Easypay', 'ladystar') ?></label>
			</div>

			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="bpay" id="bpay">
				<label for="bpay" class="form-check-label" ><?php echo esc_html__('BPay', 'ladystar') ?></label>
			</div>

			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="sms" id="sms">
				<label for="sms" class="form-check-label" ><?php echo esc_html__('SMS', 'ladystar') ?></label>
			</div>

			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="bank_transfer" id="bank_transfer">
				<label for="bank_transfer" class="form-check-label" ><?php echo esc_html__('Bank Transfer', 'ladystar') ?></label>
			</div>


			<div class="form-check">
				<input type="radio" class="form-check-input" name="payment_method" value="debug" id="debug">
				<label for="debug" class="form-check-label" ><?php echo esc_html__('DEBUG', 'ladystar') ?></label>
			</div>
		
		</div>
		
		<div class="currency_amount" style="display:none" id="name-container">
			<h3><?php echo esc_html__('Name', 'ladystar') ?>*</h3>

			<div class="form-group">
				<label><input type="text" class="form-control" name="fullname" value="" /></label>
			</div>
		</div>

		<div class="currency_amount">
			<h3><?php echo esc_html__('Amount', 'ladystar') ?></h3>

			<div class="form-group">
				<label><input type="text" class="form-control" name="amount" value="10" /></label>
			</div>
		</div>

		<button class="btn btn-primary btn-small" type="submit"><?php echo esc_html__('Add Balance', 'ladystar') ?></button>
	</form>
	
	
</div>

<script>
	jQuery(document).on('click', '.payment_method input[type=radio]', function() {
		jQuery('#name-container').hide();
	}).on('click', '#easypay', function() {
		jQuery('#name-container').show();
	}).on('click', '#bpay', function() {
		jQuery('#name-container').show();
	});
</script>