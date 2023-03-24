<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header');
   $session = session();
   $id = $session->get('id');
   $user = $session->get('name');
   $email = $session->get('email');
   
   ?>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
   <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
   <link rel="stylesheet" href="./assets/css/accessibilityPortal.css"/>
   <script src="./assets/js/accessibility.js"></script>
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
            <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateOpeningHours" onsubmit="return validateForm()">
               <div style="display: flex; justify-content: center;">
                  <div class="form-group" style="flex: 1; margin-right: 10px;">
                     <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                     <table id="opening-hours" name="opening-hours" style="width: 100%; font-size: 18px">
                        <tr>
                           <th>Day</th>
                           <th>Hours</th>
                           <th>Open/Closed</th>
                        </tr>
                        <tr>
                           <td>Monday</td>
                           <td>
                              <input id="monday-opening-hours" type="text" name="monday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="monday-ampm-opening" name="monday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="monday-closing-hours" type="text" name="monday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="monday-ampm-closing" name="monday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="monday-openclosed" name="monday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Tuesday</td>
                           <td>
                              <input id="tuesday-opening-hours" type="text" name="tuesday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="tuesday-ampm-opening" name="tuesday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="tuesday-closing-hours" type="text" name="tuesday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="tuesday-ampm-closing" name="tuesday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="tuesday-openclosed" name="tuesday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Wednesday</td>
                           <td>
                              <input id="wednesday-opening-hours" type="text" name="wednesday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="wednesday-ampm-opening" name="wednesday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="wednesday-closing-hours" type="text" name="wednesday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="wednesday-ampm-closing" name="wednesday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="wednesday-openclosed" name="wednesday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Thursday</td>
                           <td>
                              <input id="thursday-opening-hours" type="text" name="thursday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="thursday-ampm-opening" name="thursday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="thursday-closing-hours" type="text" name="thursday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="thursday-ampm-closing" name="thursday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="thursday-openclosed" name="thursday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Friday</td>
                           <td>
                              <input id="friday-opening-hours" type="text" name="friday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="friday-ampm-opening" name="friday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="friday-closing-hours" type="text" name="friday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="friday-ampm-closing" name="friday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="friday-openclosed" name="friday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Saturday</td>
                           <td>
                              <input id="saturday-opening-hours" type="text" name="saturday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="saturday-ampm-opening" name="saturday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="saturday-closing-hours" type="text" name="saturday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="saturday-ampm-closing" name="saturday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="saturday-openclosed" name="saturday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td>Sunday</td>
                           <td>
                              <input id="sunday-opening-hours" type="text" name="sunday-opening-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="sunday-ampm-opening" name="sunday-ampm-opening">
                                 <option value="1">AM</option>
                                 <option value="2">PM</option>
                              </select>
                              <span> - </span>
                              <input id="sunday-closing-hours" type="text" name="sunday-closing-hours" value="" size="3" pattern="[0-9:]+" required>
                              <select id="sunday-ampm-closing" name="sunday-ampm-closing">
                                 <option value="1">PM</option>
                                 <option value="2">AM</option>
                              </select>
                           </td>
                           <td>
                              <select id="sunday-openclosed" name="sunday-openclosed">
                                 <option value="1">Open</option>
                                 <option value="2">Closed</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <script>
                        const openingHours = <?php echo $venue['opening_hours'] ?>;
                        for (const day in openingHours) {
                        const openingHoursElement = document.getElementById(`${day}-opening-hours`);
                        const closingHoursElement = document.getElementById(`${day}-closing-hours`);
                        const ampmOpeningElement = document.getElementById(`${day}-ampm-opening`);
                        const ampmClosingElement = document.getElementById(`${day}-ampm-closing`);
                        const closed = openingHours[day].closed;
                        
                        openingHoursElement.value = openingHours[day].opening_hours;
                        closingHoursElement.value = openingHours[day].closing_hours;
                        ampmOpeningElement.value = openingHours[day].ampm_opening;
                        ampmClosingElement.value = openingHours[day].ampm_closing;
                        document.getElementById(`${day}-openclosed`).value = closed;
                        }
                        
                           
                     </script>
                     <br>
                     <button type="submit" class="btn btn-outline-success">Update Opening Hours</button>
                     <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                  </div>
               </div>
            </form>
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
  // Read the "tab" parameter value from the URL
  var urlParams = new URLSearchParams(window.location.search);
  var tabIndexFromUrl = urlParams.get('tab');
  
  // Find the tab button with the specified index and trigger a click event on it
  if (tabIndexFromUrl !== null) {
    var tabs = document.querySelectorAll('.tablinks');
    var tabButton = tabs[tabIndexFromUrl - 1]; // subtract 1 because array indexing starts from 0
    if (tabButton) {
      tabButton.click();
    }
  } else {
    // If the "tab" parameter is not present, activate the first tab
    var firstTabButton = document.querySelector('.tablinks');
    if (firstTabButton) {
      firstTabButton.click();
    }
  }
};


            
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