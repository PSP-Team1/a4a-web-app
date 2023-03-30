<?php

namespace App\Controllers;

use App\Models\AuditModel;
use App\Models\DashboardModel;
use App\Models\CompanyModel;
use App\Models\VenueModel;
use App\Models\AdminModel;


class AdminDashboard extends BaseController
{

    public function index()
    {
        $clientDashModel = new AuditModel();
        $adminModel = new AdminModel();
        $data['companies'] = $clientDashModel->getCompaniesNew();
        $data['customersWeek'] = $adminModel->getRecentCustomers();
        $data['customersAllTime'] = $adminModel->getAllCustomers();
        $data['venueWeek'] = $adminModel->getRecentVenues();
        $data['venueAllTime'] = $adminModel->getAllVenues();
        $data['revenues'] = $adminModel->getRevenueTrends();
        return view('AdminDashboard', $data);
    }

    public function viewCompany($id)
    {
        $model = new CompanyModel();
        $data['company'] = $model->getCompanyById($id);

        $venueModel = new VenueModel();
        $data['venues'] = $venueModel->getVenuesById($id);

        return view('ViewCompany', $data);
    }

    public function deleteCompany($id)
    {
        $model = new CompanyModel();
        $model->deleteCompany($id);

        $clientDashModel = new AuditModel();
        $adminModel = new AdminModel();
        $data['companies'] = $clientDashModel->getCompaniesNew();
        $data['customersWeek'] = $adminModel->getRecentCustomers();
        $data['customersAllTime'] = $adminModel->getAllCustomers();
        $data['venueWeek'] = $adminModel->getRecentVenues();
        $data['venueAllTime'] = $adminModel->getAllVenues();
        $data['revenues'] = $adminModel->getRevenueTrends();
        return view('AdminDashboard', $data);
    }

    public function viewVenue($id)
    {
        $model = new VenueModel();
        $am = new AuditModel();
        $venue = $model->getVenueById($id);
        $tags = $model->getDefaultTags();

        $data['venue'] = $venue;
        $data['tags'] = $tags;
        $data['audit_data'] = $am->getAudits();
        $data['audit_templates'] = $am->getAvailableTemplates();

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

        return redirect()->to('AdminDashboard/ViewVenue/' . $venueId . '?tab=1');
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

        return redirect()->to('AdminDashboard/ViewVenue/' . $venueId . '?tab=2');
    }

    public function updateAccessibility()
    {
        $venueId = $this->request->getPost('id');
        $accessibilityInfo = $this->request->getPost('other-accessibility-info');

        $venueModel = new VenueModel();
        $venueModel->updateAccessibility($venueId, $accessibilityInfo);

        return redirect()->to('AdminDashboard/ViewVenue/' . $venueId . '?tab=3');
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

        return redirect()->to('AdminDashboard/ViewVenue/' . $venueId . '?tab=4');
    }

    public function test()
    {

        $clientDashModel = new AuditModel();
        $payload = $clientDashModel->getCompaniesNew();
        return $this->response->setJSON($payload);
    }
}
