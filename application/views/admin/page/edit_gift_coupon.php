<!-- start: Content -->
<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Edit Gift Coupon</a>
		</li>
	</ul>

	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Gift Coupon</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="<?php echo base_url('couponci/manage_gift_coupon'); ?>" class=""><i
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
				<form class="form-horizontal"
					action="<?php echo base_url('couponci/update_gift_by_id/' . $gift_info_by_id->id) ?>" method="post">
					<fieldset>

						<div class="control-group">
							<label class="control-label" for="fileInput">Discount Code<span style="color: red;">*</span>
								:</label>
							<div class="controls">
								<input value="<?php echo $gift_info_by_id->code; ?>" class="span4 typeahead" name="code"
									id="code_id" type="text" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="fileInput">Discount name<span style="color: red;">*</span>
								:</label>
							<div class="controls">
								<input value="<?php echo $gift_info_by_id->disc_name; ?>" class="span4 typeahead"
									name="disc_name" id="dis_id" type="text" />
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="fileInput">Discount Amount<span
									style="color: red;">*</span>
								:</label>
							<div class="controls">
								<input value="<?php echo $gift_info_by_id->disc_amount; ?>" class="span4 typeahead"
									name="disc_amount" id="dis_amount" type="text" />
							</div>
						</div>

						<!-- <div class="control-group">
							<label class="control-label" for="textarea">Discount Amount Left<span
									style="color: red;">*</span> :</label>
							<div class="controls">
								<textarea class="span4 typeahead" id="textarea" name="dis_amount_left" rows="3"
									required></textarea>
							</div>
						</div> -->



						<div class="control-group">
							<label class="control-label" for="textarea2">Category<span style="color: red;">*</span>
								:</label>
							<div class="controls">
								<select name="discount_category" required>
									<option value="<?php echo $gift_info_by_id->discount_category; ?>">
										<?php echo $gift_info_by_id->discount_category; ?>
									</option>
									<option value="Customer Service Discount">Customer Service Discount</option>
									<option value="High Volume Discount">High Volume Discount</option>
									<option value="Referral Code Discount">Referral Code Discount</option>
									<option value="Rewards Point Discount">Rewards Point Discount</option>
									<option value="First Order Discount">First Order Discount</option>
									<option value="Promotional Discount">Promotional Discount</option>
									<option value="Advocate Discount">Advocate Discount</option>
									<option value='Company Partnership Discount'>Company Partnership Discount</option>
									<option value='Testing Discount'>Testing Discount</option>
									<option value='To Be Decided'>To Be Decided</option>
									<option value='Conference/Workshop'>Conference/Workshop</option>
									<option value='Webinar'>Webinar</option>
									<option value='Ad campaigns'>Ad campaigns</option>
									<option value='Misc.'>Misc.</option>
									<option value='Turnaround Time'>Turnaround Time</option>
									<option value='Unhappy with Quality'>Unhappy with Quality</option>
									<option value='Charity'>Charity</option>
								</select>
								</select>
							</div>
						</div>

						<!-- <div class="control-group">
                            <label class="control-label" for="fileInput">Number of uses<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="no_of_uses" id="no_of_uses" type="number" />
                            </div>
                        </div> -->

						<div class="control-group">
							<label class="control-label" for="fileInput">Coupon Start Date<span
									style="color: red;">*</span> :</label>
							<div class="controls">
								<input value="<?php echo $gift_info_by_id->dis_start_date; ?>" class="span4 typeahead"
									name="dis_start_date" id="dis_st_date" type="date" />
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="fileInput">Coupon End Date<span
									style="color: red;">*</span> :</label>
							<div class="controls">
								<input value="<?php echo $gift_info_by_id->dis_end_date; ?>" class="span4 typeahead"
									name="dis_end_date" id="dis_nd_date" type="date" required />
							</div>
						</div>

						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Save-Gift-Coupon</button>
							<?= anchor("couponci/manage_gift_coupon", 'Cancel', ['class' => 'btn btn-danger']); ?>
						</div>
					</fieldset>
				</form>

			</div>
		</div>
		<!--/span-->

	</div>
	<!--/row-->


</div>
<!--/.fluid-container-->

<!-- end: Content -->