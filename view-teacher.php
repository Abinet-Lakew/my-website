<?php
            include "connection.php";
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

        $sql = "SELECT *FROM teacher";
        $result = mysqli_query($conn,$sql);

        ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Home</title>
        <link rel="stylesheet" href="admin-style1.css">
        <style>
            /* Table styling */
            table {
            margin-right: 40px;
            margin-top: 30px;
            background-color: rgba(3, 170, 212, 0.938);
            width: 95%;
            }

            th {
            background-color: blue;
            color:white;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 90%;
            border-bottom: 2px solid #111111;
            border-top: 2px solid #999;
            text-align: left;
            }

            tr.even {
            background-color: #efefef;
            }

            tr:hover {
            background-color: #c3e6e5;
            }
            </style>

        </head>
        <body>       
             <?php include  "admin-sidebar.php"  ?>
            
            <div class="content">
        <h1>Well come to Teacher Data</h1>
        <table>
            <tr>
            <th style="padding:20px; font-size:15px;">Name</th>
            <th style="padding:20px; font-size:15px;">Aboout Teacher</th>
            <th style="padding:20px; font-size:15px;">Image</th>
            <th style="padding:20px; font-size:15px;">Action</th>
            </tr>
            <?php
            while($info = $result->fetch_assoc()){
            ?>
            <tr>
            <td style="padding:10px;"> <?php echo "{$info['name']}"; ?></td>
            <td style="padding:10px;"><?php echo "{$info['description']}"; ?></td>  
            <td style="padding:10px;"><img height="60px" width="60px" src="<?php echo "{$info['image']}"; ?>"></td>  
            
            <td style="padding:10px;"> 
            <a onClick="javascript:return confirm('Are you sure to Delete this?');" href='delete-teacher.php?student_id=<?php echo $info['id']; ?>'>Delete</a> | 
    <a href='edit-teacher.php?student_id=<?php echo $info['id']; ?>'>Edit</a>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
        </body>
        </html>
