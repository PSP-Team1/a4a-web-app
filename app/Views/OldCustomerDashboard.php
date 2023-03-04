<?= view('templates/header'); ?>

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


<div class="col-lg-12 pt-5">
  <div class="ibox">
    <div class="ibox-title">
      <h5>My Dashboard</h5>
      <button id="increase-font">Increase Font Size</button> <!-- increase font button -->

      <button id="decrease-font">Decrease Font Size</button> <!-- decrease font button-->

      <button id="grayscale-toggle">Toggle Greyscale</button>
      <!--grayscale button-->

      <button id="high-contrast-button">High Contrast</button>
      <!--high contrast button -->

      <button id="light-background">Light Background</button>
      <!--light background button -->

      <button id="negative-contrast-button">Negative Contrast</button>
      <!--negative contrast button -->

      <button id="reset-button">reset button</button>
      <!--reset button -->
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

        <div class="col-sm-6">

          <div class="ibox">
            <div class="ibox-title">
              <h3>My Audit</h3>

              <div class="progress">
                <div class="progress-bar progress-bar-success" style="width: 35%" role="progressbar" aria-valuenow="35"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="ibox-tools">
              </div>
            </div>
            <div class="ibox-content">
              <div class="m-b-sm m-t-sm">

                <div class="input-group">

                  <input type="text" class="form-control form-control-sm">

                  <div class="input-group-append">
                    <button tabindex="-1" class="btn btn-primary btn-sm" type="button">Search</button>
                  </div>

                  <table class="table table-hover margin bottom">
                    <thead>
                      <tr>
                        <th>Section</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Access</td>
                        <td class="text-center small">10/20</td>
                        <td class="text-center"><span class="label label-primary">Open</span>
                        </td>
                      </tr>
                      <tr>
                        <td>WC</td>
                        <td class="text-center small">10/20</td>
                        <td class="text-center"><span class="label label-primary">Open</span>
                        </td>
                      </tr>
                      <tr>
                        <td>Parking</td>
                        <td class="text-center small">10/20</td>
                        <td class="text-center"><span class="label label-primary">Open</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted"><b>A4A <?php echo date("Y"); ?></b></span>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src='<?= base_url(); ?>/assets/js/scripts.js'></script>
<!-- Mainly scripts -->
<script src="<?= base_url(); ?>/assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url(); ?>/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<!-- <script src="<?= base_url(); ?>/assets/js/inspinia.js"></script> -->
<script src="<?= base_url(); ?>/assets/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI  -->

<!-- iCheck -->
<script src="<?= base_url(); ?>/assets/js/plugins/iCheck/icheck.min.js"></script>
</body>


<div class="container pb-5">

  <div class="row d-flex justify-content-center">
    <div style="font-size:16px;" class="col-md-8"><br>

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
            $user = $session->get('email');
            ?>

      <div
        style="border-radius: 30px; background-color: #ebebeb; padding: 20px; margin: auto; width: 65%; height: auto; box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05);">
        <h1 style="text-align: center;"><?php echo $timeOfDay ?><br><span
            style="font-size: 22px; color: blue"><i><?php echo "$user" ?></i></h1>
        <h2 style="text-align: center;">What would you like to do today?</h2>
        <div style="display: block; margin: auto; text-align: center;">

          <br><a class="btn btn-primary col-md-6" href="/startAudit" role="button">Start New Audit</a><br>
          <br><a class="btn btn-primary col-md-6" href="/ViewAudit role=" button">View Audit(s)</a><br>
          <br><a class="btn btn-primary col-md-6" href="/deleteAudit" role="button">Delete Audit(s)</a><br>
          <br><a class="btn btn-primary col-md-6" href="/viewFaq" role="button">View FAQ</a><br>
        </div>
      </div>
      <!--increase font js-->
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

      </html>
    </div>
  </div>
</div>



<div class="container"></div>

<?= view('templates/footer'); ?>