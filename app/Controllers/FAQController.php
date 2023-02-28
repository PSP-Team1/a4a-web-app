<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class FAQController extends BaseController {

    public function index()
    {
        return view('FAQ');
    }
}