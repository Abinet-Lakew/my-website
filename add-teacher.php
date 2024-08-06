<?php
    include 'connection.php';
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

        if(isset($_POST['add-teacher'])){
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $file = $_FILES['image']['name'];
            $dst="./IMAGE/".$file;
            $dstDB = "IMAGE/".$file;
            move_uploaded_file($_FILES['image']['tmp_name'],$dst);

            $sql = "INSERT INTO teacher(name,description,image)
             VALUES('$name','$desc','$dstDB')";

             $result = mysqli_query($conn,$sql);

             if($result){
                
                echo "<script type='text/javascript'>
                alert('Data uploaded successfully');
                </script>";
             }
        }

        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Teacher</title>
        <link rel="stylesheet" href="admin-style.css">
        <style>
        label{
        display:inline-block;
        text-align:right;
        width:150px;
        padding:10px 10px;
        font-weight: bold;
    
        }
        input{
            padding: 4px;
            width:50%;
            border-radius:5px;
            border-style:none;
            margin-right:20px;
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
        .div-design{
        background-color: rgb(4, 187, 126);
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;
        border-radius:10px;
        margin-right:30px;
        }
        </style>

        </head>
        <body>       

        <?php
        include  "admin-sidebar.php"
        ?>

        <div class="content">
        <center>
        <h1>Add Teacher</h1><br>

        <div class="div-design">
        <form action="add-teacher.php" method="POST" enctype="multipart/form-data">

        <div>
        <label>Teacher Name:</label>
        <input type="text" name="name" required>
        </div>

        <div>
        <label>Description:</label>
        <textarea name="desc" cols="33" rows="3"></textarea>
        </div>

        <div>
        <label>Image:</label>
        <input type="file" name="image" required>
        </div>

        <div>
        <input type="submit" name="add-teacher" value="Add teacher" class="addStudent">
        </div>
        </center>
        </form>
        </div>

        </body>
        </html>
