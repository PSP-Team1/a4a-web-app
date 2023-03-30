<?= view('templates/header') ?>



<?php $reportLink = base_url() . '/AuditReportView/22'; ?>

<style type="text/css">
    @page {
        size: A4;
        margin: 1.5cm;
    }

    .container {
        width: 70%;
    }

    body {
        background-color: #e8e8e8;
        font-family: Arial, sans-serif;
        font-size: 12pt;
        line-height: 1.5;
    }

    /* h1,
    h2 {
        text-align: center;
        margin: 0;
    } */

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
        /* text-align: center; */
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

    p {
        display: block;
    }

    /* .container {
        width: 800px;
        margin: 0 auto;
    } */


    /* copy embed button */

    .code-container {
        position: relative;
    }

    pre {
        background-color: #f5f5f5;
        padding: 10px;
        font-family: monospace;
        white-space: pre-wrap;
        margin: 0;
    }

    /* .copy-btn {
        position: absolute;
        right: 10px;
        top: 10px;
    } */

    /* QR */

    #qrcode {
        width: 160px;
        height: 160px;
        margin-top: 15px;
    }
</style>

<div class="container animate__animated animate__slideInLeft">

    <div class="row">

        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-header"></div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12 p-4">
                            <div class="widget style1 lazur-bg">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <i class="fa fa-trophy fa-4x"></i>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span> Accessibility Score </span>
                                        <h2 class="font-bold">95% Compliant</h2>
                                        <p>Your company is in the top 10%</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Embeddable Report</h2>
                            <br>
                            <p class=""><i class="fa fa-info-circle"></i> Embed this script on your site to allow users to check accessibility.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="code-container">
                                <pre><code>&lt;script src="<?= base_url() ?>/embedScript" api-key="0c1546f81d3b6390773e90651ee2cc53"&gt;&lt;/script&gt;</code></pre>
                                <button class="btn btn-primary btn-sm mt-2 btn-copy" onclick="copyToClipboard()">Copy</button>
                                <i class="fa fa-check d-none ml-1"></i>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-12 mt-5">
                        <h2>QR Code</h2>
                        <p>QR code can be applied to signs and leaflets. If will show the latest accessibility status to your
                            customers. The link will allow the user to navigate to the report below.</p>
                        <div id="qrcode" res-loc="<?= $reportLink ?>"></div>
                        <button id="saveBtn" class="btn btn-primary btn-sm">Save QR Code</button>
                    </div>


                    <div class="row mt-5">

                        <h2>Accessibility Report</h2>
                        <p><i class="fa fa-info-circle"></i> To access the report directly click <a target="_blank" href="<?= $reportLink ?>">here</a> or paste the link in your browser: <code><?= $reportLink ?></code>
                        </p>
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

<script>
    function copyToClipboard() {
        const button = document.querySelector('.btn-copy');
        const codeContainer = document.querySelector('.code-container');
        const code = codeContainer.querySelector('code').innerText;
        navigator.clipboard.writeText(code);

        // Change button text to "Copied" and show tick icon if it doesn't already exist
        if (!button.querySelector('.fa-check')) {
            button.innerText = "Copied";
            const icon = document.createElement('i');
            icon.classList.add('fa', 'fa-check', 'ml-1');
            button.appendChild(icon);
            setTimeout(() => {
                icon.classList.toggle('d-none');
                button.innerText = "Copy";
            }, 2000);
        } else {
            // Hide tick icon and change button text back to "Copy"
            button.querySelector('.fa-check').classList.toggle('d-none');
            button.innerText = "Copy";
        }
    }
</script>

<script src="<?= base_url() ?>/assets/js/plugins/qrcodejs/qrcode.min.js"></script>
<script>
    // generate qrcode
    const container = document.getElementById("qrcode");
    const url = container.getAttribute("res-loc");
    const qrcode = new QRCode(container, {
        width: 128,
        height: 128,
    });
    qrcode.makeCode(url);

    // Save qrcode
    const saveBtn = document.getElementById("saveBtn");

    saveBtn.addEventListener("click", () => {
        const canvas = qrcode.querySelector("canvas");
        const url = canvas.toDataURL("image/png");
        const filename = "qrcode.png";
        downloadImage(url, filename);
    });

    function downloadImage(url, filename) {
        const anchor = document.createElement("a");
        anchor.download = filename;
        anchor.href = url;
        anchor.click();
    }
</script>



<?= view('templates/footer') ?>