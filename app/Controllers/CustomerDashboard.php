<?php

namespace App\Controllers;

// use App\Models\DashboardModel;


class CustomerDashboard extends BaseController
{
    public function index()
    {

        // $appModel = new DashboardModel();
        // $data['companies'] = $appModel->getCompanies();

        return view('CustomerDashboard');
    }
}