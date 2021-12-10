<div class="container">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none;">
            <h3>Payment Options</h3>
            <style type="text/css">
            #result {
                color: red;
                padding: 5px
            }

            #result p {
                color: red
            }
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('home/save_order'); ?>" style="text-align: left">
                <span><input type="radio" name="payment" value="cashon" />Cash On Delivary</span><br />
                <span><input type="radio" name="payment" value="net_banking" />Net Banking</span><br />
                <span><input type="radio" name="payment" value="upiss" />UPI</span><br /><br />
                <div class="search">
                    <div><button class="grey">Submit</button></div>
                </div>
            </form>

        </div>
        <div class="clear"></div>
    </div>
</div>