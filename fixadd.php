<?php
        include 'connection.php';

        if (isset($_POST['add-student'])) {
        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $usertype = "student"; // Assuming this is intended to be 'admin'

        $check = "SELECT * FROM users WHERE username='$username'";
        $checkUser = mysqli_query($conn, $check);
        $rowsCount = mysqli_num_rows($checkUser);

        if ($rowsCount == 1) {
        echo "<script type='text/javascript'>
        alert('Username already exists,please try again!');
        </script>";
        } else {
        $sql = "INSERT INTO users(username, email, phone, usertype, password)
        VALUES('$username', '$email', '$phone', '$usertype', '$password')";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
        echo "Error: " . mysqli_error($conn);
        } else {
        echo "<script type='text/javascript'>
        alert('Data uploaded successfully');
        </script>";
            }
        }
    }
        mysqli_close($conn);

        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Home</title>
        <link rel="stylesheet" href="fixStyle.css">
        <style>
        label{
        display:inline-block;
        text-align:right;
        width:100px;
        padding:10px 10px;
        font-weight: bold;
        }

        .addStudent{
        width:100px;
        height:30px;
        border:none;
        border-radius:5px;
        background: blue;
        color: white;
        font-weight:bold;

        }
        .addStudent:hover{
        border-style:solid;
        background: yellow;
        color: black;
        }
        .addStudent:active{
        border-style:dotted;
        background: green;
        color: white;
        }
        .div-design{
         background-color:  rgb(0, 253, 0);
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;
        border-radius:10px;
        margin-right:30px;
        }

    
        input{
            padding: 4px;
            width:50%;
            border-radius:5px;
            border-style:none;
            margin-right:20px;
        }
        </style>

        </head>
        <body>       

        <?php include 'fixSide.php';?>


        <section id="home">
        
        <div class="content">
        <center>
        <h1>Add Student</h1><br>

        <div class="div-design">
        <form action="add-student.php" method="POST">

        <div>
        <label>Username:</label>
        <input type="text" name="name" required>
        </div>

        <div>
        <label>Email:</label>
        <input type="email" name="email" required>
        </div>

        <div>
        <label>Phone:</label>
        <input type="text" name="phone" required>
        </div>

        <div>
        <label>Password:</label>
        <input type="password" name="password" required>
        </div>

        <div>
        <input type="submit" name="add-student" value="Add Student" class="addStudent">
        </div>
        </center>
        </form>
        </div>
        </section>

        
        </body>
        </html>