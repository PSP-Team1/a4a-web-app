<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'price', 'description', 'units', 'date_created', 'live', 'visible'];


    public function createProduct($data)
    {
        $this->insert($data);
    }

    public function getAllProducts()
    {

        $db = db_connect();
        $query = $this->db->query("select * from products where visible = 1 order by date_created asc");

        $db->close();
        return $query->getResult('array');
    }



    public function setLive($id, $status)
    {
        $data = ['live' => $status];
        $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        // keep produxct but hide it from view
        $data = ['visible' => 0];
        $this->update($id, $data);
    }


    public function getPromoCodes()
    {

        $db = db_connect();
        $query = $this->db->query("select * from promo_codes");

        $db->close();
        return $query->getResult('array');
    }
}
