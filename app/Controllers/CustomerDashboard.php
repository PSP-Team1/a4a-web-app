<?php

namespace App\Controllers;

use App\Models\VenueModel;
use App\Models\VenueSearchModel;
use App\Models\AuditModel;
use App\Models\ActivityLogModel;



class CustomerDashboard extends BaseController
{
    public function index()
    {
        $venueModel = new VenueModel();
        $actModel = new ActivityLogModel();
        $audMdel = new AuditModel();

        $data['venues'] = $venueModel->getVenues();
        $data['activity'] = $actModel->getActivity();
        $data['venue_audits'] = $audMdel->getVenueAuditStatusByCompany();

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

    public function deleteVenue($venueId)
    {
        $venueModel = new VenueModel();
        $venueModel->deleteVenue($venueId);

        return redirect()->to(base_url('CustomerDashboard'));
    }


    public function newVenue()
    {
        return view('CustomerNewVenue');
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

        return redirect()->to('CustomerDashboard/ViewVenue/' . $venueId . '?tab=1');
    }

    public function updateOpeningHours()
    {
        $venueId = $this->request->getPost('id');
        $openingHours = [
            'monday' => [
                'opening_hours' => $this->request->getPost('monday-opening-hours'),
                'ampm_opening' => $this->request->getPost('monday-ampm-opening'),
                'closing_hours' => $this->request->getPost('monday-closing-hours'),
                'ampm_closing' => $this->request->getPost('monday-ampm-closing'),
                'closed' => $this->request->getPost('monday-openclosed'),
            ],
            'tuesday' => [
                'opening_hours' => $this->request->getPost('tuesday-opening-hours'),
                'ampm_opening' => $this->request->getPost('tuesday-ampm-opening'),
                'closing_hours' => $this->request->getPost('tuesday-closing-hours'),
                'ampm_closing' => $this->request->getPost('tuesday-ampm-closing'),
                'closed' => $this->request->getPost('tuesday-openclosed'),
            ],
            'wednesday' => [
                'opening_hours' => $this->request->getPost('wednesday-opening-hours'),
                'ampm_opening' => $this->request->getPost('wednesday-ampm-opening'),
                'closing_hours' => $this->request->getPost('wednesday-closing-hours'),
                'ampm_closing' => $this->request->getPost('wednesday-ampm-closing'),
                'closed' => $this->request->getPost('wednesday-openclosed'),
            ],
            'thursday' => [
                'opening_hours' => $this->request->getPost('thursday-opening-hours'),
                'ampm_opening' => $this->request->getPost('thursday-ampm-opening'),
                'closing_hours' => $this->request->getPost('thursday-closing-hours'),
                'ampm_closing' => $this->request->getPost('thursday-ampm-closing'),
                'closed' => $this->request->getPost('thursday-openclosed'),
            ],
            'friday' => [
                'opening_hours' => $this->request->getPost('friday-opening-hours'),
                'ampm_opening' => $this->request->getPost('friday-ampm-opening'),
                'closing_hours' => $this->request->getPost('friday-closing-hours'),
                'ampm_closing' => $this->request->getPost('friday-ampm-closing'),
                'closed' => $this->request->getPost('friday-openclosed'),
            ],
            'saturday' => [
                'opening_hours' => $this->request->getPost('saturday-opening-hours'),
                'ampm_opening' => $this->request->getPost('saturday-ampm-opening'),
                'closing_hours' => $this->request->getPost('saturday-closing-hours'),
                'ampm_closing' => $this->request->getPost('saturday-ampm-closing'),
                'closed' => $this->request->getPost('saturday-openclosed'),
            ],
            'sunday' => [
                'opening_hours' => $this->request->getPost('sunday-opening-hours'),
                'ampm_opening' => $this->request->getPost('sunday-ampm-opening'),
                'closing_hours' => $this->request->getPost('sunday-closing-hours'),
                'ampm_closing' => $this->request->getPost('sunday-ampm-closing'),
                'closed' => $this->request->getPost('sunday-openclosed'),
            ]
        ];


        $venueModel = new VenueModel();
        $venueModel->updateOpeningHours($venueId, $openingHours);

        return redirect()->to('CustomerDashboard/ViewVenue/' . $venueId . '?tab=2');
    }

    public function updateAccessibility()
    {
        $venueId = $this->request->getPost('id');
        $venueAccessibility = $this->request->getPost('accessibilityTypes');

        $venueModel = new VenueModel();
        $venueModel->updateAccessibility($venueId, $venueAccessibility);

        return redirect()->to('CustomerDashboard/ViewVenue/' . $venueId . '?tab=3');
    }

    public function updateImages()
    {
        $venueId = $this->request->getPost('id');
        $files = $this->request->getFiles();

        $images = [];

        foreach ($files['imageUpload'] as $file) {
            if ($file->isValid() && $file->getSize() > 0) {
                $newName = $file->getRandomName();
                $file->move('assets/img/venue_images', $newName);
                $images[] = $newName;
            }
        }

        $id = $this->request->getPost('id');

        $venueModel = new VenueModel();
        $venueModel->updateImages($id, $images);

        return redirect()->to('CustomerDashboard/ViewVenue/' . $venueId . '?tab=4');
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
    public function viewVenue($id)
    {
        $model = new VenueModel();
        $am = new AuditModel();
        $vsm = new VenueSearchModel();
        $venue = $model->getVenueById($id);
        $tags = $model->getDefaultTags();

        $data['venue'] = $venue;
        $data['tags'] = $tags;
        $data['audit_data'] = $am->getAudits();
        $data['audit_templates'] = $am->getAvailableTemplates();
        $data['venue_images'] = $vsm->getMedia($id);

        return view('ViewVenue', $data);
    }
}
