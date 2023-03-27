<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="./assets/css/accessibilityPortal.css" />
      <script src="./assets/js/accessibility.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   </head>
   <?php
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
      $user = $session->get('name');
      ?>
   <style>
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
   </style>
   <body>
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="ibox ">
               <div class="ibox-title">
                  <h2>Admin Dashboard</h2>
               </div>
               <div class="ibox-content">
                  <div class="row">
                     <h3><?php echo $timeOfDay . " " .  $user ?>!</h3>
                     <h4>What would you like to do today?</h4>
                     <h5>Quick Links</h5>
                     <p>
                        <a class="btn btn-success btn-outline" href="/AdminCreateTemplate" role="button"> <i class="fa fa-plus "></i>
                        Create Template(s)</a>
                        <a class="btn btn-outline btn-danger" href="/AdminDeleteTemplate" role="button"> <i class="fa fa-trash-o"></i>
                        Delete Template(s)</a>
                        <a class="btn btn-outline btn-secondary" href="/AdminSettings" role="button"> <i class="fa fa-cog"></i>
                        View Settings</a>
                     </p>
                  </div>
               </div>
               <br>
               <div class="ibox-title">
                  <h2>Application Statistics (This Week)</h2>
               </div>
               <div class="ibox-content">
                  <div class="left-box">
                     <div class="round-box-week">
                        <h3><i class="bi bi-people"></i> Business Customers Registered In The Past Week</h3>
                        <br>
                        <?php if (count($customersWeek) == 1) { ?>
                        <h4><?= count($customersWeek) ?> Customer!</h4>
                        <?php } else { ?>
                        <h4><?= count($customersWeek) ?> Customers!</h4>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="right-box">
                     <div class="round-box-week">
                        <h3><i class="bi bi-building"></i> Business Venues Created In The Past Week</h3>
                        <br>
                        <?php if (count($venueWeek) == 1) { ?>
                        <h4><?= count($venueWeek) ?> Venue!</h4>
                        <?php } else { ?>
                        <h4><?= count($venueWeek) ?> Venues!</h4>
                        <?php } ?>
                     </div>
                  </div>
                  <br>
                  <div style="clear: both;"></div>
               </div>
               <br>
               <div class="ibox-title">
                  <h2>Application Statistics (All Time)</h2>
               </div>
               <div class="ibox-content">
                  <div class="left-box">
                     <div class="round-box-alltime">
                        <h3><i class="bi bi-people"></i> Total Business Customers Registered</h3>
                        <br>
                        <?php if (count($customersAllTime) == 1) { ?>
                        <h4><?= count($customersAllTime) ?> Customer!</h4>
                        <?php } else { ?>
                        <h4><?= count($customersAllTime) ?> Customers!</h4>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="right-box">
                     <div class="round-box-alltime">
                        <h3><i class="bi bi-building"></i> Total Business Venues Created</h3>
                        <br>
                        <?php if (count($venueAllTime) == 1) { ?>
                        <h4><?= count($venueAllTime) ?> Venue!</h4>
                        <?php } else { ?>
                        <h4><?= count($venueAllTime) ?> Venues!</h4>
                        <?php } ?>
                     </div>
                  </div>
                  <br>
                  <div style="clear: both;"></div>
               </div>
               <style>
                  .left-box {
                  float: left;
                  width: 49%; 
                  }
                  .right-box {
                  float: right;
                  width: 49%; 
                  }
                  .round-box-week {
                  border-radius: 15px;
                  background-color: #D5F5E3;
                  padding: 10px;
                  box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
                  }
                  .round-box-week h3 {
                  font-size: 20px;
                  text-align: center;
                  margin-top: 0;
                  color: #515A5A;
                  }
                  .round-box-week h4 {
                  font-size: 24px;
                  text-align: center;
                  margin-top: 0;
                  color: #28B463;
                  }
                  .round-box-alltime {
                  border-radius: 15px;
                  background-color: #F9E79F;
                  padding: 10px;
                  box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.5);
                  }
                  .round-box-alltime h3 {
                  font-size: 20px;
                  text-align: center;
                  margin-top: 0;
                  color: #515A5A;
                  }
                  .round-box-alltime h4 {
                  font-size: 24px;
                  text-align: center;
                  margin-top: 0;
                  color: #F39C12;
                  }
               </style>
               <br>
               <div class="ibox-title">
                  <h2>View Companies</h2>
               </div>
               <div class="ibox-content">
                  <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                     <thead>
                        <tr>
                           <th data-type="all" class="footable-visible footable-sortable">Company Name<span class="footable-sort-indicator"></span></th>
                           <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
                              Email<span class="footable-sort-indicator"></span>
                           </th>
                           <th class="footable-visible footable-sortable">Contact Name<span class="footable-sort-indicator"></span>
                           </th>
                           <th data-type="all" class="footable-visible footable-sortable">Phone Number<span class="footable-sort-indicator"></span></th>
                           <th data-type="all" class="footable-visible footable-sortable">Number of Venues<span class="footable-sort-indicator"></span></th>
                           <!-- <th data-type="all" class="footable-visible footable-sortable">Address<span class="footable-sort-indicator"></span></th> -->
                           <th data-type="all" class="footable-visible footable-sortable">Membership Date<span class="footable-sort-indicator"></span></th>
                           <th class="footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($companies as $company) : ?>
                        <tr class="footable-even">
                           <td style="footable-visible"><?= $company['companyName'] ?></td>
                           <td class="footable-visible footable-first-column"><span class="footable-toggle"></span><?= $company['email'] ?></td>
                           <td class="footable-visible"><?= $company['contact'] ?></td>
                           <td class="footable-visible"><?= $company['tel'] ?></td>
                           <td style=" footable-visible"><?= $company['v_cnt'] ?></td>
                           <!-- <td style="footable-visible">$company['address']</td> -->
                           <td style=" footable-visible"><?= date("F j Y", strtotime($company['date_created'])) ?></td>
                           <td class="footable-visible footable-last-column">
                              <a class="btn btn-success btn-outline" href="/AdminDashboard/ViewCompany/<?= $company['id'] ?>" role="button"> View</a>
                        </tr>
                        <?php endforeach; ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<?= view('templates/footer'); ?>