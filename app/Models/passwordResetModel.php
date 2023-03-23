<?php

namespace App\Models;
use CodeIgniter\Model;

class PasswordResetModel extends Model
{
    function insertHash($email, $passwordHash)
    {
        $db = db_connect();
        $query = "UPDATE sys_users SET password_hash=? WHERE email=?";
        $result = $db->query($query, [$passwordHash, $email]);
    
        $db->close();
    }

    public function getEmailFromHash($passwordHash)
    {
        $db = db_connect();
        $query = "SELECT email FROM sys_users WHERE password_hash=?";
        $result = $db->query($query, [$passwordHash])->getRow();
        $db->close();
        return $result ? $result->email : null;
    }
    
    public function checkHashExists($password_hash) {
        $db = db_connect();
    
        $query = "SELECT COUNT(*) as count FROM sys_users WHERE password_hash=?";
        $result = $db->query($query, [$password_hash]);
        $resultArray = $result->getResultArray();
        $count = $resultArray[0]['count'];
            
        return $count > 0;        
    }

    public function checkHash($email, $password_hash) {
        $db = db_connect();
    
        $query = "SELECT COUNT(*) as count FROM sys_users WHERE email=? AND password_hash=?";
        $result = $db->query($query, [$email, $password_hash]);
        $resultArray = $result->getResultArray();
        $count = $resultArray[0]['count'];
            
        return $count > 0;        
    }

    public function updatePassword($email, $newPassword) {

        $db = db_connect();
        $query = "UPDATE sys_users SET password=? WHERE email=?";
        $result = $db->query($query, [$newPassword, $email]);
    
        $db->close();
    }

    public function removeHash($email) {

        $db = db_connect();
        $query = "UPDATE sys_users SET password_hash=NULL WHERE email=?";
        $result = $db->query($query, [$email]);
    
        $db->close();
    }
    
}

