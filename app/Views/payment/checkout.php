<?= view('templates/header') ?>


<h2>Checkout</h2>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif ?>

<form action="<?= site_url('payment/checkout') ?>" method="post" id="payment-form">
    <div class="form-group">
        <label for="card-element">Credit or debit card</label>
        <div id="card-element"></div>
        <div id="card-errors" role="alert"></div>
    </div>

    <div class="form-group">
        <label for="amount">Amount ($)</label>
        <input type="number" name="amount" class="form-control" value="10.00" />
    </div>

    <button type="submit" class="btn btn-primary">Submit Payment</button>
</form>