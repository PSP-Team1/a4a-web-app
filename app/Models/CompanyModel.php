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

    public function getVenues()
    {
        $session_id = session()->get('id');

        $db = db_connect();
        
        $query = $db->table('company_venue')
                    ->where('company_id', $session_id)
                    ->get();

        return $query->getResult();

    }

    public function deleteCompany($id)
    {
        $db = db_connect();
        
        $db->table('company')
            ->where('id', $id)
            ->delete();
    
        return true;
    }
    
}