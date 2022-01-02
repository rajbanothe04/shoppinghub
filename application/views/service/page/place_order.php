<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shpping Addess</title>
	<script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>
	<div class="container" style="border: 1px solid black">

		<form method="post" action="<?php echo base_url('service_public/save_details'); ?>">
			<?php echo validation_errors(); ?>
			<div class="row">
				<div class="col-lg-6">
					<center>
						<h3><b>Your Address</b></h3>
					</center>

					<table>
						<tbody class="cell">
							<tr>
								<td><label for="shipping_name">Name: </label></td>
								<td><input type="text" name="shipping_name" placeholder="Enter Your Name">
									<?php echo form_error('shipping_name'); ?>
								</td>

								<td><label for="shipping_address">Address: </label></td>
								<td><input type="text" name="shipping_address" placeholder="Enter Your Address">
									<?php echo form_error('shipping_address'); ?>
								</td>
							</tr>

							<tr>
								<td><label for="shipping_country">Country: </label></td>
								<td><input type="text" name="shipping_country" id="country" sclass="frm-field " placeholder="Enter Your Country">
									<?php echo form_error('shipping_country'); ?>
								</td>
								<td><label for="shipping_city">City: </label></td>
								<td><input type="text" name="shipping_city" placeholder="Enter Your City">
									<?php echo form_error('shipping_city'); ?>
								</td>
							</tr>

							<tr>
								<td><label for="shipping_zipcode">Pin Code: </label></td>
								<td><input type="text" name="shipping_zipcode" placeholder="Enter Your ZipCode">
									<?php echo form_error('shipping_zipcode'); ?>
								</td>
								<td><label for="shipping_phone">Mobile: </label></td>
								<td><input type="text" name="shipping_phone" placeholder="Enter Your Phone">
									<?php echo form_error('shipping_phone'); ?>
								</td>
							</tr>

							<tr>
								<td><label for="shipping_email">Email: </label></td>
								<td><input type="text" name="shipping_email" placeholder="Enter Your Email"><br><br>
									<?php echo form_error('shipping_email'); ?>
								</td>

						</tbody>
					</table>
				</div>

				<div class="col-lg-6">
					<div class="content">
						<div class="cartoption">
							<div class="cartpage">
								<center>
									<h3><b>Payment Details</b></h3>
									<h4>Order Total : <span>$<?php echo $grand_tot; ?></span></h4>
								</center>
							</div>
						</div>
					</div>
					<div class="card">
						<table style="float:right;text-align:center;" width="80%">
							<tr>
								<th>Card Number: </th>
								<td><input type="text" name="card_number" id="card_number" placeholder="xxxx-xxxx-xxxx-xxxx" size="23" /></td>
							</tr>
							<tr>
								<th>Expiration Date:</th>
								<td><input type="text" name="exp_month" id="exp_month" size="10" placeholder="mm" />&nbsp;<input type="text" name="exp_year" id="exp_year" size="10" placeholder="yyyy" /></td>

							</tr>
							<tr>
								<th>CVV: </th>
								<td><input type="text" name="cvv" id="cvv" placeholder="xxx" size="23" /></td>
							</tr>
						</table>
					</div>
				</div>
				<input type="hidden" id="sub-tot" name="sub-tot" value="<?= $order_total; ?>">
				<input type="hidden" id="disc-amount" name="disc-amount" value="<?= $disc_amount; ?>">
				<input type="hidden" id="grand-tot" name="grand-tot" value="<?= $grand_tot; ?>">
				<input type="hidden" id="dis-type" name="dis-type" value="<?= $dis_type; ?>">

			</div>
			<center>
				<div>
					<div><button class="grey" id="submit">Submit</button></div><br><br>
				</div>
			</center>
		</form>
	</div>
</body>
<style>
	.cell td {
		padding: 10px;
	}

	.card td {
		padding: 6px;
	}
</style>
<!-- <script>
	$(document).ready(function() {
		$.ajax({
			url: "<?php echo base_url() ?>/service_public/place_order",
			success: function(data) {

			}
		});

	});
</script> -->

</html>