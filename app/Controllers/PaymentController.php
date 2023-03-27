<?php

namespace App\Controllers;

use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends BaseController
{
    public function checkout()
    {
        if ($this->request->getMethod() === 'post') {
            $stripeToken = $this->request->getVar('stripeToken');
            $stripeAmount = $this->request->getVar('stripeAmount');

            // Set your Stripe API key
            Stripe::setApiKey('your_stripe_secret_key');

            try {
                // Create a new Stripe charge
                Charge::create([
                    'amount' => $stripeAmount,
                    'currency' => 'usd',
                    'description' => 'Example Charge',
                    'source' => $stripeToken,
                ]);

                // Payment successful
                return redirect()->to('/success');
            } catch (\Exception $e) {
                // Payment failed
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        // Load the payment form view
        return view('payment/checkout');
    }
}
