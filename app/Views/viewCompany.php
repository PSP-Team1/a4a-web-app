<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header');

?>
<link rel="stylesheet" href="/assets/css/accessibilityPortal.css"/>
<script src="/assets/js/accessibility.js"></script>

<div class="container">

  <div class="row">
    <div class="col-lg-6">

    </div>
    <div class="ibox ">
      <div class="ibox-title">
        <h2>Company Details - <b><span style="color: purple"><?php echo $company['companyName'] ?></b></h2>
      </div>

      <style>
        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        .table td, .table th {
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            color: #333;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .custom-progress-bar {
         background-color: #52BE80;
      }
    </style>

    <div class="row">

    <div class="col-lg-12">

    <div class="ibox-content">
        <table class="table">
            <tbody>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $company['email']; ?></td>
                </tr>
                <tr>
                    <th>Contact:</th>
                    <td><?php echo $company['contact']; ?></td>
                </tr>
                <tr>
                    <th>Telephone Number:</th>
                    <td><?php echo $company['tel']; ?></td>
                </tr>
                <tr>
                    <th>Company Name:</th>
                    <td><?php echo $company['companyName']; ?></td>
                </tr>
                <tr>
                    <th>Company Number:</th>
                    <td><?php echo $company['companyNumber']; ?></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?php echo $company['address']; ?></td>
                </tr>
                <tr>
                    <th>Date Created:</th>
                    <td><?php echo $company['date_created']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>

    <div class="row">
    <div class="col-lg-6">
    <div class="ibox ">
      <div class="ibox-title">
        <h2>View Company Venue(s)</h2>
      </div>

      <div class="ibox-content" style="max-height: 500px; overflow-y: auto;">

        <?php if (empty($venues)): ?>
            <p>There are no venues to display.</p>
        <?php else: ?>
            <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
            <thead>
                <tr>

                    <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
                        Venue Name<span class="footable-sort-indicator"></span></th>
                    <th data-type="all" class="footable-visible footable-sortable">Venue Completion<span
                    class="footable-sort-indicator"></span></th>
                    <th class="footable-visible footable-last-column footable-sortable">Action<span
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
                            <td class="footable-visible footable-last-column">
                            <div class="progress">
                                                <div class="progress-bar <?php if ($progress == 100) {
                                                                              echo 'custom-progress-bar';
                                                                           } ?> <?php if ($progress != 100) {
                                                                                    echo 'progress-bar-striped animated';
                                                                                 } ?>" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $progress; ?>%</div>
                                             </div>
                    <td class="footable-visible footable-last-column">
                    <a class="btn btn-success btn-outline" href="/CustomerDashboard/ViewVenue/<?= $venue['id'] ?>" role="button">
                        <i class="fas fa-eye"></i> View
                    </a>

                    <style>

                        @keyframes progress-bar-stripes {
                        from {
                            background-position-x: 1rem;
                        }
                        to {
                            background-position-x: 0;
                        }
                        }

                        .progress-bar.animated {
                        animation: progress-bar-stripes 1s linear infinite;
                        }
                    </style>

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>

        </div>

      </div>
    </div>
    <div class="col-lg-6">

    <div class="ibox-title">
        <h2>View Company Audit(s)</h2>
      </div>

    <div class="ibox-content" style="max-height: 500px; overflow-y: auto;" >
    </div>
  </div>
</div>

<?= view('templates/footer'); ?>