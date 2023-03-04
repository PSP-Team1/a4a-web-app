<?= view('templates/header');?>


<style>
    .container {
        max-width: 100%;
    }

    label {
        font-size: 1.5rem !important;
    }
</style>
<div class="container">

    <div class="ibox">
        <div class="ibox-title">
            <h2>Create New Audit Template</h2>
        </div>
        <div class="ibox-content">

            <form method="post" action="<?= base_url('create-template') ?>">
                <div class="form-group">
                    <label for="template-name">Template Name</label>
                    <input type="text" name="template-name" id="template-name" class="form-control" required>
                </div>

                <br>

                <div class="form-group">
                    <label for="company-select">Select Company</label>
                    <select name="company-select[]" id="question-select" class="form-control" multiple required>
                        <option value="company1">Company 1</option>
                        <option value="company2">Company 2</option>
                        <option value="company3">Company 3</option>
                        <option value="company4">Company 4</option>
                    </select>
                </div>

                <br>

                <div class="form-group">
                    <label for="question-select">Select Questions</label>
                    <select name="question-select[]" id="question-select" class="form-control" multiple required>
                        <option value="question1">Question 1</option>
                        <option value="question2">Question 2</option>
                        <option value="question3">Question 3</option>
                        <option value="question4">Question 4</option>
                    </select>
                </div>

                <br>

                <button type="submit" class="btn btn-outline-primary">Create Template</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?= view('templates/footer'); ?>