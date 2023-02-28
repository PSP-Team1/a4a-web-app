<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{

    function getCompanies(){
        $db = db_connect();
        
        $sql = "select * from b_customers;";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }


    function getCustomers(){
        $db = db_connect();
        
        $sql = "
        SELECT * FROM company c 
        LEFT JOIN sys_users su ON su.company_id = c.id";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

}