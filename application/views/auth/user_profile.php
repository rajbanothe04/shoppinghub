<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/style.css'); ?>">
</head>

<body>
	<!-- <center>
        <h3>My Profile</h3>
    </center> -->
	<hr>
	<div class="row">
		<!-- <?php echo form_open("user/find_user", ['class' => 'form-horizontal']); ?> -->
		<div class="col-lg-3">
			<!-- <div class="d-flex justify-content-center align-items-center">
                <img id="show" height="200px" width="180px" />
            </div> -->

		</div>
		<div class="container col-lg-6">
			<table class="table table-hover" style="width: 100%" border="4">
				<thead>
					<tr>

						<th colspan="3" style="font-size:20px">
							<center>
								<h3 style="color: navy;"><b>Profile Details</b></h3>
							</center>
						</th>

					</tr>
				</thead>
				<tbody>
					<tr>
						<td style="width:20%;">
							<div class="border border-dark rounded-circle overflow-hidden">
								<img id="show" src="<?= $user_data->file ?>" height="150px" width="130px" alt="">
							</div>
						</td>
						<td style="width:20%;"><b>Name :-</b></td>
						<td><b>
								<p style="font-size:30px"><?= $user_data->name ?></p>
								<p><?= "Email:- " . $user_data->uname ?></p>
							</b></td>
					</tr>
					<tr>
						<td>
							<!-- <input type='file' onchange="readURL(this);" /> -->
							<div class="file btn btn-lg btn-primary">
								<p style="font-size:small">Change Profile</p>
								<input type="file" name="file" id="fileupload" />
							</div>
						</td>
						<td><b>Username :-</b></td>
						<td><?= $user_data->uname ?></td>
					</tr>
					<tr>
						<td></td>
						<td><b>Address :-</b></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td><b>Country :-</b></td>
						<td><?= $user_data->countryname ?></td>
					</tr>
					<tr>
						<td></td>
						<td><b>State :-</b></td>
						<td><?= $user_data->statename ?></td>
					</tr>
					<tr>
						<td></td>
						<td><b>City :-</b></td>
						<td><?= $user_data->cityname ?></td>
					</tr>
					<tr>
						<td></td>
						<td><b>Zip Code :-</b></td>
						<td><?= $user_data->zip ?></td>
					</tr>
					<tr>
						<td></td>
						<td><b>Gender :-</b></td>
						<td><?= $user_data->gender ?></td>
					</tr>
					<tr>
						<td colspan="3">
							<center>
								<?= anchor("home", 'Back', ['class' => 'btn btn-primary']); ?>
								&nbsp;&nbsp;&nbsp;

								<!-- <?= anchor("user/find_user/{$user_data->id}", 'Edit Profile', ['class' => 'btn btn-primary']); ?> -->
							</center>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-lg-3">

		</div>

	</div>
</body>

<script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
<!-- <script>
$(document).ready(function() {
    $('tr').click(function() {
        $('tr').css('background-color', 'green');
    });

});
</script> -->
<!-- <style>
.file {
    position: relative;
    overflow: hidden;
    height: 40px;
    width: 130px;

}

input {
    position: absolute;
    font-size: 100px;
    opacity: 0;
    right: 0;
    top: 0;
}
</style> -->

</html>