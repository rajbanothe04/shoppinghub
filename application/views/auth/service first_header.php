<link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/bootstrap.min.css">
<script src="http://localhost/shoppinghub/assets/css/bootstrap.css"></script>
<script src="http://localhost/shoppinghub/assets/icons/font_awesome.js"></script>


<div class="row mt-1" style="height: auto; ">
	<div class="col-lg-2">
		<img src="http://localhost/shoppinghub/uploads/shopping_hub.jpg" alt="Home" width="220" height="70">
	</div>

	<div class="col-lg-1"></div>

	<div class="col-lg-5">

	</div>
	<div class="col-lg-1"></div>

	<div class="col-lg-1">
	</div>

	<?php if ($this->session->userdata('user_id')) { ?>
	<div class="col-lg-2">
		<span><a href="<?php echo base_url('user/user_detils'); ?>">
				<div class="d-flex align-items-center">
					<i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
					My Profile
				</div>
			</a></span>
	</div> <?php } ?>
</div>