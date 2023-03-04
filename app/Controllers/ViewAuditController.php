<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class ViewAuditController extends Controller
{
    public function index()
    {
        echo view('ViewAudits');
    }
}
