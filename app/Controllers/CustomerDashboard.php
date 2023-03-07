<?php

namespace App\Controllers;

// use App\Models\DashboardModel;

use App\Models\VenueModel;


class CustomerDashboard extends BaseController
{
    public function index()
    {
        $venueModel = new VenueModel();
        $data['venues'] = $venueModel->getVenues();
        return view('CustomerDashboard', $data);
    }
}