<?php

namespace App\Models;

use CodeIgniter\Model;

class ApiKeyModel extends Model
{
    protected $table = 'auth_keys';
    protected $allowedFields = ['company_id', 'text', 'exp', 'audit_id'];

    public function generateApiKey($auditId)
    {
        $exp = 365;
        $apiKey = bin2hex(random_bytes(16));

        $companyId = session()->get('company_id');
        $data = [
            'company_id' => $companyId,
            'text' => $apiKey,
            'exp' => $exp,
            'audit_id' => $auditId
        ];

        $this->insert($data);

        return $apiKey;
    }
}
