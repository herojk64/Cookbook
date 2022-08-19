<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "<script>window.location.href='../#';</script>";
    }
    if(isset($_POST['fname'])){
    $firstName = $_POST['fname'];
    }else{
        exit('First Name Error');
    }

    if(isset($_POST['lname'])){
    $lastName = $_POST['lname'];
    }else{
        exit('Last Name Error');
    }

    if(isset($_POST['email'])){
    $email = $_POST['email'];
    }else{
        exit('Email Error');
    }

    if(isset($_POST['password'])){
    $pass= $_POST['password'];
    }else{
        exit('Password Error');
    }
    

    $username = strstr($email, '@', true);

    if($firstName == null || $lastName == null ||  $email == null || $pass == null){
        exit('null');
    }

    $password1 = password_hash($pass,PASSWORD_BCRYPT);  

    
    $check = "SELECT * FROM `login` WHERE username='$username'";
    
    include_once('../db.php');
    


    $datacheck = mysqli_query($con, $check);
    $rows = mysqli_num_rows($datacheck);

    if($rows > 0) {
        mysqli_close($con);
        exit("Registered");
    }

    $query="INSERT INTO `login` VALUES(NULL,'$firstName','$lastName','$email','$username','$password1')";

    $run = mysqli_query($con,$query);
    if($run){
        echo "Complete";
        mysqli_close($con);
    }else{
        mysqli_close($con);
        exit("Error");
    }

?>