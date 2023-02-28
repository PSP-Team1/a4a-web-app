<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{

    function addNewCompany()
    {
        $email = $_POST['email'];
        $username = $_POST['contact'];
        $password = $_POST['password'];
        $companyName = $_POST['companyName'];
        $companyNumber = $_POST['companyNumber'];
        $address = $_POST['address'];
        $tel = $_POST['phoneNumber'];

        $db = db_connect();
        $query = "INSERT INTO company (email, contact, tel, companyName, companyNumber, address) values (?, ?, ?, ?, ?, ?)";
        $db->query($query, [$email, $username, $tel, $companyName, $companyNumber, $address]);
        $cId = $db->insertID();
        $db->close();

        $userId = $this->registerNewUser($username, $password, $email, $cId);


        return($userId && $cId);
    }


    function registerNewUser($username, $password, $email, $id){

    
        $db = db_connect();
        $ct = 'customer';

        //Generate a random avatar for the user
        $avatar_url = "https://avatars.dicebear.com/api/avataaars/{$email}.svg";
        $avatar_data = file_get_contents($avatar_url);
        $avatar_directory = "assets/img/avatars/{$email}.svg";
        $avatar_filename = "{$email}.svg";
        file_put_contents($avatar_directory, $avatar_data);
    
        $query = "INSERT INTO sys_users (email, name, password, company_type, company_id, avatar) VALUES (?, ?, ?, ?, ?, ?)";
        $db->query($query, [$email, $username, $password, $ct, $id, $avatar_filename]);
    
        $insertId = $db->insertID();
        $db->close();
    
        return $insertId;
    }
    
}