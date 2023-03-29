<?php

namespace App\Controllers;

use App\Models\VenueSearchModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class VenueController extends BaseController
{

    public function index()
    {
        return view('Home');
    }


    public function search()
    {
        $searchModel = new VenueSearchModel();

        $tags = $this->request->getGet('tags');
        $searchTerm = $this->request->getGet('searchTerm');


        $venues = [];

        if ($tags || $searchTerm) {

            $searchTagRes = array();
            $searchTermRes = array();

            if ($tags) {
                $tagsArray = explode(',', $tags);
                $searchTagRes = $searchModel->searchTags($tagsArray);
            }

            // Filter the venues by search term
            if ($searchTerm) {
                $searchTermRes = $searchModel->filterVenuesBySearchTerm($searchTerm);
            }

            // Merge the two results and get unique company IDs
            $companyIds = array_unique(array_merge($searchTagRes, $searchTermRes));

            $venues = $searchModel->filterVenuesByCompanies($companyIds);
        } else {
            $venues = $searchModel->getAllCompanies();
        }


        return $this->response->setContentType('application/json')->setBody(json_encode(['venues' => $venues]));
    }
}
