<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>

  <h2>Surveys</h2>
  <p>Helge Wangler: Gymnasiearbete</p>
  <br>
  <ul>
    <li><a href="http://localhost/surveyEdit.php">Create a new survey</a></li>
  </ul>
  <?php
  include "getSurveys.php";
  include "getSurvey.php";
  ?>


</body>

</html>