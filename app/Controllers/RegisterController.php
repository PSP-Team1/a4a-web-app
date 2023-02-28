<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\RegisterModel;

class RegisterController extends Controller
{
    public function index()
    {
        $session = session();
        helper(['form']);
        echo view('register');
    }

    public function registerAuth()
    {
        // print_r($_POST);
        $registerModel = new RegisterModel();
        $registerModel->addNewCompany();
        if ($registerModel) {
            return redirect()->to('/registerSuccess');
        }
    }

    public function registerAuthAdmin()
    {
        print_r($_POST);
        $registerModel = new RegisterModel();
        $registerModel->addNewCompany();
        if ($registerModel) {
            return redirect()->to('/adminPortal');
        }
    }

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }


    public function reg_post()
    {
        // print_r($_POST);
        $registerModel = new RegisterModel();
        return $registerModel->addNewCompany();

    }

}