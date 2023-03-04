<?php

namespace App\Controllers;

class InboxController extends BaseController
{
    public function adminInbox()
    {
        return view('AdminInbox');
    }

    public function customerInbox()
    {
        return view('CustomerInbox');
    }
}