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

    public function viewVenue($id)
    {
        $model = new VenueModel();
        $data['venue'] = $model->getVenueById($id);
        return view('ViewVenue', $data);
    }

    public function updateVenueDetails()
    {
        $venueId = $this->request->getPost('id');
        $venueName = $this->request->getPost('venueName');
        $venueAddress = $this->request->getPost('venueAddress');
        $venuePostcode = $this->request->getPost('venuePostcode');
        $venueDescription = $this->request->getPost('venueDescription');

        $venueModel = new VenueModel();
        $venueModel->updateVenue($venueId, $venueName, $venueAddress, $venuePostcode, $venueDescription);

        return redirect()->to('CustomerDashboard');

    }
}