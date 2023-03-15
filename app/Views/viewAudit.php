<?= view('templates/header') ?>


<?php
$qCount = $summary['audit_total'];
$cCount = $summary['audit_prog'];
$percComplete = ($qCount > 0) ? 100 / $qCount * $cCount : 0;
?>

<head>
  <title> <?= $summary['audit_version'] . " (" . $percComplete . "%)"; ?></title>

</head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/css/auditView.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<style>
  .container {
    max-width: 90%;
    position: fixed;
  }

  #rpt-button[disabled]:hover {
    cursor: not-allowed !important;

  }

  #rpt-button[disabled] {
    color: grey;
    border: solid 1px grey;
  }

  /* loader */


  /* Style the loader */
  .loader {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    opacity: 0;
    visibility: hidden;
    transition: opacity 1s, visibility 1s;
  }

  .loader.visible {
    opacity: 1;
    visibility: visible;
    transition: opacity 1s, visibility 1s;
  }

  .svg-loader {
    height: 3rem;
    width: 16rem;
  }
</style>

<div class="bg-success" style="width: <?= $percComplete; ?>%;" class="progress-bar"></div>

<div class="modal inmodal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-2">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Are you sure?</h5>

      </div>
      <div class="modal-body bg-white p-2">
        <p>Are you sure you want to submit? Changes cannot be made after submission.</p>
        <div id="please-wait" class="d-none">
          <ul id="tasks-list" class="list-unstyled text-center">
            <li>Building report <span class="check-icon"></span></li>
            <li>Generating API keys <span class="check-icon"></span></li>
            <li>Building QR code <span class="check-icon"></span></li>
            <li>Finalizing report <span class="check-icon"></span></li>
          </ul>
        </div>
        <div id="loader" class="">
          <div class="loader">
            <!-- <h2 class="text-white">Loading...</h3> -->
            <object class="svg-loader" type="image/svg+xml" data="<?= base_url(); ?>/assets/img/vectors/a4a-circles.svg"></object>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="confirm-btn" class="btn btn-primary">OK</button>
        <button type="button" id="cancel-btn" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>


<div class="container">

  <div class="ibox">
    <div class=" progress progress-small">
      <div class="bg-success" id="prog" style="width: <?= $percComplete; ?>%;" class="progress-bar"></div>
    </div>
    <div class="ibox-title main-title"">
    <div class=" row">
      <div class="col-lg-8">
        <h1><?= $summary['audit_version']; ?><span id=" title-percent"></h1>
        <small class="text-right"><?= intval($percComplete) ?>%</span> complete. Once the survey is complete you will be
          able to download the report.
          Results are saved automatically.</small>
      </div>
      <div class="col-lg-4">
        <?= $rtSubmit = ($percComplete == 100) ?>
        <a id="rpt-button" data-bs-toggle="modal" href="#confirm-modal" class="btn <?= ($rtSubmit) ? 'btn-success' : 'btn-outline-danger' ?> pull-right mr-25<?= ($rtSubmit) ? '' : ' disabled' ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($rtSubmit) ? 'Audit complete' : 'Audit incomplete' ?>">
          <i class="fa fa-<?= ($rtSubmit) ? "check" : "warning" ?>"></i> <?= ($rtSubmit) ? "Finished" : "Audit Incomplete" ?>
        </a>
      </div>


    </div>

  </div>
  <div class=" ibox-content p-0">
    <div class="tab-container">
      <ul class="tab-list">
        <?php
        $c = 1;
        foreach ($question_data as $k => $v) {
          echo '<li class="wizard-nav-item' . ($c == 1 ? " active" : "") . '" data-target="sec-' . $c . '"><h3>' . $k . '</h3></li>';
          $c++;
        }
        ?>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active">

          <?php
          $c = 1;
          foreach ($question_data as $k => $v) {
            echo '<section  id="sec-' . $c . '">';
            echo '<div class="section-title"><h1>' . $k . '</h1></div>';
            foreach ($question_data[$k] as $q_item) { ?>


              <div class="ibox qbox" id="qcontent-<?php echo $q_item['car_id']; ?>" data-id="<?php echo $q_item['car_id']; ?>">
                <div class="ibox-title bg-muted">
                  <h2><strong><?php echo $q_item['question']; ?></strong></h2>
                </div>
                <div class="ibox-content">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="respOptions">
                        <label class="radio-inline">
                          <input type="radio" name="resp-<?= $q_item['car_id'] ?>" value="1" <?php if ($q_item['response'] == '1') echo 'checked="checked"'; ?>>
                          Yes
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="resp-<?= $q_item['car_id'] ?>" value="0" <?php if ($q_item['response'] == '0') echo 'checked="checked"'; ?>>
                          No
                        </label>
                      </div>
                      <textarea class="text-notes form-control" placeholder="Write comment..."><?= $q_item['notes'] ?></textarea>

                    </div>
                    <div class="col-sm-6">
                      <!-- Image upload -->
                      <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="btn btn-success ">
                            <i class="fa fa-camera"></i> Upload
                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                          </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


          <?php }
            echo '</section>';
            $c++;
          } ?>

        </div>
      </div>
    </div>


  </div>
</div>
</div>
<button class="btn btn-success btn-outline" id="scroll-to-top-btn"><i class="fa fa-chevron-circle-up"></i></button>


<script src="<?= base_url(); ?>/assets/js/auditWizard.js"></script>

<script>
  const confirmBtn = document.getElementById('confirm-btn');
  const modalTitle = document.getElementById('modal-title');
  const modalBody = document.querySelector('#confirm-modal .modal-body');
  const modalFooter = document.querySelector('.modal-footer');
  const pleaseWait = document.getElementById('please-wait');
  const tasksList = document.getElementById('tasks-list');
  const loader = document.querySelector('.loader');

  const randomDelay = Math.floor(Math.random() * (1000 - 500 + 1)) + 500; //just for asthetics :'-)

  function displayCheckIcon(index) {
    if (index >= tasksList.children.length) return;

    const checkIcon = tasksList.children[index].querySelector('.check-icon');
    checkIcon.innerHTML = '<i class="fa fa-check"></i>';

    setTimeout(() => {
      displayCheckIcon(index + 1);
    }, randomDelay);
  }

  confirmBtn.addEventListener('click', () => {
    modalTitle.textContent = 'Generating Report';
    modalBody.firstElementChild.classList.add('d-none');
    pleaseWait.classList.remove('d-none');
    loader.classList.remove('d-none');
    loader.classList.add('visible');
    const auditId = 22;

    displayCheckIcon(0);

    fetch(`/Audit/completeAudit`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          auditId: 22,
        }),
      })
      .then((response) => response.json())
      .then((data) => {
        setTimeout(() => {

          if (data.success) {
            loader.classList.remove('visible');

            const viewReportBtn = document.createElement('button');

            const eyeIcon = document.createElement('i');
            eyeIcon.classList.add('fa', 'fa-eye');
            viewReportBtn.appendChild(eyeIcon);

            const textNode = document.createTextNode(' View Report');
            viewReportBtn.appendChild(textNode);

            viewReportBtn.classList.add('btn', 'btn-primary', 'w-100');
            viewReportBtn.addEventListener('click', () => {
              window.location.href = '/Audit/auditConfirmation';
            });

            const cancelBtn = document.getElementById('cancel-btn');
            const confirmBtn = document.getElementById('confirm-btn');

            cancelBtn.style.display = 'none';
            confirmBtn.replaceWith(viewReportBtn);
            modalTitle.textContent = 'Accessibility Report Ready!';
            loader.classList.add('d-none');


          } else {
            modalBody.innerHTML = `<p>${data.message}</p>`;
          }
        }, 2500);
      })

      .catch((error) => {
        // Your error handling code here
        loader.classList.add('d-none');
      });
  });
</script>





<?= view('templates/footer') ?>