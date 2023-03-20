<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header'); ?>

<head>
  
    </style>
    <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/auditView.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./assets/css/accessibilityPortal.css"/>
    <script src="./assets/js/accessibility.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <style>
        .container {
            max-width: 96%;
        }
    </style>
</head>




<div class="container">
    <div class="row">



        <div class="ibox">
            <div class="ibox-title">
                <h2>My Accessibility Audits</h2>
                <div style="visibility:hidden;">
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
                </div>
                <div class="ibox-tools">
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">


                    <div class="col-lg-6">
                        <div class="widget style1 lazur-bg">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="fa fa-shield fa-4x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <span> Accessibility Score </span>
                                    <h2 class="font-bold">95% compliant</h2>
                                    <p>Your company is in the top 10%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="widget style1 yellow-bg">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <i class="fa fa-bell fa-4x"></i>
                                </div>
                                <div class="col-8 text-right">
                                    <span> Improvement Areas </span>
                                    <h2 class="font-bold">5 items</h2>
                                    <p>Explore solutions</p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">

                        <div class="input-group">

                            <input type="text" class="form-control form-control-sm">

                            <div class="input-group-append">
                                <button tabindex="-1" class="btn btn-primary btn-sm" type="button">Search</button>
                            </div>

                            <table class="table table-hover margin bottom">
                                <thead>
                                    <tr>
                                        <th>Version</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Audit Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($audit_data as $item) {

                                        $qCount = $item['audit_total'];
                                        $cCount = $item['audit_prog'];
                                        $percComplete = ($qCount > 0) ? 100 / $qCount * $cCount : 0;
                                    ?>

                                        <tr>
                                            <td><?= $item['audit_version'] ?></td>
                                            <td>
                                                <div class="progress progress-small">
                                                    <div style="width: <?= $percComplete; ?>%;" class="progress-bar"></div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-outline" href="/AuditController/OpenAudit/<?= $item['audit_id'] ?>" role="button">
                                                    <i class="fa fa-eye"></i> View</a>
                                            </td>
                                            <td>


                                                <?php
                                                $datetime = new DateTime($item['date_created']);
                                                $formattedDate = $datetime->format('Y-m-d');
                                                ?>
                                                <?= $formattedDate ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>


                        </div>
                    </div>

                </div>


            </div>
        </div>

    </div>
</div>




<!-- Full screen modal -->


</div>


</body>

</html>