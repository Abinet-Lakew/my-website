<?php
    include "connection.php";
    session_start();
    if(isset($_POST['applay'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        
        $sql = "INSERT INTO admission(name,email,phone,message)
                VALUES ('$name','$email','$phone','$message')";
   
   $result =  mysqli_query($conn,$sql);
   if($result){
    $_SESSION['message'] = "Your Message sent successfully";
    header("location:index.php");
   }else{
    echo "Applay Faild";
   }
}
?> 