<?= view('templates/header'); ?>

<h1>Add Question to Audit Databank</h1>
<form action="<?php echo base_url(); ?>/AdminController/AddQuestion" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="question" placeholder="Question Text" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="category" placeholder="Question Category" class="form-control">
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Add Question</button>
                            </div>
                        </form>


<a href="<?= base_url() ?>/adminPortal" class="nav_link">
    <i class='bx bx-log-out nav_icon'></i>
    <span class="nav_name">Return to home</span>
</a>

<?= view('templates/footer'); ?>