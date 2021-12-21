<!-- start: Content -->

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<div id="content" class="span12">

	<style>
	.form-control {
		width: 95%;
	}

	.form-group {
		padding-top: 10px;
		/* padding-bottom: 5px; */
	}

	input[type=text],
	input[type=number],
	textarea,
	select {
		border: solid black;
	}
	</style>

	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url('admin') ?>">Home</a>
			<i class="icon-angle-right"></i>
		</li>
		<li>
			<i class="icon-edit"></i>
			<a href="#">Edit Attributes</a>
		</li>
	</ul>
	<div>
		<p style="color: red;"><?php echo $this->session->flashdata('message'); ?></p>
	</div>
	<div class="container">

		<div class="row">
			<div class="col span12 box">
				<!-- <div class="box"> -->
				<div class="box-header">Attribute Details:</div>
				<br>
				<form action="<?php echo base_url('service/save_attribute'); ?>" method="post"
					style="padding-left: 10px;">

					<div class="form-group">
						<label for="att_name">Attribute Name: </label>
						<input type="text" name="att_name" class="form-control"
							value="<?php echo $get_attribute_data->att_name ?>" placeholder="Enter attribute name"
							required />

						<div class="form-group">
							<label for="att_type">Attribute Type: </label>
							<!-- onchange="setAttributeValueField();" -->
							<select name="att_type" id="att_type" class="form-control">
								<option value="<?php echo $get_attribute_data->att_type; ?>">
									<?php echo $get_attribute_data->att_type; ?></option>
								<option value="predefined_values">Predefined Values</option>
								<option value="free_text">Free Text</option>
								<option value="rate_change">Rate Change</option>
								<option value="custom_price">Custom Price</option>
								<option value="single_line_free_text">Single Line Free Text</option>
								<option value="radio_type">Radio Type</option>
								<option value="checkbox_type">Checkbox Type</option>
							</select>
						</div>

						<div class="form-group" id="attribute_values" style="display: none;">
							<label for="att_values">Values: </label>
							<input type="text" name="att_values" value="<?php echo $get_attribute_data->att_values; ?>"
								class="form-control" placeholder="" />
						</div>
						<div class="form-group" id="attribute_field_size" style="display: none;">
							<label for="att_fieldsize">Field Size: </label>
							<input type="text" value="<?php echo $get_attribute_data->att_fieldsize; ?>"
								name="att_fieldsize" class="form-control" placeholder="" />
						</div>
						<div class="form-group" id="attribute_cust_price" style="display: none;">
							<label for="att_custprice">Customer Prices: </label>
							<input type="text" name="att_custprice"
								value="<?php echo $get_attribute_data->att_custprice; ?>" class="form-control"
								placeholder="" />
						</div>
						<div class="form-group">
							<input type="checkbox" id="mandatory" class="form-control" value="1"
								name="mandatory">Service
							Activation: Yes
						</div><br>
						<hr>
						<div style="text-align: center"><input type="submit" name="submit" value="Update Attribute"
								class="btn btn-primary">
							&nbsp;
							<?php echo anchor('service/manage_attribute', "Cancel", ['class' => 'btn btn-danger']); ?>
						</div>
				</form>

			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	// alert("Test");

	if ($('#att_type').val() == "predefined_values") {
		$('#attribute_values').show();
		$('#attribute_cust_price').hide();
		$('#attribute_field_size').hide();
	} else if ($('#att_type').val() == "free_text") {
		$('#attribute_field_size').show();
		$('#attribute_values').hide();
		$('#attribute_cust_price').hide();
	} else if ($('#att_type').val() == 'rate_change') {
		$('#attribute_values').show();
		$('#attribute_cust_price').show();
		$('#attribute_field_size').hide();
	} else if ($('#att_type').val() == 'radio_type') {
		$('#attribute_values').show();
		$('#attribute_cust_price').hide();
		$('#attribute_field_size').hide();
	} else if ($('#att_type').val() == 'checkbox_type') {
		$('#attribute_values').show();
		$('#attribute_cust_price').show();
		$('#attribute_field_size').hide();
	} else {
		$('#attribute_values').hide();
		$('#attribute_cust_price').hide();
		$('#attribute_field_size').hide();
	}
	$('#att_type').on('change', function() {
		if ($('#att_type').val() == "predefined_values") {
			$('#attribute_values').show();
			$('#attribute_cust_price').hide();
			$('#attribute_field_size').hide();
		} else if ($('#att_type').val() == "free_text") {
			$('#attribute_field_size').show();
			$('#attribute_values').hide();
			$('#attribute_cust_price').hide();
		} else if ($('#att_type').val() == 'rate_change') {
			$('#attribute_values').show();
			$('#attribute_cust_price').show();
			$('#attribute_field_size').hide();
		} else if ($('#att_type').val() == 'radio_type') {
			$('#attribute_values').show();
			$('#attribute_cust_price').hide();
			$('#attribute_field_size').hide();
		} else if ($('#att_type').val() == 'checkbox_type') {
			$('#attribute_values').show();
			$('#attribute_cust_price').show();
			$('#attribute_field_size').hide();
		} else {
			$('#attribute_values').hide();
			$('#attribute_cust_price').hide();
			$('#attribute_field_size').hide();
		}
	});
});
</script>