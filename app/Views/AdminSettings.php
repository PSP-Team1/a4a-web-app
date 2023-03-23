<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header');?>
<link rel="stylesheet" href="./assets/css/accessibilityPortal.css"/>
<script src="./assets/js/accessibility.js"></script>
<div class="container">


    <div class="row">
        <div class="col-lg-6">

        </div>
        <div class="ibox ">

        <div class="ibox-title">
                <h2>Admin Settings</h2>
            </div>

            <div class="ibox-content">

                Welcome to the Admin Settings Dashboard. This is where you can manage everything from personal account settings and individual user settings.
            </div>

            <br>

            <div style="border: 1px solid #99A3A4;">

            <div class="ibox-title">
                <h2>My Account Settings</h2>
            </div>

            <div class="ibox-content">

            <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/AdminChangeDetails" role="button"> <i
                            class="fa fa-cog"></i> Change Details</a>

            <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/AdminUpdatePassword" role="button"> <i
                            class="fa fa-cog"></i> Change Password</a>

            <a class="btn btn-outline btn-secondary" href="<?php echo base_url(); ?>/AdminChangePicture" role="button"> <i
            class="fa fa-user"></i> Change Profile Picture</a>
            </div>

            </div>
            

            <br>

            <div style="border: 1px solid #3498DB;">

            <div class="ibox-title">
                <h2>User Settings</h2>
            </div>

            <div class="ibox-content">

            <div>

                <p>
                    <a class="btn btn-success btn-outline" href="<?php echo base_url(); ?>/AdminController/addUser" role="button"> <i
                            class="fa fa-plus "></i> Add Admin User(s)</a>

                </p>
                <div>
            </div>

            </div>

</div>
            
        </div>

        <br>

        <div style="border: 1px solid red;">

        <div class="ibox-title">
                <h2>Danger Zone</h2>
            </div>

            <div class="ibox-content">

            <div>

                <p>
                <a class="btn btn-outline btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteAccount" role="button"> <i
                            class="fa fa-trash-o"></i> Delete My Account</a>

                    <a class="btn btn-outline btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteUser" role="button"> <i
                            class="fa fa-trash-o"></i> Delete Admin User(s)</a>

                    <a class="btn btn-outline btn-danger" href="<?php echo base_url(); ?>/AdminController/adminDeleteUser" role="button"> <i
                    class="fa fa-trash-o"></i> Delete Business User(s)</a>
                </p>
                <div>
            </div>
    </div>
</div>
</div>

<?= view('templates/footer'); ?>