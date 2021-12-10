<?php include('first_header.php'); ?>
<?php include('second_header.php'); ?>



<div class="row">
    <!-- <div class=".ani mt-2">
		<i><b>
				<h5 style="color:blue;"><?= $this->session->flashdata('msg'); ?></h5>
			</b></i>
	     </div> -->
    <div class="container border shadow mb-5 bg-black">
        <div class="col-lg-4"></div>

        <div class="col-lg-4">
            <?php echo form_open('login/admin_login', ['class' => 'form-horizontal']); ?>
            <fieldset>
                <h2>User Login</h2>

                <?php if ($error = $this->session->flashdata('login_failed')) : ?>
                <div class="col-sm">
                    <div class="alert alert-dismissible alert-danger">
                        <?= $error ?>
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Username:</label>
                            <?php echo form_input(['name' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'value' => set_value('username')]); ?>

                        </div>
                    </div>
                    <div><?php echo form_error('username'); ?></div>
                </div>

                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label mt-4">Password:</label>
                            <?php echo form_password(['name' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'value' => set_value('password')]); ?>
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"> -->
                        </div>
                    </div>
                    <div><?php echo form_error('password'); ?>
                    </div>
                </div>
                <br>
                <!-- <button type="reset" class="btn btn-default">Cancel</button> -->
                <?= anchor("home", 'Cancel', ['class' => 'btn btn-danger']); ?>
                <?php echo form_reset(['name' => 'reset', 'value' => 'Reset', 'class' => 'btn btn-primary']); ?>
                <?php echo form_submit(['name' => 'sumbit', 'value' => 'Login', 'class' => 'btn btn-success']); ?>
                <?= anchor("registration", 'Registration', ['class' => 'btn btn-primary']); ?>
            </fieldset>
            </form>
        </div>
        <div class="col-lg-4"></div>

        <!-- <span>(New user<a href="<?php echo base_url('registration'); ?>">Register</a>from
			here)</span> -->
    </div>
</div>