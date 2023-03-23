<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header') ?>



<style type="text/css">
    @page {
        size: A4;
        margin: 1.5cm;
    }

    body {
        background-color: #e8e8e8;
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

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        border: 2px solid #ffffff;
    }

    th:first-child,
    th:last-child {
        border-top: 2px solid #4CAF50;
        border-bottom: 2px solid #4CAF50;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-size: 16px;
    }

    th:nth-child(2),
    td:nth-child(2) {
        width: 30%;
    }

    th:nth-child(3),
    td:nth-child(3) {
        width: 25%;
    }

    td,
    th {
        text-align: left;
        padding: 12px 16px;
        border: 1px solid #ddd;
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #CCFFCC;
    }

    th:first-child,
    th:nth-child(2),
    th:last-child {
        border: 2px solid #ffffff;
    }


    @media (max-width: 800px) {

        td,
        th {
            padding: 8px;
        }
    }

    /* .container {
        width: 800px;
        margin: 0 auto;
    } */
</style>

<link rel="stylesheet" href="./assets/css/accessibilityPortal.css" />
<script src="./assets/js/accessibility.js"></script>
<div class="container animate__animated animate__slideInLeft">

    <div class="row">

        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-header"></div>
                <div class="ibox-content">
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

                    <div class="row">

                        <table>
                            <thead>
                                <tr>
                                    <th>Audit Question</th>
                                    <th>Question Category</th>
                                    <th>Company Response</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($question_data as $k => $v) {
                                    foreach ($question_data[$k] as $q_item) { ?>
                                        <tr>
                                            <td><?php echo $q_item['question']; ?></td>
                                            <td>
                                                <?php
                                                $icons = array(
                                                    "Wheelchair" => "fas fa-wheelchair",
                                                    "visual impairment" => "fas fa-low-vision",
                                                    "Hearing impairment" => "fas fa-deaf",
                                                    "Sensory issues" => "fas fa-hand-sparkles",
                                                    "Learning difficulties" => "fas fa-question",
                                                    "general" => "fas fa-user",
                                                    "website" => "fas fa-laptop",
                                                    "general2" => "fas fa-user",
                                                    "wc" => "fas fa-toilet"

                                                );
                                                if (isset($icons[$q_item['category']])) {
                                                    echo '<i class="' . $icons[$q_item['category']] . '"></i>';
                                                }
                                                ?>
                                                <?php echo $q_item['category']; ?>
                                            </td>
                                            <td style="color:<?php echo ($q_item['response'] == '1') ? 'green' : 'red'; ?>; font-weight:bold;">
                                                <?php if ($q_item['response'] == '1') : ?>
                                                    <i class="fas fa-check"></i> Yes
                                                <?php else : ?>
                                                    <i class="fas fa-times"></i> No
                                                <?php endif; ?>
                                            </td>

                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>