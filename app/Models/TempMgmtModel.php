<?php

namespace App\Models;

use CodeIgniter\Model;

class TempMgmtModel extends Model
{
    protected $table      = 'audit_questions';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'question', 'category', 'template_id', 'display_order'];

    public function getAuditQuestions($template_id)
    {
        $builder = $this->db->table('audit_questions');
        $builder->select('id, question, category, template_id, display_order');
        $builder->where('template_id', $template_id);
        $query = $builder->get();
        return $query->getResult();
    }

    public function getAllAuditTemplates()
    {
        $builder = $this->db->table('audit_template');
        $query = $builder->get();
        return $query->getResult();
    }

    public function checkTemplateName($templateName)
    {
        $builder = $this->db->table('audit_template');
        $builder->select('*');
        $builder->where('audit_version', $templateName);
        $query = $builder->get();
        return $query->getResult();
    }

    public function insertAuditTemplate($audit_version, $auditor, $publisher, $legislation_version)
    {
        $data = [
            'audit_version' => $audit_version,
            'auditor' => $auditor,
            'published_status' => '',
            'legislation_version' => $legislation_version,
            'publisher' => $publisher
        ];

        $this->db->table('audit_template')->insert($data);
        return $this->db->insertID();
    }

    public function insertAuditQuestions($template_id, $questionData)
    {
        foreach ($questionData as $data) {
            $data['template_id'] = $template_id;
            $this->db->table('audit_questions')->insert($data);
        }
    }
}
