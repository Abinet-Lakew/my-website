<?php
include "connection.php";

session_start();
error_reporting(0);

if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'admin') {
    header("location:login.php");
    exit();
}

if(isset($_GET['admission_id'])){
    $admission_id = $_GET['admission_id'];
    
    // Fetch admission details based on admission_id
    $sql = "SELECT * FROM admission WHERE id='$admission_id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $info = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = 'Admission not found.';
        header("location: admission.php");
        exit();
    }
} else {
    $_SESSION['message'] = 'Admission ID not provided.';
    header("location: admission.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission for updating admission details
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    $update_sql = "UPDATE admission SET name='$name', email='$email', phone='$phone', message='$message' WHERE id='$admission_id'";
    $update_result = mysqli_query($conn, $update_sql);
    
    if ($update_result) {
        $_SESSION['message'] = 'Admission details updated successfully.';
        header("location: admission.php");
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
    <title>Edit Admission</title>
    <link rel="stylesheet" href="admin-style1.css">
    <style>
        .edit-form{
            width:500px;
            height:330px;
            background-color: rgb(13, 221, 48);
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
        background: blue;
        color: white;
        font-weight:bold;

        }
   
        .addStudent:hover{
        background-color: rgb(74, 71, 241);
        color: white;
        }
    </style>
</head>
<body>
    <center>
    <div class="content"><br>
    <div  class="edit-form">
        <h1>Edit Admission</h1><br>
        <?php if(isset($admission_id)) echo "Editing Admission ID: $admission_id"; ?>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $info['name']; ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $info['email']; ?>"><br><br>

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $info['phone']; ?>"><br><br>

            <label for="message">Message:</label>
            <textarea id="message" name="message"><?php echo $info['message']; ?></textarea><br><br>

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
