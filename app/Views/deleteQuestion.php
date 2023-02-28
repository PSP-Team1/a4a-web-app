<?= view('templates/header'); ?>

<h1>Remove Question from Audit Databank</h1>
<form action="<?php echo base_url(); ?>/AdminController/DeleteQuestion" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="questid" placeholder="Question ID" class="form-control">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Delete Question</button>
                            </div>
                        </form>


<a href="<?= base_url() ?>/adminPortal" class="nav_link">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">Return to home</span>
</a>

<?= view('templates/footer'); ?>