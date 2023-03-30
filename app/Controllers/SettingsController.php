<?php

namespace App\Controllers;
use App\Models\AdminModel;

class SettingsController extends BaseController
{
    
    public function index()
    {
        return view('Settings');
    }

    public function changeDetails()
    {
        return view('ChangeDetails');
    }

    public function changePicture()
    {
        return view('ChangePicture');
    }

    public function updatePassword()
    {
        return view('UpdatePassword');
    }

    public function updateDetails()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        $adminModel = new AdminModel();
        $adminModel->updateUser($id, $name, $email);

        return redirect()->to('Settings');

    }
    public function updatePicture()
    {
        $file = $this->request->getFile('picture');

        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Error uploading file');
        }

        $newName = $file->getRandomName();
        $file->move('assets/img/avatars', $newName);

        $id = $this->request->getPost('id');

        $adminModel = new AdminModel();
        $adminModel->updatePicture($id, $newName);

        return redirect()->to(base_url('Settings'))->with('success', 'Picture updated successfully');

    }
    public function changePassword()
     {
        $id = $this->request->getPost('id');
        $newPassword = $this->request->getPost('newPassword');
        $confirmPassword = $this->request->getPost('confirmPassword');

        $adminModel = new AdminModel();
        $adminModel->updatePassword($id, $newPassword);

        return redirect()->to('Settings');
    }
}