<?php

function ladystar_payment_epay($user_id, $amount) {
	require_once(dirname(__FILE__).'/../vendor/epay.php');
	$transaction_id = ladystar_add_transaction($user_id, 'epay_terminal', $amount, 'pending');

	$url = 'https://demo.epay.bg/';
	$min = 'D209223352';
	$secret = 'MNWSIDBL75VUDGR2PB7ULSE7SVS8T95RSQFP35EIYROLM28BQWI5J0DLZ4LJ2WTX';
	//$url = 'https://www.epay.bg/'

	$exp_date = date('d.m.Y', strtotime('+1 month'));

	$data = <<<DATA
MIN={$min}
INVOICE={$transaction_id}
AMOUNT={$amount}
EXP_TIME={$exp_date}
DESCR=LadyStar Payment
DATA;

	$string = base64_encode($data);
	$checksum = epay_hmac('sha1', $string, $secret);

?>
	<form action="<?php echo $url; ?>" name="epay" method=POST>
		<input type=hidden name=PAGE value="paylogin">
		<input type=hidden name=ENCODED value="<?php echo $string; ?>">
		<input type=hidden name=CHECKSUM value="<?php echo $checksum; ?>">
		<input type=hidden name=URL_OK value="<?php pll_get_page_url('user') . '?action=wallet'; ?>">
		<input type=hidden name=URL_CANCEL value="<?php pll_get_page_url('user') . '?action=wallet'; ?>">
	</form>
	<script type="text/javascript">
		document.epay.submit();
	</script>
<?php

}

function ladystar_payment_epay_terminal($user_id, $amount) {
	require_once(dirname(__FILE__).'/../vendor/epay.php');
	$transaction_id = ladystar_add_transaction($user_id, 'epay_terminal', $amount, 'pending');

	$url = 'https://demo.epay.bg/';
	$min = 'D209223352';
	$secret = 'MNWSIDBL75VUDGR2PB7ULSE7SVS8T95RSQFP35EIYROLM28BQWI5J0DLZ4LJ2WTX';
	//$url = 'https://www.epay.bg/'

	$exp_date = date('d.m.Y', strtotime('+1 month'));

	$data = <<<DATA
MIN={$min}
INVOICE={$transaction_id}
AMOUNT={$amount}
EXP_TIME={$exp_date}
DESCR=LadyStar Payment
DATA;

	$string = base64_encode($data);
	$checksum = epay_hmac('sha1', $string, $secret);

?>
	<form action="<?php echo $url; ?>" name="epay" method=POST>
		<input type=hidden name=PAGE value="credit_paydirect">
		<input type=hidden name=ENCODED value="<?php echo $string; ?>">
		<input type=hidden name=CHECKSUM value="<?php echo $checksum; ?>">
		<input type=hidden name=URL_OK value="<?php pll_get_page_url('user') . '?action=wallet'; ?>">
		<input type=hidden name=URL_CANCEL value="<?php pll_get_page_url('user') . '?action=wallet'; ?>">
	</form>
	<script type="text/javascript">
		document.epay.submit();
	</script>
<?php

}

function ladystar_payment_easypay($user_id, $amount, $name) {
	global $devon_opts;
	require_once(dirname(__FILE__).'/../vendor/epay.php');

	$iban_number = $devon_opts['iban-number'];
	$bic_number = $devon_opts['bic-number'];

	$transaction_id = ladystar_add_transaction($user_id, 'easypay', $amount, 'pending');

	$url = 'https://demo.epay.bg/ezp/reg_bill.cgi';
	//$url = 'https://www.epay.bg/ezp/reg_vnbel.cgi';
	$min = 'D209223352';
	$secret = 'MNWSIDBL75VUDGR2PB7ULSE7SVS8T95RSQFP35EIYROLM28BQWI5J0DLZ4LJ2WTX';

	$user = get_user_by('id', $user_id);

	$exp_date = date('d.m.Y', strtotime('+1 month'));

	$data = <<<DATA
MIN={$min}
INVOICE={$transaction_id}
AMOUNT={$amount}
EXP_TIME={$exp_date}
DESCR=LadyStar Payment
MERCHANT=LadyStar Ltd
IBAN={$iban_number}
BIC={$bic_number}
PSTATEMENT=1
STATEMENT=Invoice {$transaciton_id}
OBLIG_PERSON={$name}
DATA;
	$encoded = base64_encode($data);
	$checksum = epay_hmac('sha1', $encoded, $secret);

	$ch = curl_init();
	curl_setopt_array($ch, [
		CURLOPT_URL => $url,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => [
			'ENCODED' => $encoded,
			'CHECKSUM' => $checksum
		],
		CURLOPT_RETURNTRANSFER => 1
	]);
	$result = curl_exec($ch);

	$res = explode('=', $result);

	if (count($res) == 2 && $res[0] == 'IDN') {
		$easypay_id = $res[1];
?>
	<div class="row">
		<h2>Easypay payment</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		

		<p>You should use the following ID when making payment at one of 1000s of Easypay offices: <strong><?php echo $easypay_id; ?></strong></p>
	</div>
<?php
	} else {
		die('Unable to initiate payment');
	}
}

function ladystar_payment_bpay($user_id, $amount, $name) {
	global $devon_opts;
	require_once(dirname(__FILE__).'/../vendor/epay.php');

	$iban_number = $devon_opts['iban-number'];
	$bic_number = $devon_opts['bic-number'];

	$transaction_id = ladystar_add_transaction($user_id, 'bpay', $amount, 'pending');

	$url = 'https://demo.epay.bg/ezp/reg_bill.cgi';
	//$url = 'https://www.epay.bg/ezp/reg_vnbel.cgi';
	$min = 'D209223352';
	$secret = 'MNWSIDBL75VUDGR2PB7ULSE7SVS8T95RSQFP35EIYROLM28BQWI5J0DLZ4LJ2WTX';

	$user = get_user_by('id', $user_id);

	$exp_date = date('d.m.Y', strtotime('+1 month'));

	$data = <<<DATA
MIN={$min}
INVOICE={$transaction_id}
AMOUNT={$amount}
EXP_TIME={$exp_date}
DESCR=LadyStar Payment
MERCHANT=LadyStar Ltd
IBAN={$iban_number}
BIC={$bic_number}
PSTATEMENT=1
STATEMENT=Invoice {$transaciton_id}
OBLIG_PERSON={$name}
DATA;
	$encoded = base64_encode($data);
	$checksum = epay_hmac('sha1', $encoded, $secret);

	$ch = curl_init();
	curl_setopt_array($ch, [
		CURLOPT_URL => $url,
		CURLOPT_POST => 1,
		CURLOPT_POSTFIELDS => [
			'ENCODED' => $encoded,
			'CHECKSUM' => $checksum
		],
		CURLOPT_RETURNTRANSFER => 1
	]);
	$result = curl_exec($ch);

	$res = explode('=', $result);

	if (count($res) == 2 && $res[0] == 'IDN') {
		$easypay_id = $res[1];
?>
	<div class="row">
		<h2>Easypay payment</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		
		<p>
			You should use the following payment details at one of over 800 of ATMs by CKB, Unicredit, Reifeissen, SIBANK, ProCredit, Allianz, Expressbank:
		</p>
		<table class="table">
		<tr>
			<th>Merchant Code:</th>
			<td>60000</td>
		</tr>
		<tr>
			<th>Payment Code:</th>
			<td><?php echo $easypay_id ?></td>
		</tr>

		</table>
	</div>
<?php
	} else {
		die('Unable to initiate payment');
	}
}

function ladystar_payment_epay_process_notification($string, $checksum) {
	require_once(dirname(__FILE__).'/../vendor/epay.php');
	$result = [];
	$secret = 'MNWSIDBL75VUDGR2PB7ULSE7SVS8T95RSQFP35EIYROLM28BQWI5J0DLZ4LJ2WTX';

	if (epay_hmac('sha1', $string, $secret) == $checksum) {
		$data = base64_decode($string);
	    $lines_arr = explode("\n", $data);
	    $info_data = '';

	    foreach ($lines_arr as $line) {
	        if (preg_match("/^INVOICE=(\d+):STATUS=(PAID|DENIED|EXPIRED)(:PAY_TIME=(\d+):STAN=(\d+):BCODE=([0-9a-zA-Z]+))?$/", $line, $regs)) {
	        	$result = [
	        		'invoice' => $regs[1],
	        		'status' => $regs[2],
	        	];
	            return $result;
	        }
	    }
	}

	return $result;
}

function ladystar_payment_bank_transfer($user_id, $amount) {

	global $devon_opts;
	$unique_trans_id = get_option('bank_transfer_id', 'LS00001');
	$iban_number = $devon_opts['iban-number']; 
	$bic_number = $devon_opts['bic-number'];

	if(empty($user_id)) {
		global $current_user;
		$user_id = $current_user->ID;
	}

	?>
	<div class="row">
		<h2>Bank Transfer</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
		
		<table class="table">
		<tr>
			<th>IBAN:</th>
			<td><?php echo $iban_number ?></td>
		</tr>
		<tr>
			<th>BIC:</th>
			<td><?php echo $bic_number ?></td>
		</tr>
		<tr>
			<th>Amount:</td>
			<th><?php echo $amount ?></td>
		</tr>
		<tr>
			<th>Time:</th>
			<td><?php echo current_time('F j, Y g:i a') ?></td>
		</tr>
		<tr>
			<th>Transaction ID:</th>
			<td><?php echo $unique_trans_id ?></td>
		</tr>
		<tr>
			<td colspan=2>
				<div class="col-md-12">
					<form action="#" class="bank-transfer-form" method="POST">
						<p class="alert alert-info ajax-result" style="display:none;"></p>
						<input type="hidden" name="amount" value="<?php echo $amount ?>">
						<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
						<input type="hidden" name="bank_transfer_id" value="<?php echo $unique_trans_id ?>">
						<span class="btn btn-primary btn-bank-transfer" data-url="<?php echo pll_get_page_url('user') . '?action=wallet'; ?>"><?php echo __('Submit for Approval', 'ladystar'); ?>: <?php echo $unique_trans_id ?> <i class="fa fa-spinner fa-spin ajax-spinner" style="display:none;"></i></span>
					</form>
				</div>
			</td>
		</tr>
	</div>
	<?php 
}