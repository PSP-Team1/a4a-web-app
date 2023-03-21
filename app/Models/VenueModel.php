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

    public function getVenuesById($id)
    {
        $db = db_connect();

        $sql = "select * from company_venue
        where company_id = $id";
       
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

    public function getVenueById($id)
    {
        return $this->asArray()
            ->where(['id' => $id])
            ->first();
    }


    public function insertVenue()
{
    $session_id = session()->get('company_id');
    $venueName = $_POST['venueName'];
    $venueAddress = $_POST['venueAddress'];
    $venuePostcode = $_POST['venuePostcode'];

    // Connect to database
    $db = db_connect();
    
    // Insert venue information into database
    $query = "INSERT INTO company_venue (company_id, venue_name, address, postcode) values (?, ?, ?, ?)";
    $db->query($query, [$session_id, $venueName, $venueAddress, $venuePostcode]);
    
    // Get the ID of the inserted record
    $id = $db->insertID();
    
    // Generate QR code using Google Charts API (will be replaced by api)
     // Data to encode in QR code
     // Include ID and venue name at end of URL
     // Use urlencode to encode data for use in URL format
     $data = 'https://example.com?id=' . urlencode($id) . '&name=' . urlencode($venueName);
     
     // Size of QR code image and character encoding
     $size = '200x200';
     $encoding = 'UTF-8';

     // Construct URL for Google Charts API
     // Encode data in URL format using urlencode function
     $url = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=" . urlencode($data) . "&choe=$encoding";

     // Get image data from Google Charts API
     $QRCode = file_get_contents($url);

     // Update record with QR code data
     $query = "UPDATE company_venue SET QR_code=? WHERE id=?";
     $db->query($query, [$QRCode,$id]);
     
     // Close database connection
    $db->close();
}

    public function updateVenue($venueId, $venueName, $venueAddress, $venuePostcode, $venueDescription, $venueTags,)
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

    public function publishVenue($id)
    {
        $db = db_connect();

        $query = "UPDATE company_venue SET published=1 WHERE id=?";
        $db->query($query, [$id]);
        $db->close();
    }

    public function unpublishVenue($id)
    {
        $db = db_connect();

        $query = "UPDATE company_venue SET published=0 WHERE id=?";
        $db->query($query, [$id]);
        $db->close();
    }

    public function getQRCode($venueId)
{
    $db = db_connect();
    $query = "SELECT QR_code FROM company_venue WHERE id = ?";
    $result = $db->query($query, [$venueId])->getRowArray();
    $db->close();

    if ($result) {
        return $result['QR_code'];
    } else {
        return null;
    }
}
}
?>