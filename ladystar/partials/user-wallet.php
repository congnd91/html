<?php 
$type = (isset($_GET['type']) && !empty($_GET['type'])) ? $_GET['type'] : 'incoming';
$transactions = devon_get_user_wallet_history($user_id); 
$transactions_old = devon_get_user_wallet_history_old($user_id); 
if( ! $wallet_balance = devon_get_user_wallet_amount($user_id) )  {
	$wallet_balance = 0; 
}

?>

<div class="user-main">
	
	<h2 class="">
		<?php echo esc_html__('My Wallet', 'ladystar') ?>
		<small class="wallet-balance pull-right">
			<span class="wallet-amount"><?php echo esc_html__('Current Balance: ', 'ladystar') ?><?php echo $wallet_balance . ' лв'; ?></span> 
			<a class="btn btn-primary btn-small" style="padding-right: 10px;padding-left: 10px;" href="<?php echo pll_get_page_url('user') . '?action=payment'; ?>"><i class="fa fa-plus"></i> <?php echo esc_html__('Add', 'ladystar') ?></a>
		</small>
	</h2>
	
	<div class="row mt-4">
		<div class="col-md-12 text-center">
			<span>
				<a class="<?php if($type=='incoming') echo 'color-pink'; ?>" href="<?php echo pll_get_page_url('user') . '?action=wallet&type=incoming'; ?>" class=""><?php echo __('Incoming Transactions', 'ladystar'); ?></a>
				&nbsp;|&nbsp;
				<a class="<?php if($type=='spent') echo 'color-pink'; ?>" class="" href="<?php echo pll_get_page_url('user') . '?action=wallet&type=spent'; ?>" class=""><?php echo __('Spent Transactions', 'ladystar'); ?></a>
			</span>
		</div>		
	</div>
	
	<div class="row mt-2">
		<div class="col-md-12">
	
			<?php if($type=='incoming') { ?>		
				<table class="wallet-history-table table table-border table-striped">
					<thead>
						<tr>
							<th><i class="fa fa-info"></i></th>
							<th><?php echo esc_html__('Date', 'ladystar') ?></th>
							<th><?php echo esc_html__('Transaction ID', 'ladystar') ?></th>
							<th><?php echo esc_html__('Payment Method', 'ladystar') ?></th>
							<th><?php echo esc_html__('Amount', 'ladystar') ?></th>				
							<th><?php echo esc_html__('Status', 'ladystar') ?></th>				
						</tr>
					</thead>
					<tbody>
						<?php 
							if(sizeof($transactions)) {
								$count = 0; 
								foreach($transactions as $t) { ?>
									<tr <?php if ($t->payment_status != 'success'): ?>style="color: #555"<?php endif; ?>>
										<td><?php echo ++$count; ?></td>
										<td><?php echo devon_dater($t->date_added, 'default') ?></td>
										<td><?php echo $t->transaction_id ?></td>
										<td>
											<?php if(isset($t->payment_method)) echo $t->payment_method; ?>
										</td>
										<td><?php echo $t->amount ?>лв.</td>
										<td><?php echo $t->payment_status ?></td>
									</tr>						
							<?php }
							}
						?>
					</tbody>
				</table>
			<?php } else { ?>
				<table class="wallet-history-table table table-border table-striped mt-4">
					<thead>
						<tr>
							<th><i class="fa fa-info"></i></th>
							<th><?php echo esc_html__('Date', 'ladystar') ?></th>
							<th><?php echo esc_html__('Ad Title', 'ladystar') ?></th>
							<th><?php echo esc_html__('Amount', 'ladystar') ?></th>				
							<th><?php echo esc_html__('Status', 'ladystar') ?></th>				
						</tr>
					</thead>
					<tbody>
						<?php 
							if(sizeof($transactions_old)) {
								$transactions_old = array_reverse($transactions_old); 
								$count = 0; 
								foreach($transactions_old as $t) { ?>
									<tr>
										<td><?php echo ++$count; ?></td>
										<td><?php echo devon_dater($t['date'], 'default') ?></td>
										<td><?php echo '<a href="'.get_the_permalink($t['listing_id']).'">'.get_the_title($t['listing_id']).'</a>'; ?></td>
										<td><?php echo $t['amount'] ?>лв.</td>
										<td><?php echo 'success'; ?></td>
									</tr>									
							<?php }
							}
						?>
					</tbody>
				</table>
			<?php } ?>	
			
		</div>
	</div>
</div>