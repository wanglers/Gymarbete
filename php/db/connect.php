

<?php
function dbConnect()

{
    # code...

    $servername = "localhost";
    $username = "AdminDbs";
    $password = "GhhhYuur_34";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    return $conn;
}
?> 





