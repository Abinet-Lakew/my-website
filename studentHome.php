    <?php
    session_start();

    // Check if username is set and if the usertype is 'student'
    if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'student') {
    // Redirect to login page if not a student
    header("location:login.php");
    exit(); // Stop further script execution after redirect
    }

    ?>

<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Home</title>
        <link rel="stylesheet" href="student-style.css">
        </head>


        <body>
        <?php include  "student-sidebar.php"  ?>
        <center>     <h1>Well come to Student Dasbored</h1></center>
   

        </body>
        </html>
        