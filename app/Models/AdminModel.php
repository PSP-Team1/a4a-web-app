<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class AdminModel extends Model{
    
    public function getRecentCustomers()
    {
        $pastWeek = date('Y-m-d', strtotime('-1 week'));
        return $this->db->table('company')->where('date_created >', $pastWeek)->get()->getResult();
    }

    public function getAllCustomers()
    {
        return $this->db->table('company')->get()->getResult();
    }  

    public function getRecentVenues()
    {
        $pastWeek = date('Y-m-d', strtotime('-1 week'));
        return $this->db->table('company_venue')->where('date_created >', $pastWeek)->get()->getResult();
    }
    
    public function getAllVenues()
    {
        return $this->db->table('company_venue')->get()->getResult();
    }   
    
    public function getRevenueTrends()
    {
        $query = $this->db->query("
        SELECT 
        DATE_FORMAT(created_at, '%Y-%m') AS month,
        SUM(payment_amount) AS total_payment_amount
        FROM 
            credit_transactions
        WHERE 
            created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
        GROUP BY 
            DATE_FORMAT(created_at, '%Y-%m')
        ORDER BY 
            DATE_FORMAT(created_at, '%Y-%m');");
        return $query->getResult('array');
    }
    

    public function updateUser($id, $name, $email) {

        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
        $db = db_connect();
        $query = "UPDATE sys_users SET name=?, email=? WHERE id=?";
        $result = $db->query($query, [$name, $email, $id]);
    
        if (!$result) {
            $error = $db->error();
            throw new \Exception('Database error: ' . $error['message']);
        }
    
        $query = "SELECT id, name, email FROM sys_users WHERE id=?";
        $result = $db->query($query, [$id]);
    
        if (!$result) {
            $error = $db->error();
            throw new \Exception('Database error: ' . $error['message']);
        }
    
        $user = $result->getRow();
    
        $db->close();

        $session = session();
        $session->set('id', $user->id);
        $session->set('name', $user->name);
        $session->set('email', $user->email);
    }

    public function updatePassword($id, $newPassword) {

        $db = db_connect();
        $query = "UPDATE sys_users SET password=? WHERE id=?";
        $result = $db->query($query, [$newPassword, $id]);
    
        $db->close();
    }

    public function updatePicture($id, $imageName) {

        $db = db_connect();
        $query = "UPDATE sys_users SET avatar=? WHERE id=?";
        $result = $db->query($query, [$imageName, $id]);
    
        $query = "SELECT avatar FROM sys_users WHERE id=?";
        $result = $db->query($query, [$id]);
    
        if (!$result) {
            $error = $db->error();
            throw new \Exception('Database error: ' . $error['message']);
        }
    
        $user = $result->getRow();

        $db->close();

        $session = session();
        $session->set('avatar', $user->avatar);

    }

    public function addAdminUser($email, $password) {
        $db = db_connect();
        $ct = 'client';

        //Generate a random avatar for the user
        $avatar_url = "https://avatars.dicebear.com/api/avataaars/{$email}.svg";
        $avatar_data = file_get_contents($avatar_url);
        $avatar_directory = "assets/img/avatars/{$email}.svg";
        $avatar_filename = "{$email}.svg";
        file_put_contents($avatar_directory, $avatar_data);
    
        $query = "INSERT INTO sys_users (email, password, company_type, avatar) VALUES (?, ?, ?, ?)";
        $db->query($query, [$email, $password, $ct, $avatar_filename]);
        $db->close();
        return redirect()->to('/Settings');
    }

    public function deleteUser($id) {
        $db = db_connect();

        $sql = "DELETE FROM sys_users 
        WHERE id ='$id'";

        $results = $db->query($sql);
    }
}