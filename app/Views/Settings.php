<?= view('templates/header'); ?>
<link rel="stylesheet" href="./assets/css/accessibilityPortal.css" />
<script src="./assets/js/accessibility.js"></script>
<div class="container">


    <div class="row">
        <div class="col-lg-12">

            <br>

            <div style="border: 1px solid #99A3A4;">

                <div class="ibox-title">
                    <h2>My Account Settings</h2>
                </div>

                <div class="ibox-content">

                    <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/ChangeDetails" role="button"> <i class="fa fa-cog"></i> Change Details</a>

                    <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/UpdatePassword" role="button"> <i class="fa fa-cog"></i> Change Password</a>

                    <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/ChangePicture" role="button"> <i class="fa fa-user"></i> Change Profile Picture</a>
                </div>

            </div>


            <br>

            <?php if ($_SESSION['type']  == 'customer') {
                echo "";
            ?>
                <div style="border: 1px solid #99A3A4;">

                    <div class="ibox-title">
                        <h2>Credit Management</h2>
                    </div>

                    <div class="ibox-content">
                        <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/ChangeDetails" role="button"> <i class="fa fa-stripe"></i> Add Credit</a>
                    </div>

                </div>


                <br>

            <?php } ?>


            <?php 
            if ($_SESSION['type']  == 'client') {
            ?>
                <div style="border: 1px solid #3498DB;">
                    <div class="ibox-title">
                        <h2>User Settings</h2>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <p>
                                <a class="btn btn-success btn-outline" href="<?php echo base_url(); ?>/AdminController/addUser" role="button">
                                    <i class="fa fa-plus "></i> Add Admin User(s)
                                </a>
                            </p>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php 
            if ($_SESSION['type']  == 'customer') {
            ?>
            <div style="border: 1px solid red;">

            <div class="ibox-title">
                <h2>Danger Zone</h2>
            </div>

            <div class="ibox-content">

                <div>

                    <p>
                        <a class="btn btn-outline btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteAccount" role="button"> <i class="fa fa-trash-o"></i> Delete My Account</a>
                    </p>
                    <div>
                    </div>
                </div>
            </div>
            </div>
            <?php 
            } else { ?>
            <br>
            <div style="border: 1px solid red;">

            <div class="ibox-title">
                <h2>Danger Zone</h2>
            </div>

            <div class="ibox-content">

                <div>

                    <p>
                        <a class="btn btn-outline btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteAccount" role="button"> <i class="fa fa-trash-o"></i> Delete My Account</a>
                    </p>
                    <div>
                    </div>
                </div>
            </div>
            </div>
            <?php } ?>

            <?= view('templates/footer'); ?>