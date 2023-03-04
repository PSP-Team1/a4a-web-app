<?php

namespace App\Controllers;

use App\Models\AuditModel;


class AuditController extends BaseController
{
    public function index()
    {

        $am = new AuditModel();

        $data['audit_data'] = $am->getAudits();



        // print_r($data);
        return view('AuditView', $data);
    }




    public function addReviewComment()
    {
        $session = session();
        $am = new AuditModel();

        // Payload contains comment and response id
        $payload = $this->request->getVar('data');
        $payload['userId'] = $session->get('id');
        $payload['name'] = $session->get('name');
        $payload['avatar_url'] = base_url() . $session->get('avatar');
        $payload['success'] = $am->addReviewComment($payload);

        // Enriched payload returned, for quickness
        return $this->response->setJSON($payload);
    }


    public function getQuestions()
    {
        $am = new AuditModel();

        echo json_encode($am->getQuestions(21), JSON_PRETTY_PRINT);

    }


    public function addResponse()
    {
        $model = new AuditModel();
    
        if ($this->request->getMethod() === 'post') {
            // Retrieve the form data
            $data = [
                'id' => $this->request->getVar('id'),
                'response' => intval($this->request->getVar('response')),
                'notes' => $this->request->getVar('notes'),
            ];
    
            $res = $model->updateResponse($data);

            if ($res['success_status']) {
                return $this->response->setJSON(['success' => true, 'message' => 'Response added successfully.', 'percent'=> $res['percent']]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Error updating database.','details'=>json_encode($data,true)]);
            }
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request method.']);
        }
    }
    
    public function mediaUpload()
    {
        $uploadedFiles = $this->request->getFiles();
        $filenames = [];
        $errors = [];
    
        foreach ($uploadedFiles['images'] as $file)
        {
            if ($file->isValid() && ! $file->hasMoved())
            {
                $newName = $file->getRandomName();
                $file->move('./uploads', $newName);
                $filenames[] = $newName;
            }
            else
            {
                $errors[] = $file->getErrorString();
            }
        }
    
        return $this->response->setJSON([
            'success' => true,
            'filenames' => $filenames,
            'errors' => $errors,
        ]);
    }

    

    public function openAudit($i){

        $am = new AuditModel();
        $data['summary'] = $am->getAuditSummary($i);
        $data['question_data'] = $am->getQuestions($i);
        $data['audit_id'] = $i;
        return view('ViewAudit', $data);
    }

    
    public function auditViewDataTest(){

        $model = new AuditModel();
        $data['question_data'] = $model->getQuestions(21);

        echo json_encode($data,JSON_PRETTY_PRINT);
    }
    
}