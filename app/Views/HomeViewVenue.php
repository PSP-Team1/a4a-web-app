<?php
   $venue = $venues[0];
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <title>Audit Report</title>
      <style type="text/css">
         @page {
         size: A4;
         margin: 1.5cm;
         }
         body {
         background-color: #e8e8e8;
         font-family: Arial, sans-serif;
         font-size: 12pt;
         line-height: 1.5;
         }
         h1,
         h2,
         h3 {
         text-align: center;
         margin: 0;
         }
         table {
         border-collapse: collapse;
         width: 100%;
         margin-bottom: 20px;
         border: 2px solid #ffffff;
         }
         th:first-child,
         th:last-child {
         border-top: 2px solid #4CAF50;
         border-bottom: 2px solid #4CAF50;
         }
         th {
         background-color: royalblue;
         color: white;
         font-size: 16px;
         }
         th:nth-child(2),
         td:nth-child(2) {
         width: 30%;
         }
         th:nth-child(3),
         td:nth-child(3) {
         width: 25%;
         }
         td,
         th {
         text-align: left;
         padding: 12px 16px;
         border: 1px solid #ddd;
         text-align: center;
         }
         tr:nth-child(even) {
         background-color: #f2f2f2;
         }
         tr:hover {
         background-color: #85C1E9;
         }
         th:first-child,
         th:nth-child(2),
         th:last-child {
         border: 2px solid #ffffff;
         }
         @media (max-width: 600px) {
         td,
         th {
         padding: 8px;
         }
         }
         .container {
         width: 900px;
         margin: 0 auto;
         padding: 25px;
         background-color: lightblue;
         border-radius: 50px;
         box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);
         }

      </style>
   </head>
   <body>
      <br>
      <div class="container">
      <header style="background-color: lightblue; width: 100%;">
         <img src="http://localhost:8080/assets/img/Making-Everybody-Welcome.png" alt="Everybody Welcome Logo" style="margin-top: 10px; margin-left: 10px;" width="200px">
         <a href="/Home" class="btn btn-primary" style="position: absolute; top: 50px; right: 300px;">
         Return to Homepage <span class="fas fa-arrow-right"></span>
         </a>
      </header>
      <br>
      <h1 style="font-weight: bold; font-size: 44px; color: royalblue"><?= $venue['venue_name'] ?> <span><i class="far fa-building"></i></span></h1>
      <br><br>
      <h1 style="font-size: 26px; color: #333">Venue Location<span> <i class="far fa-map"></i></span></h1>
      <br>
      <h3 style="font-size: 18px; color: #333;"><?= $venue['address'] ?>, <?= $venue['postcode'] ?></h3>
      <br><br>
      <h1 style="font-size: 26px; color: #333">Venue Description<span> <i class="fas fa-pencil-alt"></i></span></h1>
      <br>
      <h3 style="font-size: 18px; color: #333;"><?= $venue['about'] ?></h3>
      <br><br>
      <h1 style="font-size: 26px; color: #333">Opening Hours<span> <i class="far fa-clock"></i></span></h1>
      <br>
      <?php
         $opening_hours = json_decode($venue['opening_hours'], true);
         ?>
      <table>
         <thead>
            <tr>
               <th>Day</th>
               <th>Opening Hours</th>
               <th>Closing Hours</th>
               <th>Closed</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach($opening_hours as $day => $hours): ?>
            <tr>
               <td><?= ucfirst($day) ?></td>
               <?php if ($hours['closed'] == '2'): ?>
               <td colspan="2">Closed</td>
               <td>Yes</td>
               <?php else: ?>
               <td><?= $hours['opening_hours'] ?> <?= $hours['ampm_opening'] == '1' ? 'am' : 'pm' ?></td>
               <td><?= $hours['closing_hours'] ?> <?= $hours['ampm_closing'] == '1' ? 'am' : 'pm' ?></td>
               <td>No</td>
               <?php endif; ?>
            </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
      <br><br>
      <h1 style="font-size: 26px; color: #333">Venue Tags<span> <i class="fas fa-tags"></i></span></h1>
      <br>
      <h3 style="font-size: 18px; color: #333;"><?= $venue['tags'] ?></h3>
      <br><br>
      <h1 style="font-size: 26px; color: #333">Venue Creation Date<span> <i class="far fa-calendar-alt"></i></span></h1>
      <br>
      <h3 style="font-size: 18px; color: #333;"><?= $venue['date_created'] ?></h3>
      </div>
               </div>
               <br>
   </body>
</html>