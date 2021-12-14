<!-- start: Content -->
<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="<?php echo base_url('manageorder/manage_order') ?>">Order Details</a></li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div id="printarea">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon user"></i><span class="break"></span>Order Details</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						<a href="<?php echo base_url('manageorder/manage_order'); ?>" class=""><i
								class="halflings-icon remove"></i></a>
					</div>
				</div>



				<style type="text/css">
				#result {
					color: red;
					padding: 5px
				}

				#result p {
					color: red
				}
				</style>
				<div id="result">
					<p><?php echo $this->session->flashdata('message'); ?></p>
				</div>

				<div class="box-content">
					<div class="span4 text-left">
						<h2>Customer Info(00<?php echo $customer_info->id; ?>)</h2>
						<table class="table table-striped table-bordered">
							<tr>
								<td>Customer Name : </td>
								<td><?php echo $customer_info->name; ?></td>
							</tr>
							<tr>
								<td>Customer Adress : </td>
								<td><?php echo $customer_info->city; ?></td>
							</tr>
							<tr>
								<td>Customer Mobile : </td>
								<td><?php echo $customer_info->phone; ?></td>
							</tr>
							<tr>
								<td>Customer Email : </td>
								<td><?php echo $customer_info->uname; ?></td>
							</tr>
							<tr>
								<td>Order Date : </td>
								<td><?php echo $order_info->order_date; ?></td>
							</tr>
						</table>
					</div>
					<div class="span4"></div>
					<div class="span4 text-right" class="table table-striped table-bordered">
						<h2>Customer Info(00<?php echo $shipping_info->shipping_id; ?>)</h2>
						<table class="table table-striped table-bordered">
							<tr>
								<td>Shpping Name : </td>
								<td><?php echo $shipping_info->shipping_name; ?></td>
							</tr>
							<tr>
								<td>Shipping Adress : </td>
								<td><?php echo $shipping_info->shipping_address; ?></td>
							</tr>
							<tr>
								<td>Shipping Mobile : </td>
								<td><?php echo $shipping_info->shipping_phone; ?></td>
							</tr>
							<tr>
								<td>Shipping Email : </td>
								<td><?php echo $shipping_info->shipping_email; ?></td>
							</tr>
							<tr>
								<td>Shipping Date : </td>
								<td><?php echo $shipping_info->shipping_date; ?></td>
							</tr>
						</table>
					</div>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Sr.</th>
								<th>Product Name</th>
								<th>Product Image</th>
								<th>Product Price</th>
								<th>Product Qty</th>
								<th>Product Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($order_details_info as $single_order_details) {
								$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $single_order_details->product_name ?></td>
								<td><img src="<?php echo base_url('uploads/' . $single_order_details->product_image); ?>"
										style="width:100px;height:100px" /></td>
								<td>$ <?php echo $this->cart->format_number($single_order_details->product_price) ?>
								</td>
								<td><?php echo $single_order_details->product_sales_quantity ?></td>
								<td>$
									<?php echo $this->cart->format_number($single_order_details->product_price * $single_order_details->product_sales_quantity) ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						<tfooter>
							<tr>
								<td colspan="5">Total Amount</td>
								<td>= $ <?php echo number_format((float)$order_info->order_total, 2, '.', ''); ?> </td>
							</tr>
							<tr>
								<td colspan="5">Discount</td>
								<td>
									<?php if ($order_info->dis_type == 'amount') {
										echo "= $" . number_format((float)$order_info->disc_amount, 2, '.', '');
									} else {
										echo "= " . $order_info->disc_amount . " %";
									}
									?>
								</td>
							</tr>
							<tr>
								<td colspan="5">Total Amount</td>
								<td>= $ <?php echo number_format((float)$order_info->grand_tot, 2, '.', ''); ?> </td>
							</tr>
						</tfooter>
					</table>
				</div>
			</div>

			<center><button onclick="window.print()">Print this page</button></center>
		</div>
		<!--/span-->

	</div>

	<!--/row-->
</div>
<!--/.fluid-container-->

<!-- end: Content -->