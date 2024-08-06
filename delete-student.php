<?php
include 'connection.php';
  session_start();
     if($_GET['student_id']){
        $userID = $_GET['student_id'];

        $sql = "DELETE FROM users WHERE id='$userID'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['message'] = 'Delete Student Successfully';
            header("location:view-student.php");
        }
     }
?>