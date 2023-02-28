<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\passwordResetModel;
use App\Models\deleteModel;
use App\Models\QuestionModel;


class adminController extends BaseController
{
    public function addUser()
    {
        return view('addUserAdmin');
    }

    public function pwordReset()
    {
        return view('passwordResetAdmin');
    }

    public function adminDeleteUser()
    {
        return view('adminDeleteUser');
    }

    public function adminDeleteAccount()
    {
        return view('adminDeleteAccount');
    }

    public function addQuestions()
    {
        return view('addQuestion');
    }

    public function deleteQuestions()
    {
        return view('deleteQuestion');
    }

    public function resetPassword()
    {
        print_r($_POST);
        $passwordM = new passwordResetModel();
        $passwordM->resetPass();
        if ($passwordM) {
            return redirect()->to('/adminPortal');
        }
    }

    public function deleteUser()
    {
        print_r($_POST);
        $deluser = new deleteModel();
        $deluser->deleteUser();
        if ($deluser) {
            return redirect()->to('/adminPortal');
        }
    }

    public function deleteAccount()
    {
        print_r($_POST);
        $delaccount = new deleteModel();
        $delaccount->deleteAccount();
        if ($delaccount) {
            return redirect()->to('/adminPortal');
        }
    }

    public function AddQuestion()
    {
        print_r($_POST);
        $addquestion = new QuestionModel();
        $addquestion->addquestion();
        if ($addquestion) {
            return redirect()->to('/adminPortal');
        }
    }

    public function DeleteQuestion()
    {
        print_r($_POST);
        $deletequestion = new QuestionModel();
        $deletequestion->deletequestion();
        if ($deletequestion) {
            return redirect()->to('/adminPortal');
        }
    }


}