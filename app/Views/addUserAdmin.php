<?= view('templates/header'); ?>

<h1>Add user to System</h1>
<form action="<?php echo base_url(); ?>/RegisterController/registerAuthAdmin" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="username" placeholder="Username" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="companyName" placeholder="Company Name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="number" name="companyNumber" placeholder="Company Number" class="form-control">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Add User</button>
                            </div>
                        </form>


<a href="<?= base_url() ?>/adminPortal" class="nav_link">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">Return to home</span>
</a>

<?= view('templates/footer'); ?>