<?php

namespace App\Models;

use CodeIgniter\Model;

class VenueSearchModel extends Model
{
    public function getAllVenues()
    {
        $builder = $this->db->table('company_venue');
        $builder->select('venue_name, about');
        $query = $builder->get();
        return $query->getResult();
    }
}
