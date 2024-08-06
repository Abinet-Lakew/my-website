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
    
    $sql = "SELECT * FROM teacher WHERE id='$student_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $info = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = 'Teacher not found.';
        header("location: view-teacher.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'Teacher ID not provided.';
    header("location: view-teacher.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating admission details
    $name = $_POST['name'];
    $email = $_POST['description'];
    $phone = $_POST['image'];

    
    $update_sql = "UPDATE users SET name='$name', description='$email',image='$phone' WHERE id='$student_id'";
    $update_result = mysqli_query($conn, $update_sql);
    
    if ($update_result) {
        $_SESSION['message'] = 'Teacher details updated successfully.';
        header("location: view-teacher.php");
        exit();
    } else {
        $_SESSION['message'] = 'Failed to update Teacher details.';
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
            <input type="text" id="username" name="username" value="<?php echo $info['name']; ?>"><br><br>
            <label for="text">About Teacher:</label>
            <input type="email" id="desc" name="desc" value="<?php echo $info['description']; ?>"><br><br>

            <label for="phone">Image:</label>
            <input type="file" id="phone" name="phone" value="<?php echo $info['image']; ?>"><br><br>


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
