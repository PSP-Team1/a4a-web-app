<?= view('templates/header');
   $session = session();
   $id = $session->get('id');
   $user = $session->get('name');
   $email = $session->get('email');
   
   ?>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
   <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
</head>
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
         <div class="tab">
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab1')">General Details</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab2')">Opening Hours</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab3')">Accessibility</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab4')">Images</button>
         </div>
         <br>
         <div id="tab1" class="tabcontent">
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
               <div class="form-group">
                  <h2>Venue Tags</h2>
                  <input name="tags" id="tags" value="<?php echo $venue['tags']?>" class="form-control">
               </div>

               <br>
               <button type="submit" class="btn btn-outline-success">Update Details</button>
               <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
            </form>
         </div>
         <div id="tab2" class="tabcontent">
            <div style="display: flex;">
               <div class="form-group" style="flex: 1; margin-right: 10px;">
                  <table id="opening-hours" name="opening-hours">
                     <tr>
                        <th>Day</th>
                        <th>Hours</th>
                     </tr>
                     <tr>
                        <td>Monday</td>
                        <td><input id="day" type="text" name="monday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Tuesday</td>
                        <td><input id="day" type="text" name="tuesday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Wednesday</td>
                        <td><input id="day" type="text" name="wednesday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Thursday</td>
                        <td><input id="day" type="text" name="thursday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Friday</td>
                        <td><input id="day" type="text" name="friday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Saturday</td>
                        <td><input id="day" type="text" name="saturday" value="9am - 5pm"></td>
                     </tr>
                     <tr>
                        <td>Sunday</td>
                        <td><input id="day" type="text" name="sunday" value="9am - 5pm"></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
         <div id="tab3" class="tabcontent">
            <p>Accessibility content goes here.</p>
         </div>
         <div id="tab4" class="tabcontent">
            <p>Image content goes here.</p>
         </div>
         <br>
         <style>
            .tabcontent {
            display: none;
            }
            .tablinks {
            background-color: #eee;
            color: #333;
            border: none;
            padding: 10px;
            cursor: pointer;
            }
            .opening-hours {
            display: flex;
            justify-content: center;
            align-items: center;
            }
            table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
            font-family: Arial, sans-serif;
            color: #444;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            thead {
            background-color: #f7f7f7;
            font-weight: bold;
            }
            th, td {
            padding: 10px;
            text-align: left;
            }
            th {
            border-bottom: 2px solid #ddd;
            }
            tr {
            background-color: #f2f2f2;
            }
            input[id="day"] {
            border: none;
            border-radius: 5px;
            padding: 5px;
            width: 100%;
            }
         </style>
         <script>
            function openTab(evt, tabName) {
               var i, tabcontent, tablinks;
               tabcontent = document.getElementsByClassName("tabcontent");
               for (i = 0; i < tabcontent.length; i++) {
                  tabcontent[i].style.display = "none";
               }
               tablinks = document.getElementsByClassName("tablinks");
               for (i = 0; i < tablinks.length; i++) {
                  tablinks[i].className = tablinks[i].className.replace(" active", "");
               }
               document.getElementById(tabName).style.display = "block";
               evt.currentTarget.className += " active";
            }
            
            window.onload = function() {
               var firstTab = document.querySelector('.tablinks');
               if (!firstTab.classList.contains('active')) {
                  firstTab.click();
               }
            }
            
            var input = document.querySelector('#tags');
            new Tagify(input, {removable: true});
         </script>
      </div>
   </div>
</div>
</div>
</div>
</div>
<?= view('templates/footer'); ?>