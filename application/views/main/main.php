<!-- Content Header (Page header) -->
<div style="overflow-x: hidden;">
	<!-- To hide slideshow overflow -->
	<section class="content-header col-xs-12 background-color" style="height:350px;">
		<div id="slideshow">
			<div class="slide-wrapper">
				<div class="slide">
					<h3 class="slide-number">STRENGTH IN
						<span style="color: #98eae7">NUMBERS</span>
					</h3>
					<div class="slide-word">Magic Internet Money</div>
					<div class="slide-word">You can't go wrong with the classic</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Main content -->
	<section class="content col-xs-12 col-padding-0 line-padding-0">
		<form method="POST" action="<?= base_url()?>user_listing/quick_transaction" id="quick-transaction-form">
			<div class="navbar-static-top col-xs-12 sub-header darker-green darker-green-border-bottom">
				<div class="main-header navbar-custom-menu col-xs-12">
					<!-- Logo -->
					<button type="submit" name="type" value="quick_buy" class="logo btn_quick" style="border:none;">
						<!-- logo for regular state and mobile devices -->
						<span class="logo-lg">
							Quick Buy
						</span>
					</button>
					<button type="submit" name="type" value="quick_sell" class="logo btn_quick" style="border:none;">
						<!-- logo for regular state and mobile devices -->
						<span class="logo-lg">
							Quick Sell
						</span>
					</button>
				</div>
			</div>
			<div class="navbar-static-top col-xs-12 search-bar col-padding-10 green">
				<div class="col-xs-12">
					<div class="col-md-4 col-xs-12 sub-padding">
						<div class="col-xs-12">
							<p class="filter-label">Amount</p>
						</div>
						<div class="col-xs-12">
							<input type="text" class="form-control input-border" name="amount" placeholder="Amount">
						</div>
					</div>
					<div class="col-md-4 col-xs-12 sub-padding">
						<div class="col-xs-12">
							<p class="filter-label">Currency</p>
						</div>
						<div class="col-xs-12">
							<input type="text" class="form-control input-border" name="currency" placeholder="Currency" list="currency">
							<datalist id="currency">
								<?php
						foreach ($currency_list as $row) {
							?>
									<option value="<?= $row['currency'] ?>">
										<?php

							}
							?>
							</datalist>
						</div>
					</div>
					<div class="col-md-4 col-xs-12 sub-padding">
						<div class="col-xs-12">
							<p class="filter-label">Country</p>
						</div>
						<div class="col-xs-12">
						<select name='bank_name' type="text" class="form-control input-border" placeholder="country"/>
							<option = "">Country</option>
							<option = "MayBank">MayBank</option>
							<option = "CIMB Bank">CIMB Bank</option>
							<option = "Public Bank">Public Bank</option>
						</select>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="col-md-1 col-xs-12 padding-top-10"></div>
		<div class="col-md-10 col-xs-12 padding-top-10">
			<form action="<?= base_url() ?>user_listing/view_listing" method="GET">
				<div class="col-md-10 col-xs-12 padding-top-12">
					<div class="col-lg-3 col-md-3 col-xs-12 sub-padding">
						<select name="advertisement" class="form-control">
							<option value="">Advertisement</option>
						</select>
					</div>
					<div class="col-lg-3 col-md-3 col-xs-12 sub-padding">
						<select name="country" class="form-control">
							<option value="">Malaysia</option>
						</select>
					</div>
					<div class="col-lg-3 col-md-3 col-xs-12 sub-padding">
						<select name="currency" class="form-control">
							<option value="">Currency</option>
							<?php
						foreach ($currency_list as $row) {
							?>
								<option value="<?= $row['currency'] ?>">
									<?= $row['currency'] ?>
								</option>
								<?php

						}
						?>
						</select>
					</div>
					<div class="col-lg-3 col-md-3 col-xs-12 sub-padding">
						<select name="payment_method" class="form-control">
							<option value="">Payment Method</option>
							<option value="Bank Transfer">Bank Transfer</option>
						</select>
					</div>
				</div>
				<div class="col-md-2 col-xs-12 padding-top-12">
					<div class="col-xs-12 sub-padding">
						<button type="submit" class="btn btn-primary pull-center search-btn"><i class="fa fa-search"></i> Search</button>
					</div>
				</div>
			</form>
			<div class="col-xs-12 line-padding-10">
				<div class="col-xs-12"></div>
				<div class="col-xs-12 sub-border-gray">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
							<tr class="border-bottom-black">
								<th colspan="2">Username</th>
								<th class="hidden-sm hidden-xs">Credit</th>
								<th class="hidden-sm hidden-xs">Payment Method</th>
								<th class="hidden-sm hidden-xs">Limits</th>
								<th>Prices</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
						foreach ($user_listing as $row) {
							?>
								<tr>
									<th class="font-weight-400">
										<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar listing-avatar">
									</th>
									<th class="font-weight-400" style="padding-top:16px">
										<div>
											<a href="<?= base_url()?>user/view_profile/<?= $row['user_id']?>">
												<?= $row["username"] ?>
											</a>
										</div>
									</th>
									<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
										<div>
											<?= $row["trades"]?> Trades|Rating
												<?= $row["rating"]?>%</div>
										<div class="font-color-user">Average Release Time:
											<?= $row["average_time"]?> mins</div>
									</th>
									<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
										<?= $row["payment_method"] ?>
									</th>
									<th class="font-weight-400 hidden-sm hidden-xs" style="padding-top:16px">
										<?= $row["limit_from"] ?>-
											<?= $row["limit_to"] ?> MYR</th>
									<th class="font-weight-400 price-color" style="padding-top:16px">
										<?= $row["price_after"] ?> MYR/BTC</th>
									<th style="padding-top:16px;text-align:center;">
										<a href="<?= base_url() ?>user_listing/<?= $row['action'] ?>/<?= $row['user_listing_id'] ?>" class="btn btn-primary pull-center line-padding-10 search-btn"><?= strtoupper($row['action']) ?>
											<?= $row['crypto'] ?>
										</a>
									</th>
								</tr>
								<?php

						}
						?>
								<!-- <tr>
												<th class="font-weight-400">
													<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>tsphkj</div>
													<div class="quick-seller col-padding-10">quick seller</div>
													<div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>Trade 70|Rating 96%</div>
													<div class="font-color-user">Average Release Time: 14 mins</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">Alipay</th>
												<th class="font-weight-400" style="padding-top:16px">500-5000 MYR</th>
												<th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
												<th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
											</tr>
											<tr>
												<th class="font-weight-400">
													<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>jaingpinmiao</div>
													<div></div>
													<div class="verification col-padding-10" colspan="2">Buyer account verification required</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>Trade 8|Rating 80%</div>
													<div class="font-color-user">Average Release Time: 10 mins</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
												<th class="font-weight-400" style="padding-top:16px">3000-20000 MYR</th>
												<th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
												<th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
											</tr>
											<tr>
												<th class="font-weight-400" style="padding-top:16px">
													<img src="<?= site_url(); ?>/images/stonegain/avatar.png" class="avatar">
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>htldyp</div>
													<div class="quick-seller col-padding-10">quick seller</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">
													<div>Trade 2179|Rating 98%</div>
													<div class="font-color-user">Average Release Time: 10 mins</div>
												</th>
												<th class="font-weight-400" style="padding-top:16px">Bank Transfer</th>
												<th class="font-weight-400" style="padding-top:16px">30000-100000 MYR</th>
												<th class="font-weight-400 price-color" style="padding-top:16px">56900 MYR</th>
												<th style="padding-top:16px"><input type="submit" class="btn btn-info pull-center line-padding-10 search-btn" value="BUY"></th>
											</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-1 col-xs-12 padding-top-10"></div>
		<div class="col-xs-12 col-padding-0 text-center">
			<img src="<?= site_url(); ?>/images/stonegain/stonegain.png" class="col-padding-0" style="margin:5% auto;">
		</div>
</div>

</section>
<!-- /.content -->
<script>
	$(document).on('submit', "#quick-transaction-form", function (e) {
		
	});
</script>