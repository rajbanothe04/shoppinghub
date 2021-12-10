<?php include("primary_header.php") ?>
<?php include("secondary_header.php") ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <img src="<?php echo base_url('uploads/' . $get_single_product->product_image) ?>"
                style="width:500px;height:500px" alt="" />
        </div>
        <div class="col-lg-6">

            <h3><?php echo $get_single_product->product_title ?></h3>
            <p><?php echo $get_single_product->product_short_description ?></p>
            <div class="price">
                <p>Price:
                    <span>$<?php echo $this->cart->format_number($get_single_product->product_price) ?></span>
                </p>
            </div>
            <div class="add-cart">
                <form action="<?php echo base_url('home/save_cart'); ?>" method="post">
                    <input type="number" class="buyfield" name="qty" value="1" />
                    <input type="hidden" class="buyfield" name="product_id"
                        value="<?php echo $get_single_product->product_id ?>" />
                    <input type="submit" class="buysubmit" name="submit" value="Buy Now" />
                </form>
            </div>

            <div class="product-desc">
                <h3>Product Details</h3>
                <p><?php echo $get_single_product->product_long_description ?></p>
            </div>
            <div>
                <?= anchor("home", 'Back To Home', ['class' => 'btn btn-primary']); ?>
            </div>
        </div>

    </div>
</div>