<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController
{
    public function deleteAccount()
    {
        $session = session();
        $id = $session->get('id');

        $adminModel = new AdminModel();
        $adminModel->deleteUser($id);
        return redirect()->to('/Login');
    }

    public function addAdminUser()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $adminModel = new AdminModel();
        $adminModel->addAdminUser($email, $password);
        return redirect()->to('/Settings');
    }

}