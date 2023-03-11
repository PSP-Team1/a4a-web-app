<?php

namespace App\Models;

use CodeIgniter\Model;

class VenueSearchModel extends Model
{
    protected $table = 'company_venue';

    public function searchTags(array $tags)
    {
        $query = $this->db->table('venue_tags')
            ->select('DISTINCT(venue_id)')
            ->whereIn('tag', $tags);

        $result = $query->get()->getResult();

        return array_column($result, 'venue_id');
    }


    public function filterVenuesBySearchTerm($searchTerm)
    {
        $query = $this->db->table('company_venue')
            ->select('DISTINCT(id)')
            ->like('about', $searchTerm)
            ->orWhere('venue_name', $searchTerm);

        $result = $query->get()->getResult();

        return array_column($result, 'id');
    }


    public function filterVenuesByCompanies($companies)
    {
        $query = $this->db->table('company_venue')
            ->whereIn('id', $companies);

        return $query->get()->getResult();
    }

    public function getAllCompanies()
    {
        $query = $this->db->table('company_venue')
            ->select('*')
            ->limit(50);

        return $query->get()->getResultArray();
    }
}
