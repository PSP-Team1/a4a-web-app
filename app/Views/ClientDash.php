<?= view('templates/header');

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
$user = $session->get('name');
?>


<div class="container">


    <div class="row">
        <div class="col-lg-6">

        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h2>Admin Dashboard</h2>
            </div>

            <div class="ibox-content">


                <div class="row">
                    <h3><?php echo $timeOfDay . " ".  $user?>!</h3>
                    <h4>What would you like to do today?</h4>
                    <h5>Quick Links</h5>
                    <p>
                        <a class="btn btn-success btn-outline" href="/createTemplate" role="button"> <i
                                class="fa fa-plus "></i>
                            Create Template(s)</a>

                        <a class="btn btn-outline btn-danger" href="/deleteTemplate" role="button"> <i
                                class="fa fa-trash-o"></i>
                            Delete Template(s)</a>

                        <a class="btn btn-outline btn-secondary" href="/clientInbox" role="button"> <i
                                class="fa fa-envelope-o"></i>
                            View Inbox</a>

                        <a class="btn btn-outline btn-secondary" href="/clientSettings" role="button"> <i
                                class="fa fa-cog"></i>
                            View Settings</a>
                    </p>

                </div>
            </div>


            <br>

            <div class="ibox-title">
                <h2>View Companies</h2>
            </div>

            <div class="ibox-content">

                <table class="footable table table-stripped toggle-arrow-tiny tablet breakpoint footable-loaded">
                    <thead>
                        <tr>

                            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable">
                                Email<span class="footable-sort-indicator"></span></th>
                            <th class="footable-visible footable-sortable">Contact Name<span
                                    class="footable-sort-indicator"></span>
                            </th>
                            <th data-type="all" class="footable-visible footable-sortable">Phone Number<span
                                    class="footable-sort-indicator"></span></th>
                            <th data-type="all" class="footable-visible footable-sortable">Company Name<span
                                    class="footable-sort-indicator"></span></th>
                            <th data-type="all" class="footable-visible footable-sortable">Company Number<span
                                    class="footable-sort-indicator"></span></th>
                            <th data-type="all" class="footable-visible footable-sortable">Address<span
                                    class="footable-sort-indicator"></span></th>
                            <th data-type="all" class="footable-visible footable-sortable">Date Created<span
                                    class="footable-sort-indicator"></span></th>
                            <th class="footable-visible footable-last-column footable-sortable">Action<span
                                    class="footable-sort-indicator"></span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($companies as $company): ?>
                        <tr class="footable-even" style="">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span><?= $company['email'] ?></td>
                            <td class="footable-visible"><?= $company['contact'] ?></td>
                            <td class="footable-visible"><?= $company['tel'] ?></td>
                            <td style="footable-visible""><?= $company['companyName'] ?></td>
                            <td style=" footable-visible""><?= $company['companyNumber'] ?></td>
                            <td style="footable-visible""><?= $company['address'] ?></td>
                            <td style=" footable-visible""><?= $company['date_created'] ?></td>
                            <td class="footable-visible footable-last-column">
                                <a class="btn btn-success btn-outline"
                                    href="/ClientDashboard/viewCompany/<?= $company['id'] ?>" role="button"> View</a>
                        </tr>
                        <?php endforeach; ?>
                        <tr class="footable-row-detail" style="display: none;">
                            <td class="footable-row-detail-cell" colspan="4">
                                <div class="footable-row-detail-inner">
                                    <div class="footable-row-detail-row">
                                        <div class="footable-row-detail-name">Company:</div>
                                        <div class="footable-row-detail-value">Erat Volutpat</div>
                                    </div>
                                    <div class="footable-row-detail-row">
                                        <div class="footable-row-detail-name">Completed:</div>
                                        <div class="footable-row-detail-value"><span class="pie">3,1</span></div>
                                    </div>
                                    <div class="footable-row-detail-row">
                                        <div class="footable-row-detail-name">Task:</div>
                                        <div class="footable-row-detail-value">75%</div>
                                    </div>
                                    <div class="footable-row-detail-row">
                                        <div class="footable-row-detail-name">Date:</div>
                                        <div class="footable-row-detail-value">Jul 18, 2013</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="footable-even" style="display: none;">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span>Gamma project</td>
                            <td class="footable-visible">Anna Jordan</td>
                            <td class="footable-visible">(016977) 0648</td>
                            <td style="display: none;">Tellus Ltd</td>
                            <td style="display: none;"><span class="pie">4,9</span></td>
                            <td style="display: none;">18%</td>
                            <td style="display: none;">Jul 22, 2013</td>
                            <td class="footable-visible footable-last-column"><a href="#"><i
                                        class="fa fa-check text-navy"></i></a>
                            </td>
                        </tr>
                        <tr class="footable-odd" style="display: none;">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span>Alpha project</td>
                            <td class="footable-visible">Alice Jackson</td>
                            <td class="footable-visible">0500 780909</td>
                            <td style="display: none;">Nec Euismod In Company</td>
                            <td style="display: none;"><span class="pie">6,9</span></td>
                            <td style="display: none;">40%</td>
                            <td style="display: none;">Jul 16, 2013</td>
                            <td class="footable-visible footable-last-column"><a href="#"><i
                                        class="fa fa-check text-navy"></i></a>
                            </td>
                        </tr>
                        <tr class="footable-even" style="display: none;">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span>Project
                                <small>This is example of project</small>
                            </td>
                            <td class="footable-visible">Patrick Smith</td>
                            <td class="footable-visible">0800 051213</td>
                            <td style="display: none;">Inceptos Hymenaeos Ltd</td>
                            <td style="display: none;"><span class="pie">0.52/1.561</span></td>
                            <td style="display: none;">20%</td>
                            <td style="display: none;">Jul 14, 2013</td>
                            <td class="footable-visible footable-last-column"><a href="#"><i
                                        class="fa fa-check text-navy"></i></a>
                            </td>
                        </tr>
                        <tr class="footable-odd" style="display: none;">
                            <td class="footable-visible footable-first-column"><span
                                    class="footable-toggle"></span>Gamma project</td>
                            <td class="footable-visible">Anna Jordan</td>
                            <td class="footable-visible">(016977) 0648</td>
                            <td style="display: none;">Tellus Ltd</td>
                            <td style="display: none;"><span class="pie">4,9</span></td>
                            <td style="display: none;">18%</td>
                            <td style="display: none;">Jul 22, 2013</td>
                            <td class="footable-visible footable-last-column"><a href="#"><i
                                        class="fa fa-check text-navy"></i></a>
                            </td>
                        </tr>
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

            </div>
        </div>
    </div>
</div>

<a href="<?= base_url() ?>/LoginController/Logout" class="nav_link">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">SignOut</span>
</a>

<?= view('templates/footer'); ?>