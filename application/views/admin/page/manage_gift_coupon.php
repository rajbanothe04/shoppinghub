<!-- start: Content -->
<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">Manage Coupon</a></li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Coupon</h2>
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

			<?= anchor("couponci/add_gift_coupon", '+ Add Gift Coupon', ['class' => 'btn btn-success']); ?>

			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sr.No.</th>
							<th>Discount Code</th>
							<th>Discount Name</th>
							<th>Discount Amount($)</th>
							<th>Amount Left($)</th>
							<th>Discount Category</th>
							<th>Number uses</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 0;
						foreach ($all_gift_coupon as $gift_coupon) {
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td class="center"><?php echo $gift_coupon->code; ?></td>
							<td class="center"><?php echo $gift_coupon->disc_name; ?></td>
							<td class="center">$<?php echo $gift_coupon->disc_amount; ?></td>
							<td class="center">$<?php echo $gift_coupon->disc_amount_left; ?></td>
							<td class="center"><?php echo $gift_coupon->discount_category; ?></td>
							<td class="center"><?php echo $gift_coupon->no_of_uses; ?></td>
							<td class="center"><?php echo $gift_coupon->dis_start_date; ?></td>
							<td class="center"><?php echo $gift_coupon->dis_end_date; ?></td>
							<td class="center">
								<a class="btn btn-info"
									href="<?php echo base_url('couponci/edit_gift_coupon/' . $gift_coupon->id); ?>">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger"
									href="<?php echo base_url('couponci/delete_gift_coupon/' . $gift_coupon->id); ?>">
									<i class=" halflings-icon white trash"></i>
								</a>
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