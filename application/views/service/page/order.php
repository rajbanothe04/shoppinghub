<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order Page</title>
</head>

<body>
	<div class="container">
		<form action="<?php echo base_url('service_public/submit_service'); ?>" method="post"
			style="width: 40%;margin: 0 auto;margin-top: 50px;">
			<div style="text-align: center;">
				<h2>ORDER</h2>
			</div>
			<label for="service">Service: </label>
			<select name="service" id="service" class="form-control" required>
				<option value="">Select Service</option>
				<?php foreach ($service_content as $service) {
					echo '<option value="' . $service->ser_id . '">' . $service->ser_name . '</option>';
				} ?>
			</select>
			<p></p>
			<input type="text" style="width: 100%; height:40px" name="no_of_image"
				placeholder="Number of Images to be submitted" required><br><br><br>
			<div style="text-align:center">
				<input type="submit" name="submit" value="CONTINUE">
			</div>
		</form>
	</div>
</body>

</html>