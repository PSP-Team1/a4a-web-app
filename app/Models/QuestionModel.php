<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    function addquestion()
    {
        $question = $_POST['question'];
        $category = $_POST['category'];
        $tempid = 1;
        $date = date("Y.m.d");

        $db = db_connect();

        $sql = "INSERT INTO audit_questions(question,category,date_created,template_id)
        values ('$question','$category','$date',$tempid)";

        $results = $db->query($sql);
        return $results;

    }

    function deletequestion()
    {
        $questionid = $_POST['questid'];

        $db = db_connect();

        $sql = "DELETE FROM audit_questions
        WHERE id = '$questionid'";

        $results = $db->query($sql);
        return $results;

    }

}
