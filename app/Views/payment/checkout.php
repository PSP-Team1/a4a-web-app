<?= view('templates/header') ?>

<h2>Checkout</h2>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="<?= site_url('PaymentController/checkout') ?>" method="post" id="payment-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cardholder-name" class="form-label">Cardholder Name</label>
                        <input type="text" class="form-control" id="cardholder-name" name="cardholder-name" placeholder="John Doe" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="card-number" class="form-label">Card Number</label>
                        <div id="card-number" class="form-control"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <input type="hidden" id="amount" name="amount" value="100">
                <button type="submit" class="btn btn-primary">Submit Payment</button>
            </form>

        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    // Set your Stripe API public key
    const stripe = Stripe('pk_test_51MqHD3BuIYAzoRP96IdEyWhwque5jwpbFYpW0RbR9k70fQRveDCxB65SGtAVWvMyGisopufUVorpcbh1zGIoWqXl00uE7RbgMJ');

    // Mount the card elements to the payment form
    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        style: {
            base: {
                fontSize: '16px',
                color: '#32325d',
                fontFamily: 'Arial, sans-serif',
                fontSmoothing: 'antialiased',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        }
    });
    cardElement.mount('#card-number');

    const paymentForm = document.getElementById('payment-form');

    paymentForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Disable the submit button to prevent multiple submissions
        paymentForm.querySelector('button').disabled = true;

        // Validate the form
        const cardholderNameInput = paymentForm.querySelector('input[name="cardholder-name"]');
        const cardholderName = cardholderNameInput.value.trim();
        const amountInput = paymentForm.querySelector('#amount');
        const amount = parseFloat(amountInput.value) * 100; // Convert amount to cents

        if (!cardholderName) {
            showFieldError(cardholderNameInput, 'Please enter a cardholder name');
            return;
        }

        const {
            token,
            error
        } = await stripe.createToken(cardElement, {
            name: cardholderName
        });

        if (error) {
            // Display error message and re-enable the submit button
            const errorElement = document.querySelector('.invalid-feedback');
            errorElement.textContent = error.message;
            errorElement.classList.add('d-block');
            paymentForm.querySelector('button').disabled = false;
        } else {
            // Add the token and the amount to the form and submit it
            const tokenInput = document.createElement('input');
            tokenInput.setAttribute('type', 'hidden');
            tokenInput.setAttribute('name', 'stripeToken');
            tokenInput.setAttribute('value', token.id);
            paymentForm.appendChild(tokenInput);

            amountInput.value = amount.toFixed(0);
            paymentForm.submit();
        }
    });

    // Helper function to show field errors
    function showFieldError(inputElement, errorMessage) {
        const parent = inputElement.parentElement;
        const errorElement = parent.querySelector('.invalid-feedback');
        errorElement.textContent = errorMessage;
        inputElement.classList.add('is-invalid');
        errorElement.classList.add('d-block');
    }
</script>

<?= view('templates/footer') ?>