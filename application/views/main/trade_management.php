<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="title">
		<h1 class="main-title">TRADE MANAGEMENT</h1>
		<h1 class="dummy-title">TRADE MANAGEMENT</h1>
	</div>
</section>

<!-- Main content -->
<section class="content-with-header col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding">
	<div class="col-lg-2 col-md-2 col-xs-2 col-sm-2 no-margin no-padding content-with-header">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 no-margin no-padding content-with-header">
			<ul class="nav nav-tabs nav-stacked transaction-menu content-with-header">
				<li class="active">
					<a data-toggle="tab" href="#processing">Processing</a>
				</li>
				<li>
					<a data-toggle="tab" href="#completed">Completed</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10">
		<div class="tab-content">
			<div id="processing" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 margin-bottom table-height tab-pane active fade in">
				<table class="table transaction-table">
					<thead>
						<tr>
							<td>Partner</td>
							<td>Trade ID</td>
							<td>Type</td>
							<td>Amount</td>
							<td>Quantity</td>
							<td>Created</td>
							<td>Trade</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php
    foreach ($user_trades_processing as $row) {
        ?>
							<tr>
								<td>
									<?= $row['username'] ?>
								</td>
								<td>
									<?= $row["user_listing_id"] ?>
								</td>
								<td><?= $row['type']?></td>
								<td>
									<?= $row["myr_amount"] ?> MYR</td>
								<td>
									<?= $row["btc_amount"] ?> BTC</td>
								<td>
									<?= $row["created_date"] ?>
								</td>
								<td>
									<?= $row["crypto"] ?>
								</td>
								<td>
									<?= $row["user_trade_status"] ?>
								</td>
							</tr>
							<?php

    }
    ?>
					</tbody>
				</table>
            </div>
            <div id="completed" class="col-lg-12 col-md-12 col-xs-12 col-sm-12 margin-bottom table-height tab-pane">
				<table class="table transaction-table">
					<thead>
						<tr>
							<td>Partner</td>
							<td>Trade ID</td>
							<td>Type</td>
							<td>Amount</td>
							<td>Quantity</td>
							<td>Created</td>
							<td>Trade</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php
    foreach ($user_trades_completed as $row) {
        ?>
							<tr>
								<td>
									<?= $row['username'] ?>
								</td>
								<td>
									<?= $row["user_listing_id"] ?>
								</td>
								<td><?= $row['type']?></td>
								<td>
									<?= $row["myr_amount"] ?> MYR</td>
								<td>
									<?= $row["btc_amount"] ?> BTC</td>
								<td>
									<?= $row["created_date"] ?>
								</td>
								<td>
									<?= $row["crypto"] ?>
								</td>
								<td>
									<?= $row["user_trade_status"] ?>
								</td>
							</tr>
							<?php

    }
    ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
