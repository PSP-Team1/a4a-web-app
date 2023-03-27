<?php

namespace App\Controllers;

use App\Models\ApiKeyModel;
use App\Models\AuditModel;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
    use ResponseTrait;


    public function index()
    {
        if (!$this->verifyKey()) {
            $message = "Invalid API key";
            return $this->failUnauthorized($message);
        } else {
            $companyId = 1; // Replace this with the actual company ID you want to use
            $auditModel = new AuditModel();
            $auditData = $auditModel->generateReport($companyId);

            $results = [];
            $temp = [];

            foreach ($auditData as $row) {
                if (!isset($temp[$row['category']])) {
                    $temp[$row['category']] = [
                        'questions' => []
                    ];
                }

                $temp[$row['category']]['questions'][] = [
                    'question' => $row['question'],
                    'response' => $row['response']
                ];

                $results = [
                    'audit_version' => $row['audit_version'],
                    'legislation_version' => $row['legislation_version'],
                    'company_id' => $row['company_id'],
                    'categories' => $temp
                ];
            }

            return $this->respond($results, 200);
        }
    }

    public function verifyKey()
    {
        $apiKey = $this->request->getHeader("API-Key");

        if ($apiKey !== null) {
            $apiKeyValue = $apiKey->getValue();
            $authKeyModel = new ApiKeyModel();
            $key = $authKeyModel->where('text', $apiKeyValue)->first();

            if ($key) {
                $dateCreated = new \DateTime($key['date_created']);
                $dateNow = new \DateTime();
                $dateInterval = $dateCreated->diff($dateNow);
                $daysSinceCreated = $dateInterval->days;

                if ($daysSinceCreated <= $key['exp']) {
                    // API key valid
                    return true;
                }
            }
        }

        return false;
    }

    public function serveEmbedScript()
    {
        $filePath = ROOTPATH . 'public/assets/js/embedReport.js';
        $fileContent = file_get_contents($filePath);

        return $this->response
            ->setContentType('application/javascript')
            ->setBody($fileContent);
    }


    public function options()
    {
        return $this->response->setHeader('Content-Type', 'application/json')->setStatusCode(200);
    }
}
