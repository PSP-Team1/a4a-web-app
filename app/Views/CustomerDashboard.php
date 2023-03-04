<?= view('templates/header'); ?>

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
    $contact = $session->get('name');
?>

    <div class="row">
        <div class="col-lg-6">

        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h2><?php echo $contact?>'s Dashboard</h2>

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
                    <h3><?php echo $timeOfDay . " ".  $contact?>!</h3>
                    <h4>What would you like to do today?</h4>
                    <h5>Quick Links</h5>
                    <p>
                        <!-- <a class="btn btn-warning btn-outline" href="/startAudit" role="button"> <i
                                class="fa fa-star text-warning "></i> Start New Audit</a> -->
                        <a class="btn btn-success btn-outline" href="/Audit" role="button"> View My Accessibility
                            Audit(s)</a>

                        <!--<a class="btn btn-outline btn-danger" href="/deleteAudit" role="button"> <i
                                class="fa fa-trash-o"></i> Delete
                            Audit(s)</a>
                        <a class="btn btn-success btn-outline" href="/viewFaq" role="button">View FAQs</a> -->
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>
</div>


<?= view('templates/footer'); ?>