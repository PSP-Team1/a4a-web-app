<!DOCTYPE html>
<html lang="en">
   <head>
      <link rel="shortcut icon" href="./assets/img/favicon.ico">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
      <link rel="stylesheet" href="./assets/css/registerStyle.css" />
      <link rel="stylesheet" href="./assets/css/accessiblity.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
      <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      <style>
         .grayscale {
         filter: grayscale(100%);
         -webkit-filter: grayscale(100%);
         }
      </style>
      <style>
         .light-background {
         display: block;
         }
         #white-image {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: -1;
         }
      </style>
      <style>
         .high-contrast {
         background: black;
         color: white;
         filter: invert(100%);
         }
      </style>
      <style>
         .negative-contrast {
         filter: invert(1) hue-rotate(180deg);
         background: black;
         }
      </style>
   </head>
   <script>
      toastr.options.progressBar = true;
   </script>
   <body class="animate__animated animate__fadeIn">
      <div class="wrapper">
         <style>
            body {
            background-image: url('https://images.wallpaperscraft.com/image/single/texture_spots_lemon_143188_1920x1080.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            }
         </style>
         <div class="dropdown">
            <button href="#accessibilityModal" data-bs-toggle="modal" class="accessButton floating-btn" type="button">
            <b>Accessibility</b>
            </button>
         </div>
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
         <div class="login-container">
            <section class="Login-form">
               <div class="fusion-separator fusion-no-medium-visibility fusion-no-large-visibility fusion-full-width-sep"
                  style="align-self: center;margin-left: auto;margin-right: auto;margin-top:40px;margin-bottom:10px;width:100%;">
               </div>
               <div class="form-content">
                  <div>
                     <h3 style="text-shadow: 1px 1px 1px white; color: black; text-align: center;">Register New Company</h3>
                  </div>
                  <hr>
                  <?php if (session()->getFlashdata('msg')) : ?>
                  <div class="alert alert-warning">
                     <?= session()->getFlashdata('msg') ?>
                  </div>
                  <?php endif; ?>
                  <form action="<?php echo base_url(); ?>/RegisterController/registerAuth" method="post"
                     id="register-form" class="needs-validation">
                     <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>"
                           class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                        <input type="text" name="contact" placeholder="Contact Name"
                           value="<?= set_value('contact') ?>" class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                        <div class="input-group" style="display: flex;">
                           <input type="password" name="password" placeholder="Password" class="form-control"
                              required onkeyup="isGood(this.value)">
                           <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                              href="#accountModal" aria-label="Password requirements">
                           <i class="fas fa-info-circle"></i>
                           </button>
                           <button type="button" class="btn btn-success ml-1"
                              id="show-password-btn"><i class="fas fa-eye-slash"></i></button>
                        </div>
                        <small style="height: 2px" class="help-block" id="password-text"></small>
                     </div>
                     <div id="accountModal" class="modal fade">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Recommended Password Format</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body">
                                 <ol>
                                    <li>Uppercase Letters</li>
                                    <li>Lowercase Letters</li>
                                    <li>Numbers</li>
                                    <li>Special Chracters</li>
                                 </ol>
                                 <p> Including these characters will give you a strong password.
                                    Alternatively, if you would like a password generated automatically then press the generate button. Please make sure to keep note of this password.
                                 </p>
                                 <script>
                                    function generatePassword() {
                                        var length = 16;
                                        var charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+";
                                        var password = "";
                                        var hasUpperCase = false;
                                        var hasLowerCase = false;
                                        var hasNumber = false;
                                        var hasSpecialChar = false;
                                    
                                        while (!hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
                                            password = "";
                                            hasUpperCase = false;
                                            hasLowerCase = false;
                                            hasNumber = false;
                                            hasSpecialChar = false;
                                    
                                            for (var i = 0; i < length; i++) {
                                                var char = charset.charAt(Math.floor(Math.random() * charset.length));
                                                password += char;
                                    
                                                if (char.match(/[A-Z]/)) {
                                                    hasUpperCase = true;
                                                } else if (char.match(/[a-z]/)) {
                                                    hasLowerCase = true;
                                                } else if (char.match(/[0-9]/)) {
                                                    hasNumber = true;
                                                } else if (char.match(/[!@#\$%\^\&*\)\(+=._-]/)) {
                                                    hasSpecialChar = true;
                                                }
                                            }
                                        }
                                    
                                        if (!hasUpperCase || !hasLowerCase || !hasNumber || !hasSpecialChar) {
                                            return generatePassword();
                                        }
                                    
                                        document.getElementById("password").value = password;
                                    }
                                    
                                    
                                    function copyPassword() {
                                    
                                        const textToCopy = document.getElementById("password").value; 
                                        navigator.clipboard.writeText(textToCopy)
                                    
                                        toastr.info('Password Copied To Clipboard');
                                    
                                    }
                                 </script>
                                 <button type="button" onclick="generatePassword()" class="btn btn-success">Generate Password</button>
                                 <button type="button" onclick="copyPassword()" class="btn btn-secondary">Copy</button>
                                 <input text="" type="text" id="password" readonly>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script>
                        function isGood(password) {
                            var password_strength = document.getElementById("password-text");
                        
                            //TextBox left blank.
                            if (password.length == 0) {
                                password_strength.innerHTML = "";
                                return;
                            }
                        
                            var regex = new Array();
                            regex.push("[A-Z]"); 
                            regex.push("[a-z]"); 
                            regex.push("[0-9]"); 
                            regex.push("[$@$!%*#?&]");
                        
                            var passed = 0;
                        
                            for (var i = 0; i < regex.length; i++) {
                                if (new RegExp(regex[i]).test(password)) {
                                    passed++;
                                }
                            }
                        
                            var strength = "";
                            switch (passed) {
                                case 0:
                                case 1:
                                case 2:
                                    strength =
                                        "<small class='progress-bar bg-danger' style='border-radius: 3px; width: 40%; height: 20px;'>&nbsp;Weak</small>";
                                    break;
                                case 3:
                                    strength =
                                        "<small class='progress-bar bg-warning' style='border-radius: 3px; width: 60%; height: 20px;'>&nbsp;Medium</small>";
                                    break;
                                case 4:
                                    strength =
                                        "<small class='progress-bar bg-success' style='border-radius: 3px; width: 100%; height: 20px;'>&nbsp;Strong</small>";
                                    break;
                        
                            }
                            password_strength.innerHTML = strength;
                        
                        }
                     </script>
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
                     <div class="form-group mb-3">
                        <input name="phoneNumber" placeholder="Phone Number" class="form-control" pattern="^(\+44|0)\d{10}$" title="Please enter a valid UK phone number (e.g. +44 7123 456789 or 07123 456789)" required>
                     </div>
                     <div class="form-group mb-3">
                        <input maxlength="240" name="address" placeholder="Company Address" class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                        <input name="companyName" placeholder="Company Name" class="form-control" required>
                     </div>
                     <div class="form-group mb-3">
                        <input name="companyNumber" placeholder="Company Number" class="form-control" required>
                     </div>
                     <div class="d-grid">
                        <button type="submit" name="submit" class="btn btn-success">Register</button>
                     </div>
                     <div class="d-flex justify-content-center align-items-center mt-4">
                        <a style="text-align: center; color: darkgreen;" href="/login">Already have a company account?</a>
                     </div>
                     <hr>
                     <div class="d-grid">
                        <a href="<?= base_url() ?>/home" class="btn btn-light">Return To Homepage</a>
                     </div>
                  </form>
                  <script>
                     var form = document.getElementById('register-form');
                     var registerButton = form.querySelector('[name="submit"]');
                     
                     form.addEventListener('input', function (event) {
                         if (event.target.validity.valueMissing) {
                             event.target.classList.add('is-invalid');
                         } else {
                             event.target.classList.remove('is-invalid');
                         }
                     });
                     
                     form.addEventListener('submit', function (event) {
                         if (form.checkValidity() === false) {
                             event.preventDefault();
                             event.stopPropagation();
                         }
                         form.classList.add('was-validated');
                     
                         if (form.checkValidity() === true) {
                             registerButton.removeAttribute('disabled');
                         } else {
                             registerButton.setAttribute('disabled', '');
                         }
                     });
                     const increaseFontBtn = document.querySelector("#increase-font");
                       let fontSize = 14;
                     
                       increaseFontBtn.addEventListener("click", () => {
                         fontSize += 2;
                         document.querySelectorAll("body *").forEach(el => {
                           el.style.fontSize = `${fontSize}px`;
                         });
                       });
                     
                     const decreaseFontBtn = document.querySelector("#decrease-font");
                     
                     decreaseFontBtn.addEventListener("click", () => {
                       fontSize -= 2;
                       document.querySelectorAll("body *").forEach(el => {
                         el.style.fontSize = `${fontSize}px`;
                       });
                     });
                     
                     const toggleButton = document.getElementById('grayscale-toggle');
                     const htmlTag = document.getElementsByTagName('html')[0];
                     
                     function toggleGrayscale() {
                       if (htmlTag.classList.contains('grayscale')) {
                         htmlTag.classList.remove('grayscale');
                       } else {
                         htmlTag.classList.add('grayscale');
                       }
                     }
                     
                     toggleButton.addEventListener('click', toggleGrayscale);
                     const button = document.getElementById('high-contrast-button');
                     button.addEventListener('click', function() {
                       document.body.classList.toggle('high-contrast');
                     });
                     
                     const buttons = document.getElementById('negative-contrast-button');
                       buttons.addEventListener('click', function() {
                         document.body.classList.toggle('negative-contrast');
                       });
                     const resetButton = document.getElementById('reset-button');
                     
                     resetButton.addEventListener('click', () => {
                       document.getElementsByTagName('html')[0].classList.remove('grayscale');
                       document.body.classList.remove('high-contrast');
                       document.body.classList.remove('negative-contrast');
                       document.querySelectorAll('body *').forEach(el => {
                         el.style.fontSize = '';
                       });
                     });
                     const lightBackgroundBtn = document.querySelector("#light-background");
                     
                     function toggleLightBackground() {
                       const body = document.querySelector("body");
                       const whiteImage = document.createElement("img");
                       whiteImage.setAttribute("src", "assets/img/whitebackground.jpg");
                       whiteImage.setAttribute("id", "white-image");
                       
                       if (body.style.backgroundColor) {
                         body.style.backgroundColor = "";
                         const existingImage = document.querySelector("#white-image");
                         if (existingImage) {
                           existingImage.remove();
                         }
                       } else {
                         body.style.backgroundColor = "#ffffff";
                         body.appendChild(whiteImage);
                       }
                     }
                     
                     lightBackgroundBtn.addEventListener("click", toggleLightBackground);
                  </script>
               </div>
            </section>
         </div>
      </div>
   </body>