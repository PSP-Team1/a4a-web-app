<?php

namespace App\Controllers;

use App\Models\AuditModel;
use App\Models\DashboardModel;
use App\Models\CompanyModel;


class AdminDashboard extends BaseController
{

    public function index()
    {
        $clientDashModel = new AuditModel();
        $data['companies'] = $clientDashModel->getCompanies();
        return view('AdminDashboard', $data);
    }


    public function test()
    {

        $dm = new DashboardModel();

        $data['b_cust'] = $dm->getCustomers();
        
        return view('AdminDashboard', $data);
    }


    // VIew company info

    public function viewCompany($id)
    {

        $model = new CompanyModel();
        $data['company'] = $model->getCompanyById($id);
        return view('ViewCompany', $data);
    }

}