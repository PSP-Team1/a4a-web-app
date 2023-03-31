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
                        <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/Checkout" role="button"> <i class="fa fa-stripe"></i> Add Credit</a>
                    </div>

                </div>


                <br>

            <?php } ?>


            <?php
            if ($_SESSION['type']  == 'client') {
            ?>
                <div style="border: 1px solid #3498DB;">
                    <div class="ibox-title">
                        <h2>Admin Settings</h2>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <p>
                                <a class="btn btn-success btn-outline" data-toggle="modal" data-target="#addUserModal" role="button">
                                    <i class="fa fa-plus"></i> Add Admin User(s)
                                </a>

                            <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="addUserModalLabel">Add Admin User(s)</h2>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="<?php echo base_url(); ?>/AdminController/addAdminUser">
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" name="email" id="email" required>
                                                <br>
                                                <label for="password">Password:</label>
                                                <input type="password" class="form-control" name="password" id="password" required>

                                                <br>

                                                <button type="submit" name="submit" class="btn btn-success">Add Admin User</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                <a class="btn btn-outline btn-danger" data-toggle="modal" data-target="#deleteModal" role="button"> <i class="fa fa-trash-o"></i> Delete My Account</a>

                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="deleteModalLabel">Confirm Account Deletion</h2>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete your account? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>/AdminController/deleteAccount" role="button">Delete Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                <a class="btn btn-outline btn-danger" data-toggle="modal" data-target="#deleteModal" role="button"> <i class="fa fa-trash-o"></i> Delete My Account</a>

                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="deleteModalLabel">Confirm Account Deletion</h2>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete your account? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteAccount" role="button">Delete Account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </p>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?= view('templates/footer'); ?>