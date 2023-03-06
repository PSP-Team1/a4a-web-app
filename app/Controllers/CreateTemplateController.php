<?php

namespace App\Controllers;

use App\Models\TempMgmtModel;

class CreateTemplateController extends BaseController
{
    public function index()
    {
        $model = new TempMgmtModel();
        $data['template_data'] = $model->getAllAuditTemplates();
        return view('AdminCreateTemplate', $data);
    }

    public function getQuestions($template_id)
    {
        $model = new TempMgmtModel();
        $data = $model->getAuditQuestions($template_id);
        $json = json_encode($data);
        return $this->response->setContentType('application/json')->setBody($json);
    }

    public function checkName()
    {
        $template_name = $this->request->getPost('template_name');
        $model = new TempMgmtModel();
        $templates = $model->getAllAuditTemplates();

        $valid = true;
        foreach ($templates as $template) {
            if ($template->audit_version === $template_name) {
                $valid = false;
                break;
            }
        }

        $result = [
            'valid' => $valid
        ];

        return $this->response->setContentType('application/json')->setBody(json_encode($result));
    }

    public function createAuditTemplate()
    {
        $data = $this->request->getJSON();

        // Create the audit template record
        $model = new TempMgmtModel();
        $templateData = [
            'audit_version' => $data->name,
            'auditor' => '',
            'published_status' => '',
            'legislation_version' => '',
            'publisher' => ''
        ];

        $templateId = $model->insertAuditTemplate($templateData['audit_version'], $templateData['auditor'], $templateData['publisher'], $templateData['legislation_version']);

        // Create the audit questions records
        foreach ($data->questions as $question) {
            $questionData = [
                'question' => $question->question,
                'category' => $question->category,
                'template_id' => $templateId
            ];
            $model->insertAuditQuestions($questionData['template_id'], [$questionData]);
        }

        return $this->response->setContentType('application/json')->setBody(json_encode(['success' => true]));
    }
}
