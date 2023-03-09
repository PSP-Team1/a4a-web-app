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

    public function insertVenue()
    {
        $session_id = session()->get('id');
        $venueName = $_POST['venueName'];
        $venueAddress = $_POST['venueAddress'];
        $venuePostcode = $_POST['venuePostcode'];

        $db = db_connect();
        $query = "INSERT INTO company_venue (company_id, venue_name, address, postcode) values (?, ?, ?, ?)";
        $db->query($query, [$session_id, $venueName, $venueAddress, $venuePostcode]);
        $db->close();
    }

}