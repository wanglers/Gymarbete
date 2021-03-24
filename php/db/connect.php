<?php
function dbConnect()

{
    # code...

    $servername = "localhost";
    $username = "AdminDbs";
    $password = "GhhhYuur_34";
    $dbname = "gymarbetedbs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
    return $conn;
}
?>
<?php
function dbDisconnect($conn)
{

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //disconnect db
    $conn->close();

    echo "disconnected ok";
    return;
}
?>
