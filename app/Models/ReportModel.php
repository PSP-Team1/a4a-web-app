<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    function getAudits()
    {
        $db = db_connect();

        $sql = "
        SELECT * from company_audit_response";
        $results = $db->query($sql)->getResult('array');
        return $results;
    }

    function getAuditSummary($id)
    {

        $db = db_connect();
        $sql = "
            SELECT 
                ca.id AS audit_id,
                atemp.auditor,
                atemp.audit_version,
                atemp.published_status,
                atemp.legislation_version,
                ca.company_id,
                count(car.response) AS audit_prog,
                count(car.id) AS audit_total
            FROM company_audit ca
            INNER JOIN company c ON
                ca.audit_template = c.id
            INNER JOIN audit_template atemp ON 
                ca.audit_template = atemp.id
            JOIN company_audit_response car ON 
                car.audit_id = ca.id
            WHERE audit_id = " . $id . "
            GROUP BY ca.id";
        $query = $db->query($sql);
        $result = $query->getFirstRow('array');
        return $result;
    }

    function getQuestions($id)
    {
        $db = db_connect();

        $sql = "
            SELECT 
            ca.id AS audit_id,
            atemp.audit_version,
            atemp.legislation_version,
            ca.company_id,
            aq.category,
            aq.question,
            car.id AS car_id,
            car.response,
            car.notes

            FROM company c
            inner JOIN company_audit ca ON
            ca.audit_template = c.id

            inner JOIN audit_template atemp ON 
            ca.audit_template = atemp.id
            JOIN company_audit_response car ON 
            car.audit_id = ca.id

            LEFT JOIN audit_questions aq ON aq.id = car.question_id

            WHERE ca.id = " . $id . " ;";

        $results = $db->query($sql)->getResult('array');

        $questionData = array();

        foreach ($results as $row) {

            $questionData[$row['category']][] = $row;
        }

        return $questionData;
    }
}