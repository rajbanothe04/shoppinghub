<!-- <hr class="mt-1"> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping-Hub</title>
</head>
<!-- <h2 style="text-align:center" ;>All Products</h2> -->
<!-- <body> -->
<div class="container-fluid">

    <?php
    foreach ($data as $product_details) {
    ?>

    <div class="thumbnail col-sm-2">
        <a href="<?php echo base_url("home/single/{$product_details->product_id}"); ?>">
            <img src="<?php echo base_url('uploads/' . $product_details->product_image) ?>"
                style="width:200px;height:200px" alt="" /></a>
        <a href="#">
            <h5><b><?php echo word_limiter($product_details->product_title, 3); ?></b></h5>
        </a>

        <!-- <input type="button" value="Add Cart" onclick=""> -->
        <!-- <span><a href="<?php echo base_url('/home/single' . $product_details->product_id); ?>"
				class="details">Details</a></span> -->

        <!-- <?= anchor("home/single/{$product_details->product_id}", 'Details', ['class' => '']); ?> -->


        <a href="<?php echo base_url("home/single/{$product_details->product_id}"); ?>">
            <input type="button" value="Buy now"></a>
        <b>
            <font color="red"><span class="price">
                    $<?php echo $product_details->product_price; ?></span>
            </font>
        </b>
    </div>


    <?php } ?>
</div>
<!-- </body> -->
<style>
.thumbnail {
    width: 240px !important;
    /* height: 250px !important; */
}
</style>

</html>