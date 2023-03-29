<?php

namespace App\Models;

use CodeIgniter\Model;

class PromoCodesModel extends Model
{
    protected $table = 'promo_codes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'code', 'promo_name', 'start', 'end'];

    public function getPromoCodes()
    {
        $db = db_connect();
        $query = $this->db->query("
            SELECT promo_codes.*, products.product_name 
            FROM promo_codes 
            JOIN products ON promo_codes.product_id = products.id
        ");
        $db->close();
        return $query->getResult('array');
    }
}
