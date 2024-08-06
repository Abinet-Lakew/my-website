<?php
include "connection.php";

session_start();
error_reporting(0);

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit();
}

if(isset($_GET['student_id'])){
    $student_id = $_GET['student_id'];
    
    $sql = "SELECT * FROM users WHERE id='$student_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $info = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = 'Student not found.';
        header("location: view-student.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'Studnet ID not provided.';
    header("location: view-student.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating admission details
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    
    $update_sql = "UPDATE users SET username='$name', email='$email',phone='$phone ', password='$password' WHERE id='$student_id'";
    $update_result = mysqli_query($conn, $update_sql);
    
    if ($update_result) {
        $_SESSION['message'] = 'Studnet details updated successfully.';
        header("location: view-student.php");
        exit();
    } else {
        $_SESSION['message'] = 'Failed to update admission details.';
    }
}

include "admin-sidebar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="admin-style1.css">
    <style>
             .edit-form{
            width:500px;
            height:330px;
            background-color: rgba(17, 167, 154, 0.637);
            border-radius:5px;
            
            shadow:black;

        }
        label{
        display:inline-block;
        text-align:right;
        width:100px;
        font-weight: bold;

        }
        input,textarea{
            padding: 4px;
            width:50%;
            border-radius:5px;
            border-style:none;
            margin-right:20px;
        }
        .addStudent{
        width:80px;
        height:35px;
        border:none;
        border-radius:2px;
        background: green;
        color: white;
        font-weight:bold;

        }
   
        .addStudent:hover{
            background-color: rgb(36, 143, 59);
        color: white;
        }
    </style>
</head>
<body>
    <center>
    <div class="content"><br>
    <div class="edit-form">

    
        <h1>Edit Studnet</h1><br>
        <?php if(isset($student_id)) echo "Editing Student ID: $student_id"; ?>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="username" name="username" value="<?php echo $info['username']; ?>"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $info['email']; ?>"><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $info['phone']; ?>"><br><br>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="<?php echo $info['password']; ?>"><br><br>

            <input type="submit" value="Update" class="addStudent">
        </form>
        </div>
    </div>
    </center>
</body>
</html>

<?php
mysqli_close($conn);
?>
