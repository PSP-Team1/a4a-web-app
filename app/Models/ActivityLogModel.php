<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_log';
    protected $allowedFields = ['user_id', 'action'];

    public function actLogger($user_id, $action, $ref)
    {
        $this->insert([
            'user_id' => $user_id,
            'action' => $action,
            'ref_id' => $ref
        ]);
    }

    public function getActivity()
    {

        $type = session()->get('type');
        $id = session()->get('company_id');

        $sql = "select 
            su.name,
            su.avatar,
            al.action,
            al.ref_id,
            al.meta,
            al.date_created,
            su.company_type
            from activity_log al
            
            left join sys_users su on su.id = al.user_id";

        $filter = ($type != 'client') ? ' where company_id = ' . $id : '';
        $filter .= ' order by al.date_created desc limit 20';
        $sql .= $filter;

        $query = $this->db->query($sql);
        return $query->getResult('array');
    }
}
