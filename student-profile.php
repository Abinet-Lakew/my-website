    <?php 
        include 'connection.php'; 
        session_start();

        // Check if username is set and if the usertype is 'student'
        if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'student') {
        // Redirect to login page if not a student
        header("location:login.php");
        exit(); // Stop further script execution after redirect
        }

        //feach from the database 
        $name = $_SESSION['username'];
        $sql = "SELECT *FROM users WHERE username='$name'";

        $result = mysqli_query($conn, $sql);

        $info = mysqli_fetch_assoc( $result);

        if(isset($_POST['update-profile'])){
            
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pssword = $_POST['password'];

            $sql = "UPDATE users SET email = '$email', phone = '$phone', 
            password = '$password' WHERE username = '$name'";

            $result2 = mysqli_query($conn, $sql);

            if( $result2 ){

                header("location:student-profile.php");
            }
        }
        ?>

<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>update profile</title>
        <link rel="stylesheet" href="student-style.css">
        <style>
     
        </style>

        </head>
        <body>       

        <?php include  "student-sidebar.php" ?>

        <div class="content">
        <center>
        <h1>Update Student Profile</h1><br>

        <div class="div-design">
        <form action="student-profile.php" method="POST">

       
        <div>
        <label>Email:</label>
        <input type="email" name="email"  value="<?php echo "{$info['email']}"?>">
        </div>

        <div>
        <label>Phone:</label>
        <input type="text" name="phone"  value="<?php echo "{$info['phone']}" ?>">
        </div>

        <div>
        <label>Password:</label>
        <input type="text" name="password"  value="<?php echo "{$info['password']}" ?>">
        </div>

        <div>
        <input type="submit" name="update-profile" value="Update" class="updateStudent-btn">
        </div>
        </center>
        </form>
        </div>
        </body>
        </html>