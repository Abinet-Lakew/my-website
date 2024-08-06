<?php
$host = "localhost:3335";
    $user = "aviBM";
    $password = "one234avi";
    $dbName = "student-mana";

    // Establish database connection
    $conn =  mysqli_connect($host, $user, $password, $dbName);

    // Check for connection errors
    if ($conn === false) {
    die("Connection error: " . mysqli_connect_error()); // Provide a more informative error message
    }
    ?>