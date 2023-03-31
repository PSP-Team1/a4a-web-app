<!DOCTYPE html>
<html>
   <title>FAQ</title>
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
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <title>FAQ Page</title>
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
      <?= view('templates/accessibility'); ?>
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
         padding-bottom: 700px;
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
            <a href="<?= base_url() ?>/home" class="btn btn-success" style="position: absolute; top: 50px; right: 300px;">
            Return to Homepage <span class="fas fa-arrow-right"></span>
            </a>
         </header>
         <h1 style="color: #498071" class="h1"><b>Frequently Asked Questions</b></h1>
         <br>
         <h2>User Questions </h2>
         <br>
         <div class="card">
            <div class="card-header">
               <h3 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                  Question: Is my disability included?
                  </button>
               </h3>
            </div>
            <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
               <div class="card-body">
                  Our comprehensive auditing system allows for accessibility features for a huge range of diabilities to be tested by a business.
                  This ensures that whatever your disability, it will be taken into account to allow you to know whether a business is suitable for you.
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="mb-0">
                     <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse1">
                     Question: How can I find businesses to visit?
                     </button>
                  </h3>
               </div>
               <div id="collapse6" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                  <div class="card-body">
                     There a multiple ways to find businesses on our search page, as you can search by location or type to find somewhere that fits your needs
                  </div>
               </div>
            </div>
            <div class="card">
               <div class="card-header">
                  <h3 class="mb-0">
                     <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="true" aria-controls="collapse1">
                     Question: Is there any way to leave feedback?
                     </button>
                  </h3>
               </div>
               <div id="collapse7" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                  <div class="card-body">
                     We have a review system that allows you to give your thoughts on a business you have visited which can then be used by other people
                     considering visiting to further inform their visit along with the data provided through the audit
                  </div>
               </div>
            </div>
         </div>
         <br><br>
         <h2>Business User Questions </h2>
         <br>
         <div class="card">
            <div class="card-header">
               <h3 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  Question: I have a business, how can i get started with your system?
                  </button>
               </h3>
            </div>
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
               <div class="card-body">
                  To get started, you can register for an account and upload your business to our site.
                  This will allow you to begin with a simple audit to allow us to give you a basic accessibility ranking and recieve
                  a listing on our business search page. More in depth audits can be accquired as part of our premium offerings
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h3 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  Question: How is the pricing for premium offerings?
                  </button>
               </h3>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
               <div class="card-body">
                  All pricings for premium audit offerings can be accessed from within the business dashboard.
               </div>
            </div>
         </div>
         <div class="card">
            <div class="card-header">
               <h3 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse1">
                  Question: How well advertised will my business be?
                  </button>
               </h3>
            </div>
            <div id="collapse8" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
               <div class="card-body">
                  We have a complex algorithm that determines search preference, which includes factors such as accessibility score, customer reviews
                  and premium customer status, all of which mix together to ensure that more compelete businesses will be featured further up in the search rankings
               </div>
            </div>
<div>


------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
</div>


            <h2>Tutorial videos </h2>
         <br>
         <div class="card">
            <div class="card-header">
               <h3 class="mb-0">
               <div class="popup-header">
            <h2>Admin</h2>
         </div>
               <div class="col-md-6">
                  <div class="video">
                     <iframe style="margin-left: 200px; margin-top: 45px; box-shadow: 3px 3px 7px rgba(0,0,0,0.5);" width="100%" height="300" src="https://www.youtube.com/embed/s6Z91No6UkY"   title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
               </div>
               </h3>
            </div>
           
         </div>

         </div>
      </div>
	  <br>
   </body>
</html>