<!-- start: Content -->
<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="<?php echo base_url('product/manage_product') ?>">Manage Product</a></li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Product</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="<?php echo base_url('admin'); ?>" class=""><i class="halflings-icon remove"></i></a>
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
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr.</th>
							<th>Customer Name</th>
							<th>Customer Phone</th>
							<th>Customer Email</th>
							<th>Total Amount</th>
							<th>Discount</th>
							<th>Sub Total</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($all_manage_order_info as $single_order) {
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $single_order->name ?></td>
							<td><?php echo $single_order->phone ?></td>
							<td><?php echo $single_order->uname ?></td>
							<td> $ <?php echo $single_order->order_total; ?></td>
							<td>
								<?php if ($single_order->dis_type == 'amount') {
										echo "$" . $single_order->disc_amount;
									} else {
										echo $single_order->disc_amount . "%";
									}
									?>
							</td>
							<td> $ <?php echo $single_order->grand_tot; ?></td>
							<td>

								<a class="btn btn-info"
									href="<?php echo base_url('manageorder/order_details/' . $single_order->order_id); ?>">View</a>
								<!-- <a class="btn btn-success"
                                    href="<?php echo base_url('web/pdf/' . $single_order->order_id); ?>">Download</a> -->
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!--/span-->

	</div>
	<!--/row-->



</div>
<!--/.fluid-container-->

<!-- end: Content -->