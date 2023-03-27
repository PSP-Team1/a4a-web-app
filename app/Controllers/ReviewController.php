<?php
namespace App\Controllers;



class ReviewController extends BaseController {

    public function index()
    {
        return view('ReviewView');
    }
}