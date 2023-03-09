<?php

namespace App\Controllers;

use App\Models\VenueSearchModel;
use CodeIgniter\Controller;

class VenueController extends Controller
{
    public function index()
    {
        return view('Home2');
    }

    public function search()
    {
        $model = new VenueSearchModel();
        $venues = $model->getAllVenues();

        return $this->response->setContentType('application/json')->setBody(json_encode(['venues' => $venues]));
    }
}
