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


    public function showTransactions()
    {
        // Set your Stripe API key
        Stripe::setApiKey('sk_test_51MqHD3BuIYAzoRP9AlmWRsf18gGMHDSl3qA60rmanjm4klpjUfbbX8DLZJFzMI6GkxpFhjmpadqCBhUKfSmP4Lu800vJ7fVGba');

        // Retrieve the list of charges
        $charges = Charge::all([
            'limit' => 10,
        ]);

        // Get the transaction data for the chart
        $chartData = $this->getTransactionChartData();

        // Pass the charges and chart data to the view
        return view('payment/transactions', [
            'charges' => $charges,
            'chartData' => $chartData,
        ]);
    }

    private function getTransactionChartData()
    {

        //gget 24 hr rev stats for chart
        $endDate = time();
        $startDate = strtotime('-24 hours', $endDate);


        //could do with setting this globally somewhere.
        Stripe::setApiKey('sk_test_51MqHD3BuIYAzoRP9AlmWRsf18gGMHDSl3qA60rmanjm4klpjUfbbX8DLZJFzMI6GkxpFhjmpadqCBhUKfSmP4Lu800vJ7fVGba');

        $charges = Charge::all([
            'created' => [
                'gte' => $startDate,
                'lte' => $endDate,
            ],
            'limit' => 100,
        ]);

        $chartData = [
            'labels' => [],
            'data' => [],
        ];

        foreach ($charges->data as $charge) {
            $date = date('Y-m-d H:00', $charge->created);
            if (isset($chartData['data'][$date])) {
                $chartData['data'][$date]++;
            } else {
                $chartData['data'][$date] = 1;
                $chartData['labels'][] = $date;
            }
        }

        ksort($chartData['data']);

        // Convert the chart data to the format expected by Chart.js
        $chartData['data'] = array_values($chartData['data']);

        return $chartData;
    }

    public function balanceManagement()
    {
        return view('payment/BalanceManagement');
    }
}
