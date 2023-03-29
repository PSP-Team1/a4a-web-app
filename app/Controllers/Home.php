<?php

namespace App\Controllers;

use App\Models\VenueModel;

class Home extends BaseController
{

    public function index()
    {
        $session = session();
        $data['user'] = $session->get('name');
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