<?php
function getSurvey($surveyId)
{
    //include 'php\db\connect.php';

    $mydb = dbConnect();

    // sql queries that fetches all the information need to display a survey
    $SQL_GET_SURVEY_NAME = "SELECT name FROM surveys WHERE id=$surveyId;";
    $SQL_GET_SURVEY_QUESTIONS = "SELECT question FROM questions WHERE s_id=$surveyId";

    // survey name
    $result = $mydb->query($SQL_GET_SURVEY_NAME);
    $name = $result->fetch_assoc()["name"];

    // survey questions
    $result = $mydb->query($SQL_GET_SURVEY_QUESTIONS);
    $questions = [];
    while ($row = $result->fetch_assoc()) { // store each question
        $questions[] = $row["question"];
    }

    return array("name" => $name, "questions" => $questions);
}
