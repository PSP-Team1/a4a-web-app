<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ActivityLogModel;


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

    public function getVenueIdHomepage($id)
    {
        $db = db_connect();

        $sql = "select * from company_venue
        where id = $id";

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

        // Close database connection

        // Log event
        $action = 'VEN_CREATE';
        $ref = $db->insertID();
        $this->logActivity($action, $ref, $venueName);
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

    public function updateOpeningHours($venueId, $openingHours)
    {
        $db = db_connect();

        $openingHours = json_encode($openingHours);

        $query = "UPDATE company_venue SET opening_hours=? WHERE id=?";
        $db->query($query, [$openingHours, $venueId]);
        $db->close();
    }

    public function updateAccessibility($venueId, $accessibilityTypes)
    {
        try {
            $tagsArray = json_decode($accessibilityTypes);

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
        
        $db = db_connect();
        $query = "UPDATE company_venue SET accessibility=? WHERE id=?";
        $db->query($query, [$tags, $venueId]);
        $db->close();
    }

    public function updateImages(int $id, array $imageNames)
    {
        $db = db_connect();
        $db->transStart();

        $data = [
            'images' => implode(',', $imageNames),
        ];
        $db->table('company_venue')->where('id', $id)->update($data);

        $db->transComplete();

        if ($db->transStatus() === false) {
            throw new \Exception('Failed to update images');
        }

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

    public function getDefaultTags()
    {
        $db = db_connect();
        $sql = "SELECT * FROM venue_tags_default";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

    public function deleteVenue($venueId)
    {
        $db = db_connect();
        $sql = "DELETE FROM company_venue WHERE id = $venueId";
        $db->query($sql);
        return true;
    }

    // activity logger

    public function logActivity($action, $ref, $details)
    {
        $logModel = new ActivityLogModel(); // import the ActivityLogModel and instantiate it
        $userId = session()->get('id'); // retrieve the user id from session
        if (isset($userId)) {
            $logModel->actLogger($userId, $action, $ref, $details); // call the actLogger method on the $logModel object
        }
    }
}
