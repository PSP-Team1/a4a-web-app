<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditModel extends Model
{

    protected $table = 'company';

    public function getCompanies()
    {
        return $this->findAll();
    }
    function getAudits()
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
            count(car.id) AS audit_total,
            ca.date_created
            FROM company_audit ca
            inner JOIN company c ON
            ca.audit_template = c.id
            inner JOIN audit_template atemp ON 
            ca.audit_template = atemp.id
            JOIN company_audit_response car ON 
            car.audit_id = ca.id
            GROUP BY ca.id";
        $results = $db->query($sql)->getResult('array');
        return $results;
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

            WHERE ca.id = " . $id . " order by category asc, response desc;";

        // XXX remove hardcoded query

        $results = $db->query($sql)->getResult('array');

        $questionData = array();

        foreach ($results as $row) {

            $questionData[$row['category']][] = $row;
        }

        return $questionData;
    }


    function updateResponse($data)
    {

        $db = db_connect();

        if (isset($data['id'])) {
            // If the ID is set, update the existing record
            $query = "UPDATE `company_audit_response` SET  `response` = ?,  `notes` = ? WHERE `id` = ?";
            $params = [$data['response'],  $data['notes'], $data['id']];
            $db->query($query, $params);
        }

        // Return true if the update or insert was successful, false otherwise
        $data['success_status'] =  $db->affectedRows() > 0;
        $data['percent'] = $this->getAudCompStatus($data['id']);
        return $data;
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


    // get percent value
    function getAudCompStatus($tid)
    {
        $db = db_connect();
        $sql = "
        SELECT COUNT(id) AS qCount, 
            COUNT(response) AS qComp 
            FROM company_audit_response 
            where audit_id = (SELECT audit_id FROM company_audit_response WHERE id = " . $tid . ")
            GROUP BY audit_id limit 1";

        $results = $db->query($sql)->getResult('array');

        $percent = 0;
        // Protect div zero
        if ($results) {
            $denom = $results[0]['qCount'];
            $percent = (intval($results[0]['qComp']) != 0) ? (100 / $denom) * intval($results[0]['qComp']) : 0;
        }
        return $percent;
    }


    public function getLatestCompleteAudit($companyId)
    {
        //Get latest audit. Should be in complete state
        $sql = "SELECT ca.id AS audit_id FROM company_audit ca
        LEFT JOIN audit_template atemp ON atemp.id = ca.audit_template
        WHERE company_id = ?
        AND audit_status = 'Complete'
        ORDER BY ca.date_created DESC
        LIMIT 1";

        $query = $this->db->query($sql, [$companyId]);

        $result = $query->getRow();
        return $result !== null ? intval($result->audit_id) : null;
    }



    public function setAuditComplete($auditId)
    {
        $sql = "SELECT response FROM company_audit_response WHERE audit_id = ?";

        $query = $this->db->query($sql, [$auditId]);
        $rows = $query->getResultArray();

        // Check if all responses are either 0 or 1 and not null
        $allResponses = array_column($rows, 'response');
        $validResponses = array_filter($allResponses, function ($value) {
            return ($value !== null && (intval($value) === 0 || intval($value) === 1));
        });

        if (count($validResponses) === count($allResponses)) {
            $sql = "UPDATE company_audit SET audit_status = 'Complete' WHERE id = ?";
            $this->db->query($sql, [$auditId]);
            return ['success' => true, 'message' => 'Audit set to complete.'];
        } else {
            // Some responses are pending, return the number of pending items
            $numPending = count($allResponses) - count($validResponses);
            return ['success' => false, 'message' => $numPending];
        }
    }

    public function getCompaniesNew()
    {

        $db = db_connect();

        $sql = "
            SELECT 
                c.id, 
                c.companyName, 
                c.email,
                c.contact,
                c.tel,
                c.address, 
                c.companyNumber, 
                c.date_created, 
                agg.v_cnt
            FROM
                company c
                    left JOIN
                (SELECT 
                    c.id AS cid, COUNT(cv.company_id) AS v_cnt
                FROM
                    company c
                JOIN company_venue cv ON cv.company_id = c.id
                GROUP BY cid) agg ON agg.cid = c.id;";


        $query = $db->query($sql);
        return $query->getResult('array');
    }


    // Used by API functions
    public function generateReport($companyId)
    {

        $db = \Config\Database::connect();

        $query = $db->query("
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
                INNER JOIN company_audit ca ON c.id = ca.company_id
                INNER JOIN audit_template atemp ON ca.audit_template = atemp.id
                JOIN company_audit_response car ON car.audit_id = ca.id
                LEFT JOIN audit_questions aq ON aq.id = car.question_id
                INNER JOIN (
                    SELECT company_id, MAX(date_created) AS max_date
                    FROM company_audit
                    WHERE company_id = $companyId AND audit_status = 'Complete'
                    GROUP BY company_id
                ) AS subquery ON ca.company_id = subquery.company_id AND ca.date_created = subquery.max_date
                ORDER BY aq.category ASC, car.response DESC;
            ");

        return $query->getResultArray();
    }
}
