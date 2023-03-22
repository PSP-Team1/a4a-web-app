<?php

namespace App\Controllers;

use App\Models\AuditModel;

class ReportController extends BaseController
{
    public function viewAuditReport($i)
    {
        $am = new AuditModel();
        $data['summary'] = $am->getAuditSummary($i);
        $data['question_data'] = $am->getQuestions($i);
        $data['audit_id'] = $i;
        return view('AuditReportView', $data);
    }
}