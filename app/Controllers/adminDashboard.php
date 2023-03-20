<?php

namespace App\Controllers;

use App\Models\AuditModel;
use App\Models\DashboardModel;
use App\Models\CompanyModel;
use App\Models\VenueModel;


class AdminDashboard extends BaseController
{

    public function index()
    {
        $clientDashModel = new AuditModel();
        $data['companies'] = $clientDashModel->getCompaniesNew();
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
