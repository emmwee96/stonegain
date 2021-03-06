<br />
<div class="mediumBox">
	<div class="row">
		<form method='POST' action="<?= base_url() ?>admin_transaction/update_status/<?= $user_trade['user_trade_id'] ?>">
			<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
				<div class="box box-info">
					<div class="box-header admin-panel">
						<h4 style="margin-left:20px;" class="pull-left">Trade Number
							<?= $user_trade['user_trade_id'] ?>'s Info</h4>
					</div>
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs" id="tabs">
								<li class="active">
									<a href="#trade" data-toggle="tab">Trade Info</a>
								</li>
								<li>
									<a href="#listing" data-toggle="tab">Listing Info</a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active in fade backgroundcolor-white" id="trade">
								<table class='formTable'>
									<tr>
										<th>Buyer</th>
										<td>:
											<?= $user_trade['buyer_name']; ?>
										</td>
									</tr>
									<tr>
										<th>Seller</th>
										<td>:
											<?= $user_trade['seller_name']; ?>
										</td>
									</tr>
									<tr>
										<th>Status</th>
										<td>
											<select class="form-control" name='user_trade_status_id'>
												<?php
            foreach ($user_trade_status as $row) {
                ?>
													<option value="<?= $row['user_trade_status_id'] ?>" <?php if ($row['user_trade_status_id']== $user_trade['user_trade_status_id']) echo 'selected' ?>>
														<?= $row['user_trade_status'] ?>
													</option>
													<?php

        }

        ?>
											</select>
										</td>
									</tr>
									<tr>
										<th>Currency</th>
										<td>:
											<?= $user_trade['crypto']; ?>
										</td>
									</tr>
									<tr>
										<th>Amount to buy</th>
										<td>:
											<?= $user_trade['btc_amount']; ?>
										</td>
									</tr>
									<tr>
										<th>Price</th>
										<td>: RM
											<?= $user_trade['myr_amount']; ?>
										</td>
									</tr>
								</table>
								<input type='submit' class='btn btn-primary pull-right' value='update status'>
							</div>
							<div class="tab-pane backgroundcolor-white" id="listing">
								<table class='formTable'>
									<tr>
										<th>Seller</th>
										<td>:
											<?= $user_trade['seller_name']; ?>
										</td>
									</tr>
									<tr>
										<th>Currency</th>
										<td>:
											<?= $user_trade['crypto']; ?>
										</td>
									</tr>
									<tr>
										<th>Amount to sell</th>
										<td>:
											<?= $user_trade['amount']; ?>
										</td>
									</tr>
									<tr>
										<th>Markup Percentage</th>
										<td>:
											<?= $user_trade['markup']; ?>%
										</td>
									</tr>
									<tr>
										<th>Price</th>
										<td>: RM
											<?= $user_trade['price_after']; ?>
										</td>
									</tr>
									<tr>
										<th>Purchase Limit</th>
										<td>: RM
											<?= $user_trade['limit_from']; ?> - RM
												<?= $user_trade['limit_to'] ?>
										</td>
									</tr>
									<tr>
										<th>Threshold</th>
										<td>:
											<?= $user_trade['threshold']; ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>

		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
			<div class="box box-info">
				<div class="box-header admin-panel">
					<h4 style="margin-left:20px;" class="pull-left">Receipt</h4>
					<?php
                    if ($user_trade['user_trade_status_id'] == 2) {
                        ?>
						<a href="<?= base_url() ?>admin_transaction/reject_receipt/<?= $user_trade['user_trade_id'] ?>" class="btn btn-danger pull-right">reject receipt</a>
						<?php

                            }
                            ?>
				</div>
				<div class="box-body">
					<?php
    if (!empty($user_trade["receipt"])) {
        ?>
						<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 font-weight-bold align-center">
							<a href="#img">
								<img class="receipt object-fit" src="<?= base_url() . $user_trade['receipt'] ?>">
							</a>
						</div>
						<?php

    }
    ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (!empty($user_trade["receipt"])) {
    ?>
	<a href="#_" class="lightbox" id="img">
		<img src="<?= base_url() . $user_trade['receipt'] ?>">
	</a>
	<?php

}
?>
