<?= view('templates/header'); ?>

<h1>Welcome to Admin Portal</h1>
<div>
<form action="<?php echo base_url(); ?>/AdminController/addUser" method="post">
<button type="submit" class="btn btn-success">Add User</button>
</form>
</div>
<br>
<div>
<form action="<?php echo base_url(); ?>/AdminController/pwordReset" method="post">
<button type="submit" class="btn btn-success">Password Reset</button>
</form>
</div>
<br>
<div>
<form action="<?php echo base_url(); ?>/AdminController/adminDeleteUser" method="post">
<button type="submit" class="btn btn-success">Delete User</button>
</form>
</div>
<br>
<div>
<form action="<?php echo base_url(); ?>/AdminController/adminDeleteAccount" method="post">
<button type="submit" class="btn btn-success">Delete Account</button>
</form>
</div>
<br>
<div>
<form action="<?php echo base_url(); ?>/AdminController/addQuestions" method="post">
<button type="submit" class="btn btn-success">Add Questions</button>
</form>
</div>
<br>
<div>
<form action="<?php echo base_url(); ?>/AdminController/deleteQuestions" method="post">
<button type="submit" class="btn btn-success">Remove Questions</button>
</form>
</div>


<a href="<?= base_url() ?>/LoginController/Logout" class="nav_link">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">SignOut</span>
</a>

<?= view('templates/footer'); ?>