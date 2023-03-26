
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
      <?= view('templates/accessibility'); ?>
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
      
      <div class="wrapper">
         <div class="loginRight ">
            <div class="login-container">
               <section class="Login-form">
                  <div class="form-content">
                     <div class="logo-container">
                        <img style="position: relative; top: -15px; filter: drop-shadow(1px 2px 1px #ffffff);" src="/assets/img/Everybody-Welcome-logo.png" alt="">
                     </div>
                     <?php if (session()->getFlashdata('msg')) : ?>
                     <div class="alert alert-danger">
                        <?= session()->getFlashdata('msg') ?>
                     </div>
                     <?php endif; ?>

                     <?php if (session()->getFlashdata('success')) : ?>
                     <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                     </div>
                     <?php endif; ?>
                     <form action="<?php echo base_url(); ?>/LoginController/loginAuth" method="post">
                        <div class="form-group mb-3">
                           <input required type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                           <div class="input-group" style="display: flex;">
                              <input type="password" name="password" placeholder="Password" class="form-control"
                                 required onkeyup="isGood(this.value)">
                              <button type="button" class="btn btn-success ml-1" id="show-password-btn"><i class="fas fa-eye-slash"></i></button>
                           </div>
                           <small style="height: 2px" class="help-block" id="password-text"></small>
                        </div>
                        <div class="d-grid">
                           <button type="submit" class="btn btn-success">Login</button>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                           <a style="color: darkgreen;" href="/ForgotPassword">Forgot Password</a> | 
                           <a style="color: darkgreen;" href="/Register">Register Account</a>
                        </div>
                        <hr>
                        <div class="d-grid">
                           <a href="<?= base_url() ?>/home" class="btn btn-light">Return To Homepage</a>
                        </div>
                     </form>
                  </div>
               </section>
            </div>
         </div>
      </div>
      <script>
         const showPasswordBtn = document.getElementById('show-password-btn');
         const passwordField = document.querySelector('input[name="password"]');
         
         showPasswordBtn.addEventListener('click', () => {
             if (passwordField.type === 'password') {
                 passwordField.type = 'text';
                 showPasswordBtn.innerHTML = '<i class="fas fa-eye"></i>';
                 toastr.success('Password Shown');
             } else {
                 passwordField.type = 'password';
                 showPasswordBtn.innerHTML = '<i class="fas fa-eye-slash"></i>';
                 toastr.warning('Password Hidden');
             }
         });
         
         </script>
   </body>
</html>