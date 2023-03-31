<?php

namespace App\Controllers;

use App\Models\VenueModel;
use App\Models\AuditModel;

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
        $auditModel = new AuditModel();
        $data['venues'] = $venueModel->getVenueIdHomepage($venueId);
        $data['detailed_audit_links'] = $auditModel->getCompletedAuditsByVenue($venueId);
        return view('HomeViewVenue', $data);
    }
}
