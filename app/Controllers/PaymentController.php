<?php

namespace App\Controllers;

use App\Models\OrderModel;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends BaseController
{
    public function checkout()
    {
        if ($this->request->getMethod() === 'post') {
            $stripeToken = $this->request->getPost('stripeToken');
            $stripeAmount = $this->request->getPost('amount') * 100; // Convert amount to cents

            // Set your Stripe API key
            Stripe::setApiKey('sk_test_51MqHD3BuIYAzoRP9AlmWRsf18gGMHDSl3qA60rmanjm4klpjUfbbX8DLZJFzMI6GkxpFhjmpadqCBhUKfSmP4Lu800vJ7fVGba');

            try {
                // Create a new Stripe charge
                $charge = Charge::create([
                    'amount' => $stripeAmount,
                    'currency' => 'usd',
                    'description' => 'Example Charge',
                    'source' => $stripeToken,
                ]);

                // Save the order information in your database
                $orderModel = new OrderModel();
                $orderData = [
                    'amount' => $stripeAmount / 100, // Convert cents to dollars
                    'charge_id' => $charge->id,
                    'company_id' => session()->get('company_id'),
                    // Add any other necessary order information here
                ];
                $orderModel->insert($orderData);

                // Payment successful
                return redirect()->to('/success?ref=' . $stripeToken);
            } catch (\Exception $e) {
                // Payment failed
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        // Load the payment form view
        return view('payment/checkout');
    }

    public function success()
    {
        return view('payment/success');
    }
}
