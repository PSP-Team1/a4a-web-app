<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AppraisalModel;

class ProfileController extends BaseController
{
    public function index()
    {
        // Used as routing mechanism, PM or eng still protected by authGuard
        $session = session();
        $role = $session->get('type');
        if ($role == "client") {
            return redirect()->to('/clientPortal');
        } elseif ($role == "customer") {
            return redirect()->to('/customerPortal');
        }
        elseif ($role == "admin") {
            return redirect()->to('/adminPortal');
        }
         else {
            // Don't know if this actually works, but shouldn't be needed
            return redirect()->to('/LoginController/Logout');
        }
    }
}
