<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Custome Page</title>
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

					if ($attribute_type == "predefined_values") {
						echo '<label style="margin-top: -20px";>' . $attribute->att_name . ' :</label><br>';
						echo
						'<select name="att_type" id="att_type" class="form-control" required>';
						foreach ($arr as $key => $value) {
							echo '<option value="' . $value . '" >' . $value . '</option>';
						}
						echo '</select><hr>';
					} elseif ($attribute_type == "checkbox_type") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						foreach ($arr as $key => $value) {
							echo '
											<input type="checkbox" name="check[]" value="' . $value . '">&nbsp&nbsp' . $value . '<br>';
						}
						echo '<hr>';
					} elseif ($attribute_type == "single_line_free_text") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo	'<input type="text" name="single_line" id="single_line" style="width: 100%" required><hr>';
					} elseif ($attribute_type == "free_text") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo '<textarea id="free_txt" style="width: 100%" name="free_txt" rows="' . $attribute->att_fieldsize . '" cols=""></textarea><hr>';
					} elseif ($attribute_type == "rate_change") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo	'<input type="text" name="rate_change" id="rate_change" style="width: 100%"><hr>';
					} elseif ($attribute_type == "Rate Change") {
						echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
						echo '<select name="rate_change" id="rate_change" class="form-control" required>';
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
			<div style="text-align:center">
				<input type="submit" name="submit" value="CONTINUE">
			</div>
		</form>
	</div>
</body>

</html>