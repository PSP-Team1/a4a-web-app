<?= view('templates/header')?>


<?php 
  $qCount = $summary['audit_total'];
  $cCount = $summary['audit_prog'];
  $percComplete = ($qCount > 0) ? 100 / $qCount * $cCount : 0;
?>

<head>
  <title> <?= $summary['audit_version']. " (". $percComplete."%)";?></title>

</head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<link href="<?= base_url(); ?>/assets/css/auditView.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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
</style>

<div class="bg-success" style="width: <?=$percComplete;?>%;" class="progress-bar"></div>
<div class="modal inmodal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-2">
      <div class="modal-header">
        <h1 style="font-weight:bold;" class="pull-left">Congratulations, audit complete!</h1>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-lg-6 p-4">
            <div class="widget style1 lazur-bg">
              <div class="row">
                <div class="col-4 text-center">
                  <i class="fa fa-trophy fa-4x"></i>
                </div>
                <div class="col-8 text-right">
                  <span> Accessibility Score </span>
                  <h2 class="font-bold">95% compliant</h2>
                  <p>Your company is in the top 10%</p>
                </div>
              </div>
            </div>
            <h2>Assets</h2>

            <table class="table">
              <tbody>
                <tr>
                  <td><b>Link:</b></td>
                  <td>http://localhost?r=WVct5y3hBEg</td>
                </tr>
                <tr>
                  <td><b>PDF</b></td>
                  <td> <button type="button" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Download</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-6 pt-2">
            <h2>QR Code</h2>
            <p>QR code can be applied to signs and leaflets. If will show the latest accessubility status to your
              customers </p>
            <img src="<?= base_url(); ?>/assets/img/qrcode.png" alt="">
          </div>
        </div>
      </div>
      <p class="pl-2">
        Need help with making accessiblity improvements? Click <a href="#">here</a> to get in touch with our team.
      </p>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container">

  <div class="ibox">
    <div class=" progress progress-small">
      <div class="bg-success" id="prog" style="width: <?=$percComplete;?>%;" class="progress-bar"></div>
    </div>
    <div class="ibox-title main-title"">
    <div class=" row">
      <div class="col-lg-8">
        <h1><?= $summary['audit_version'];?><span id=" title-percent"></h1>
        <small class="text-right"><?=intval($percComplete)?>%</span> complete. Once the survey is complete you will be
          able to download the report.
          Results are saved automatically.</small>
      </div>
      <div class="col-lg-4">

        <a id="rpt-button" data-bs-toggle="modal" href="#confirm-modal" class=" btn btn-outline pull-right mr-25"><i
            class="fa fa-eye"></i>
          Generate
          Report</a>
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
            $c=1;
            foreach ($question_data as $k=>$v) {
                echo '<section  id="sec-'.$c.'">';
                echo '<div class="section-title"><h1>'. $k.'</h1></div>';
                foreach ($question_data[$k] as $q_item){ ?>


          <div class="ibox qbox" id="qcontent-<?php echo $q_item['car_id']; ?>"
            data-id="<?php echo $q_item['car_id']; ?>">
            <div class="ibox-title bg-muted">
              <h2><strong><?php echo $q_item['question']; ?></strong></h2>
            </div>
            <div class="ibox-content">
              <div class="row">
                <div class="col-sm-6">
                  <div class="respOptions">
                    <label class="radio-inline">
                      <input type="radio" name="resp-<?=$q_item['car_id']?>" value="1"
                        <?php if ($q_item['response'] == '1') echo 'checked="checked"'; ?>>
                      Yes
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="resp-<?=$q_item['car_id']?>" value="0"
                        <?php if ($q_item['response'] == '0') echo 'checked="checked"'; ?>>
                      No
                    </label>
                  </div>
                  <textarea class="text-notes form-control"
                    placeholder="Write comment..."><?= $q_item['notes']?></textarea>

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



<?= view('templates/footer')?>