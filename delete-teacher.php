<?php
include 'connection.php';
  session_start();
     if($_GET['student_id']){
        $userID = $_GET['student_id'];

        $sql = "DELETE FROM teacher WHERE id='$userID'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['message'] = 'Delete Teacher Successfully';
            header("location:view-teacher.php");
        }
     }
?>