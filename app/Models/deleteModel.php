<?php

namespace App\Models;

use CodeIgniter\Model;

class DeleteModel extends Model
{

    function deleteUser()
    {
        $email = $_POST['email'];

        $db = db_connect();

        $sql = "DELETE FROM sys_users 
        WHERE email ='$email'";

        $results = $db->query($sql);
        return $results;
    }

    function deleteAccount()
    {
        $email = $_POST['email'];

        $db = db_connect();

        $sql = "DELETE FROM company
        WHERE email = '$email'";

        $results = $db->query($sql);
        return $results;
    }
}