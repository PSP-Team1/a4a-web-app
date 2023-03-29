<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header'); ?>

<?php


$avatar = (isset($_SESSION['avatar'])) ? $_SESSION['avatar'] : "Jack.jpg";


?>

<?php

// Customize the view per user
date_default_timezone_set('Europe/London');

$hour = date('G');
$timeOfDay = "";

if ($hour >= 5 && $hour <= 11) {
   $timeOfDay .= "Good Morning,";
} else if ($hour >= 12 && $hour <= 18) {
   $timeOfDay .= "Good Afternoon,";
} else if ($hour >= 19 || $hour <= 4) {
   $timeOfDay .= "Good Evening,";
}

$session = session();
$user = $session->get('email');
$contact = $session->get('name');
?>

<head>
   <script src="https://cdn.jsdelivr.net/npm/progressbar.js@1.1.0/dist/progressbar.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <style>
      .container {
         max-width: 95%;
      }

      .table {
         width: 100%;
         border-collapse: collapse;
         background-color: #fff;
      }

      .table td,
      .table th {
         padding: 8px;
         text-align: left;
      }

      .table th {
         background-color: #f2f2f2;
         color: #333;
      }

      .table tbody tr:nth-child(even) {
         background-color: #f9f9f9;
      }

      .table tbody tr:hover {
         background-color: #f5f5f5;
      }

      th {
         width: 25%;
         text-align: center;
      }

      th:nth-child(3),
      td:nth-child(3) {
         text-align: center;
      }

      .custom-progress-bar {
         background-color: #52BE80;
      }


      @media (max-width: 1600px) {
         .btn {
            font-size: 14px;
            padding: 0.25rem 0.5rem;
         }
      }
   </style>

   <head>
      <link rel="stylesheet" href="./assets/css/accessibilityPortal.css" />
      <script src="./assets/js/accessibility.js"></script>
      <script>
         toastr.options.progressBar = true;
      </script>
      <?php if (isset($_GET['published'])) : ?>
         <br>
         <div class="alert alert-success alert-dismissible fade show" role="alert" id="published-alert">
            <strong>Your venue has been published and is now being displayed on the homepage!</strong>
         </div>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script>
            setTimeout(function() {
               $('#published-alert').animate({
                  opacity: 0
               }, 1000, function() {
                  $(this).remove();
                  $('container').css('padding-top', $('nav').outerHeight());
               });
            }, 3000);
         </script>
      <?php endif; ?>
      <?php if (isset($_GET['unpublished'])) : ?>
         <br>
         <div class="alert alert-danger alert-dismissible fade show" role="alert" id="published-alert">
            <strong>The venue has been unpublished and is now hidden from the homepage!</strong>
         </div>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script>
            setTimeout(function() {
               $('#published-alert').animate({
                  opacity: 0
               }, 1000, function() {
                  $(this).remove();
                  $('container').css('padding-top', $('nav').outerHeight());
               });
            }, 3000);
         </script>
      <?php endif; ?>
      <div class="container">

         <div class="row">
            <div class="col-lg-12">
               <div class="ibox">
                  <div class="ibox-title">
                     <h2><?php echo $contact ?>'s Dashboard</h2>
                     <div class="ibox-tools">
                        <a class="collapse-link">
                           <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                           <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                           <li><a href="#" class="dropdown-item">Config option 1</a>
                           </li>
                           <li><a href="#" class="dropdown-item">Config option 2</a>
                           </li>
                        </ul>
                        <a class="close-link">
                           <i class="fa fa-times"></i>
                        </a>
                     </div>
                  </div>
                  <div class="ibox-content">
                     <div class="row">
                        <h3><?php echo $timeOfDay . " " .  $contact ?>!</h3>
                        <h4>What would you like to do today?</h4>
                        <p>
                           <a class="btn btn-success btn-outline" href="/Audit" role="button">
                              <i class="fas fa-search"></i> View My Accessibility Audit(s)
                           </a>

                        </p>
                     </div>
                  </div>
               </div>
            </div>


         </div>

         <div class="row">

            <div class="col-lg-8">

               <div class="ibox">
                  <div class="ibox-title">
                     <h2>My Venues</h2>
                  </div>
                  <div class="ibox-content">



                     <?php if (empty($venues)) : ?>
                        <p>There are no venues to display.</p>
                     <?php else : ?>
                        <div class="row">
                           <div class="col-lg-12">

                              <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                                 <thead>
                                    <tr>
                                       <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
                                          Venue Name<span class="footable-sort-indicator"></span>
                                       </th>
                                       <th data-type="all" class="footable-visible footable-sortable">Venue Completion<span class="footable-sort-indicator"></span></th>
                                       <th data-type="all" class="footable-visible footable-sortable">Publish Status<span class="footable-sort-indicator"></span></th>
                                       <th class="footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php foreach ($venues as $venue) : ?>
                                       <?php
                                       $venueFields = array('venue_name', 'address', 'postcode', 'about', 'opening_hours', 'images', 'accessibility', 'tags');
                                       $completedFields = 0;
                                       foreach ($venueFields as $field) {
                                          if (!empty($venue[$field])) {
                                             $completedFields++;
                                          }
                                       }
                                       $progress = round(($completedFields / count($venueFields)) * 100);
                                       ?>
                                       <tr class="footable-even" style="">
                                          <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $venue['venue_name'] ?></td>
                                          <td class="footable-visible footable-last-column">
                                             <div class="progress">
                                                <div class="progress-bar <?php if ($progress == 100) {
                                                                              echo 'custom-progress-bar';
                                                                           } ?> <?php if ($progress != 100) {
                                                                                    echo 'progress-bar-striped animated';
                                                                                 } ?>" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress; ?>%</div>
                                             </div>

                                             <style>
                                                @keyframes progress-bar-stripes {
                                                   from {
                                                      background-position-x: 1rem;
                                                   }

                                                   to {
                                                      background-position-x: 0;
                                                   }
                                                }

                                                .progress-bar.progress-bar-striped.animated {
                                                   animation: progress-bar-stripes 1s linear infinite;
                                                }
                                             </style>

                                          <td class="footable-visible">
                                             <?php if ($venue['published'] == 0) { ?>
                                                <?php
                                                if ($venue['published'] == 0 && $progress == 100) {
                                                   echo "<b><p style='color: green;'>Ready To Publish</p></b>";
                                                } else {
                                                   echo "<b><p style='color: #E74C3C;'>Unpublished</p></b>";
                                                }
                                                ?>

                                             <?php } ?>
                                             <?php if ($venue['published'] == 1) { ?>
                                                <b>
                                                   <p style="color: green;">Published</p>
                                                </b>
                                             <?php } ?>
                                          </td>
                                          <td class="footable-visible footable-last-column">
                                             <a class="btn btn-success btn-outline" href="/CustomerDashboard/ViewVenue/<?= $venue['id'] ?>" role="button">
                                                <i class="fas fa-eye"></i> View
                                             </a>

                                             <?php if ($progress != 100) { ?>
                                                <a class="btn btn-danger btn disabled" href="/AdminDashboard/ViewCompany/<?= $venue['id'] ?>" role="button">
                                                   <i class="fas fa-x"></i> Publish
                                                </a>
                                             <?php } ?>
                                             <?php if ($progress == 100) { ?>
                                                <?php if ($venue['published'] == 1) { ?>
                                                   <a class="btn btn-danger btn" href="#" role="button" data-toggle="modal" data-target="#myModal">
                                                      Unpublish
                                                   </a>
                                                <?php } ?>
                                                <?php if ($venue['published'] == 0) { ?>
                                                   <a style="background-color: #52BE80; border-color: #52BE80;" class="btn btn-success btn" href="#" role="button" data-toggle="modal" data-target="#myModal">
                                                      <i class="fas fa-check"></i> Publish
                                                   </a>
                                                <?php } ?>
                                                <?php if ($venue['published'] == 0) { ?>
                                                   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                         <div class="modal-content">
                                                            <div class="modal-header">
                                                               <h2 class="modal-title" id="myModalLabel">Publish Your Venue</h2>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>Congratulations, you are now eligible to publish your venue onto the homepage!
                                                                  <br><br>
                                                               <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/publishVenue">
                                                                  <div style="text-align:center;">
                                                                     <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                                                                     <button type="submit" class="btn btn-primary btn-lg" style="display:block; width: 50%; margin: 0 auto;"><i class="fas fa-check"></i> Publish</button>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <?php } ?>
                                                <?php if ($venue['published'] == 1) { ?>
                                                   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                         <div class="modal-content">
                                                            <div class="modal-header">
                                                               <h2 class="modal-title" id="myModalLabel">Unpublish Your Venue</h2>
                                                            </div>
                                                            <div class="modal-body">
                                                               <p>
                                                                  Your venue has already been published onto the homepage, would you like to unpublish it?
                                                                  <!-- <p>The venue ID is: <?= $venue['id'] ?></p> -->
                                                                  <br><br>
                                                               <form method="post" action="<?php echo base_url(); ?>/CustomerDashboard/unpublishVenue">
                                                                  <div style="text-align:center;">
                                                                     <input type="hidden" name="id" value="<?php echo $venue['id'] ?>">
                                                                     <button type="submit" class="btn btn-danger btn-lg" style="display:block; width: 50%; margin: 0 auto;"><i class="fas fa-x"></i> Unpublish Your Venue</button>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                <?php } ?>
                                             <?php } ?>
                                       </tr>
                                    <?php endforeach; ?>
                                 </tbody>

                              </table>


                           </div>
                        <?php endif; ?>
                        <a class="btn btn-success btn-outline" href="/CustomerNewVenue" role="button">
                           <i class="fa fa-plus"></i> Add New Venue
                        </a>
                        </div>
                  </div>


               </div>
            </div>

            <div class="col-lg-4">


               <div class="ibox ">

                  <div class="ibox-title">
                     Live Updates
                  </div>

                  <div class="ibox-content">

                     <div>
                        <div class="chat-activity-list">
                           <?php foreach ($activity as $log) : ?>
                              <div class="chat-element <?= ($log['company_type'] == 'client') ? 'right' : '' ?>">
                                 <a href="#" class="float-<?= ($log['company_type'] == 'client') ? 'right' : 'left' ?>">
                                    <img alt="image" class="rounded-circle" src="/assets/img/avatars/<?= $log['avatar'] ?>">
                                 </a>
                                 <div class="media-body <?= ($log['company_type'] == 'client') ? 'text-right' : '' ?>">

                                    <strong><?= $log['name'] ?></strong>
                                    <p class="m-b-xs">

                                       <?php


                                       switch ($log['action']) {
                                          case 'VEN_CREATE':
                                             echo "i equals 0";
                                             break;
                                          case 'VEN_AUDIT':
                                             echo "i equals 1";
                                             break;
                                          case 'AUD_COMPLETE':
                                             echo 'Completed audit for venue <a href="/AuditReportView/' . $log['ref_id'] . '">' . $log['meta'] . '</a>';
                                             break;
                                          case 'USER_PAYMENT':
                                             echo "i equals 1";
                                             break;
                                       }
                                       ?>



                                    </p>
                                    <small class="float-<?= ($log['company_type'] == 'client') ? 'left' : 'right' ?> text-navy"><?= date('m/d/Y h:i a', strtotime($log['date_created'])) ?></small>
                                 </div>
                              </div>
                           <?php endforeach; ?>
                        </div>

                     </div>
                     <div class="chat-form">
                        <form role="form">
                           <div class="form-group">
                              <textarea class="form-control" placeholder="Message"></textarea>
                           </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>

         </div>
         <?= view('templates/footer'); ?>