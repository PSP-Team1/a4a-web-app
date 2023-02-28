<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class RegisterSuccessController extends Controller
{
    public function index()
    {
        echo view('registerSuccess');
    }
}
