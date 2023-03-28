<?= view('templates/header'); ?>

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


   @media (max-width: 1600px) {
      .btn {
         font-size: 14px;
         padding: 0.25rem 0.5rem;
      }
   }

   /* Chart CSS */
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
      font-size: 20px;
      text-align: center;
      margin-top: 0;
      color: #515A5A;
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
      font-size: 20px;
      text-align: center;
      margin-top: 0;
      color: #515A5A;
   }
</style>

<div class="container">


   <div class="row">
      <div class="col-lg-6">
         <div class="ibox">
            <div class="ibox-title">
               <h2>Admin Dashboard</h2>
            </div>
            <div class="ibox-content">
               <div class="row">
                  <div class="col-12">
                     <h2><?php echo $timeOfDay . " " .  $user ?>!</h2>
                     <br>
                     <p>Welcome to your own Admin Dashboard, here you can manage everything from audit templates, viewing companies and their venues and also view your revenue.</p>
                  </div>
                  <div class="col-md-8">
                  </div>
               </div>
            </div>
         </div>

         <div class="ibox">
            <div class="ibox-title">
               <h2>Quick Links</h2>
            </div>
            <div class="ibox-content" style="display: flex; justify-content: center">
               <div class="row">
                  <div class="col-md-12">
                     <div class="btn-group" role="group" aria-label="Quick Links">
                        <a class="btn btn-success btn-outline" href="/AdminCreateTemplate" role="button">
                           <i class="fa fa-plus"></i> Create Template(s)
                        </a>
                        <a class="btn btn-success btn-outline" href="/AdminSettings" role="button">
                           <i class="fa fa-eye"></i> View Companies
                        </a>
                        <a class="btn btn-outline btn-danger" href="/AdminDeleteTemplate" role="button">
                           <i class="fa fa-trash-o"></i> Delete Template(s)
                        </a>
                        <a class="btn btn-outline btn-secondary" href="/AdminSettings" role="button">
                           <i class="fa fa-cog"></i> View Settings
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <div class="col-lg-6">
         <div class="ibox">
            <div class="ibox-title">
               <h2>Revenue Management</h2>
            </div>
            <div class="ibox-content" style="max-height: 330px; overflow-y: auto;">
               <div class="row">
               <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                  <thead>
                     <tr>
                        <th data-type="all" class="footable-visible footable-sortable">Month<span class="footable-sort-indicator"></span></th>
                        <th data-type="all" class="footable-visible footable-sortable">Payment Amount<span class="footable-sort-indicator"></span></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($revenues as $revenue) : ?>
                        <tr class="footable-even">
                        <td style="footable-visible">
                              <?php
                                 $dateStr = $revenue['month'];
                                 $date = DateTime::createFromFormat('Y-m', $dateStr);
                                 echo $date->format('F Y');
                              ?>
                           </td>

                           <td style="footable-visible">£<?= number_format($revenue['total_payment_amount'], 2) ?></td>

                        </tr>
                     <?php endforeach; ?>
               </table>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-6">

      </div>
   </div>

   <div class="row">
      <div class="col-md-6">
         <div class="ibox-title">
            <h2>Application Statistics (This Week)</h2>
         </div>
         <div class="ibox-content">
            <div class="left-box">
               <div style="background-color: rgba(54, 162, 235, 0.3); background: linear-gradient(to top, rgba(54, 162, 235, 0.5), #ffffff);" class="round-box-week">
                  <h3><i class="bi bi-people"></i>Customers Registered</h3>
                  <br>
                  <?php if (count($customersWeek) == 1) { ?>
                     <h4><?= count($customersWeek) ?> Customer!</h4>
                  <?php } else { ?>
                     <h4><?= count($customersWeek) ?> Customers!</h4>
                  <?php } ?>
               </div>
            </div>
            <div class="right-box">
               <div style="background-color: rgba(255, 99, 132, 0.3); background: linear-gradient(to top, rgba(255, 99, 132, 0.5), #ffffff);" class="round-box-week">
                  <h3><i class="bi bi-building"></i> Venues Created</h3>
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
      </div>

      <div class="col-md-6">
         <div class="ibox-title">
            <h2>Application Statistics (All Time)</h2>
         </div>
         <div class="ibox-content">
            <div class="left-box">
               <div style="background-color: rgba(255, 206, 86, 0.3); background: linear-gradient(to top, rgba(255, 206, 86, 0.5), #ffffff);" class="round-box-alltime">
                  <h3><i class="bi bi-people"></i> Customers Registered</h3>
                  <br>
                  <?php if (count($customersAllTime) == 1) { ?>
                     <h4><?= count($customersAllTime) ?> Customer!</h4>
                  <?php } else { ?>
                     <h4><?= count($customersAllTime) ?> Customers!</h4>
                  <?php } ?>
               </div>
            </div>
            <div class="right-box">
               <div style="background-color: rgba(75, 192, 192, 0.3); background: linear-gradient(to top, rgba(75, 192, 192, 0.5), #ffffff);" class="round-box-alltime">
                  <h3><i class="bi bi-building"></i> Venues Created</h3>
                  <br>
                  <?php if (count($venueAllTime) == 1) { ?>
                     <h4><?= count($venueAllTime) ?> Venue!</h4>
                  <?php } else { ?>
                     <h4><?= count($venueAllTime) ?> Venues!</h4>
                  <?php } ?>
               </div>
            </div>
            <br>
            <br>
            <div style="clear: both;"></div>
         </div>
      </div>
   </div>

   <br>

   <div class="row">
      <div class="col-lg-12">

         <div class="ibox ">
            <div class="ibox-title">
               <h2>Application Statistics Graph</h2>
            </div>
            <div class="ibox-content">
               <canvas id="myChart" width="200" height="65"></canvas>
            </div>
         </div>
      </div>
   </div>

   <div class="row">

      <div class="col-lg-12">

         <div class="ibox">
            <div class="ibox-title">
               <h2>View All Companies</h2>
            </div>
            <div class="ibox-content">
               <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                  <thead>
                     <tr>
                        <th data-type="all" class="footable-visible footable-sortable">Company Name<span class="footable-sort-indicator"></span></th>
                        <th data-type="all" class="footable-visible footable-sortable">Number of Venues<span class="footable-sort-indicator"></span></th>
                        <th data-type="all" class="footable-visible footable-sortable">Creation Date<span class="footable-sort-indicator"></span></th>
                        <th class="footable-visible footable-last-column footable-sortable">Action<span class="footable-sort-indicator"></span></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($companies as $company) : ?>
                        <tr class="footable-even">
                           <td style="footable-visible"><?= $company['companyName'] ?></td>
                           <?php
                           if ($company['v_cnt'] == 1) {
                              echo '<td style=" footable-visible">1 Venue</td>';
                           } elseif ($company['v_cnt'] == 0) {
                              echo '<td style=" footable-visible">No Venues</td>';
                           } else {
                              echo '<td style=" footable-visible">' . $company['v_cnt'] . ' Venues</td>';
                           }
                           ?>
                           <td style=" footable-visible"><?= date("F j Y", strtotime($company['date_created'])) ?></td>
                           <td class="footable-visible footable-last-column">
                              <a class="btn btn-success" href="/AdminDashboard/ViewCompany/<?= $company['id'] ?>" role="button">
                                 <i class="bi bi-eye"></i> View
                              </a>
                              <a class="btn btn-danger" href="/AdminDashboard/ViewCompany/<?= $company['id'] ?>" role="button">
                                 <i class="bi bi-trash"></i> Delete
                              </a>
                        </tr>
                     <?php endforeach; ?>
               </table>
            </div>
         </div>
      </div>
   </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   // Get the canvas element
   var ctx = document.getElementById('myChart').getContext('2d');

   // Create the bar chart
   var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
         labels: ['New Customers (This Week)', 'Total Venues (This Week)', 'Total Customers (All Time)', 'Total Venues (All Time)'],
         datasets: [{
            label: 'Number of Registered Users',
            data: [<?= count($customersWeek) ?>, <?= count($venueWeek) ?>, <?= count($customersAllTime) ?>, <?= count($venueAllTime) ?>],
            backgroundColor: [
               'rgba(54, 162, 235, 0.3)',
               'rgba(255, 99, 132, 0.3)',
               'rgba(255, 206, 86, 0.3)',
               'rgba(75, 192, 192, 0.3)'
            ],
            borderColor: [
               'rgba(54, 162, 235, 1)',
               'rgba(255, 99, 132, 1)',
               'rgba(255, 206, 86, 1)',
               'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
         }]
      },
      options: {
         scales: {
            yAxes: [{
               ticks: {
                  beginAtZero: true
               },
               scaleLabel: {
                  display: true,
                  labelString: 'Number of Users'
               }
            }],
            xAxes: [{
               scaleLabel: {
                  display: true,
                  labelString: 'User Types'
               }
            }]
         },
         legend: {
            display: true,
            position: 'bottom'
         },
         title: {
            display: true,
            text: 'Application Statistics'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  return data.datasets[tooltipItem.datasetIndex].label + ': ' + tooltipItem.yLabel.toLocaleString();
               }
            }
         }
      }
   });
</script>

<?= view('templates/footer'); ?>