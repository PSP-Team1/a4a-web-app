<?= view('templates/header');
$session = session();
$id = $session->get('id');
$user = $session->get('name');
$email = $session->get('email');
$role = $session->get('type');

?>

<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
   <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
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
      max-width: 100%;
   }

   label {
      font-size: 1.5rem !important;
   }


   .img-preview {
      max-width: 50px;
      border: 1px solid #ccc;
      padding: 5px;
   }

   .img-preview img {
      max-width: 80%;
   }
</style>
<div class="container">
   <div class="ibox">
      <div class="ibox-title">
         <h2><?php echo $venue['venue_name'] ?>'s Details</h2>
         <a class="btn btn-danger btn-outline pull-right" href="#" role="button" data-toggle="modal" data-target="#deleteVenueModal<?= $venue['id'] ?>">
            <i class="fas fa-trash"></i> Delete
         </a>
         <div class="modal fade" id="deleteVenueModal<?= $venue['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h2 class="modal-title" id="deleteVenueModalLabel">Confirm Deletion</h2>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-lg-4">
                           <i class="fa fa-warning fa-2x text-danger"></i>
                        </div>
                        <div class="col-lg-8">
                           Are you sure you want to delete <?= $venue['venue_name'] ?>?
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                     <a class="btn btn-danger" href="/CustomerDashboard/deleteVenue/<?= $venue['id'] ?>">Delete</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="ibox-content">
         <div class="tab">
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab1')">General Details</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab2')">Opening Hours</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab3')">Accessibility</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab4')">Images</button>
            <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab5')">Audits</button>
         </div>
         <br>
         <div id="tab1" class="tabcontent">
            <?php if ($role == "customer") : ?>
               <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateVenueDetails" onsubmit="return validateForm()">
               <?php endif; ?>
               <?php if ($role == "client") : ?>
                  <form method="post" action="<?php echo base_url(); ?>/AdminDashboard/updateVenueDetails" onsubmit="return validateForm()">
                  <?php endif; ?>
                  <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                  <div style="display: flex;">
                     <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <h2>Venue Name</h2>
                        <input type="text" name="venueName" id="venueName" value="<?php echo $venue['venue_name'] ?>" class="form-control" required>
                     </div>
                     <div class="form-group" style="flex: 1; margin-left: 10px;">
                        <h2>Venue Address</h2>
                        <input type="text" name="venueAddress" id="venueAddress" value="<?php echo $venue['address'] ?>" class="form-control" required>
                     </div>
                  </div>
                  <br>
                  <div style="display: flex;">
                     <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <h2>Venue Postcode</h2>
                        <input type="text" name="venuePostcode" id="venuePostcode" value="<?php echo $venue['postcode'] ?>" class="form-control" required>
                     </div>
                     <div class="form-group" style="flex: 1; margin-left: 10px;">
                        <h2>Description</h2>
                        <input type="text" name="venueDescription" id="venueDescription" value="<?php echo $venue['about'] ?>" class="form-control">
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
                     <input name="tags" id="tags" value="<?php echo $venue['tags'] ?>" class="form-control" readonly>
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

                           currentTags.push({
                              value: selectedTag
                           });
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
                                 return {
                                    value: tag.trim()
                                 };
                              });
                              $(this).val(JSON.stringify(currentValue));
                           }
                        });

                        $('#accessibilityTypes').on('change', function() {
                           var currentValue = $(this).val().trim();
                           try {
                              currentValue = JSON.parse(currentValue);
                           } catch (e) {}
                           if (!Array.isArray(currentValue)) {
                              currentValue = currentValue.split(',').map(function(tag) {
                                 return {
                                    value: tag.trim()
                                 };
                              });
                              $(this).val(JSON.stringify(currentValue));
                           }
                        });
                     });
                  </script>
                  <br>
                  <button type="submit" class="btn btn-outline-success">Update Details</button>
                  <?php if ($role == "customer") : ?>
                     <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                  <?php endif; ?>
                  <?php if ($role == "client") : ?>
                     <a href="<?= base_url() ?>/AdminDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                  <?php endif; ?>
                  </form>
                  <hr>
                  <button class="btn btn-primary btn-outline mt-5" href="#" role="button" data-toggle="modal" data-target="#performAuditModal">
                     <i class="fas fa-paper-plane-o"></i> Audit this Venue
                  </button>
         </div>
         <div id="tab2" class="tabcontent">
            <?php if ($role == "customer") : ?>
               <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateOpeningHours" onsubmit="return validateForm()">
               <?php endif; ?>
               <?php if ($role == "client") : ?>
                  <form method="post" action="<?php echo base_url(); ?>/AdminDashboard/updateOpeningHours" onsubmit="return validateForm()">
                  <?php endif; ?>
                  <div style="display: flex; justify-content: center;">
                     <div class="form-group" style="flex: 1; margin-right: 10px;">
                        <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                        <table id="opening-hours" name="opening-hours" style="width: 100%; font-size: 18px">
                           <tr>
                              <th>Day</th>
                              <th>Hours (24HR)</th>
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
                        <?php if ($role == "customer") : ?>
                           <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                        <?php endif; ?>
                        <?php if ($role == "client") : ?>
                           <a href="<?= base_url() ?>/AdminDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                        <?php endif; ?>
                     </div>
                  </div>
                  </form>
         </div>
         <div id="tab3" class="tabcontent">
         <?php if ($role == "customer") : ?>
            <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateAccessibility" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
               <?php endif; ?>
               <?php if ($role == "client") : ?>
            <form method="post" action="<?php echo base_url(); ?>/AdminDashboard/updateAccessibility" onsubmit="return validateForm()">
            <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
               <?php endif; ?>
            <h2>Accessibility Information</h2>
            <p>Please provide any accessibility information about the venue. For example, you could add that your venue has disabled parking or wheelchair access.
            </p>

            <div class="form-group">
               <br>
                  <h2>Choose Accessibility Type</h2>
                  <div class="input-group mb-3">
                     <select class="form-control select3" id="accessibility-select" style="height: 38px;">
                        <option value="wheelchair-access">Wheelchair Access</option>
                        <option value="disabled-parking">Disabled Parking</option>
                        <option value="wheelchair-access">Accessible Toilets</option>
                        <option value="elevator-access">Elevator Access</option>
                        <option value="hearing-assistance">Hearing Assistance</option>
                        <option value="visual-assistance">Visual Assistance</option>
                     </select>
                     <script>
                        $(document).ready(function() {
                           $('.select3').select3();
                        });
                     </script>
                     <div class="input-group-append" style="margin-left: 5px;">
                        <button class="btn btn-primary" type="button" id="add-type-btn">Add Type</button>
                        <button class="btn btn-secondary" type="button" id="remove-type-btn">Remove Type</button>
                        <button class="btn btn-danger" type="button" id="remove-all-types-btn">Remove All Accessibility</button>
                     </div>
                  </div>
                  <br>
                  <h2>Current Accessibility Settings</h2>
                  <input name="accessibilityTypes" id="accessibilityTypes" value="<?php echo $venue['accessibility'] ?>" class="form-control" readonly>
               </div>
               <br>

               <script>
               $(document).ready(function() {
                  $('#add-type-btn').click(function() {
                     var selectedTag = $('#accessibility-select option:selected').text().trim();
                     var currentTags = $('#accessibilityTypes').val().trim();

                     try {
                        currentTags = JSON.parse(currentTags);
                        if (!Array.isArray(currentTags)) {
                           currentTags = [];
                        }
                     } catch (e) {
                        currentTags = [];
                     }

                     currentTags.push({
                        value: selectedTag
                     });
                     $('#accessibilityTypes').val(JSON.stringify(currentTags));
                  });

                  $('#remove-type-btn').click(function() {
                     var selectedTag = $('#accessibility-select option:selected').text().trim();
                     var currentTags = $('#accessibilityTypes').val().trim();

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

                     $('#accessibilityTypes').val(JSON.stringify(currentTags));
                  });

                  $('#remove-all-types-btn').click(function() {
                     if (confirm("Are you sure you want to remove accessibility?")) {
                        $('#accessibilityTypes').val('');
                     }
                  });

                  $('#accessibilityTypes').on('change', function() {
                     var currentValue = $(this).val().trim();
                     try {
                        currentValue = JSON.parse(currentValue);
                     } catch (e) {}
                     if (!Array.isArray(currentValue)) {
                        currentValue = currentValue.split(',').map(function(tag) {
                           return {
                              value: tag.trim()
                           };
                        });
                        $(this).val(JSON.stringify(currentValue));
                     }
                  });

                  $('.select3').on('select2:select', function (e) {
                     var selectedTag = e.params.data.text;
                     var currentTags = $('#accessibilityTypes').val().trim();

                     try {
                        currentTags = JSON.parse(currentTags);
                        if (!Array.isArray(currentTags)) {
                           currentTags = [];
                        }
                     } catch (e) {
                        currentTags = [];
                     }

                     currentTags.push({
                        value: selectedTag
                     });
                     $('#accessibilityTypes').val(JSON.stringify(currentTags));
                  });

                  $('.select3').on('select2:unselect', function (e) {
                     var selectedTag = e.params.data.text;
                     var currentTags = $('#accessibilityTypes').val().trim();

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

                     $('#accessibilityTypes').val(JSON.stringify(currentTags));
                  });

                  var currentTags = $('#accessibilityTypes').val().trim();
                  try {
                     currentTags = JSON.parse(currentTags);
                     if (!Array.isArray(currentTags)) {
                        currentTags = [];
                     }
                  } catch (e) {
                     currentTags = [];
                  }

                  currentTags.forEach(function(tag) {
                     var option = new Option(tag.value, tag.value, true, true);
                     $('.select3').append(option).trigger('change');
                  });
               });
            </script>


<button type="submit" class="btn btn-outline-success">Update Accessibility</button>
               <?php if ($role == "customer") : ?>
               <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
               <?php endif; ?>
               <?php if ($role == "client") : ?>
               <a href="<?= base_url() ?>/AdminDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
               <?php endif; ?>

            </form>
         </div>
         <div id="tab4" class="tabcontent">


            <div class="col-lg-6">
               <div class="ibox ">

                  <div class="ibox-content">

                     <h2>Venue Images</h2>

                     <div class="lightBoxGallery">

                        <div class="row">

                           <?php foreach ($venue_images as $image) { ?>



                              <div class="col-lg-4">
                                 <a href="<?= $image['path'] ?>" title="<?= $image['media_type'] ?> data-gallery=""><img style=" max-width:150px;" src=" <?= $image['path'] ?>"></a>
                              </div>


                           <?php } ?>
                        </div>

                        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                        <div id="blueimp-gallery" class="blueimp-gallery">
                           <div class="slides"></div>
                           <h3 class="title"></h3>
                           <a class="prev">‹</a>
                           <a class="next">›</a>
                           <a class="close">×</a>
                           <a class="play-pause"></a>
                           <ol class="indicator"></ol>
                        </div>

                     </div>

                  </div>
               </div>
            </div>


            <?php if ($role == "customer") : ?>
               <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/updateImages" onsubmit="return validateForm()" enctype="multipart/form-data">
               <?php endif; ?>
               <?php if ($role == "client") : ?>
                  <form method="post" action="<?php echo base_url(); ?>/AdminDashboard/updateImages" onsubmit="return validateForm()" enctype="multipart/form-data">
                  <?php endif; ?>
                  <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                  <p>Please provide any venue images which will be displayed on the homepage.</p>
                  <input type="file" id="imageUpload" name="imageUpload[]" accept="image/*" multiple>
                  <br><br>
                  <div id="imagePreview"></div>
                  <br>
                  <button type="submit" class="btn btn-outline-success">Update Images</button>
                  <?php if ($role == "customer") : ?>
                     <a href="<?= base_url() ?>/CustomerDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                  <?php endif; ?>
                  <?php if ($role == "client") : ?>
                     <a href="<?= base_url() ?>/AdminDashboard" class="btn btn-outline-secondary">Return To Dashboard</a>
                  <?php endif; ?>
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
               var files = document.querySelector('input[type=file]').files;

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

            th,
            td {
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

            /* Audit table */
            .table {
               width: 100%;
               max-width: 1400px;
               margin: auto;
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
            new Tagify(input, {
               removable: true
            });

            var input2 = document.querySelector('#accessibilityTypes');
            new Tagify(input2, {
               removable: true
            });
         </script>
         <div id="tab5" class="tabcontent">
            <div class="row">
               <div class="col-lg-12">
                  <table class="table table-hover margin bottom table-responsive">
                     <thead>
                        <tr>
                           <th>Version</th>
                           <th>Status</th>
                           <th>View</th>
                           <th>Audit Date</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($audit_data as $item) {
                           $qCount = $item['audit_total'];
                           $cCount = $item['audit_prog'];
                           $percComplete = ($qCount > 0) ? 100 / $qCount * $cCount : 0;
                        ?>
                           <tr>
                              <td><?= $item['audit_version'] ?></td>
                              <td>
                                 <div class="progress progress-small">
                                    <div style="width: <?= $percComplete; ?>%;" class="progress-bar"></div>
                                 </div>
                              </td>
                              <td class="text-center">
                                 <a class="btn btn-success btn-outline" href="/AuditController/OpenAudit/<?= $item['audit_id'] ?>" role="button">
                                    <i class="fa fa-eye"></i> View</a>
                              </td>
                              <td>
                                 <?php
                                 $datetime = new DateTime($item['date_created']);
                                 $formattedDate = $datetime->format('Y-m-d');
                                 ?>
                                 <?= $formattedDate ?>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
                  <a class="btn btn-primary btn-outline mt-5" href="#" role="button" data-toggle="modal" data-target="#performAuditModal">
                     <i class="fas fa-paper-plane-o"></i> Audit this Venue
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="performAuditModal" tabindex="-1" role="dialog" aria-labelledby="performAuditModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h2 class="modal-title" id="performAuditModalLabel">Proceed with Audit</h2>
            </div>
            <form action="<?= base_url('AuditController/assignAudit') ?>" method="post">
               <div class="modal-body">
                  <div class="form-group">
                     <p>Select audit from the list</p>
                     <input type="hidden" name="venue_id" value="<?= $venue['id'] ?>">
                     <select class="form-control" id="productSelect" name="template_id">
                        <?php foreach ($audit_templates as $audit) : ?>
                           <option value="<?= $audit['id'] ?>"><?= $audit['audit_version'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane-o"></i> Begin</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?= view('templates/footer'); ?>