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

    // Assign a unique identifier to the new venue
    $newVenueId = $venueModel->getInsertID();
    $QRCode = uniqid();
    $venueModel->updateVenue($newVenueId, null, null, null, null, null, $QRCode);

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
        $venueTags = $this->request->getPost('tags');

        $venueModel = new VenueModel();
        $venueModel->updateVenue($venueId, $venueName, $venueAddress, $venuePostcode, $venueDescription, $venueTags);

        return redirect()->to('CustomerDashboard');
    }

    public function publishVenue()
    {
        $venueId = $this->request->getPost('id');
        $model = new VenueModel();
        $model->publishVenue($venueId);
        return redirect()->to('CustomerDashboard?published=true');
    }

    public function unpublishVenue()
    {
        $venueId = $this->request->getPost('id');
        $model = new VenueModel();
        $model->unpublishVenue($venueId);
        return redirect()->to('CustomerDashboard?unpublished=true');
    }
}
