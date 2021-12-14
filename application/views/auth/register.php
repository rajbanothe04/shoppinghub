<!DOCTYPE html>
<html lang="en">
<script src="<?php echo base_url('assets/jq/jquery.js'); ?>"></script>

<div class="container border shadow mb-5 bg-black">
	<div class="row">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<?php echo form_open_multipart('registration/user_registration', ['class' => 'form-horizontal']); ?>

			<legend>User Registaration <span>(If already registered<a href="<?php echo base_url('login'); ?>"> Click
						Here</a>)

				</span></legend>
			<div class="row col-lg-9 border shadow mb-5 bg-black">
				<div class=row>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="uname" class="form-label mt-4">Full Name<span style="color:red">*</span></label>
							<?php echo form_input(['name' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter your name', 'value' => set_value('name')]); ?>
							<?php echo form_error('name'); ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="uemail" class="form-label mt-4">Email address<span
									style="color:red">*</span></label>
							<?php echo form_input(['name' => 'uname', 'class' => 'form-control', 'placeholder' => 'Enter your email', 'value' => set_value('email')]); ?>
							<?php echo form_error('uname'); ?>
							<!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small> -->
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label for="uassword" class="form-label mt-4">Password<span
									style="color:red">*</span></label>
							<?php echo form_password(['name' => 'pword', 'class' => 'form-control', 'placeholder' => 'Enter Password']); ?>
							<?php echo form_error('pword'); ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="upassword1" class="form-label mt-4">Conform Password<span
									style="color:red">*</span></label>
							<?php echo form_password(['name' => 'confirm_password', 'class' => 'form-control', 'placeholder' => 'Re-Enter Password']); ?>
							<?php echo form_error('confirm_password'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label for="country-list" class="form-label mt-4">Select Country<span
									style="color:red">*</span></label>
							<!-- <select class="form-select" id="country-list">
                            <option value="null">Select Country</option> -->
							<?php
							// echo form_dropdown('Select Country', $country_list['countryname']);
							// if (!empty($country_list)) {
							// foreach ($country_list as $country) :
							//     echo "<option value=" . $country->id . ">" . $country->countryname . "</option>";
							// endforeach;
							// }
							?>
							<?php echo form_dropdown('country', $countries, '', 'class="form-control" id="country-list"'); ?>
							<?php echo form_error('country'); ?>
							<!-- </select> -->
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="state-list" class="form-label mt-4">Select State<span
									style="color:red">*</span></label>
							<!-- <select class="form-select" id="state-list"> -->
							<!-- <label for="exampleSelect2" class="form-label mt-4">Select State</label>
                            <select multiple="" class="form-select" id="exampleSelect2"> -->
							<!-- <option>Select State</option> -->
							<!-- <option>Madhya Pradesh</option>
                            <option>Montana</option>
                            <option>Carlisle</option>
                            <option>Sidney</option> -->
							<!-- </select> -->
							<?php echo form_dropdown('state', 'Select State', '', 'class="form-control" id="state-list"'); ?>
							<?php echo form_error('state'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label for="city-list" class="form-label mt-4">Select City<span
									style="color:red">*</span></label>
							<?php echo form_dropdown('city', 'Select City', '', 'class="form-control" id="city-list"'); ?>
							<?php echo form_error('city'); ?>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="zip" class="form-label mt-4">Zip Code<span style="color:red">*</span></label>
							<?php echo form_input(['name' => 'zip', 'class' => 'form-control', 'value' => set_value('zip')]); ?>
							<!-- <input type="name" class="form-control" id="exampleInputName" placeholder="Enter Zip Code"> -->
							<?php echo form_error('zip'); ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<fieldset class="form-group">
							<label for="gender" class="form-label mt-4">Gender<span style="color:red">*</span></label>
							<div class="d-flex justify-content-around">
								<div class="form-check">
									<label class="form-check-label">
										<!-- <input type="radio" class="form-check-input" name="optionsRadios"
                                            id="optionsRadios1" value="option1" checked=""> -->
										<?php echo form_radio(['name' => 'gender', 'value' => 'Male', 'id' => 'male_option', 'checked' => 'TRUE']); ?>
										Male
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<!-- <input type="radio" class="form-check-input" name="optionsRadios"
                                            id="optionsRadios2" value="option2"> -->
										<?php echo form_radio(['name' => 'gender', 'value' => 'Female', 'id' => 'female_option']); ?>
										Female
									</label>
								</div>

							</div>
						</fieldset>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="form-group">
							<label for="formFile" class="form-label mt-4">Uplaod Profile Photo</label>
							<div class="file btn btn-lg btn-info">
								<p style="font-size:small">Select your Profile</p>
								<?php echo form_upload(['name' => 'file', 'class' => 'form-control', /*'onchange' => "preview()",*/ 'id' => 'formFile', 'required']); ?>
								<!-- <input type="file" id="formFile" name="file" /> -->
								<!-- <?php echo form_error('file'); ?> -->
							</div>

							<!-- <script>
                        function preview() {
                            show.src = URL.createObjectURL(event.target.files[0]);
                        }
                        </script> -->
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center my-4">
					<!-- <button type="reset" class="btn btn-primary">Reset</button> -->
					<?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp;&nbsp;
					<!-- <button type="submit" class="btn btn-primary">Register</button> -->
					<?php echo form_submit(['name' => 'submit', 'value' => 'Register', 'class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp;&nbsp;
					<?= anchor("login", 'Cancel', ['class' => 'btn btn-danger']); ?>
				</div>
				<!-- <?php echo validation_errors(); ?> -->
			</div>
			<div class="row col-sm">

				<!-- <div class="imag-container"> -->
				<div class="d-flex justify-content-center align-items-center" id="img-container">
					<!-- <img id="show" height="300px" width="250px" /> -->
					<!-- </div> -->

				</div>
			</div>

			<!-- </div> -->

			</form>
			<div class="col-lg-1"></div>
		</div>
	</div>
</div>





<!-- This is jquery code to select dynamic Country State and City -->

<script>
$(document).ready(function() {

	// Function to load states depends on Country
	$("#country-list").change(function() {
		$('.state-opt').remove();
		$('.city-opt').remove();
		var id = $("#country-list").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>/registration/getState",
			data: {
				country_id: id
			},
			dataType: "json",
			// cache: false,
			success: function(data) {
				console.log("Response==> ", data);
				if (data.length !== 0) {
					$.each(data, function(key, value) {
						$("#state-list").append(
							"<option class='state-opt' value=" +
							value.id + ">" +
							value.statename + "</option>");
					});
				}
			}
		});
		return false;
	});
	// ==================================================

	// Function to load cities depends on state
	$('#state-list').change(function() {
		$('.city-opt').remove();
		var id = $("#state-list").val();
		$.ajax({
			type: "POST",
			url: "<?php echo base_url() ?>/registration/getCity",
			data: {
				state_id: id
			},
			dataType: "json",
			success: function(data) {
				console.log("Response==>", data);
				if (data.lenght !== 0) {

					$.each(data, function(key, value) {
						$("#city-list").append(
							"<option class='city-opt' value=" +
							value.id + ">" +
							value.cityname + "</option>");
					});
				}
			}
		});
	});
	$('#formFile').change(function(e) {
		$("#img-container").append('<img id="show" height="300px" width="250px" />');
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$("#show").attr('src', e.target.result);

			}
			reader.readAsDataURL(this.files[0]);
		} else {
			alert('select a file to see preview');
			$("#img-container").remove();
			// $("#show").attr('src', '');
		}
	});
});
</script>
<style>
.file {
	position: relative;
	overflow: hidden;
	height: 40px;
	width: 150px;

}

#formFile {
	position: absolute;
	font-size: 100px;
	opacity: 0;
	right: 0;
	top: 0;
}
</style>


</html>