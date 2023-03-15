<?php

namespace App\Controllers;

use App\Models\AuditModel;
use CodeIgniter\API\ResponseTrait;

class Api extends BaseController
{
    use ResponseTrait;

    private $validApiKey = "karl12345";

    public function index()
    {
        $apiKey = $this->request->getHeader("API-Key");

        if ($apiKey !== null && $apiKey->getValue() === $this->validApiKey) {
            // API key valid, return positive resp
            $data = [
                "name" => "Karl",
                "email" => "karl@test.com"
            ];
            return $this->respond($data, 200);
        } else {
            $message = "Invalid API key";
            return $this->failUnauthorized($message);
        }
    }
}
