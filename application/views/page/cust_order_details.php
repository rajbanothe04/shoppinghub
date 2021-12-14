<!DOCTYPE html>
<html lang="en">

<head>
	<meta cha$t="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My_Order</title>
	<script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<h1>My Order details</h1>
			<table style="float:center;text-align:left; outline: thin solid" width="100%">
				<tbody style="padding: 5px;">
					<thead>
						<tr style="outline: thin solid">
							<th>Sr.No.</th>
							<th>Product Name</th>
							<th>Product Image</th>
							<th>Product Price</th>
							<th>Qty</th>
							<th>Sub Total</th>
							<th>Discount</th>
							<th>Product Subtotal</th>
							<th>Upload File</th>
							<th>Order Details</th>

						</tr>
					</thead>
					<?php
					// echo "<pre>";
					// print_r($order_details);
					// echo "</pre>";
					// exit();
					$i = 0;
					$product_price = 0;
					$product_qty = 0;
					$total = 0;
					$grandtotal_amount = 0;
					$grandtotal_final = 0;
					foreach ($order_details as $ord_details) {
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo  $ord_details->product_name; ?></td>
						<td><img src="<?php echo base_url('uploads/' . $ord_details->product_image); ?>"
								style="width: 80px; height:80px; border: 2px ;" alt="" /></td>
						<td>$<?php echo $pro_price = $ord_details->product_price; ?></td>
						<td><?php echo $qty = $ord_details->product_sales_quantity; ?></td>
						<td>$<?php echo $total = $pro_price * $qty; ?></td>

						<?php if ($ord_details->dis_type === 'amount') : ?>
						<td>$<?php echo $discount = $ord_details->disc_amount; ?></td>
						<?php else : ?>
						<td><?php echo $discount = $ord_details->disc_amount; ?>%</td>
						<?php endif; ?>
						<?php if ($ord_details->dis_type === 'amount' && $ord_details->disc_amount > $total) : ?>
						<td>$<?php echo  $total; ?></td>
						<?php elseif ($ord_details->dis_type === 'amount' && $ord_details->disc_amount <= $total) : ?>
						<td>$<?php echo $grandtotal = $total - $ord_details->disc_amount ?></td>
						<?php else : ?>
						<?php $percent_val = (($total * $ord_details->disc_amount) / 100); ?>
						<td>$<?php echo $grandtotal = $total - $percent_val; ?></td>
						<?php endif; ?>


						<td>
							<?= anchor("upload", 'Upload File', ['class' => 'btn btn-primary']); ?>
						</td>

						<div>
							<td>
								<input type="button" id="<?php echo $ord_details->order_id ?>"
									class="view-details btn btn-primary" name="submit" value="View Details" />
							</td>
						</div>

					</tr>

					<?php
						$product_price += $pro_price;
						$product_qty += $qty;
						$grandtotal_amount += $total;
						$grandtotal_final += $grandtotal;
					} ?>
					<tr style="font-size:18px">
						<th>Grand Total :</th>
						<th><?php echo ""; ?> </th>
						<th> <?php echo ""; ?></th>
						<th>$<?php echo $product_price; ?></th>
						<th><?php echo $product_qty; ?></th>
						<th>$<?php echo $grandtotal_amount; ?> </th>
						<th><?php echo ""; ?> </th>
						<th>$<?php echo $grandtotal_final; ?> </th>
						<th><?php echo ""; ?> </th>
						<th><?php echo ""; ?> </th>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-lg-1"></div>
	</div>
	<div class="backdrop" id="modal" style="display: none;">
		<div class="alert-box">
			<div class="btn-close-row">
				<div class="btn-close btn-modal-close">&times;</div>
			</div>
			<div class="container fa-border">
				<div id="printableArea">
					<div class="row">
						<div class="col-lg-4">
							<table>
								<thead>
									<h2>Billing Address:</h2>
								</thead>
								<tr>
									<th id="cust-name"></th>
								</tr>
								<tr>
									<th id="user-name"></th>
								</tr>
								<tr>
									<th id="zip"></th>
								</tr>
								<tr>
									<td id="order_date"></td>
								</tr>

							</table>
						</div>

						<div class="col-lg-4">
							<table>
								<thead>
									<h2>Shipping Address:</h2>
								</thead>
								<tr>
									<th id="shipping_name"></th>
								</tr>
								<tr>
									<th id="shipping_email"></th>
								</tr>
								<tr>
									<th id="shipping_address"></th>
								</tr>
								<tr>
									<th id="shipping_country"></th>
								</tr>
								<tr>
									<th id="shipping_city"></th>
								</tr>
								<tr>
									<th id="shipping_phone"></th>
								</tr>
								<tr>
									<th id="shipping_zipcode"></th>
								</tr>

							</table>
							<br>
						</div>
						<div class="col-lg-4"></div>
					</div>
					<br>
					<div class="row ">
						<div class="col-lg-4">
							<table>
								<tr>
									<th>Product Image</th>
								</tr>
								<tr>
									<td><img src="" id="product_image" style="width: 200px; height:200px; border: 2px ;"
											alt="" /></td>
								</tr>
							</table>
						</div>
						<div class="col-lg-6">
							<div class="col">
								<h4>Product Description:</h4>
							</div>
							<div class="col" id="product_short_description"></div>
							<br />
							<div class="col" id="product_long_description"></div>
						</div>
						<div class="col-lg-2"></div>
					</div> <br>

					<div>
						<table style="float:center;text-align:left; outline: thin solid" width="80%">
							<tbody>
								<thead>
									<tr style="outline: thin solid">
										<th>Product Name</th>
										<th>Product Price</th>
										<th>Product Qty</th>
										<th>Total</th>
										<th>Coupon Discount</th>
										<th>Product Subtotal</th>
									</tr>
								</thead>
								<tr>
									<td id="product_name"></td>
									<td id="product_price"></td>
									<td id="product_sales_quantity"></td>
									<td id="subtotal_amt"></td>
									<td id="discount"></td>
									<td id="final_amount"></td>
								</tr>
							</tbody>
						</table>
					</div> <br>

				</div>
				<center>
					<input type="button" class="btn btn-primary btn-modal-close" value="Close" />
					<input type="button" id="print" value="Print" class="btn btn-primary" />
				</center>

			</div>
		</div>
	</div>

</body><br>

</html>
<script>
$(document).ready(function() {
	$(".btn-modal-close").click(function() {
		$('#modal').hide();
	});
	$('.view-details').click(function() {
		var order_id = this.id;
		var request = $.ajax({
			url: '<?php echo base_url() ?>/home/order_shipp_address',
			type: "POST",
			data: {
				rowid: order_id
			},
			dataType: "json"
		});
		request.done(function(record) {
			$('#modal').show();
			$('#cust-name').text(record.name);
			$('#user-name').text(record.uname);
			$('#order_date').text(record.order_date);
			$('#shipping_name').text(record.shipping_name);
			$('#shipping_email').text(record.shipping_email);
			$('#shipping_address').text(record.shipping_address);
			$('#shipping_country').text(record.shipping_country);
			$('#shipping_city').text(record.shipping_city);
			$('#shipping_phone').text(record.shipping_phone);
			$('#shipping_zipcode').text(record.shipping_zipcode);
			$('#product_short_description').text(record.product_short_description);
			$('#product_long_description').text(record.product_long_description);
			$('#product_name').text(record.product_name);
			$('#product_sales_quantity').text(record.product_sales_quantity);
			$('#zip').text(record.zip);
			$('#product_price').text("$ " + record.product_price);
			$('#product_image').attr("src", '<?= base_url("uploads/") ?>' + record
				.product_image);
			$('#subtotal_amt').text("$ " + record.order_total);


			if (record.dis_type == null) {
				$('#final_amount').text("$" + record.order_total);
				return;
			} else if (record.dis_type === "amount") {
				$("#final_amount").text("$" + record.grand_tot);
				$('#discount').text("$" + record.disc_amount);

			}
			//  (record.disc_type === "percent") 
			else {
				$("#final_amount").text("$" + record.grand_tot);
				$('#discount').text(record.disc_amount + "%");
			}





		});
		request.fail(function(jqXHR, textStatus) {
			alert("Error while getting details");
		});

	});
	$('#print').click(function printDiv() {
		var container = 'printableArea';
		var printContents = document.getElementById(container).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		setInterval('refreshPage()', 1000);
		//Call refresh page function after 1000 milliseconds (or 1 seconds).
	});
});

function refreshPage() {
	location.reload();
}
</script>