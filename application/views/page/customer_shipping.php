<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shpping Addess</title>
    <script src="<?= base_url('assets/jq/jquery.js'); ?>"></script>
</head>

<body>
    <div class="container" style="border: 1px solid black">
        <div class="row">
            <div class="col-lg-6">
                <center>
                    <h3><b>Your Shipping Address</b></h3>
                </center>

                <form method="post" action="<?php echo base_url('home/save_shipping_address'); ?>">
                    <table>
                        <tbody class="cell">
                            <tr>
                                <td><label for="shipping_name">Name: </label></td>
                                <td><input type="text" name="shipping_name" placeholder="Enter Your Name" required></td>

                                <td><label for="shipping_address">Address: </label></td>
                                <td><input type="text" name="shipping_address" placeholder="Enter Your Address"
                                        required>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="shipping_country">Country: </label></td>
                                <td><input type="text" name="shipping_country" id="country" sclass="frm-field "
                                        placeholder="Enter Your Country" required>
                                </td>
                                <td><label for="shipping_city">City: </label></td>
                                <td><input type="text" name="shipping_city" placeholder="Enter Your City" required>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="shipping_zipcode">Pin Code: </label></td>
                                <td><input type="text" name="shipping_zipcode" placeholder="Enter Your ZipCode"
                                        required>
                                </td>
                                <td><label for="shipping_phone">Mobile: </label></td>
                                <td><input type="text" name="shipping_phone" placeholder="Enter Your Phone" required>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="shipping_email">Email: </label></td>
                                <td><input type="text" name="shipping_email" placeholder="Enter Your Email"
                                        required><br><br>
                                </td>
                            <tr>
                                <input type="hidden" id="sub-tot" name="sub-tot">
                                <input type="hidden" id="disc-amount" name="disc-amount">
                                <input type="hidden" id="grand-tot" name="grand-tot">
                                <input type="hidden" id="dis-type" name="dis-type">
                            </tr>

                        </tbody>
                    </table>
                    <center>
                        <div>
                            <div><button class="grey">Submit</button></div><br><br>
                        </div>
                    </center>
                </form>

            </div>
            <div class="col-lg-6">

                <div class="content">
                    <div class="cartoption">
                        <div class="cartpage">
                            <center>
                                <h3><b>Order Details</b></h3>
                            </center>
                            <?php if ($this->cart->total_items()) { ?>
                            <table class="tblone" style="outline: thin solid">
                                <tr style="outline: thin solid">
                                    <th width="10%">Sr.No.</th>
                                    <th width="20%">Product Name</th>
                                    <th width="20%">Image</th>
                                    <th width="15%">Price</th>
                                    <th width="15%">Quantity</th>
                                    <th width="20%">Total Price</th>

                                </tr>
                                <?php
                            $i = 0;
                            foreach ($cart_contents as $cart_items) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $cart_items['name'] ?></td>
                                    <td><img src="<?php echo base_url('uploads/' . $cart_items['options']['product_image']) ?>"
                                            style="width: 50px; height:50px;" alt="" /></td>
                                    <td>$ <?php echo $this->cart->format_number($cart_items['price']) ?></td>
                                    <td>
                                        <?php echo $cart_items['qty']; ?>
                                    </td>
                                    <td>$ <?php echo $this->cart->format_number($cart_items['subtotal']) ?></td>

                                </tr>
                                <?php } ?>
                            </table><br>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div>
                    <?php $total= $this->cart->format_number($this->cart->total()); ?>
                    <table style="float:right;text-align:left;" width="40%">

                        <tr>
                            <th>Sub Total : </th>
                            <td id="sub-total">$<?php echo $total ?> </td>

                        </tr>
                        <tr>
                            <th>Discount : </th>
                            <td id="coupon-dtls">0</td>
                        </tr>
                        <tr>
                            <th>Grand Total : </th>
                            <td id="grand-total">$<?php echo $total ?> </td>
                        </tr>

                    </table>
                    <input type="text" name="coupon_code" id="coupon-code" value="" required />
                    <input type="submit" name="submit" id="apply-coupon" value="Apply" />
                </div>
            </div>

        </div>
    </div>
</body>
<style>
.cell td {
    padding: 10px;
}
</style>
<script>
$(document).ready(function() {
    $('#apply-coupon').click(function() {
        var coupon = $('#coupon-code').val();
        var request = $.ajax({
            url: '<?php echo base_url() ?>/home/discount_zone',
            type: "POST",
            data: {
                coupon_code: coupon
            },
            dataType: "json"
        });
        request.done(function(record) {
            if (record == null) {
                alert("Please enter valid coupon code.");
                return;
            }
            var grandTotal = 0;
            var discount = parseFloat(record.disc_amount);
            var subTotal = parseFloat($('#sub-total').text().replace(',', '').replace('$', ''));
            if (record.disc_type === "amount" && discount > subTotal) {
                alert("Discount coupon is not applicable.");
                return;
            } else if (record.disc_type === "amount" && discount <= subTotal) {
                grandTotal = subTotal - discount;
                $('#coupon-dtls').text("$" + discount);
                // alert("test");
                // document.getElementById("sub-tot").value = subTotal;
                // document.getElementById("disc-amount").value = discount;
                // document.getElementById("grand-tot").value = grandTotal;
                $("#sub-tot").val(subTotal);
                $("#disc-amount").val(discount);
                $("#grand-tot").val(grandTotal);
                $("#dis-type").val(record.disc_type);

            } else if (record.disc_type === "percent") {
                grandTotal = subTotal - parseFloat((subTotal * parseFloat(discount)) / 100);
                $('#coupon-dtls').text(discount + "%");

                $("#sub-tot").val(subTotal);
                $("#disc-amount").val(discount);
                $("#grand-tot").val(grandTotal);
                $("#dis-type").val(record.disc_type);
            }
            $('#grand-total').text('$' + grandTotal.toFixed(2));
        });
        request.fail(function(jqXHR, textStatus) {
            alert("Coupon Code not matched");
        });
    });
});
</script>

</html>