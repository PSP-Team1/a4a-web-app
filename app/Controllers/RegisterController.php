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
            return redirect()->to('/RegisterSuccess');
        }
    }

    public function registerAuthAdmin()
    {
        print_r($_POST);
        $registerModel = new RegisterModel();
        $registerModel->addNewCompany();
        if ($registerModel) {
            return redirect()->to('/AdminDashboard');
        }
    }

    public function Logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }


    public function reg_post()
    {
        // print_r($_POST);
        $registerModel = new RegisterModel();
        return $registerModel->addNewCompany();

    }

}