<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\PasswordResetModel;
use CodeIgniter\Email\Email;


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

    public function forgotPasswordSuccess()
    {
        $session = session();
        helper(['form']);
        echo view('ForgotPasswordSuccess');
    }

    public function updatePasswordHash()
    {
        $session = session();
        helper(['form']);
        $model = new PasswordResetModel();
        $hash = $_GET['hash'];
        $checkHashExists = $model->checkHashExists($hash);
        if ($checkHashExists == 1) {
            echo view('UpdatePasswordHash');
        }
        else {
            echo view('UpdatePasswordHashError');
        }
    }

    public function resetPasswordWithHash()
    {
        $newPassword = $this->request->getPost('newPassword');
        $hash = $this->request->getPost('hash');
        $model = new PasswordResetModel();
        $email = $model->getEmailFromHash($hash);
        $checkPasswordHash = $model->checkHash($email, $hash);
        if ($checkPasswordHash == 1) {
            $model->updatePassword($email, $newPassword);
            $model->removeHash($email);
              
            $session = \Config\Services::session();
            $session->setFlashdata('success', 'Your password has been updated!');            
            return redirect()->to('/Login');
        }
        else {
            $session = \Config\Services::session();
            $session->setFlashdata('msg', 'Unable to reset password. Please try again.');
            return redirect()->to('/Login');
        }
    }
    

    public function forgotPasswordAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');

        $data = $userModel->where('email', $email)->first();
        $passwordHash = bin2hex(random_bytes(32));

        if ($data) {
            $emailData = $data['email'];
            $authenticateEmail = strcmp($email, $emailData);
            if (!$authenticateEmail) {		
                $to = $email;
                $subject = 'Access For All - Password Reset';
                $message = 'http://localhost:8080/UpdatePasswordHash?hash='.$passwordHash;
                
                $email = \Config\Services::email();
         
                $email->setTo($to);
                $email->setFrom('accessforallproject@gmail.com', 'Access For All');
                $email->setSubject($subject);
                $email->setMessage($message);
         
                if ($email->send()) {
                    $response = 'Email successfully sent';
                    $model = new PasswordResetModel();
                    $model->insertHash($to, $passwordHash);
                } 
                else 
                {
                    $data = $email->printDebugger(['headers']);
                    $response ='Email send failed';
                }
                return redirect()->to('/ForgotPasswordSuccess');
            } else {
                $session->setFlashdata('msg', 'That email doesn\'t exist.');
                return redirect()->to('/forgotPassword');
            }
        } else {
            $session->setFlashdata('msg', 'That email doesn\'t exist.');
            return redirect()->to('/ForgotPassword');
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
                    'company_id' => $data['company_id'],
                    'type' => $data['company_type'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/profileController');
            } else {
                $session->setFlashdata('msg', 'Invalid email or password.');
                return redirect()->to('/Login');
            }
        } else {
            $session->setFlashdata('msg', 'Invalid email or password.');
            return redirect()->to('/Login');
        }
    }

    public function Logout()
    {

        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }
}
