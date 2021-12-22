<!-- start: Content -->

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>
<div id="content" class="span12">

	<style>
	.form-control {
		width: 90%;
	}

	.form-group {
		padding-top: 10px;
		/* padding-bottom: 5px; */
	}

	input[type=text],
	input[type=number],
	textarea,
	select {
		border: solid 2px black;
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
			<a href="#">Add Service</a>
		</li>
	</ul>

	<div class="container">

		<div class="row">
			<form action="<?php echo base_url('service/update_service/' . $get_service_by_id->ser_id); ?>" method="post"
				style="padding-left: 5px;">

				<div class="col span6 box">
					<!-- <div class="box"> -->
					<div class="box-header">Service Details:</div>
					<br>

					<div class="form-group">
						<label for="ser_name">Name: </label>
						<input type="text" name="ser_name" class="form-control"
							value="<?php echo $get_service_by_id->ser_name ?>" required />
					</div>
					<div class="form-group">
						<label for="ser_description">Description: </label>
						<textarea name="ser_description" id="" class="form-control"
							rows="2"><?php echo $get_service_by_id->ser_description ?></textarea>
					</div>
					<div class="form-group">
						<label for="ser_ternaround">Target Turnaround Days: </label>
						<input type="number" name="ser_ternaround" class="form-control"
							value="<?php echo $get_service_by_id->ser_ternaround ?>" />
					</div>
					<div class="form-group">
						<label for="ser_type">Service Type: </label>
						<select name="ser_type" id="ser_type" class="form-control">
							<option <?php if ($get_service_by_id->ser_type == "standard") {
										'selected = "selected"';
									} ?> value="standard">Standard</option>
							<option <?php if ($get_service_by_id->ser_type == "information") {
										'selected = "selected"';
									} ?> value="information">information</option>
							<option <?php if ($get_service_by_id->ser_type == "quote") {
										'selected = "selected"';
									} ?> value="quote">Quote</option>
						</select>
					</div>
					<div class="form-group">
						<label for="ser_cust_price">Service Customer Price: </label>
						<input type="text" name="ser_cust_price" class="form-control"
							value="<?php echo $get_service_by_id->ser_cust_price ?>" />
					</div>
					<div class="form-group">
						<label for="ser_qty">Default Qty: </label>
						<input type="number" name="ser_qty" class="form-control"
							value="<?php echo $get_service_by_id->ser_qty ?>" />
					</div>
					<div class="form-group">
						<input type="checkbox" id="activation" class="form-control" name="ser_activation" value="Yes" <?php if ($get_service_by_id->ser_activation == "Yes") {
																															echo " checked=\"checked\""; // echo 'checked="checked"';
																														} ?> />Service
						Activation
					</div><br>
					<hr>
					<div style="text-align: center"><input type="submit" name="submit" value="Save"
							class="btnSubmit btn btn-primary">
						&nbsp; <?php echo anchor('service', "Cancel", ['class' => 'btn btn-danger']); ?>
						<!-- <input type="reset" name="cancel" value="Cancel" class="btn btn-danger"> -->
					</div>
				</div>

				<!------------------------------------- Attribute Section---------------------------------- -->

				<div class="col span6 box">
					<div class="box-header">Attribute Details:</div>
					<br>
					<?php foreach ($all_attribute as $attribute) { ?>


					<div class="form-group" style="border: 1px solid black; padding: 10px;">
						<?php $attribute_type = $attribute->att_type;

							$arr = explode(",", $attribute->att_values);
							?>


						<label><input type="checkbox" name="selected_attribute[]" class="checkbox-primary"
								value="<?php echo $attribute->att_id; ?>" <?php foreach ($get_service_attr_by_id as $val) {
																																								if ($val->attribute_id == "$attribute->att_id") {
																																									echo " checked=\"checked\"";
																																								};
																																							} ?>><?php echo $attribute->att_name; ?>
						</label>
						<!-- <span><a
								href="<?php echo base_url('service/edit_attribute/' . $attribute->att_id); ?>">Edit</a>
						</span> -->

						<?php if ($attribute_type == "predefined_values") {

								echo
								'<select name="att_type" id="att_type" class="form-control" required>';
								foreach ($arr as $key => $value) {
									echo '<option value="' . $key . '">' . $value . '</option>';
								}
								echo '</select>';
							} elseif ($attribute_type == "free_text") {
								echo '<textarea id="free_txt" name="free_txt" style="width:90%"
							rows="' . $attribute->att_fieldsize . '" cols=""></textarea>';
							} elseif ($attribute_type == "rate_change") {
								echo '<select name="rate_change" id="rate_change" class="form-control" required>';
								foreach ($arr as $key => $value) {
									echo '<option value="' . $key . '">' . $value . '</option>';
								}
								echo '</select>';
							} elseif ($attribute_type == "custom_price") {
								echo '<input type="text" name="custom_price" style="width:90%" id="custom_price">';
							} elseif ($attribute_type == "single_line_free_text") {
								echo '<input type="text" name="single_line_free_text" style="width:90%" id="single_line_free_text">';
							} elseif ($attribute_type == "radio_type") {
								foreach ($arr as $key => $value) {

									echo $value . '<input type="radio" id="radio_type" name="radio_type" value="' . $key . '">';
								}
							} elseif ($attribute_type == "checkbox_type") {
								echo '<input type="text" name="checkbox_type" id="checkbox_type">';
							}

							?>

					</div>

					<?php } ?>

				</div>
				<div style="text-align: center"><input type="submit" name="submit" value="Save"
						class="btnSubmit btn btn-primary">
					&nbsp; <?php echo anchor('service', "Cancel", ['class' => 'btn btn-danger']); ?>
					<!-- <input type="reset" name="cancel" value="Cancel" class="btn btn-danger"> -->
				</div>
			</form>
		</div>
	</div>


</div>
<!--/row-->


</div>