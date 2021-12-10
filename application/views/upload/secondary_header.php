<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Head</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/shoppinghub/assets/css/modal.css">
    <script src="http://localhost/shoppinghub/assets/icons/font_awesome.js"></script>
    <script src="<?= base_url("/asset/jq/jqery.js") ?>" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
</head>

<body>


    <nav class="navbar navbar-default py-0">
        <!-- <div class="container-fluid"> -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo base_url('home'); ?>"><i class="fas fa-home fa-lg
                        text-white"></i>Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">All Categories</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Laptop</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Smartphone</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Smart TV</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Fashion</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Home & Kitchen</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Beuty, Toys & More</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if ($this->session->userdata('user_id')) { ?>
                <li><a class="navbar-brand" href="<?php echo base_url('login/logout'); ?>">Logout</a></li>
                <?php
                } else { ?>
                <li><a class="navbar-brand" href="<?php echo base_url('login'); ?>">Login</a></li>
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url('home/my_order'); ?>">My Order</a></li>
            </ul>

            <!-- <ul class="nav navbar-nav navbar-right">
				<li>
					<a class="navbar-brand" href="#">logout</a>
				</li>
			</ul> -->
        </div>
        <!-- </div> -->
    </nav>
</body>