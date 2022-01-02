<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custome Page</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>


<body>
    <div class="container">

        <form action="<?php echo base_url('service_public/submit_custom_order'); ?>" method="post" style="width: 50%;margin: 0 auto;margin-top: -20px;">
            <div style="text-align: center;">
                <h2 style="text-transform: uppercase;"><?php echo $get_details[0]->ser_name; ?></h2>
                <input type="hidden" name="ser_id" value="<?php echo $get_details[0]->ser_id; ?>" />
                <input type="hidden" name="ser_name" value="<?php echo $get_details[0]->ser_name; ?>" />
            </div>
            <div>
                <p><?php echo $get_details[0]->ser_description; ?></p>
                <hr>
            </div>
            <?php foreach ($get_details as $attribute) { ?>
                <div>
                    <?php $attribute_type = $attribute->att_type;

                    $arr = explode(",", $attribute->att_values); //extract data value from comma seperating
                    $arr1 = explode(",", $attribute->att_custprice);
                    if ($attribute_type == "predefined_values") {
                        echo '<label style="margin-top: -20px";>' . $attribute->att_name . ' :</label><br>';
                        echo
                        '<select name="attribute[' . $attribute->att_id . ']" id="att_type" class="form-control">';
                        foreach ($arr as $key => $value) {
                            echo '<option value="' . $value . '" >' . $value . '</option>';
                        }
                        echo '</select><hr>';
                    } elseif ($attribute_type == "checkbox_type") {
                        echo '<input type="checkbox" name="attribute[' . $attribute->att_id . ']" class="amount" value="' . $attribute->att_name;
                        echo '" id="checkbox_type"  onclick="$(this).MessageBox(' . $attribute->att_custprice . ');">&nbsp&nbsp<label> ' . $attribute->att_name . '</label>
						<span>($' . round($attribute->att_custprice) . ')
						</span><hr style="margin-top: 5px;margin-bottom: 5px">';
                    } elseif ($attribute_type == "single_line_free_text") {
                        echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
                        //Conditon for number of images to be submited
                        if ($attribute->att_name == "Number of images to be submitted") {
                            echo    '<input type="number" name="no_of_image" value="' . $no_of_image . '" id="image_val" style="width: 100%"><hr>';
                        } else {
                            echo    '<input type="text" name="attribute[' . $attribute->att_id . ']" id="single_line" style="width: 100%"><hr>';
                        }
                    } elseif ($attribute_type == "free_text") {
                        echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
                        echo '<textarea id="free_txt" style="width: 100%" name="attribute[' . $attribute->att_id . ']" rows="' . $attribute->att_fieldsize . '" cols=""></textarea><hr>';
                    } elseif ($attribute_type == "rate_change") {
                        echo '<label style="margin-top: 5px";>' . $attribute->att_name . ' :</label><br>';
                        echo '<select name="attribute[' . $attribute->att_id . ']" id="rate_change" class="form-control" onchange="$(this).dropdownCal(this)">';
                        foreach ($arr as $key => $value) {
                            if ($attribute->hide_price == "No") {
                                echo '<option value="' . $arr1[$key] . '">' . $value . ' ' . $arr1[$key];
                            } else {
                                echo '<option value="' . $key . '">' . $value;
                            }
                            '</option>';
                        }
                        echo '</select><hr>';
                    } elseif ($attribute_type == "custom_price") {
                        echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
                        echo '<input type="text" name="attribute[' . $attribute->att_id . ']" id="custom_price" style="width: 100%"><hr>';
                    } elseif ($attribute_type == "radio_type") {
                        echo '<label style="margin-top: -15px";>' . $attribute->att_name . ' :</label><br>';
                        foreach ($arr as $key => $value) {

                            echo $value . ' &nbsp <input type="radio" id="radio_type" name="attribute[' . $attribute->id . ']" value="' . $value . '">&nbsp';
                        }
                        echo '<hr>';
                    }

                    ?>
                </div>
            <?php } ?>
            <div style="float:right">Subtotal: <input type="text" name="total" id="total"></span></div><br>
            <div style="text-align:center">
                <input type="submit" name="submit" id="btn-submit" value="ADD TO CART">
            </div><br>
            <?php echo validation_errors(); ?>
        </form>
    </div>
</body>
<script>
    $(document).ready(function() {

        $.fn.MessageBox = function(price, defaultQnt) {
            var defaultQnt = document.getElementById("image_val").value;
            // alert(defaultQnt);
            return this.each(function() {
                if ($(this).is(":checked")) {
                    var ttl = price * defaultQnt;
                    var valuOfTotal = $('#total').val();
                    if (!valuOfTotal) {
                        valuOfTotal = 0;
                    }
                    $('#total').val(parseFloat(ttl) + parseFloat(valuOfTotal));

                } else if (!$(this).is(":checked")) {
                    var ttl = price * defaultQnt;
                    var valuOfTotal = $('#total').val();
                    if (!valuOfTotal) {
                        valuOfTotal = 0;
                    }
                    $('#total').val(parseFloat(valuOfTotal) - parseFloat(ttl));

                }
            })
        };
        var predropdownVal = 0;
        $.fn.dropdownCal = function(value) {
            var defaultQnt = document.getElementById("image_val").value;
            return this.each(function() {
                if (predropdownVal > 0) {
                    var valuOfTotal = $('#total').val();
                    if (!valuOfTotal) {
                        valuOfTotal = 0;
                    }
                    $('#total').val(parseFloat(valuOfTotal) - parseFloat(predropdownVal));

                }
                var ttl = value.value * defaultQnt;
                var valuOfTotal = $('#total').val();
                if (!valuOfTotal) {
                    valuOfTotal = 0;
                }
                $('#total').val(parseFloat(ttl) + parseFloat(valuOfTotal));
                predropdownVal = ttl;
            })
        };
        // $('#image_val').on('change', function() {
        //     alert(this.value);
        // });

    });
</script>

</html>