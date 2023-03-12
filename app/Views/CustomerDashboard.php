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
                    <a class="btn btn-success btn-outline" href="/Audit" role="button">
                    <i class="fas fa-search"></i> View My Accessibility Audit(s)
                    </a>

                    <a class="btn btn-success btn-outline" href="/CustomerNewVenue" role="button">
                    <i class="fa fa-plus"></i> Add New Venue
                    </a>

                    </p>

                </div>
            </div>

            <br>

            <div class="ibox-title">
                <h2>Your Venue(s)</h2>
            </div>
            <div class="ibox-content">

                <div class="row">

                <?php if (empty($venues)): ?>
                    <p>There are no venues to display.</p>
                <?php else: ?>
                    <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                    <thead>
                        <tr>

                            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
                                Venue Name<span class="footable-sort-indicator"></span></th>
                            <th class="footable-visible footable-sortable">Venue Address<span
                                    class="footable-sort-indicator"></span>
                            </th>
                            <th data-type="all" class="footable-visible footable-sortable">Venue Postcode<span
                                    class="footable-sort-indicator"></span></th>
                            <th data-type="all" class="footable-visible footable-sortable">Action<span
                            class="footable-sort-indicator"></span></th>
                            <th class="footable-visible footable-last-column footable-sortable">Venue Completion<span
                            class="footable-sort-indicator"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($venues as $venue): ?>
                            <?php
                            $venueFields = array('venue_name', 'address', 'postcode', 'about', 'opening_hours', 'images', 'accessibility', 'tags');
                            $completedFields = 0;
                            foreach ($venueFields as $field) {
                                if (!empty($venue[$field])) {
                                    $completedFields++;
                                }
                            }
                            $progress = round(($completedFields / count($venueFields)) * 100);
                        ?>

                        <tr class="footable-even" style="">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span><?= $venue['venue_name'] ?></td>
                            <td class="footable-visible"><?= $venue['address'] ?></td>
                            <td class="footable-visible"><?= $venue['postcode'] ?></td>
                            <td class="footable-visible footable-last-column">
                            <a class="btn btn-success btn-outline" href="/CustomerDashboard/ViewVenue/<?= $venue['id'] ?>" role="button">
                                <i class="fas fa-eye"></i> View
                            </a>

                            <?php if ($progress != 100) { ?>
                                <a class="btn btn-danger btn-outline disabled" href="/AdminDashboard/ViewCompany/<?= $venue['id'] ?>" role="button">
                                    <i class="fas fa-x"></i> Publish
                                </a>
                            <?php } ?>

                            <?php if ($progress == 100) { ?>
                                <a class="btn btn-success btn-outline" href="/AdminDashboard/ViewCompany/<?= $venue['id'] ?>" role="button">
                                    <i class="fas fa-check"></i> Publish
                                </a>
                            <?php } ?>

                            <td class="footable-visible footable-last-column">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress; ?>%</div>
                            </div>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="footable-visible">
                                <ul class="pagination float-right">
                                    <li class="footable-page-arrow disabled"><a data-page="first" href="#first">«</a>
                                    </li>
                                    <li class="footable-page-arrow disabled"><a data-page="prev" href="#prev">‹</a></li>
                                    <li class="footable-page active"><a data-page="0" href="#">1</a></li>
                                    <li class="footable-page"><a data-page="1" href="#">2</a></li>
                                    <li class="footable-page-arrow"><a data-page="next" href="#next">›</a></li>
                                    <li class="footable-page-arrow"><a data-page="last" href="#last">»</a></li>
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</div>
</div>


<?= view('templates/footer'); ?>