<?= view('templates/header') ?>




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
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('templates/footer') ?>