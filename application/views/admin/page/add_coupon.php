<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('admin') ?>">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="#">Add Brand</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Coupon</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="<?php echo base_url('coupon/manage_coupon'); ?>" class=""><i class="halflings-icon remove"></i></a>
                </div>
            </div>
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
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('coupon/save_coupon') ?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Code<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="code" id="code_id" type="text" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Discount Name<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="dis_name" id="dis_id" type="text" required />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Discount Type<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <select name="discount" id="discount">
                                    <option value="none" selected disabled hidden>Select Discount Type</option>
                                    <option value="amount">amount</option>
                                    <option value="percent">percent</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Discount Amount :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="disc_amount" id="dis_amount" type="text" required />
                            </div>
                        </div>
                        <!-- <div class="control-group">
                            <label class="control-label" for="textarea">Discount desc<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <textarea class="span4 typeahead" id="textarea" name="coupon_description" rows="3" required></textarea>
                            </div>
                        </div> -->

                        <!-- <div class="control-group">
                            <label class="control-label" for="textarea2">Discount Type:</label>
                            <div class="controls">
                                <select name="discount_type">
                                    <option value="">Amount</option>
                                    <option value="">Percentage</option>
                                </select>
                            </div>
                        </div> -->

                        <div class="control-group">
                            <label class="control-label" for="textarea2">Category<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <select name="discount_category" required>
                                    <option value="Customer Service Discount">Customer Service Discount</option>
                                    <option value="High Volume Discount">High Volume Discount</option>
                                    <option value="Referral Code Discount">Referral Code Discount</option>
                                    <option value="Rewards Point Discount">Rewards Point Discount</option>
                                    <option value="First Order Discount">First Order Discount</option>
                                    <option value="Promotional Discount">Promotional Discount</option>
                                    <option value="Advocate Discount">Advocate Discount</option>
                                    <option value='Company Partnership Discount'>Company Partnership Discount</option>
                                    <option value='Testing Discount'>Testing Discount</option>
                                    <option value='To Be Decided'>To Be Decided</option>
                                    <option value='Conference/Workshop'>Conference/Workshop</option>
                                    <option value='Webinar'>Webinar</option>
                                    <option value='Ad campaigns'>Ad campaigns</option>
                                    <option value='Misc.'>Misc.</option>
                                    <option value='Turnaround Time'>Turnaround Time</option>
                                    <option value='Unhappy with Quality'>Unhappy with Quality</option>
                                    <option value='Charity'>Charity</option>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Number of uses<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="no_of_uses" id="no_of_uses" type="number" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Uses Left</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="uses_left" id="use_left" type="number" value="0" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Coupon Start Date<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="dis_start_date" id="dis_st_date" type="date" required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Coupon End Date<span style="color: red;">*</span> :</label>
                            <div class="controls">
                                <input class="span4 typeahead" name="dis_end_date" id="dis_nd_date" type="date" required />
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save Coupon</button>
                            <?= anchor("couponci/manage_flate_coupon", 'Cancel', ['class' => 'btn btn-danger']); ?>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->


</div>
<!--/.fluid-container-->

<!-- end: Content -->