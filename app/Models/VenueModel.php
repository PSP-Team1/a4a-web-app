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

        $sql = "select cv.* from sys_users su 
        join company_venue cv on cv.company_id = su.company_id
       
       where su.id = $session_id";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

    public function insertVenue()
    {
        $session_id = session()->get('company_id');
        $venueName = $_POST['venueName'];
        $venueAddress = $_POST['venueAddress'];
        $venuePostcode = $_POST['venuePostcode'];

        $db = db_connect();
        $query = "INSERT INTO company_venue (company_id, venue_name, address, postcode) values (?, ?, ?, ?)";
        $db->query($query, [$session_id, $venueName, $venueAddress, $venuePostcode]);
        $db->close();
    }

    public function getVenueById($id)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }

    public function updateVenue($venueId, $venueName, $venueAddress, $venuePostcode, $venueDescription, $venueTags)
    {
        $db = db_connect();

        try {
            $tagsArray = json_decode($venueTags);

            if ($tagsArray !== null) {
                $tagValues = array();
                foreach ($tagsArray as $tagObject) {
                    if (isset($tagObject->value)) {
                        $tagValues[] = $tagObject->value;
                    }
                }
                $tags = implode(', ', $tagValues);
            } else {
                $tags = '';
            }
        } catch (Exception $e) {
            $tags = '';
        }

        $query = "UPDATE company_venue SET venue_name=?, address=?, postcode=?, about=?, tags=? WHERE id=?";
        $db->query($query, [$venueName, $venueAddress, $venuePostcode, $venueDescription, $tags, $venueId]);
        $db->close();
    }
}
