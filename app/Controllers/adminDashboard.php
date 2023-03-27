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

    public function test()
    {

        $clientDashModel = new AuditModel();
        $payload = $clientDashModel->getCompaniesNew();
        return $this->response->setJSON($payload);
    }
}
