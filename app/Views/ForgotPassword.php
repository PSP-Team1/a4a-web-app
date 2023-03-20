<?= view('templates/accessibility'); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="shortcut icon" href="./assets/img/favicon.ico">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
      <link rel="stylesheet" href="./assets/css/loginStyle_new.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <link rel="stylesheet" href="./assets/css/accessiblity.css" />
      <script src="./assets/js/accessibility.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   </head>
   <script>
      toastr.options.progressBar = true;
   </script>`
   <body class="animate__animated animate__fadeIn">
      <div class="login-container">
      <section class="Login-form">
      <div class="fusion-separator fusion-no-medium-visibility fusion-no-large-visibility fusion-full-width-sep"
         style="align-self: center;margin-left: auto;margin-right: auto;margin-top:80px;margin-bottom:10px;width:100%;">
      </div>
      <style>
         body {
         background-image: url('https://images.wallpaperscraft.com/image/single/texture_spots_lemon_143188_1920x1080.jpg');
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: cover;
         }
      </style>
      <div id="accessibilityModal" class="modal fade">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Accessibility Features</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                  <button class="btn btn-outline-secondary" id="increase-font"><i
                     class="fa fa-plus "></i> Increase Font Size</button>
                  <button class="btn btn-outline-secondary" id="decrease-font"><i
                     class="fa fa-minus "></i> Decrease Font Size</button>
                  <hr>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="negative-contrast-button">
                     <label class="form-check-label" for="negative-contrast-button">
                     Negative Contrast
                     </label>
                  </div>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="high-contrast-button">
                     <label class="form-check-label" for="high-contrast-button">
                     High Contrast
                     </label>
                  </div>
                  <hr>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="grayscale-toggle">
                     <label class="form-check-label" for="grayscale-toggle">
                     Toggle Greyscale
                     </label>
                  </div>
                  <div class="form-check form-switch">
                     <input class="form-check-input" type="checkbox" id="light-background">
                     <label class="form-check-label" for="light-background">
                     Light Background
                     </label>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" id="reset-button">Reset</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="wrapper">
         <div class="loginRight ">
            <div class="login-container">
               <section class="Login-form">
                  <div class="form-content">
                     <div>
                        <h3 style="text-shadow: 1px 1px 1px white; color: black; text-align: center;">Reset Password</h3>
                     </div>
                     <hr>
                     <?php if (session()->getFlashdata('msg')) : ?>
                     <div class="alert alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                     </div>
                     <?php endif; ?>
                     <form action="<?php echo base_url(); ?>/LoginController/forgotPasswordAuth" method="post">
                        <div class="form-group mb-3">
                           <input required type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                        </div>
                        <div class="d-grid">
                           <button type="submit" class="btn btn-success">Request Password Reset</button>
                        </div>
                        <hr>
                        <div class="d-grid">
                           <a href="<?= base_url() ?>/Login" class="btn btn-light">Return To Login</a>
                        </div>
                     </form>
                  </div>
               </section>
            </div>
         </div>
      </div>
   </body>
</html>