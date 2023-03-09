<?php

namespace App\Controllers;

use App\Models\VenueModel;


class CustomerDashboard extends BaseController
{
    public function index()
    {
        $venueModel = new VenueModel();
        $data['venues'] = $venueModel->getVenues();
        return view('CustomerDashboard', $data);
    }

    public function addNewVenue()
    {
        $venueModel = new VenueModel();
        $venueModel->insertVenue();

        return redirect()->to(base_url('CustomerDashboard'));
    }

    public function newVenue()
    {
        return view('CustomerNewVenue');
    }
}