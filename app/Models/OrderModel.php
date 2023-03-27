<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'credit_transactions';
    protected $allowedFields = ['company_id', 'amount', 'stripe_token', 'created_at'];

    public function insertOrder($company_id, $amount, $stripe_token)
    {
        $data = [
            'company_id' => $company_id,
            'amount' => $amount,
            'stripe_token' => $stripe_token,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->insert($data);
    }
}
