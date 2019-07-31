<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	switch ($_GET['action']) {
		case 'epay':
			require_once(dirname(__FILE__).'/lib/actions/payment.php');
			$result = ladystar_payment_epay_process_notification($_POST['encoded'], $_POST['checksum']);
			if (in_array($result['status'], ['DENIED', 'EXPIRED'])) {
				
				ladystar_update_transaction_status($result['invoice'], 'cancel');
		
				$info_data = "INVOICE={$result['invoice']}:STATUS=OK\n";
				echo $info_data, "\n";
			} elseif ($result['status'] == 'PAID') {
				ladystar_update_transaction_status($result['invoice'], 'success');
				$info_data = "INVOICE={$result['invoice']}:STATUS=OK\n";
				echo $info_data, "\n";
			} else {
				echo "ERR=Not valid CHECKSUM\n";
			}
			break;
	}
}