<div id="content" class="span10">


	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="<?php echo base_url('service/attribute_dtls') ?>">Manage Attributes</a></li>
	</ul>

	<div class="row-fluid">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>Manage Attributes</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class=""><i class="halflings-icon remove"></i></a>
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

			<div>
				<P style="color: red;"><?php echo $this->session->flashdata('message'); ?></P>
			</div>
			<?= anchor("service/add_attribute", '+ Add Attribute', ['class' => 'btn btn-success']); ?>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th style="width: 40%;">Attributes Name</th>
							<th style="width: 40%;">Value</th>
							<th style="width: 40%;">Actions</th>
						</tr>
					</thead>

					<tbody>

						<?php foreach ($all_attribute as $attribute) { ?>
						<tr>
							<td class="center"><?php echo $attribute->att_name; ?></td>
							<td class="center">

								<?php $attribute_type = $attribute->att_type;

									$arr = explode(",", $attribute->att_values);
									if ($attribute_type == "predefined_values") {

										echo
										'<select name="att_type" id="att_type" class="form-control" required>';
										foreach ($arr as $key => $value) {
											echo '<option value="' . $key . '" >' . $value . '</option>';
										}
										echo '</select>';
									} elseif ($attribute_type == "free_text") {
										echo '<textarea id="free_txt" name="free_txt" rows="' . $attribute->att_fieldsize . '" cols=""></textarea>';
									} elseif ($attribute_type == "rate_change") {
										echo	'<input type="text" name="rate_change" id="rate_change">';
									} elseif ($attribute_type == "custom_price") {
										echo '<input type="text" name="custom_price" id="custom_price">';
									} elseif ($attribute_type == "single_line_free_text") {
										echo	'<input type="text" name="single_line" id="single_line">';
									} elseif ($attribute_type == "radio_type") {
										foreach ($arr as $key => $value) {

											echo $value . '<input type="radio" id="radio_type" name="radio_type" value="' . $key . '">';
										}
									} elseif ($attribute_type == "checkbox_type") {

										echo '<input type="text" name="checkbox_type" id="checkbox_type">';
									}

									?>
							</td>
							<td class="center" style="text-align: center">
								<a class="btn btn-info"
									href="<?php echo base_url('service/edit_attribute/' . $attribute->att_id); ?>">
									<i class="halflings-icon white edit"></i>
								</a>
								<a class="btn btn-danger"
									href="<?php echo base_url('service/delete_attribute/' . $attribute->att_id); ?>">
									<i class="halflings-icon white trash"></i>
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