<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('admin') ?>">Home</a>
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Manage Coupon</a></li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Coupon</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="<?php echo base_url('admin'); ?>" class=""><i class="halflings-icon remove"></i></a>
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

            <?= anchor("coupon/add_coupon", '+ Create Coupon', ['class' => 'btn btn-success']); ?>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Code</th>
                            <th>Discount Name</th>
                            <th>Dicount Type</th>
                            <th>Discount Amount</th>
                            <!-- <th>Coupon Description</th> -->
                            <th>Category</th>
                            <th>No of Uses</th>
                            <th>Uses Left</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_coupon as $coupon) {
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="center"><?php echo $coupon->code; ?></td>
                                <td class="center"><?php echo $coupon->dis_name; ?></td>
                                <td class="center"><?php echo $coupon->disc_type; ?></td>
                                <td class="center"><?php echo $coupon->disc_amount; ?></td>
                                <td class="center"><?php echo $coupon->coupon_description; ?></td>
                                <!-- <td class="center"><?php echo $coupon->discount_category; ?></td> -->
                                <td class="center"><?php echo $coupon->no_of_uses; ?></td>
                                <td class="center"><?php echo $coupon->uses_left; ?></td>
                                <td class="center"><?php echo $coupon->dis_start_date; ?></td>
                                <td class="center"><?php echo $coupon->dis_end_date; ?></td>

                                <td class="center">
                                    <a class="btn btn-info" href="#">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                    <a class="btn btn-danger" href="#">
                                        <i class="halflings-icon white trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div>
    <!--/row-->



</div>
<!--/.fluid-container-->

<!-- end: Content -->