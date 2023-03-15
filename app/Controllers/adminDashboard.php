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
        $data['companies'] = $clientDashModel->getCompanies();
        return view('AdminDashboard', $data);
    }

    public function viewCompany($id)
    {
        $model = new CompanyModel();
        $data['company'] = $model->getCompanyById($id);

        $venueModel = new VenueModel();
        $data['venues'] = $venueModel->getVenues();

        return view('ViewCompany', $data);
    }

}