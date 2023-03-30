<!DOCTYPE html>
<html>
   <?= view('templates/accessibility'); ?>
   <title>About Us</title>
   <head>
      <link rel="shortcut icon" href="./assets/img/favicon_io/favicon.ico">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <style>
         body {
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: cover;
         }
         .h1 {
         color: purple;
         }
      </style>
   </head>
</html>
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
         background-color: #498071;
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
         .container {
         width: 900px;
         margin: 0 auto;
         padding: 25px;
         background-color: white;
         border-radius: 50px;
         box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.2);
         }
      </style>
   </head>
   <body>
      <br>
      <div class="container">
         <header style="background-color: white; width: 100%;">
            <img src="http://localhost:8080/assets/img/Making-Everybody-Welcome.png" alt="Everybody Welcome Logo" style="margin-top: 10px; margin-left: 10px;" width="200px">
            <a href="/Home" class="btn btn-success" style="position: absolute; top: 50px; right: 300px;">
            Return to Homepage <span class="fas fa-arrow-right"></span>
            </a>
         </header>
         <h1 style="color: #498071" class="h1"><b>About Us</b></h1><br>
         Access Consultancy, Training, Auditing and Inclusive Design Specialists
         Professional access consultancy, training, auditing and design appraisal services to clients large and small across all sectors. People are at the heart of everything we do because people make change happen. Working in partnership, we enable people to create places, services and experiences which are accessible and inclusive for all.
         <br><br>
         Our training programmes are designed and delivered by learning professionals who are members of the Chartered Institute of Personnel and Development.
         Our access and inclusion audits are carried out by Centre for Accessible Environments trained auditors with extensive experience.
         Our design appraisal work and consultancy is provided by friendly consultants with comprehensive expertise.
         Our lived experience of disability means that we bring first-hand knowledge and a practical approach to everything we do.
         <br><br><br><h1 style="color: #498071" class="h1"><b>Our Partners</b></h1>
         <div style="text-align: center;">
  <img style="position: relative; filter: drop-shadow(1px 2px 1px #ffffff); width: 80%;" src="/assets/img/a4apartners.jpg" alt="">
</div>

      </div>
   </body>
</html>