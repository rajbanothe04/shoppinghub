<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details View</title>
    <script type="text/javascript">
    function printDiv(container) {
        var printContents = document.getElementById(container).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    </script>
</head>

<body>
    <?php

	foreach ($order_details as $ord_details) {
	} ?>

    <div class="container fa-border" style="width: 50% ;">
        <div id="printableArea">
            <div class="row">
                <div class="col-lg-6">
                    <table>
                        <thead>
                            <h2>Billing Address:</h2>
                        </thead>
                        <tr>
                            <th><?php echo  $ord_details->name; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->uname; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->zip; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $ord_details->order_date; ?></td>
                        </tr>

                    </table>
                </div>

                <div class="col-lg-6">
                    <table>
                        <thead>
                            <h2>Shipping Address:</h2>
                        </thead>
                        <tr>
                            <th><?php echo  $ord_details->shipping_name; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_email; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_address; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_country; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_city; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_phone; ?></th>
                        </tr>
                        <tr>
                            <th><?php echo $ord_details->shipping_zipcode; ?></th>
                        </tr>

                    </table>
                    <br>
                </div>
            </div>
            <br>
            <div class="row ">
                <div class="col-lg-6">
                    <table>
                        <tr>
                            <th>Product Image</th>
                        </tr>
                        <tr>
                            <td><img src="<?php echo base_url('uploads/' . $ord_details->product_image); ?>"
                                    style="width: 200px; height:200px; border: 2px ;" alt="" /></td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-6">

                    <tr>
                        <th>Product Description: </th>
                    </tr>
                    <tr>
                        <td><?php echo $ord_details->product_short_description; ?></td>
                    </tr>
                    <tr>
                        <th>.</th>
                    </tr>
                    <tr>
                        <td><?php echo $ord_details->product_long_description; ?></td>
                    </tr>
                </div>
            </div> <br>

            <div>
                <table style="float:center;text-align:left; outline: thin solid" width="100%">
                    <tbody>
                        <thead>
                            <tr style="outline: thin solid">
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Qty</th>
                                <th>Tax(5%)</th>
                                <th>Product Subtotal</th>
                            </tr>
                        </thead>
                        <tr>
                            <td><?php echo  $ord_details->product_name; ?></td>
                            <td>Rs.<?php echo $pro_price = $ord_details->product_price; ?></td>
                            <td><?php echo $qty = $ord_details->product_sales_quantity; ?></td>
                            <td>Rs.<?php echo $tax = (($pro_price * $qty) * 5 / 100) ?></td>
                            <td>Rs.<?php echo  $total = $pro_price + $tax; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> <br>

        </div>
        <center>
            <?= anchor("home/my_order", 'Back', ['class' => 'btn btn-primary']); ?>
            <input type="button" onclick="printDiv('printableArea')" value="Print" class="btn btn-primary" />
        </center>

    </div>

</html> -->