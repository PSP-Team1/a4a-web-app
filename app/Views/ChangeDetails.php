<?= view('templates/header');?>
<?php
$session = session();
$id = $session->get('id');
$user = $session->get('name');
$email = $session->get('email');

?>


<style>
    .container {
        max-width: 75%;
    }

    label {
        font-size: 1.5rem !important;
    }
</style>
<div class="container">

    <div class="ibox">
        <div class="ibox-title">
            <h2>Change Details</h2>
        </div>
        <div class="ibox-content">

            <form method="post" action="<?php echo base_url(); ?>/SettingsController/updateDetails">

                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                    <label for="template-name">Full Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $user ?>" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="template-name">Email Address</label>
                    <input type="text" name="email" id="email" value="<?php echo $email ?>"  class="form-control" required>
                </div>

                <br>

                <button type="submit" class="btn btn-outline-success">Update Details</button>
                <a href="<?= base_url() ?>/Settings" class="btn btn-outline-secondary">Return To Settings</a>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>