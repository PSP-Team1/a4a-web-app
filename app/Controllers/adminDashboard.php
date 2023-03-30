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

    public function test()
    {

        $clientDashModel = new AuditModel();
        $payload = $clientDashModel->getCompaniesNew();
        return $this->response->setJSON($payload);
    }
}
