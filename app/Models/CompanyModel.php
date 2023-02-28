<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model
{
    protected $table = 'company';

    public function getCompanyById($id)
    {
        return $this->asArray()
                    ->where(['id' => $id])
                    ->first();
    }
}