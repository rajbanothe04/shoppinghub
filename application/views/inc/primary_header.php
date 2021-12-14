<link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/bootstrap.min.css">
<script src="http://localhost/shoppinghub/assets/css/bootstrap.css"></script>
<script src="http://localhost/shoppinghub/assets/icons/font_awesome.js"></script>


<div class="row mt-1" style="height: auto; ">
	<div class="col-lg-2">
		<a href="<?php echo base_url('home'); ?>">
			<img src="http://localhost/shoppinghub/uploads/shopping_hub.jpg" alt="Home" width="220" height="70">
		</a>
	</div>

	<div class="col-lg-1"></div>

	<div class="col-lg-5">
		<div class="d-flex align-items-end">
			<form class="navbar-form" style="border:black" role="search">
				<div class="form-group">
					<input type="text" style="border: 2px solid black" class="form-control"
						placeholder="Search Products">
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>
	</div>
	<div class="col-lg-1"></div>
	<div class="col-lg-1">
		<!-- <div class="d-flex align-items-center">
			<i class="fas fa-shopping-cart fa-3x"></i>
			<span>Cart</span>
		</div> -->
		<div class="cart">
			<a href="<?php echo base_url('home/cart'); ?>" title="View my shopping cart" rel="nofollow">
				<span class="cart_title"><i class="fas fa-shopping-cart fa-3x"></i></span>
				<span class="no_product">(<?php echo $this->cart->total_items(); ?>)</span>
			</a>
		</div>

	</div>
	<?php
	if ($this->session->userdata('user_id')) { ?>
	<div class="col-lg-2">
		<span><a href="<?php echo base_url('user/user_detils'); ?>">
				<div class="d-flex align-items-center">
					<i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
					My Profile
				</div>
			</a></span>
	</div>
	<?php } ?>
</div>