<?php

session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['username']=="admin"){
        echo "<script> window.location.href='../#'</script>";
    }
}else{
    echo "<script> window.location.href='../#'</script>";
}

$username = $_SESSION['username'];
$feedback = $_POST['feedback'];

include_once('../db.php');

$select = "SELECT * FROM `feedback` WHERE `username`='$username'";
$query = "INSERT INTO `feedback` VALUES (NULL,'$username','$feedback')";
$query1 = "UPDATE `feedback` SET `feedback` = '$feedback' WHERE `username` = '$username'";
$run = mysqli_query($con,$select);
if($run){
    if(mysqli_num_rows($run)==1){
        $run1=mysqli_query($con,$query1);
        if($run1){
            mysqli_close($con);
            echo 'completed';
        }
    }else{
        $run1=mysqli_query($con,$query);
        if($run1){
            mysqli_close($con);
            echo 'completed';
        }
    }
}else{
    mysqli_close($con);
    exit('error');
}

?>