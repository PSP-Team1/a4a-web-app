<?= view('templates/header'); ?>
<style>
    .tabcontent {
        display: none;
    }

    .tabcontent.active {
        display: block;
    }

    .tablinks {
        background-color: #eee;
        color: #333;
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .tablinks.active {
        background-color: #0d6efd;
        color: white;
    }
</style>

<link rel="stylesheet" href="./assets/css/accessibilityPortal.css" />
<div class="container">


    <div class="ibox">
        <div class="ibox-title">
            <h1>Products & Promotions Management</h1>
        </div>
        <div class="ibox-content">

            <div class="tab">
                <button class="btn btn-primary tablinks active" onclick="openTab(event, 'tab1')">Products</button>
                <button class="btn btn-primary tablinks" onclick="openTab(event, 'tab2')">Promotion</button>
            </div>
            <br>
            <div id="tab1" class="tabcontent active">
                <div class="col-lg-12">


                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Units</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $product['product_name'] ?></td>
                                    <td><?= $product['price'] ?></td>
                                    <td><?= $product['description'] ?></td>
                                    <td><?= $product['units'] ?></td>
                                    <td><?= date('Y M d H:i', strtotime($product['date_created'])) ?></td>
                                    <td>
                                        <?php
                                        if ($product['live']) { ?>


                                            <a class="btn-action btn btn-danger btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="deactivate" data-action="Deactivation" data-id="<?= $product['id'] ?>" data-target="#change-product-status-modal">
                                                <i class='bx bxs-x-circle'></i> Deactivate
                                            </a>

                                        <?php
                                        } else { ?>

                                            <a class="btn-action btn btn-success btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="activate" data-action="Activation" data-id="<?= $product['id'] ?>" data-target="#change-product-status-modal">
                                                <i class='bx bxs-cloud-upload'></i> Activate
                                            </a>


                                        <?php
                                        }  ?>

                                        <a class="btn-action btn btn-danger btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="delete" data-action="Deletion" data-id="<?= $product['id'] ?>" data-target="#change-product-status-modal">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                    <button type="button" class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#addProductModal">
                        Add Product
                    </button>

                </div>
            </div>
            <div id="tab2" class="tabcontent">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Promo Code</th>
                            <th>Linked Product</th>
                            <th>Promo Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($promo_codes as $code) : ?>
                            <tr>
                                <td><span class="badge"><?= $code['code'] ?></span></td>
                                <td><?= $code['promo_name'] ?></td>
                                <td><?= $code['product_name'] ?></td>
                                <td><?= date('Y-M-d H:i', strtotime($code['start'])) ?></td>
                                <td><?= date('Y-M-d H:i', strtotime($code['end'])) ?></td>
                                <td>


                                    <a class="btn-action btn btn-danger btn-outline btn-sm" href="#" role="button" data-toggle="modal" data-ep="delete" data-action="Deletion" data-id="<?= $product['id'] ?>" data-target="#change-product-status-modal">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                </table>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPromoCodeModal">
                    Create Promotion
                </button>

            </div>








            <!-- Modals -->

            <!-- delete, activate, deactivate -->
            <div class="modal fade" id="change-product-status-modal" tabindex="-1" role="dialog" aria-labelledby="deleteVenueModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="modal-title">
                            </h2>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="/CustomerDashboard/deleteVenue/">Yes</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- add new product -->

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('ProductManagement/addProduct') ?>" method="post" id="addProductForm">
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Product Price</label>
                                    <input type="number" class="form-control" id="productPrice" name="productPrice" placeholder="Enter product price" min="0" required>
                                </div>
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productUnits">Product Units</label>
                                    <input type="number" class="form-control" id="productUnits" name="productUnits" placeholder="Enter product units" min="0" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <!-- Add promo codes -->


            <div class="modal fade" id="addPromoCodeModal" tabindex="-1" aria-labelledby="addPromoCodeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPromoCodeModalLabel">Add Promo Code</h5>
                            <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('ProductManagement/addPromoCode') ?>" method="post">
                                <div class="form-group">
                                    <label for="productSelect">Product</label>
                                    <select class="form-control" id="productSelect" name="product_id">
                                        <?php foreach ($products as $product) : ?>
                                            <option value="<?= $product['id'] ?>"><?= $product['product_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="promoCode">Promo Code</label>
                                    <input type="text" class="form-control" id="promoCode" name="code" placeholder="Enter promo code" required>
                                </div>
                                <div class="form-group">
                                    <label for="promoName">Promo Name</label>
                                    <input type="text" class="form-control" id="promoName" name="promo_name" placeholder="Enter promo name" required>
                                </div>
                                <div class="form-group">
                                    <label for="promoStart">Start Date</label>
                                    <input type="date" class="form-control" id="promoStart" name="start" required>
                                </div>
                                <div class="form-group">
                                    <label for="promoEnd">End Date</label>
                                    <input type="date" class="form-control" id="promoEnd" name="end" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Promo Code</button>
                                </div>
                            </form>
                        </div>
                    </div>
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

            const deleteLink = `/ProductManagement/${actEp}/${button.dataset.id}`;
            const deleteButton = document.querySelector('#change-product-status-modal .modal-footer a');
            deleteButton.href = deleteLink;
        });
    });
</script>


<script>
    // validate new product form
    const productForm = document.getElementById('addProductForm');
    const productName = document.getElementById('productName');
    const productPrice = document.getElementById('productPrice');
    const productDescription = document.getElementById('productDescription');
    const productUnits = document.getElementById('productUnits');

    productForm.addEventListener('submit', function(event) {
        if (!productName.value || !productPrice.value || !productDescription.value || !productUnits.value) {
            event.preventDefault();
            alert('Please fill out all fields.');
            return false;
        }

        if (productPrice.value < 0 || productUnits.value < 0) {
            event.preventDefault();
            alert('Price and units must be above 0.');
            return false;
        }

        return true;
    });



    const promoForm = document.querySelector('#addPromoCodeModal form');
    const promoCode = document.querySelector('#promoCode');
    const promoName = document.querySelector('#promoName');
    const promoStart = document.querySelector('#promoStart');
    const promoEnd = document.querySelector('#promoEnd');

    promoForm.addEventListener('submit', function(event) {
        if (!promoCode.value || !promoName.value || !promoStart.value || !promoEnd.value) {
            event.preventDefault();
            alert('Please fill out all fields.');
            return false;
        }

        const startDate = new Date(promoStart.value);
        const endDate = new Date(promoEnd.value);

        if (endDate < startDate) {
            event.preventDefault();
            alert('End date must be after start date.');
            return false;
        }

        return true;
    });
</script>



<!-- TAB MANAGEMENT -->

<script>
    const openTab = (evt, tabName) => {
        const tabcontent = document.getElementsByClassName("tabcontent");
        for (const content of tabcontent) {
            content.style.display = "none";
        }
        const tablinks = document.getElementsByClassName("tablinks");
        for (const link of tablinks) {
            link.classList.remove("active");
        }
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("active");
    }

    document.addEventListener("DOMContentLoaded", () => {
        // Manuallyset the active class and display property for the first tab
        const tab1 = document.querySelector(".tablinks:first");
        const tab1Content = document.getElementById("tab1");
        tab1.classList.add("active");
        tab1Content.style.display = "block";
    });
</script>





<?= view('templates/footer'); ?>