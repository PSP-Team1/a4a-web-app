<?= view('templates/accessibilityPortal') ?>
<?= view('templates/header'); ?>


<style>
    tr[draggable="true"]:hover {
        background-color: #0d6efd50;
    }

    tr[draggable="true"]:focus {
        outline: none;

    }

    tr[draggable="true"]:active {
        background-color: #ccc;

    }

    tr[draggable="true"].dragging {
        opacity: 0.5;
        border: 2px dashed orange;
        z-index: 2;
        transition: .1s;

    }

    tr[draggable="true"].dragover {
        background-color: #dbf9a76e;
        border: 2px dashed black;
        transition: .1s;
    }

    /* Check template name */

    #name_feedback {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-top: -1.25rem;
    }

    #name_feedback i {
        font-size: 1.25rem;
    }

    h2 {
        color: #001f6a91;
        font-weight: bold
    }

    #add_question_button {
        width: 100%;
        margin-top: 1.5rem;
    }
</style>


<link rel="stylesheet" href="./assets/css/accessibilityPortal.css"/>
<script src="./assets/js/accessibility.js"></script>
<div class="container">

    <div class="row">
        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-title">
                    <h1>New Audit Template</h1>
                </div>
                <div class="ibox-content">
                    <div class="row pb-2">

                        <div class="col-lg-4">

                            <h2> <b>1</b> Template Name </h2>
                            <div class="input-group">

                                <input type="text" class="form-control" id="template_name" name="template_name" required>
                                <div class="input-group-append" id="template_status">
                                    <span class="input-group-text">
                                        <i class="fas fa-question-circle text-secondary"></i>
                                    </span>
                                </div>
                            </div>
                            <p class="mt-2"><i class="fa fa-info-circle"></i> give your template a unique name</p>

                        </div>
                    </div>
                    <hr class="mt-2">

                    <div class="row">

                        <h2> <b>2</b> Add question data </h2>

                        <p class="mt-2"><i class="fa fa-info-circle"></i> add brand new questions or save time and import them from existing template.</p>

                        <div class="col-lg-4">

                            <div class="tabs-container">
                                <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-1-link" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">New</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-2-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">From existing</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1-link">
                                        <form id="qTempForm">
                                            <div class="form-group pb-3">
                                                <label class="small" for="question">Audit Question:</label>
                                                <input type="text" class="form-control" id="question" name="question" required>
                                            </div>
                                            <div class="form-group pb-3">
                                                <label class="small" for="category">Category:</label>
                                                <input type="text" class="form-control" list="categories" id="category" name="category" placeholder="Select or type category" required>
                                                <datalist id="categories">
                                                    <option value="">Select a category</option>
                                                </datalist>
                                            </div>



                                            <div class="form-group pb-3">
                                                <label class="small" for="options">Affiliate links:</label>
                                                <ul id="options" class="list-group">
                                                    <li class="list-group-item">
                                                        <input type="text" class="form-control" name="option[]" placeholder="Enter an option" required>
                                                    </li>
                                                </ul>
                                                <a href="#" id="addOption" class="pull-right"><i class="fas fa-plus-square"></i></a>

                                            </div>

                                            <button id="add_question_button" type="submit" class="btn btn-primary btn-block btn-sm pl-2">Add Question</button>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2-link">
                                        <select class="form-control" id="template_select" name="template_select" data-placeholder="Select Template">
                                            <option>Click here to select template...</option>
                                            <?php foreach ($template_data as $row) : ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->audit_version; ?></option>
                                            <?php endforeach; ?>
                                        </select>


                                        <select id="multi_select" class="h-300 form-control" multiple>
                                            <!-- options will be dynamically generated by JavaScript -->
                                        </select>
                                        <button id="import_questions_button" class="btn btn-primary btn-sm">Add Selected Items</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 mb-5">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Ordering</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Options</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="qTempTable"></tbody>
                            </table>
                        </div>
                        <hr class="mt-5">
                        <div class="col-lg-12">
                            <p><i class="fa fa-circle-info text-success"></i> One submitted you can't make any changes to the content. </p>
                            <button id="create-template" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit Template</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>



<script>
    // Get tge selected template from selected list
    const tempSelector = document.getElementById('template_select');

    let templateId;

    tempSelector.addEventListener('change', function() {
        templateId = this.value;

        // Check session storage for data
        const storageKey = `audit_questions_${templateId}`;
        let data = sessionStorage.getItem(storageKey);

        if (data) {
            // Use existing data from session storage
            data = JSON.parse(data);
            renderMultiSelect(data);
        } else {
            // Make fetch request to retrieve data
            fetch(`/CreateTemplateController/getQuestions/${templateId}`)
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    }
                    throw new Error(`Error: ${response.status} - ${response.statusText}`);
                })
                .then(data => {
                    console.log('Data:', data);
                    renderMultiSelect(data);

                    // Store the data in session storage
                    sessionStorage.setItem(storageKey, JSON.stringify(data));
                })
                .catch(error => {
                    console.log(error);
                });
        }
    });



    // Load historic question data (2nd tab)
    function renderMultiSelect(data) {

        // run groupuing methods
        const groupedData = groupByCategory(data);
        const sortedData = sortCategories(groupedData);


        // FIXME: empty - could do with persisting the latest selected category
        const multiSelect = document.querySelector('#multi_select');
        multiSelect.innerHTML = '';

        // Append the sorted data to the multi select item
        for (let i = 0; i < sortedData.length; i++) {
            const category = sortedData[i].category;
            const questions = sortedData[i].questions;

            const optgroup = document.createElement('optgroup');
            optgroup.label = category;

            for (let j = 0; j < questions.length; j++) {
                const question = questions[j].question;
                const option = document.createElement('option');
                option.textContent = question;
                option.id = questions[j].id;
                optgroup.appendChild(option);
            }

            multiSelect.appendChild(optgroup);

            // Add event listener to optgroup element
            optgroup.addEventListener('click', function(event) {
                // If the optgroup is selected, select all child options
                if (event.target === this) {
                    const options = this.querySelectorAll('option');
                    for (let option of options) {
                        option.selected = true;
                    }
                }
            });
        }

        // Add event listener to add question button
        const addQuestionButton = document.getElementById('add_question_button');
        addQuestionButton.addEventListener('click', function() {
            const selectedOption = multiSelect.options[multiSelect.selectedIndex];
            const question = selectedOption.textContent;
            const category = selectedOption.parentNode.label;
            const options = selectedOption.getAttribute('data-options').split(',');

            // Get the template object from session storage
            let template = JSON.parse(sessionStorage.getItem('template'));

            // If no template object exists, create one
            if (!template) {
                template = {
                    questions: []
                };
            }

            // Add the new question to the template object in session storage
            template.questions.push({
                question,
                category,
                options
            });
            sessionStorage.setItem('template', JSON.stringify(template));
        });
    }

    // rerender table from session storage
    function updateTable() {
        // Clear the table
        table.innerHTML = '';

        let template = JSON.parse(sessionStorage.getItem('template'));

        // Loop through each question in the template object and add it to the table
        for (let i = 0; i < template.questions.length; i++) {
            const question = template.questions[i];
            const row = table.insertRow();

            // Make the row draggable
            row.draggable = true;

            // Save the index of the row to the data transfer object on dragstart
            row.addEventListener('dragstart', function(event) {
                event.dataTransfer.setData('text/plain', i);
                event.currentTarget.classList.add('dragging');
            });

            // Remove the dragging class on dragend
            row.addEventListener('dragend', function(event) {
                event.currentTarget.classList.remove('dragging');
            });

            const orderCell = row.insertCell();
            const questionCell = row.insertCell();
            const categoryCell = row.insertCell();
            const optionsCell = row.insertCell();
            const deleteCell = row.insertCell();

            // Set the order cell content to the index of the question plus 1
            orderCell.textContent = i + 1;

            questionCell.textContent = question.question;
            categoryCell.textContent = question.category;

            const optionList = document.createElement('ul');
            optionsCell.appendChild(optionList);

            for (let option of question.options) {
                if (option) {
                    const optionItem = document.createElement('li');
                    optionItem.textContent = option;
                    optionList.appendChild(optionItem);
                }
            }

            const deleteButton = document.createElement('button');
            deleteButton.classList.add('btn', 'btn-sm', 'btn-danger');
            deleteButton.innerHTML = '<i class="fas fa-trash"></i>';
            deleteButton.addEventListener('click', () => {
                // Remove the question from the template object in session storage
                template.questions.splice(i, 1);
                sessionStorage.setItem('template', JSON.stringify(template));

                updateTable();
            });
            deleteCell.appendChild(deleteButton);

            // Add dragover and drop event listeners to the row
            row.addEventListener('dragover', function(event) {
                event.preventDefault();
                event.dataTransfer.effectAllowed = 'move';
            });

            row.addEventListener('drop', function(event) {
                event.preventDefault();
                const sourceIndex = event.dataTransfer.getData('text/plain');
                const targetIndex = i;
                if (sourceIndex !== targetIndex) {
                    // Move the dragged row to the target position
                    const movedQuestion = template.questions.splice(sourceIndex, 1)[0];
                    template.questions.splice(targetIndex, 0, movedQuestion);
                    sessionStorage.setItem('template', JSON.stringify(template));
                    updateTable();
                }
            });

            row.addEventListener('dragstart', function(event) {
                event.dataTransfer.setData('text/plain', i);
                this.classList.add('dragging');
            });

            row.addEventListener('dragend', function(event) {
                this.classList.remove('dragging');
            });

            row.addEventListener('dragenter', function(event) {
                this.classList.add('dragover');
            });

            row.addEventListener('dragleave', function(event) {
                this.classList.remove('dragover');
            });

        }
    }



    // Import questions from previous template
    const importQuestionsButton = document.querySelector('#import_questions_button');

    importQuestionsButton.addEventListener('click', () => {
        const multiSelect = document.querySelector('#multi_select');
        const selectedOptions = multiSelect.selectedOptions;

        // Retrieve the existing template object from session storage, or create a new one if it doesn't exist
        let template = JSON.parse(sessionStorage.getItem('template'));
        if (!template) {
            template = {
                questions: []
            };
        }

        // Get the id of the selected template
        const templateId = document.querySelector('#template_select').value;

        // Get the audit questions for the selected template from session storage
        const storageKey = `audit_questions_${templateId}`;
        const auditQuestions = JSON.parse(sessionStorage.getItem(storageKey));

        // Loop through the selected options and add them to the template object
        for (let i = 0; i < selectedOptions.length; i++) {
            const option = selectedOptions[i];
            const category = option.parentNode.label;
            const questionText = option.textContent;

            // Find the matching audit question based on the id of the option
            const auditQuestion = auditQuestions.find(aq => aq.id === option.id);
            if (!auditQuestion) {
                // Audit question not found, skip adding the question
                continue;
            }

            const question = {
                question: auditQuestion.question,
                category: auditQuestion.category,
                options: []
            };

            // Add the options to the question object
            if (auditQuestion.options) {
                for (let j = 0; j < auditQuestion.options.length; j++) {
                    const optionText = auditQuestion.options[j];
                    question.options.push(optionText);
                }
            }

            // Check if the question already exists in the template object
            const existingQuestion = template.questions.find(q => q.question === questionText);
            if (existingQuestion) {
                // Question already exists, skip adding it again
                continue;
            }

            // Add the question to the template object
            template.questions.push(question);
        }

        // Save the updated template object in session storage
        sessionStorage.setItem('template', JSON.stringify(template));

        updateTable();

    });




    // Multi select groupig functions
    function groupByCategory(data) {
        const groupedData = {};

        for (let i = 0; i < data.length; i++) {
            const category = data[i].category;
            const question = data[i].question;
            const id = data[i].id;

            if (!groupedData[category]) {
                groupedData[category] = [];
            }

            groupedData[category].push({
                question: question,
                id: id
            });
        }

        return groupedData;
    }


    function sortCategories(groupedData) {
        const sortedData = [];

        for (let category in groupedData) {
            if (groupedData.hasOwnProperty(category)) {
                sortedData.push({
                    category: category,
                    questions: groupedData[category]
                });
            }
        }

        // Sort the array by category
        sortedData.sort((a, b) => {
            const categoryA = a.category.toLowerCase();
            const categoryB = b.category.toLowerCase();

            if (categoryA < categoryB) {
                return -1;
            }
            if (categoryA > categoryB) {
                return 1;
            }
            return 0;
        });

        return sortedData;
    }

    // Get the template object from session storage
    let template = JSON.parse(sessionStorage.getItem('template'));

    // If no template object exists, create one
    if (!template) {
        template = {
            questions: []
        };
        sessionStorage.setItem('template', JSON.stringify(template));
    }

    const form = document.querySelector('#qTempForm');
    const table = document.querySelector('#qTempTable');


    // append item to the table (NOT submitting form
    form.addEventListener('submit', (event) => {
        event.preventDefault();

        const question = form.querySelector('#question').value;
        const category = form.querySelector('#category').value;
        const options = form.querySelectorAll('#options input');

        // Add the new question to the template object in session storage
        template.questions.push({
            question,
            category,
            options: Array.from(options).map(option => option.value)
        });
        sessionStorage.setItem('template', JSON.stringify(template));

        updateTable();
        optionList.innerHTML = '<li class="list-group-item"><input type="text" class="form-control" name="option[]" placeholder="Enter an option"></li>';
        form.reset();
    });

    const addOptionButton = document.querySelector('#addOption');
    const optionList = document.querySelector('#options');

    // FIXME: need to check whether current option is not null beforehand
    addOptionButton.addEventListener('click', () => {
        const optionItem = document.createElement('li');
        optionItem.classList.add('list-group-item', 'd-flex');
        optionItem.innerHTML = `
    <input type="text" class="form-control" name="option[]" placeholder="Enter an option">
    <button type="button" class="btn btn-danger btn-sm ml-auto" onclick="this.parentNode.remove()">
      <i class="fas fa-trash"></i>
    </button>
  `;
        optionList.appendChild(optionItem);
        optionItem.querySelector('input').addEventListener('input', updateSessionStorage);
    });

    // Set sesh storag
    function updateSessionStorage() {
        const options = optionList.querySelectorAll('input');
        const lastQuestion = template.questions[template.questions.length - 1];
        lastQuestion.options = Array.from(options).map(option => option.value);
        sessionStorage.setItem('template', JSON.stringify(template));
    }



    // Update the table on page load
    updateTable();
</script>


<script>

</script>
<script>
    // Tab handlier (new adn existing template tabs)

    const tabLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-pane');

    for (let i = 0; i < tabLinks.length; i++) {
        tabLinks[i].addEventListener('click', (event) => {
            event.preventDefault();

            for (let j = 0; j < tabLinks.length; j++) {
                tabLinks[j].classList.remove('active');
            }

            event.currentTarget.classList.add('active');

            for (let j = 0; j < tabContents.length; j++) {
                tabContents[j].classList.remove('show', 'active');
            }

            const target = event.currentTarget.getAttribute('href');
            const targetTab = document.querySelector(target);
            targetTab.classList.add('show', 'active');
        });
    }
</script>

<script>
    const categoryInput = document.getElementById('category');
    const categoryList = document.getElementById('categories');

    // Load categories from session storage and add them to the datalist
    template = JSON.parse(sessionStorage.getItem('template') || '{"questions":[]}');
    const categories = template.questions.map(question => question.category);
    const uniqueCategories = [...new Set(categories)]; // Get unique categories
    categoryList.innerHTML = `<option value="">Select a category</option>${uniqueCategories.map(category => `<option value="${category}">${category}</option>`).join('')}`;

    // Update sessionStorage when the category input changes
    categoryInput.addEventListener('change', function() {
        const selectedCategory = categoryInput.value;
        sessionStorage.setItem('selectedCategory', selectedCategory);
    });

    // Set the category input value on page load if it exists in sessionStorage
    const selectedCategory = sessionStorage.getItem('selectedCategory');
    if (selectedCategory) {
        categoryInput.value = selectedCategory;
    }
</script>



<script>
    // Check if the template name is available
    const templateNameInput = document.querySelector('#template_name');
    const templateStatusIcon = document.querySelector('#template_status i');

    let timeoutId;

    templateNameInput.addEventListener('input', async () => {
        const name = templateNameInput.value.trim();
        if (!name) {
            templateStatusIcon.classList = 'fas fa-question-circle text-secondary';
            return;
        }

        templateStatusIcon.classList = 'fas fa-spinner fa-spin text-secondary';

        if (timeoutId) {
            clearTimeout(timeoutId);
        }

        timeoutId = setTimeout(async () => {
            try {
                const response = await fetch('/CreateTemplateController/checkName', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        template_name: name
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                if (data.valid) {
                    templateStatusIcon.classList = 'fas fa-check-circle text-success';
                } else {
                    templateStatusIcon.classList = 'fas fa-times-circle text-danger';
                }
            } catch (error) {
                console.error(error);
                templateStatusIcon.classList = 'fas fa-question-circle text-secondary';
            }
        }, 1000);
    });

    templateNameInput.addEventListener('keydown', async (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            if (templateStatusIcon.classList.contains('fa-check-circle')) {
                const name = templateNameInput.value.trim();
                sessionStorage.setItem('template', JSON.stringify({
                    name: name,
                    questions: []
                }));
                templateNameInput.disabled = true;
                templateStatusIcon.classList = 'fas fa-check-circle text-success';
            }
        } else {
            templateStatusIcon.classList = 'fas fa-question-circle text-secondary';
            templateNameInput.disabled = false;
        }
    });
</script>

<script>
    // Sumbit process, need to add lock and session storage clearance after
    const createTemplateButton = document.getElementById('create-template');

    createTemplateButton.addEventListener('click', () => {
        const data = sessionStorage.getItem('template');

        fetch('/CreateTemplateController/createAuditTemplate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: data
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>