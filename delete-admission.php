<?php
include 'connection.php';
  session_start();
     if($_GET['admission_id']){
        $userID = $_GET['admission_id'];

        $sql = "DELETE FROM admission WHERE id='$userID'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['message'] = 'Delete Admission Successfully';
            header("location:admission.php");
        }
     }
?>