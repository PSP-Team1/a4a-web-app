<?php

namespace App\Controllers;

use App\Models\DashboardModel;


class Dashboard extends BaseController
{
    public function index()
    {

        // Redurect request
        if (session()->get('type') === 'client') {
            return redirect()->to('AdminDashboard');
        } else {
            return redirect()->to('CustomerDashboard');
        }
    }
}
