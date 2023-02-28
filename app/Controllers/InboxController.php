<?php

namespace App\Controllers;

class InboxController extends BaseController
{
    public function index()
    {
        return view('clientInbox');
    }
}