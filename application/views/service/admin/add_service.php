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
			<form action="<?php echo base_url('service/save_service') ?>" method="post" style="padding-left: 5px;">

				<div class="col span6 box">
					<!-- <div class="box"> -->
					<div class="box-header">Service Details:</div>
					<br>

					<div class="form-group">
						<label for="ser_name">Name: </label>
						<input type="text" name="ser_name" class="form-control" placeholder="Enter service name"
							required />
					</div>
					<div class="form-group">
						<label for="ser_description">Description: </label>
						<textarea name="ser_description" id="" class="form-control" rows="2"></textarea>
					</div>
					<div class="form-group">
						<label for="ser_ternaround">Target Turnaround Days: </label>
						<input type="number" name="ser_ternaround" class="form-control" placeholder="" />
					</div>
					<div class="form-group">
						<label for="ser_type">Service Type: </label>
						<select name="ser_type" id="ser_type" class="form-control">
							<option value="standard" selected>Standard</option>
							<option value="information">Information</option>
							<option value="quote">Quote</option>
						</select>
					</div>
					<div class="form-group">
						<label for="ser_cust_price">Service Customer Price: </label>
						<input type="text" name="ser_cust_price" class="form-control" placeholder="" />
					</div>
					<div class="form-group">
						<label for="ser_qty">Default Qty: </label>
						<input type="number" name="ser_qty" class="form-control" placeholder="" />
					</div>
					<div class="form-group">
						<input type="checkbox" id="activation" class="form-control" name="ser_activation"
							value="Yes">Service
						Activation
					</div><br>
					<hr>
					<div style="text-align: center"><input type="submit" name="submit" value="Save"
							class="btnSubmit btn btn-primary">
						&nbsp; <?php echo anchor('service', "Cancel", ['class' => 'btn btn-danger']); ?>
						<!-- <input type="reset" name="cancel" value="Cancel" class="btn btn-danger"> -->
					</div>
				</div>

				<div class="col span6 box">
					<div class="box-header">Attribute Details:</div>
					<br>
					<?php foreach ($all_attribute as $attribute) { ?>
					<div class="form-group" style="border: 1px solid black; padding: 10px;">
						<?php $attribute_type = $attribute->att_type;

							$arr = explode(",", $attribute->att_values);
							?>
						<label><input type="checkbox" name="selected_attribute[]" class="checkbox-primary"
								value="<?php echo $attribute->att_id; ?>"><?php echo $attribute->att_name; ?>
						</label>
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
							} elseif ($attribute_type == "single_line") {
								echo '<input type="text" name="single_line" style="width:90%" id="single_line">';
							} elseif ($attribute_type == "radio_type") {
								foreach ($arr as $key => $value) {

									echo $value . '<input type="radio" id="radio_type" name="radio_type" value="' . $key . '">';
								}
							} elseif ($attribute_type == "checkbox_type") {
								foreach ($arr as $key => $value) {
									echo '<input type="checkbox">' . $value;
								}
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
<!--/.fluid-container-->

<!-- end: Content -->
<!-- <script>
$(document).ready(function() {
	// alert("Hello");
	$(".btnSubmit").click(function() {
		var selectedAttribute = new Array();
		$('input[name="selected_attribute"]:checked').each(function() {
			selectedAttribute.push(this.value);
		});
		alert("Number of selected Attributes: " + selectedAttribute.length + "\n" + "And, they are: " +
			selectedAttribute);
	});
});
</script> -->