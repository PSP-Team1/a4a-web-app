<?= view('templates/header');

$session = session();
$id = $session->get('id');
$user = $session->get('name');
$email = $session->get('email');

?>


<style>
    .container {
        max-width: 75%;
    }

    label {
        font-size: 1.5rem !important;
    }
</style>
<div class="container">

    <div class="ibox">
        <div class="ibox-title">
            <h2>Change Profile Picture</h2>
        </div>
        <div class="ibox-content">

            <form method="post" enctype="multipart/form-data"  action="<?php echo base_url(); ?>/AdminSettingsController/updatePicture">
                <input type="file" name="picture" id="picture" accept="image/*">

                <br>

                <input type="hidden" name="id" value="<?php echo $id ?>">

                <div id="preview"></div>

                <style>
                #preview {
                    display: inline-block;
                    margin-top: 25px;
                    margin-bottom: 25px;
                }
                
                #preview img {
                    max-width: 35%;
                    max-height: 35%;
                    border: 1px solid #ccc;
                    padding: 5px;
                }
                </style>

                <script>
                const input = document.querySelector('#picture');
                const preview = document.querySelector('#preview');

                input.addEventListener('change', () => {
                    const file = input.files[0];
                    const reader = new FileReader();

                    reader.addEventListener('load', () => {
                    const image = new Image();
                    image.src = reader.result;
                    preview.innerHTML = '';
                    preview.appendChild(image);
                    });

                    if (file) {
                    reader.readAsDataURL(file);
                    }
                });
                </script>

                <br>

                <button type="submit" class="btn btn-outline-success">Update Picture</button>
                <a href="<?= base_url() ?>/AdminSettings" class="btn btn-outline-secondary">Return To Settings</a>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>