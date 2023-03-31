<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function adminDeleteAccount()
    {
        $session = session();
        $id = $session->get('id');
        $db = db_connect();

        $sql = "DELETE FROM sys_users 
        WHERE id ='$id'";

        $results = $db->query($sql);

        $session->destroy();
        return redirect()->to('/Login');
    }

    public function addAdminUser()
    {
        $session = session();
        $id = $session->get('id');
        $db = db_connect();

        $sql = "DELETE FROM sys_users 
        WHERE id ='$id'";

        $results = $db->query($sql);

        $session->destroy();
        return redirect()->to('/Login');
    }

}