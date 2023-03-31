
<?= view('templates/header'); ?>
<div class="container">


    <div class="ibox">

        <div class="ibox-content">

            <div class="row">
                <div class="col-lg-12">

                    <h2>Templates</h2>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Published Status</th>
                                <th>Date Created</th>
                                <th>Usage</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($templates as $template) :
                                $badgeClass = "";
                                if ($template['published_status'] == 'Published') {
                                    $badgeClass = " badge-primary";
                                }

                            ?>
                                <tr>
                                    <td><?= $template['audit_version'] ?></td>
                                    <td><span class="badge <?= ($template['published_status'] == 'published') ? 'badge-primary' : ''; ?>"><?= ucfirst($template['published_status']) ?></span></td>
                                    <td><?= date('Y M d H:i', strtotime($template['date_created'])) ?></td>
                                    <td><?= $template['usage_count'] ?></td>
                                    <td class="d-flex justify-content-evenly">
                                        <?php
                                        if ($template['published_status'] == 'published') { ?>


                                            <a class="btn-action btn btn-danger btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="deactivate" data-action="Unpublish" data-id="<?= $template['id'] ?>" data-target="#change-product-status-modal">
                                                <i class='bx bxs-x-circle'></i> Unpublish
                                            </a>

                                        <?php
                                        } else { ?>

                                            <a class="btn-action btn btn-success btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="activate" data-action="Publish" data-id="<?= $template['id'] ?>" data-target="#change-product-status-modal">
                                                <i class='bx bxs-cloud-upload'></i> Publish
                                            </a>


                                        <?php
                                        }  ?>

                                        <a class="btn-action btn btn-danger btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="delete" data-action="Deletion" data-id="<?= $template['id'] ?>" data-target="#change-product-status-modal">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>

                                    </td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>



                    <a class="btn btn-success btn-outline" href="/AdminCreateTemplate" role="button"> <i class="fa fa-paper-plane-o"></i> Create New</a>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="change-product-status-modal" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="modal-title">
                    </h2>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="/ManageTemplate/deleteVenue/">Yes</a>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    const modalTitle = document.getElementById('modal-title');

    const buttons = document.querySelectorAll('.btn-action');
    buttons.forEach(button => {
        const action = button.dataset.action;
        const actEp = button.dataset.ep;
        const title = `Confirm ${action}?`;

        button.addEventListener('click', (event) => {
            modalTitle.innerText = title;

            const deleteLink = `/ManageTemplates/${actEp}/${button.dataset.id}`;
            const deleteButton = document.querySelector('#change-product-status-modal .modal-footer a');
            deleteButton.href = deleteLink;
        });
    });
</script>
<?= view('templates/footer'); ?>