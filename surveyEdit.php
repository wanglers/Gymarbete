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

  <h1>ex administrera</h1>
  <?php
  //my included files
  include 'php\db\connect.php';
  // define variables and set to empty values
  $answer1Err = $answer2Err = $questionErr = $genderErr = $websiteErr = "";
  $question = $gender = $comment = $website = "";
  $answer1 = -1;
  $answer2 = -1;
  $surveyid = 12;

  $mydb = dbConnect();
  echo '<br>';
  //Läs befintlig data i tabellen



  $sqlread = "SELECT id, name FROM surveys";
  $result = $mydb->query($sqlread);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
      echo get_question($mydb, $row["id"]);
    }
  } else {
    echo "0 results";
  }

  //Lägg in formulär för varje enkät som sparas till en ny fråga för varje enkät
  //envänd en av inputfälten






  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["answer1"])) {
      $answer1Err = "answer1 is required";
    } else {
      $answer1 = test_input($_POST["answer1"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]$/", $answer1)) {
        $answer1Err = "Only letters and white space allowed";
      }
    }
    if (empty($_POST["answer2"])) {
      $answer2Err = "answer2 is required";
    } else {
      $answer2 = test_input($_POST["answer2"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[0-9]$/", $answer2)) {
        $answer2Err = "Only letters and white space allowed";
      }
    }

    /*if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }*/

    /*if (empty($_POST["website"])) {
      $website = "";
    } else {
      $website = test_input($_POST["website"]);
      // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
        $websiteErr = "Invalid URL";
      }
    }*/
  }


  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function save_result($answer, $mydb, $questionid)
  {
    //$questionid = 1; // gör dynamisk
    $sql = "INSERT INTO results (q_id, result)
    VALUES ($questionid, $answer)";

    if ($mydb->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $mydb->error;
    }
  }

  function get_question($mydb, $surveyid)
  {
    $sqlread1 = "SELECT id FROM questions WHERE s_id=$surveyid";
    $fraga1 = $mydb->query($sqlread1);
    if ($fraga1->num_rows > 0) {
      echo "steg 1 ", "<br>";
      while ($row = $fraga1->fetch_assoc()) {


        $questionid = $row["id"];
        $sqlread2 = "SELECT question FROM questions WHERE id=$questionid";
        echo "steg 2: " . "<br>" . " questionid: " . $questionid . " " .  " survey:" . $surveyid .  "<br>";

        // $fraga = $mydb->query($sqlread);
        $fraga2 = $mydb->query($sqlread2);

        if ($fraga2->num_rows > 0) {
          // output data of each row
          while ($row = $fraga2->fetch_assoc()) {
            echo "Question: " . $row["question"] . "<br>";
          }
        } else {
          echo "0 results";
        }
      }
    } else {
      echo "0 results";
    }


    return;
  }
  get_question($mydb, $surveyid);


  ?>


  <p><span class="error"></span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Answer1: <input type="text" name="answer1" value="<?php echo $answer1; ?>">
    <span class="error">* <?php echo $answer1Err; ?></span>
    <br><br>





    Answer2: <input type="text" name="answer2" value="<?php echo $answer2; ?>">
    <span class="error">* <?php echo $answer2Err; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
  </form>

  <?php




  save_result($answer1, $mydb, 1);
  save_result($answer2, $mydb, 2);


  //  // stoppa in värdet name i databasen 
  // $answer
  // $mydbcon set value  i rätt tabell o kolumn 







  ////

  echo "<h2>Your Input:</h2>";
  echo $answer1;
  echo "<br>";
  echo $answer2;
  echo "<br>";

  // Stäng dbs connect
  dbDisconnect($mydb);
  ?>

</body>

</html>