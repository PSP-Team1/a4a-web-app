<?php

namespace App\Controllers;

use App\Models\AuditModel;
use App\Models\DashboardModel;
use App\Models\CompanyModel;


class ClientDashboard extends BaseController
{

    public function index()
    {
        $clientDashModel = new AuditModel();
        $data['companies'] = $clientDashModel->getCompanies();
        return view('ClientDash', $data);
    }


    public function test()
    {

        $dm = new DashboardModel();

        $data['b_cust'] = $dm->getCustomers();
        
        return view('ClientDash', $data);
    }


    // VIew company info

    public function viewCompany($id)
    {

        $model = new CompanyModel();
        $data['company'] = $model->getCompanyById($id);
        return view('viewCompany', $data);
    }

}