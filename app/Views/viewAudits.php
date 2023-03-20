<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header'); ?>
<link rel="stylesheet" href="./assets/css/accessibilityPortal.css"/>
<script src="./assets/js/accessibility.js"></script>
<div class="container">

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

    <div class="row">
        <div class="col-lg-6">

        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h2>View Audits</h2>

            </div>
            <div class="ibox-content">


        </div>
    </div>
</div>
</div>


<?= view('templates/footer'); ?>