<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Your Cart</title>
	<script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>

	<div class="container">
		<div class="content">
			<div class="cartoption">
				<div class="cartpage">
					<h2><b>Your Cart</b></h2>
					<?php if ($this->cart->total_items()) { ?>
						<table class="tblone" style="outline: thin solid">
							<tr style="outline: thin solid">
								<th width="10%">Sr.No.</th>
								<th width="20%">Service Name</th>
								<th width="20%">Number of Images Submited</th>
								<th width="15%">Sub Total</th>
								<th width="5%">Remove</th>
							</tr>
							<?php
							$i = 0;
							foreach ($cart_contents as $cart_items) {
								$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $cart_items['name'] ?></td>
									<td><?php echo $cart_items['qty'] ?> </td>
									<td>$ <?php echo $this->cart->format_number($cart_items['price']) ?></td>
									<td>
										<form action="<?php echo base_url('service_public/remove_cart'); ?>" method="post">
											<input type="hidden" name="rowid" value="<?php echo $cart_items['rowid'] ?>" />
											<input type="submit" name="submit" value="X" />
										</form>
									</td>
								</tr>
							<?php } ?>


						</table><br>

						<!-- <table style="float:right;text-align:left;" width="40%">

							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $this->cart->format_number($this->cart->total()) ?></td>
							</tr>

						</table> -->
					<?php
					} else {
						echo "<h1>Your Cart is Empty</h1>";
					}
					?>
					
				</div>

			</div>
		</div>


	</div><br><br>
	<div class=" container">
		<div class="row">
			<div class="col-lg-6">
				<a href="<?php echo base_url('service_public') ?>"> <img src="<?php echo base_url() ?>assets/web/images/shop.jpg" style="width: 300px;height:50px;" alt="" /></a>
			</div>
			<div class="col-lg-2"></div>
			<div class="col-lg-4">
				<?php
				if ($this->cart->total_items()) {
					$customer_id = $this->session->userdata('user_id');
					if (empty($customer_id)) {
				?>
						<a href="<?php echo base_url('login') ?>"> <img src="<?php echo base_url() ?>assets/web/images/check.jpg" style="width: 320px;height:50px;" alt="" /></a>
					<?php
					} else
                    if (!empty($customer_id)) {
					?>
						<a href="<?php echo base_url('service_public/service_shipping') ?>"> <img src="<?php echo base_url() ?>assets/web/images/check.jpg" style="width: 320px;height:50px;" alt="" /></a>
				<?php
					}
				} ?>
			</div>
		</div>
	</div>

</html>