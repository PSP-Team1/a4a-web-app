<?= view('templates/header'); ?>
<div class="container">


    <?php if ($_SESSION['type']  == 'customer') {
        echo "";
    ?>
        <div class="ibox">

            <div class="ibox-title">
                <h2>Product Management</h2>
            </div>

            <div class="ibox-content">
                <div class="row">

                    <div class="col-lg-6">
                        <h2>My Products</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity Ordered</th>
                                    <th>Remaining</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">
                                        <h3>Audit Package (MULTI VENUE)</h3>
                                        <ul>
                                            <li>Venue Audit</li>
                                            <li>Venue Listing</li>
                                            <li>QR Code</li>
                                        </ul>

                                    </td>
                                    <td>5</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td scope="row"></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <p><i class="fa fa-info-circle text-info"></i> Need to add more credit? Click here to add more products through our secure checkout.</p>

                        <br>



                        <h3>Select product</h3>

                        <select class="form-control" id="template_select" name="template_select" data-placeholder="Select Template">
                            <option>Select option...</option>
                            <option>£25 - Single Venue</option>
                            <option>£99 - 10 x Venue</option>
                            <option>£500 - 50 Venue</option>

                        </select>

                        <br>
                        <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/Checkout" role="button"> <i class="fa fa-stripe"></i> Purchase Product</a>

                    </div>
                    <div class="col-lg-12">




                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>

<?= view('templates/footer'); ?>