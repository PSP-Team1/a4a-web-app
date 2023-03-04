<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= base_url() ?>/assets/img/favicon.ico">
  <meta name="theme-color" content="#ffffff">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

  <link href="<?= base_url(); ?>/assets/css/plugins/iCheck/custom.css" rel="stylesheet">

  <link href="<?= base_url(); ?>/assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

  <link href="<?= base_url(); ?>/assets/css/animate.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/css/style_theme.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= site_url(); ?>assets/css/style.css">

</head>

<style>
  .dropdown {
    position: relative;
  }

  .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
  }

  .dropdown:hover .dropdown-menu {
    display: block;
  }
</style>

<?php

$session = session();
$role = $session->get('type');

$avatar = (isset($_SESSION['avatar']))? $_SESSION['avatar']: "Jack.jpg";


?>



<style>
  .avatar {
    width: 50px;
    height: 50px;
    object-fit: cover;
    background-image: url('<?= base_url(); ?>/assets/img/avatars/<?= $avatar?>');
    background-position: center;
    background-size: 80%;
    background-repeat: no-repeat;
    border-radius: 50%;
    border: solid 1px grey;
  }

  .links-right {
    display: flex;
    min-width: 10%;
    align-items: center;
    justify-content: space-between;
    gap: 2rem;
  }
</style>

<body id="body-pd">
  <header class="header" id="header">

    <div class="header_toggle">
      <i class='bx bx-menu' id="header-toggle"></i>
      <div class="header_img">

      </div>
      <img src="assets/img/Everybody-Welcome-logo.png" alt="Description of the image" max-width:="" 50px;="" style="
    max-width: 100px;
    position: relative;
    left: 0px;
">
      <?php if($role == "client") : ?>
      <h4 style="position: relative; top: 10px; left: 15px;" class="nav-title">Access For All - <span style="color: purple">Admin Portal</h4>
      <?php endif; ?>
      <?php if($role == "customer") : ?>
      <h4 style="position: relative; top: 10px; left: 15px;" class="nav-title">Access For All - <span style="color: purple">Customer Portal</h4>
      <?php endif; ?>
    </div>

    <div class="links-right">
      <h4 style="position: relative; left: 15px;">Signed in as: <span style="color: purple"><?= isset($_SESSION['name'])? $_SESSION['name'] : ""; ?></h4>
      <div class="avatar">
      </div>

      <?php if($role == "customer") : ?>
        <a class="btn btn-outline btn-primary" href="/CustomerInbox" role="button"> <i class="fa fa-envelope-o"></i> View
        Inbox</a>
      <?php endif; ?>
      <?php if($role == "client") : ?>
        <a class="btn btn-outline btn-primary" href="/AdminInbox" role="button"> <i class="fa fa-envelope-o"></i> View
        Inbox</a>
      <?php endif; ?>
    </div>

  </header>
  <div class="l-navbar" id="nav-bar">
    <?php
        // Set Active Tab
        $uri = service('uri');
        $activePage = $uri->getSegment(1);

        $session = session();
        $role = $session->get('type');
        ?>

    <nav class="nav">

      <div>
        <a href="#" class="nav_logo">

          <div style="height:15px">
            <img style="height: 100%; " src="" alt="">
            <span class="nav_logo-name">A4A</span>

          </div>
        </a>

        <?php if($role == "client") : ?>
        <div class="nav_list">
          <a href="<?= base_url() ?>/AdminDashboard"
            class="nav_link <?= ($activePage == "AdminDashboard" ? "active" : "") ?>">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Admin Dashboard</span>
          </a>

          <a href="<?= base_url() ?>/AdminCreateTemplate"
            class="nav_link <?= ($activePage == "AdminCreateTemplate" ? "active" : "") ?>">
            <i class='bx bx-list-ul nav_icon'></i>
            <span class="nav_name">Create Template(s)</span>
          </a>

          <a href="<?= base_url() ?>/AdminDeleteTemplate"
            class="nav_link <?= ($activePage == "AdminDeleteTemplate" ? "active" : "") ?>">
            <i class='bx bx-trash nav_icon'></i>
            <span class="nav_name">Delete Template(s)</span>
          </a>

          <a href="<?= base_url() ?>/AdminInbox"
            class="nav_link <?= ($activePage == "AdminInbox" ? "active" : "") ?>">
            <i class='bx bx-envelope nav_icon'></i>
            <span class="nav_name">View Inbox</span>
          </a>

          <a href="<?= base_url() ?>/AdminSettings"
            class="nav_link <?= ($activePage == "AdminSettings" ? "active" : "") ?>">
            <i class='bx bx-cog nav_icon'></i>
            <span class="nav_name">Settings</span>
          </a>

        </div>
        <?php endif; ?>

        <?php if($role == "customer") : ?>
        <div class="nav_list">

          <a href="<?= base_url() ?>/CustomerDashboard"
            class="nav_link <?= ($activePage == "CustomerDashboard" ? "active" : "") ?>">
            <i class='bx bx-grid-alt nav_icon'></i>
            <span class="nav_name">Dashboard</span>
          </a>

          <!-- <a href="<?= base_url() ?>/PmDash" class="nav_link <?= ($activePage == "newAudit" ? "active" : "") ?>">
                        <i class='bx bx-file nav_icon'></i>
                        <span class="nav_name">Start New Audit</span>
                    </a> -->

          <a href="<?= base_url() ?>/ViewAudits" class="nav_link <?= ($activePage == "ViewAudits" ? "active" : "") ?>">
            <i class='bx bx-list-ul nav_icon'></i>
            <span class="nav_name">View Audit(s)</span>
          </a>

          <!-- <a href="<?= base_url() ?>/PmDash" class="nav_link <?= ($activePage == "deleteAudit" ? "active" : "") ?>">
                        <i class='bx bx-trash nav_icon'></i>
                        <span class="nav_name">Delete Audit(s)</span>
                    </a>

                    <a href="<?= base_url() ?>/PmDash" class="nav_link <?= ($activePage == "viewFaq" ? "active" : "") ?>">
                        <i class='bx bx-help-circle nav_icon'></i>
                        <span class="nav_name">View FAQ</span>
                    </a>

                    <a href="<?= base_url() ?>/Analysis" class="nav_link <?= ($activePage == "AdminDashboard" ? "active" : "") ?>">
                        <i class='bi bi-search nav_icon'></i>
                        <span class="nav_name">Analysis</span>
                    </a> -->

          <div class="dropdown">
            <a href="<?= base_url() ?>/Analysis"
              class="nav_link <?= ($activePage == "AdminDashboard" ? "active" : "") ?>">
              <i class='bx bxs-universal-access'></i>
              <span class="nav_name">Accessibility</span>
            </a>
            <div class="dropdown-menu">

              <button class="btn btn-secondary" id="increase-font">Increase Font Size</button>
              <!-- increase font button -->

              <button class="btn btn-secondary" id="decrease-font">Decrease Font Size</button>
              <!-- decrease font button-->

              <hr>

              <button class="btn btn-secondary" id="negative-contrast-button">Negative Contrast</button>
              <!--negative contrast button -->

              <button class="btn btn-secondary" id="high-contrast-button">High Contrast</button>
              <!--high contrast button -->

              <hr>

              <button class="btn btn-secondary" id="grayscale-toggle">Toggle Greyscale</button>
              <!--grayscale button-->

              <button class="btn btn-secondary" id="light-background">Light Background</button>
              <!--light background button -->

              <div class="modal-footer">
                <button class="btn btn-secondary" id="reset-button">Reset</button>
                <!--reset button -->

              </div>

            </div>
          </div>




        </div>
        <?php endif; ?>

      </div>

      <a href="<?= base_url() ?>/LoginController/Logout" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">Sign Out</span>
      </a>
    </nav>
  </div>

  <!-- Notify -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

  <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

  <script>
    const increaseFontBtn = document.querySelector("#increase-font");
    let fontSize = 14;

    increaseFontBtn.addEventListener("click", () => {
      fontSize += 2;
      document.querySelectorAll("body *").forEach(el => {
        el.style.fontSize = `${fontSize}px`;
      });
    });
  </script>

  <!--decrease font-->
  <script>
    const decreaseFontBtn = document.querySelector("#decrease-font");

    decreaseFontBtn.addEventListener("click", () => {
      fontSize -= 2;
      document.querySelectorAll("body *").forEach(el => {
        el.style.fontSize = `${fontSize}px`;
      });
    });
  </script>

  <!--grayscale-->
  <script>
    // get the button and the HTML tag
    const toggleButton = document.getElementById('grayscale-toggle');
    const htmlTag = document.getElementsByTagName('html')[0];

    // function to toggle the grayscale filter
    function toggleGrayscale() {
      if (htmlTag.classList.contains('grayscale')) {
        htmlTag.classList.remove('grayscale');
      } else {
        htmlTag.classList.add('grayscale');
      }
    }

    // add event listener to the button
    toggleButton.addEventListener('click', toggleGrayscale);
  </script>


  <!--lightbackground-->
  <script>
    const lightBackgroundBtn = document.querySelector("#light-background");
    const image = document.querySelector('img');

    function toggleLightBackground() {
      if (document.body.style.backgroundColor) {
        document.body.style.backgroundColor = "";
      } else {
        document.body.style.backgroundColor = "#ffffff";
      }
    }

    function RemoveImage() {
      const images = document.querySelectorAll('img');
      images.forEach(image => {
        image.remove();
        if (document.body.style.Image) {
          document.body.style.image = "";
        } else {
          document.body.style.backgroundColor = image.remove();
        }
      });
    }



    lightBackgroundBtn.addEventListener("click", toggleLightBackground);
    lightBackgroundBtn.addEventListener("click", RemoveImage);
  </script>

  <!--high contrast-->
  <script>
    const button = document.getElementById('high-contrast-button');
    button.addEventListener('click', function () {
      document.body.classList.toggle('high-contrast');
    });
  </script>
  <!--negative contrast-->
  <script>
    const buttons = document.getElementById('negative-contrast-button');
    buttons.addEventListener('click', function () {
      document.body.classList.toggle('negative-contrast');
    });
  </script>

  <!--reset button-->
  <script>
    const resetButton = document.getElementById('reset-button');

    resetButton.addEventListener('click', () => {
      // Remove grayscale filter
      document.getElementsByTagName('html')[0].classList.remove('grayscale');
      // Remove high contrast filter
      document.body.classList.remove('high-contrast');
      // Remove negative contrast filter
      document.body.classList.remove('negative-contrast');
      // Remove light background
      document.body.style.backgroundColor = '';
      image.style.display = "block";
      // Reset font size
      document.querySelectorAll('body *').forEach(el => {
        el.style.fontSize = '';
      });
    });
  </script>
  <style>
    .grayscale {
      filter: grayscale(100%);
      -webkit-filter: grayscale(100%);
    }
  </style>
  <style>
    .light-background {
      background: #ffffff;
      display: none;

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