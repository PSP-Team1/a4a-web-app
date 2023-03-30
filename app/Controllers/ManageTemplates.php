<?php

namespace App\Controllers;

use App\Models\TempMgmtModel;

class ManageTemplates extends BaseController
{
    public function index()
    {

        $model = new TempMgmtModel();
        $data['templates'] = $model->getTemplateUsage();
        return view('ManageTemplates', $data);
    }

    public function activate($id)
    {
        $model = new TempMgmtModel();
        $model->setStatus($id, 'published');
        return redirect()->to('/ManageTemplates');
    }

    public function deactivate($id)
    {
        $model = new TempMgmtModel();
        $model->setStatus($id, 'unpublished');
        return redirect()->to('/ManageTemplates');
    }
}
