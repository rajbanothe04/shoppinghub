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
							<th>Order#</th>
							<th>Order Name</th>
							<th>Order Date</th>
							<th>Service</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<?php
					// echo "<pre>";
					// print_r($order_details);
					// echo "</pre>";
					// exit;

					foreach ($order_details as $ord_details) { ?>

						<tr>
							<td>
								<a href="#"><span id="<?php echo $ord_details->order_id ?>" class="view-details"><?php echo $ord_details->order_id; ?></span></a>
							</td>
							<td><?php echo  $ord_details->attribute_value; ?></td>
							<td>$<?php echo $ord_details->order_date; ?></td>
							<td><?php echo $ord_details->ser_name; ?></td>
							<td>$<?php echo "Order Placed"; ?></td>
							<td>
								<?= anchor("upload", 'Upload Images'); ?>
							</td>
						</tr>
					<?php	} ?>
				</tbody>
			</table>
		</div>

		<div class="col-lg-1"></div>
	</div>

	<!------------------------------------------Modal Part----------------------------------------------->

	<div class="backdrop" id="modal" style="display: none;">
		<div class="alert-box">
			<div class="btn-close-row">
				<div class="btn-close btn-modal-close">&times;</div>
			</div>
			<div class="container fa-border">
				<div id="printableArea">
					<center>
						<div>
							<h4>Service Name :- <span id="service-name"></span></h4>
						</div>
						<div>
							<h4>Order Name :- <span id="order-name"></span></h4>
						</div>
					</center>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-4">
							<table>
								<thead>
									<h2>Customer:</h2>
								</thead>
								<tr>
									<th id="user-name"></th>
								</tr>
								<tr>
									<th id="user-email"></th>
								</tr>
								<tr>
									<th id="user-address"></th>
								</tr>
								<tr>
									<th id="user-country"></th>
								</tr>
								<tr>
									<th id="user-city"></th>
								</tr>
								<tr>
									<th id="user-phone"></th>
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
									<h2>Company:</h2>
								</thead>
								<tr>
									<th id="company_name">ShoppingHub</th>
								</tr>
								<tr>
									<th id="company_email">shoppinghubgondia@gmail.com</th>
								</tr>
								<tr>
									<th id="company_address">Tirora Highway Road,hiwra road, Bhagwattola</th>
								</tr>
								<tr>
									<th id="shipping_zipcode">441616</th>
								</tr>

							</table>
							<div>

							</div>
							<br>
						</div>
						<div class="col-lg-2"></div>
					</div><br><br>
					<div class="row">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
							<table style="float:center;text-align:left; outline: thin solid" width="100%">
								<thead>
									<tr style="outline: thin solid">
										<th>Item</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>Item Total</th>
									</tr>
								</thead>
								<tbody class="tbody_target">
								</tbody>
							</table>
						</div>
						<div class="col-lg-2"></div>
					</div>
					<br>
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
		$(".view-details").click(function() {
			// alert("Test Messages");
			var order_id = this.id;
			var request = $.ajax({
				url: '<?php echo base_url() ?>/service_public/get_order_details',
				type: "POST",
				data: {
					rowid: order_id
				},
				dataType: "json"
			});
			request.done(function(record) {
				$('#modal').show();
				$('#user-name').text(record[0].name);
				$('#user-email').text(record[0].email);
				$('#user-address').text(record[0].address);
				$('#user-country').text(record[0].country);
				$('#user-city').text(record[0].city);
				$('#user-phone').text(record[0].phone);
				$('#zip').text(record[0].zipcode);
				$('#order_date').text(record[0].order_date);
				$('#service-name').text(record[0].ser_name);
				$('#order-name').text(record[0].attribute_value); //this is for order name
				var teks = "";
				$.each(record, function(index, val) { //looping table detail bahan
					var itme = val.attribute_value;
					var att_name = val.att_name;
					if ((record['ser_cust_price'] && record['ser_cust_price'] > 0)) {
						var price = val.ser_cust_price;
					} else {
						var price = '';
					}

					var qnty = val.ser_qty;
					var itm_total = val.grand_tot;

					teks += "<tr class='tr_detail'>" +
						"<td><ul><li>" + att_name + "-" + itme +
						"</li></ul></td><td>" + price +
						"</td><td>" + qnty +
						"</td><td>" + itm_total +
						"</td></tr>";
				});
				

				$(".tbody_target").append(teks);
				// $('#modal').reload(true);
				// if (record.dis_type == null) {
				// 	$('#final_amount').text("$" + record.order_total);
				// 	return;
				// } else if (record.dis_type === "amount") {
				// 	$("#final_amount").text("$" + record.grand_tot);
				// 	$('#discount').text("$" + record.disc_amount);

				// }
				// //  (record.disc_type === "percent") 
				// else {
				// 	$("#final_amount").text("$" + record.grand_tot);
				// 	$('#discount').text(record.disc_amount + "%");
				// }

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