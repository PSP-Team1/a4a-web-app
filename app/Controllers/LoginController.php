<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        $session = session();
        helper(['form']);
        echo view('login');
    }

    public function forgotPassword()
    {
        $session = session();
        helper(['form']);
        echo view('forgotPassword');
    }

    public function forgotPasswordAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $emailData = $data['email'];
            $authenticateEmail = strcmp($email, $emailData);
            if (!$authenticateEmail) {
            } else {
                $session->setFlashdata('msg', 'That email doesn\'t exist.');
                return redirect()->to('/forgotPassword');
            }
        } else {
            $session->setFlashdata('msg', 'That email doesn\'t exist.');
            return redirect()->to('/forgotPassword');
        }
    }



    public function loginAuth()
    {

        print_r($this);
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = strcmp($password, $pass);
            // $authenticatePassword = password_verify($password, $pass);
            if (!$authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'role' => $data['role'],
                    'avatar' => $data['avatar'],
                    'type' => $data['company_type'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profileController');
            } else {
                $session->setFlashdata('msg', 'Invalid email or password.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Invalid email or password.');
            return redirect()->to('/login');
        }
    }

    public function Logout()
    {

        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
