<?php

session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['username']=="admin"){
        echo "<script> window.location.href='../#'</script>";
    }
}else{
    echo "<script> window.location.href='../#'</script>";
}

include_once('../db.php');

$username = $_SESSION['username'];
$curPassword = $_POST['curpassword'];
$tempPassword = $_POST['password'];

$newPassword = password_hash($tempPassword,PASSWORD_BCRYPT);

$query = "SELECT `password` FROM `login` where `username`='$username'";

$query1 = "UPDATE `login` SET `password` = '$newPassword' WHERE `username` = '$username'";

$run = mysqli_query($con,$query);

if($run){
    while($data=mysqli_fetch_assoc($run)){
        if(password_verify($curPassword,$data['password'])){
            $run1 =mysqli_query($con,$query1);
            if($run1){
                mysqli_close($con);
                session_unset();
                session_destroy();
                echo "success";
            }else{
                mysqli_close($con);
                exit('phasetwoerror');
            }
        }else{
            mysqli_close($con);
            exit('nocurpass');
        }
    }
}else{
    mysqli_close($con);
    exit('phaseoneerror');
}

?>