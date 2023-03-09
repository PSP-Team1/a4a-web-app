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
            <h2><b>Submit New Venue</b></h2>
        </div>
        <div class="ibox-content">

        <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/addNewVenue" onsubmit="return validateForm()">

                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div class="form-group">
                    <h2 for="template-name">Venue Name</h2>
                    <input type="text" name="venueName" id="venueName"  class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <h2 for="template-name">Venue Address</h2>
                    <input type="text" name="venueAddress" id="venueAddress" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <h2 for="template-name">Venue Postcode</h2>
                    <input type="text" name="venuePostcode" id="venuePostcode" class="form-control" required>
                </div>

                <br>

                <button type="submit" class="btn btn-outline-success">Add Venue</button>
                <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                <a style="margin-left: 510px" data-toggle="modal" data-target="#myModal" class="btn btn-outline-info">Need Help?</a>

                
            </form>

            <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
             
            <div class="modal-content">
                <div class="modal-header">
                <h2 class="modal-title">Creating A New Venue?</h2>
                </div>
                <div class="modal-body">
                <p>Filling in this form will allow you to proivde basic details about your venue. 
                    You will be able to provide other information such as venue description, opening times, accessiblity access and images once your venue has been successfully added.
                    <br><br>
                    <b>NOTE: </b>Before you can publish your venue you must first fill in all the required criteria.
                </p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>