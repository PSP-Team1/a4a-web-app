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
   <link rel="stylesheet" href="/assets/css/accessibilityPortal.css"/>
   <script src="/assets/js/accessibility.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                  <h2>Choose Venue Tags</h2>
                  <div class="input-group mb-3">
                     <?php
                        $tag_names = array_column($tags, 'tag');
                        array_multisort($tag_names, SORT_ASC, $tags);
                        ?>
                     <select class="form-control select2" id="tag-select" style="height: 38px;">
                        <?php foreach ($tags as $tag) { ?>
                        <option value="<?php echo $tag['id']; ?>"><?php echo $tag['tag']; ?></option>
                        <?php } ?>
                     </select>
                     <script>
                        $(document).ready(function() {
                          $('.select2').select2();
                        });
                     </script>
                     <div class="input-group-append" style="margin-left: 5px;">
                        <button class="btn btn-primary" type="button" id="add-tag-btn">Add Tag</button>
                        <button class="btn btn-secondary" type="button" id="remove-tag-btn">Remove Tag</button>
                        <button class="btn btn-danger" type="button" id="remove-all-tags-btn">Remove All Tags</button>
                     </div>
                  </div>
                  <h2>Current Venue Tags</h2>
                  <input name="tags" id="tags" value="<?php echo $venue['tags']?>" class="form-control" readonly>
               </div>
               <script>
                  $(document).ready(function() {
                    $('#add-tag-btn').click(function() {
                      var selectedTag = $('#tag-select option:selected').text().trim();
                      var currentTags = $('#tags').val().trim();
                  
                      try {
                        currentTags = JSON.parse(currentTags);
                        if (!Array.isArray(currentTags)) {
                          currentTags = [];
                        }
                      } catch (e) {
                        currentTags = [];
                      }
                  
                      currentTags.push({value: selectedTag});
                      $('#tags').val(JSON.stringify(currentTags));
                    });
                  
                    $('#remove-tag-btn').click(function() {
                      var selectedTag = $('#tag-select option:selected').text().trim();
                      var currentTags = $('#tags').val().trim();
                  
                      try {
                        currentTags = JSON.parse(currentTags);
                        if (!Array.isArray(currentTags)) {
                          currentTags = [];
                        }
                      } catch (e) {
                        currentTags = [];
                      }
                  
                      currentTags = currentTags.filter(function(tag) {
                        return tag.value !== selectedTag;
                      });
                  
                      $('#tags').val(JSON.stringify(currentTags));
                    });
                  
                    $('#remove-all-tags-btn').click(function() {
                      if (confirm("Are you sure you want to remove all tags?")) {
                        $('#tags').val('');
                      }
                    });
                  
                    $('#tags').on('change', function() {
                      var currentValue = $(this).val().trim();
                      try {
                        currentValue = JSON.parse(currentValue);
                      } catch (e) {}
                      if (!Array.isArray(currentValue)) {
                        currentValue = currentValue.split(',').map(function(tag) {
                          return {value: tag.trim()};
                        });
                        $(this).val(JSON.stringify(currentValue));
                      }
                    });
                  });
               </script>
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
            <h2>Accessibility Information</h2>
            <p>Please provide any accessibility information about the venue. For example, you
               could explain how the venue has accessible toilets, accessible parking, wheelchair access and any
               other accessibility information.
            </p>
            <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateAccessibility" onsubmit="return validateForm()">
               <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
               <textarea id="other-accessibility-info" name="other-accessibility-info" rows="4" cols="112" maxlength="500" style="resize: none;"><?php echo $venue['accessibility'] ?></textarea>
               <p id="char-count">0 / 500</p>
               <br>
               <button type="submit" class="btn btn-outline-success">Update Accessibility</button>
               <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
            </form>
            <script>
               const textarea = document.querySelector('#other-accessibility-info');
               const charCount = document.querySelector('#char-count');
               
               const currentCharCount = textarea.value.length;
               charCount.textContent = currentCharCount + ' / 500';
               if (currentCharCount === 500) {
                  charCount.style.color = 'red';
               }
               
               textarea.addEventListener('input', function() {
                  const currentCharCount = textarea.value.length;
                  charCount.textContent = currentCharCount + ' / 500';
                  if (currentCharCount === 500) {
                     charCount.style.color = 'red';
                  } else {
                     charCount.style.color = '';
                  }
               });
            </script>
         </div>
         <div id="tab4" class="tabcontent">
            <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateImages" onsubmit="return validateForm()" enctype="multipart/form-data">
               <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
               <p>Please provide any venue images which will be displayed on the homepage.</p>
               <input type="file" id="imageUpload" name="imageUpload[]" accept="image/*" multiple>
               <br><br>
               <div id="imagePreview"></div>
               <br>
               <button type="submit" class="btn btn-outline-success">Update Images</button>
               <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
            </form>
         </div>
         <style>
            .preview-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            }
            .preview-img-container {
            position: relative;
            display: inline-block;
            margin-right: 10px;
            margin-bottom: 10px;
            }
            .delete-btn {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            }
         </style>
         <script>
            function previewImages() {
              var preview = document.querySelector('#imagePreview');
              var files   = document.querySelector('input[type=file]').files;
            
              preview.innerHTML = '';
              if (files.length === 0) {
                var p = document.createElement('p');
                p.textContent = 'No images selected for upload';
                preview.appendChild(p);
              } else if (files.length > 4) {
                var p = document.createElement('p');
                p.textContent = 'Please select a maximum of 4 images';
                preview.appendChild(p);
              } else {
                for (var i = 0; i < files.length; i++) {
                  if (i > 3) break; // Only show the first 4 images
                  var file = files[i];
                  var img = document.createElement('img');
                  img.src = URL.createObjectURL(file);
                  img.classList.add('preview-img');
                  img.addEventListener('load', function() {
                    URL.revokeObjectURL(this.src);
                  });
                  var deleteBtn = document.createElement('button');
                  deleteBtn.textContent = 'Delete';
                  deleteBtn.classList.add('btn', 'btn-danger', 'delete-btn');
                  deleteBtn.addEventListener('click', function() {
                    var imgContainer = this.parentNode;
                    preview.removeChild(imgContainer);
                  });
            
                  var imgContainer = document.createElement('div');
                  imgContainer.classList.add('preview-img-container');
                  imgContainer.appendChild(img);
                  imgContainer.appendChild(deleteBtn);
                  preview.appendChild(imgContainer);
                }
              }
            }
            
            document.querySelector('#imageUpload').addEventListener('change', previewImages);
         </script>
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
            var urlParams = new URLSearchParams(window.location.search);
            var tabIndexFromUrl = urlParams.get('tab');
            
            if (tabIndexFromUrl !== null) {
            var tabs = document.querySelectorAll('.tablinks');
            var tabButton = tabs[tabIndexFromUrl - 1]; 
            if (tabButton) {
            tabButton.click();
            }
            } else {
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