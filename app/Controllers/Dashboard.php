<?php

namespace App\Controllers;

use App\Models\DashboardModel;


class Dashboard extends BaseController
{
    public function index()
    {

        $appModel = new DashboardModel();
        $data['companies'] = $appModel->getCompanies();

        return view('Dashboard', $data);
    }
}