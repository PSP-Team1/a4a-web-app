<?= view('templates/header');

$session = session();
$id = $session->get('id');
$user = $session->get('name');
$email = $session->get('email');

?>

<script>

function validateForm() {
  var newPassword = document.getElementById("newPassword").value;
  var confirmPassword = document.getElementById("confirmPassword").value;

  if (newPassword !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  return true;
}

</script>


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
            <h2>Update Password</h2>
        </div>
        <div class="ibox-content">

        <form method="post" action="<?php echo base_url(); ?>/AdminSettingsController/changePassword" onsubmit="return validateForm()">

                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                    <label for="template-name">New Password</label>
                    <input type="password" name="newPassword" id="newPassword"  class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="template-name">Confirm New Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" required>
                </div>

                <br>

                <button type="submit" class="btn btn-outline-success">Update Password</button>
                <a href="<?= base_url() ?>/AdminSettings" class="btn btn-outline-secondary">Return To Settings</a>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>