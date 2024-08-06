     <?php
        //is used to when we try to login into admin home , 
        //We can't login without password and user name 
        //like if we try to using search in url "adminHome"
        session_start();

        // Check if username is set and if the usertype is 'student'
        if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
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
        <title>Admin Home</title>
        <link rel="stylesheet" href="admin-style1.css">

        </head>
        <body>       
             <?php include  "admin-sidebar.php"  ?>
            
            <div class="content">
        <h1>Well come to Admin Dashboread</h1>

        </body>
        </html>
