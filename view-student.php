            <?php
            include "connection.php";
            // Check if username is set and if the usertype is 'admin'
            session_start();
            error_reporting(0);
            if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
            header("location:login.php");
            exit();
            }

            $sql = "SELECT * FROM users WHERE usertype='student'";
            $result = mysqli_query($conn, $sql); // Use mysqli_query

            if (!$result) {
            echo "Error: " . mysqli_error($conn);
            } else {

            include "admin-sidebar.php";

                ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Student</title>
            <link rel="stylesheet" href="admin-style.css">
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

            <center>
            <div class="content">
            <h1>Student Data</h1>

            <?php
            if($_SESSION['message']){
                echo $_SESSION['message'];
            }
            unset($_SESSION['message']);
            ?>

            <table border="01" cellspacing="0">
            <tr>
       
            <th style="padding:20px; font-size:15px;">Name</th>
            <th style="padding:20px; font-size:15px;">Email</th>
            <th style="padding:20px; font-size:15px;">Phone</th>
            <th style="padding:20px; font-size:15px;">Password</th>
            <th style="padding:20px; font-size:15px;">Action</th>
            </tr>

            <?php
            while ($info = $result->fetch_assoc()) {

            ?>
            <tr>

            <td style="padding:10px;"> <?php echo "{$info['username']}"; ?></td>
            <td style="padding:10px;"><?php echo "{$info['email']}"; ?></td>  
            <td style="padding:10px;"><?php echo "{$info['phone']}"; ?></td>  
            <td style="padding:10px;"><?php echo "{$info['password']}"; ?></td>
             
            <td style="padding:10px;"> 
            <a onClick="javascript:return confirm('Are you sure to Delete this?');" href='delete-student.php?student_id=<?php echo $info['id']; ?>'>Delete</a> | 
    <a href='edit-student.php?student_id=<?php echo $info['id']; ?>'>Edit</a>
    </td>
            </tr>

            <?php
            }
            ?>
            </table>
            </center>
            </body>
            </html>

            <?php
            }

            mysqli_close($conn); // Close the connection (optional but good practice)
            ?>
