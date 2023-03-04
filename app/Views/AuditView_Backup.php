<?= view('templates/header'); ?>

<head>

    <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">

</head>

<style>
    .audit-content {
        height: 100%;
    }

    html * {
        box-sizing: border-box;
    }

    p {
        margin: 0;
    }

    .upload__box {
        padding: 40px;
    }

    .upload__inputfile {
        width: .1px;
        height: .1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;

        text-align: center;
        min-width: 116px;
        padding: 5px;
        transition: all .3s ease;
        cursor: pointer;
        border: 2px solid;

        border-radius: 10px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all .3s ease;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 100px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }
</style>


<div class="container">
    <div class="row">



        <div class="ibox">
            <div class="ibox-title">
                <h4>Accessibility Audit</h4>
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
                                    <th class="text-center">Version</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">View</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($audit_data as $item){?>

                                <tr>
                                    <td><?= $item['audit_version'] ?></td>
                                    <td><?= $item['audit_prog'] ."/". $item['audit_total']  ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" data-bs-title="Version 1.2">Resume</button>
                                    </td>
                                </tr>
                                <?php }?>

                            </tbody>
                        </table>


                    </div>
                </div>


            </div>
        </div>

    </div>
</div>



<?php

function createQuestionBox($q_item) {
    $html = '<div data-id="'.$q_item['car_id'].'" class="ibox qbox" id="qcontent-' . $q_item['car_id'] . '">';
    $html .= '<div class="ibox-title bg-muted"><h5>' . $q_item['question'] . '</h5></div>';
    $html .= '<div class="ibox-content"><div class="row"><div class="col-sm-6">';
    $html .= '<label class="radio-inline"><input type="radio" name="optradio" value="1" checked="">Yes</label>';
    $html .= '<label class="radio-inline"><input type="radio" name="optradio"value="0" >No</label>';
    $html .= '<textarea class="form-control" placeholder="Write comment..."></textarea>';
    $html .= '</div><div class="col-sm-6"><div class="upload__box">';
    $html .= '<label class="upload__btn success"><div class="upload__btn-box">';
    $html .= '<i class="fa fa-upload"></i>Upload<input type="file" multiple="" data-max_length="20" class="upload__inputfile">';
    $html .= '</div><div class="upload__img-wrap"></div></label></div></div></div></div></div>';
    return $html;
}
?>

<!-- Full screen modal -->

<div class="modal top fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-mdb-backdrop="true" data-mdb-keyboard="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content modal-fullscreen">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Audit XYZ</h5>
                <div class="progress mb-3">
                    <div class="progress-bar progress-bar-success" style="width: 35%" role="progressbar"
                        aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <?php
                                $c=1;
                                foreach ($question_data as $k=>$v) {
                            ?>
                        <li><a class="nav-link <?= ($c==1 ? "active":"")?>" data-toggle="tab" href="#tab-<?= $c ?>">
                                <?= $c++ . " | " . $k ?> </a></li>

                        <?php }?>
                    </ul>

                    <div class="tab-content ">
                        <?php
                            $c=1;
                            foreach ($question_data as $k=>$v) {
                            ?>
                        <div id="tab-<?=$c?>" class="tab-pane <?= ($c==1 ? "active":"")?> ">
                            <div class=" panel-body">
                                <?php foreach ($question_data[$k] as $q_item){
                                        echo createQuestionBox($q_item);
                                    }?>

                            </div>

                        </div>

                        <?php $c++;} ?>
                    </div>


                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>



<script src="<?= base_url(); ?>/assets/js/jquery-3.1.1.min.js"></script>
<script>
    jQuery(document).ready(function () {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html =
                                    "<div class='upload__img-box'><div style='background-image: url(" +
                                    e.target.result + ")' data-number='" + $(
                                        ".upload__img-close").length + "' data-file='" + f
                                    .name +
                                    "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>



<script>
    document.querySelectorAll('.qbox').forEach(qbox => {
        qbox.addEventListener('change', () => {
            const id = parseInt(qbox.getAttribute('data-id'));
            const textarea = qbox.querySelector('textarea');
            const textareaValue = textarea.value;

            const radioButton = qbox.querySelector('input[type="radio"]:checked');
            const radioButtonValue = radioButton.value;

            let data = {
                id: id,
                notes: textareaValue,
                response: radioButtonValue
            };

            fetch('/AuditController/addResponse', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });
</script>
<?= view('templates/footer'); ?>