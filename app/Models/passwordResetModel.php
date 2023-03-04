<?php

namespace App\Models;

use CodeIgniter\Model;

class PasswordResetModel extends Model
{

    function resetPass()
    {
        $email = $_POST['email'];
        $oldpass = $_POST['oldpassword'];
        $newpass = $_POST['newpassword'];

        $db = db_connect();

        $sql = "UPDATE company 
        SET password = '$newpass'
        WHERE password = '$oldpass' AND email = '$email'";

        $results = $db->query($sql);
        return $results;
    }
}

