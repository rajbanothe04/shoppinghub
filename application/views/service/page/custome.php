<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Custome Page</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>


<body>
	<div class="container">

		<form action="<?php echo base_url('service_public/submit_custom_order'); ?>" method="post"
			style="width: 50%;margin: 0 auto;margin-top: -20px;">
			<div style="text-align: center;">
				<h2 style="text-transform: uppercase;"><?php echo $get_details[0]->ser_name; ?></h2>
			</div>
			<div>
				<p><?php echo $get_details[0]->ser_description; ?></p>
				<hr>
			</div>
			<?php foreach ($get_details as $attribute) { ?>
			<div>
				<?php $attribute_type = $attribute->att_type;

					$arr = explode(",", $attribute->att_values); //extract data value from comma seperating
					$arr1 = explode(",", $attribute->att_custprice);
					if ($attribute_type == "predefined_values") {
						echo '<label style="margin-top: -20px";>' . $attribute->att_name . ' :</label><br>';
						echo
						'<select name="att_type" id="att_type" class="form-control">';
						foreach ($arr as $key => $value) {
							echo '<option value="' . $value . '" >' . $value . '</option>';
						}
						echo '</select><hr>';
					} elseif ($attribute_type == "checkbox_type") {
						echo '<input type="checkbox" name="checkbox1[]" class="amount" value="' . $attribute->att_name;
						echo '" id="checkbox_type">&nbsp&nbsp<label> ' . $attribute->att_name . '</label>
						<span>($' . round($attribute->att_custprice) . ')
						</span><hr style="margin-top: 5px;margin-bottom: 5px">';
					} elseif ($attribute_type == "single_line_free_text") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						//Conditon for number of images to be submited
						if ($attribute->att_name == "Number of images to be submitted") {
							echo	'<input type="text" name="single_line" value="' . $no_of_image . '" id="single_line" style="width: 100%" required><hr>';
						} else {
							echo	'<input type="text" name="single_line" id="single_line" style="width: 100%" required><hr>';
						}
					} elseif ($attribute_type == "free_text") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo '<textarea id="free_txt" style="width: 100%" name="free_txt" rows="' . $attribute->att_fieldsize . '" cols=""></textarea><hr>';
					} elseif ($attribute_type == "rate_change") {
						echo '<label style="margin-top: 5px";>' . $attribute->att_name . ' :</label><br>';
						echo '<select name="rate_change" id="rate_change" class="form-control">';
						foreach ($arr as $key => $value) {
							if ($attribute->hide_price == "No") {
								echo '<option value="' . $key . '">' . $value . ' ' . $arr1[$key];
							} else {
								echo '<option value="' . $key . '">' . $value;
							}
							'</option>';
						}
						echo '</select><hr>';
					} elseif ($attribute_type == "Rate Change") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo '<select name="rate_change" id="rate_change" class="form-control">';
						foreach ($arr as $key => $value) {
							echo '<option value="' . $value . '" >' . $value . '</option>';
						}
						echo '</select><hr>';
					} elseif ($attribute_type == "custom_price") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo '<input type="text" name="custom_price" id="custom_price" style="width: 100%"><hr>';
					} elseif ($attribute_type == "radio_type") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						foreach ($arr as $key => $value) {

							echo $value . ' &nbsp <input type="radio" id="radio_type" name="radio_type" value="' . $value . '">&nbsp';
						}
						echo '<hr>';
					}

					?>
			</div>
			<?php } ?>
			<div style="float:right">Subtotal: <input type="text" name="total" id="total"></span></div><br>
			<div style="text-align:center">
				<input type="submit" name="submit" id="btn-submit" value="CONTINUE">
			</div><br>
		</form>
	</div>
</body>
<script>
$(document).reay(function() {

});
</script>

</html>