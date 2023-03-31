<?php

namespace App\Controllers;

use App\Models\VenueModel;

class Home extends BaseController
{

    public function index()
    {
        $session = session();
        $venueModel = new VenueModel();
        $data['user'] = $session->get('name');
        $data['image_links'] = $venueModel->getVenueImages();
        return view('home', $data);
    }

    public function viewVenueDetails($venueId)
    {
        $venueModel = new VenueModel();
        $data['venues'] = $venueModel->getVenueIdHomepage($venueId);
        return view('HomeViewVenue', $data);
    }
}
?>