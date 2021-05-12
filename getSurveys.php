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

    <h3>Available surveys</h3>
    <ul>
        <?php
        include 'php\db\connect.php';
        $mydb = dbConnect();
        $sqlread = "SELECT id, name FROM surveys";
        $result = $mydb->query($sqlread);
        while ($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
            echo "<li><a href=http://localhost/survey.php?id=" . $row["id"] . ">" . $row["name"] . "</a></li>";
        }
        ?>
    </ul>
</body>

</html>