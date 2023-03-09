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
         <h2><?php echo $venue['venue_name']?>'s Details</h2>
      </div>
      <div class="ibox-content">
         <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateVenueDetails" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
            <div style="display: flex;">
               <div class="form-group" style="flex: 1; margin-right: 10px;">
                  <h2>Venue Name</h2>
                  <input type="text" name="venueName" id="venueName" value="<?php echo $venue['venue_name']?>" class="form-control" required>
               </div>
               <div class="form-group" style="flex: 1; margin-left: 10px;">
                  <h2>Venue Address</h2>
                  <input type="text" name="venueAddress" id="venueAddress" value="<?php echo $venue['address']?>" class="form-control" required>
               </div>
            </div>
            <br>
            <div style="display: flex;">
               <div class="form-group" style="flex: 1; margin-right: 10px;">
                  <h2>Venue Postcode</h2>
                  <input type="text" name="venuePostcode" id="venuePostcode" value="<?php echo $venue['postcode']?>" class="form-control" required>
               </div>
               <div class="form-group" style="flex: 1; margin-left: 10px;">
                  <h2>Description</h2>
                  <input type="text" name="venueDescription" id="venueDescription" value="<?php echo $venue['about']?>" class="form-control">
               </div>
            </div>
            <br>
            <!-- <div style="display: flex;">
               <div class="form-group" style="flex: 1; margin-right: 10px;">
                  <h2>Opening Hours</h2>
                  <table id="opening-hours" name="opening-hours">
                     <tr>
                        <th>Day</th>
                        <th>Hours</th>
                     </tr>
                     <tr>
                        <td>Monday</td>
                        <td><input type="text" name="monday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Tuesday</td>
                        <td><input type="text" name="tuesday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Wednesday</td>
                        <td><input type="text" name="wednesday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Thursday</td>
                        <td><input type="text" name="thursday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Friday</td>
                        <td><input type="text" name="friday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Saturday</td>
                        <td><input type="text" name="saturday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Sunday</td>
                        <td><input type="text" name="sunday" value="9am - 5pm"></td>
                     </tr>
                  </table>
               </div>
            </div> -->
            <br>
            <button type="submit" class="btn btn-outline-success">Update Details</button>
            <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
         </form>
      </div>
   </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>