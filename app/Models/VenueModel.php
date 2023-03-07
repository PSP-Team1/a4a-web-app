<?php

namespace App\Models;

use CodeIgniter\Model;

class VenueModel extends Model
{
    protected $table = 'company_venue';

    public function getVenues()
    {
        $session_id = session()->get('id');
        $db = db_connect();
        
        $sql = "
        SELECT * FROM company_venue 
        WHERE company_id = $session_id";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

}