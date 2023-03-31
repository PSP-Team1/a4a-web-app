<?php

namespace App\Controllers;

use App\Models\VenueSearchModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class VenueController extends BaseController
{

    public function index()
    {
        return view('Home');
    }


    public function search()
    {
        $searchModel = new VenueSearchModel();

        $tags = $this->request->getGet('tags');
        $searchTerm = $this->request->getGet('searchTerm');

        $venues = [];

        if ($tags || $searchTerm) {

            $searchTagRes = array();
            $searchTermRes = array();

            if ($tags) {
                $tagsArray = explode(',', $tags);
                $searchTagRes = $searchModel->searchTags($tagsArray);
            }

            // Filter the venues by search term
            if ($searchTerm) {
                $searchTermRes = $searchModel->filterVenuesBySearchTerm($searchTerm);
            }

            // Merge the two results and get unique company IDs
            $companyIds = array_unique(array_merge($searchTagRes, $searchTermRes));

            $venues = $searchModel->filterVenuesByCompanies($companyIds);
        } else {
            $venues = $searchModel->getAllCompanies();
        }



        $venue_ids = array();
        foreach ($venues as $venue) {
            $venue_ids[] = $venue->id;
        }

        $venue_ids_str = implode(',', $venue_ids);

        $venueMedia = $searchModel->getMedia($venue_ids_str);

        // create a dictionary of images keyed by venue ID
        $images_by_venue_id = array();
        foreach ($venueMedia as $mediaItem) {
            $venue_id = $mediaItem['venue_id'];
            $image = array(
                'url' => $mediaItem['path'],
                'summary' => $mediaItem['media_type']
            );
            if (!isset($images_by_venue_id[$venue_id])) {
                $images_by_venue_id[$venue_id] = array();
            }
            $images_by_venue_id[$venue_id][] = $image;
        }

        // add images to venue object
        foreach ($venues as &$venue) {
            $venue_id = $venue->id;
            $venue->images = isset($images_by_venue_id[$venue_id]) ? $images_by_venue_id[$venue_id] : array();
        }


        return $this->response->setContentType('application/json')->setBody(json_encode(['venues' => $venues]));
    }
}
