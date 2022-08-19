<?php

$uname= $_GET['username'];
$pass = $_GET['password'];

include_once("../db.php");

$query = "SELECT * FROM `admin` WHERE `username` = '$uname'";

$run = mysqli_query($con,$query);


echo $query."<br>";
echo mysqli_num_rows($run);

if($run){
    if( mysqli_num_rows($run) == 1){
    // while($data = mysqli_fetch_assoc($run)){
    //     if(password_verify($pass,$data['password']) == 1){
        
    //     $id=$data['id'];
    //     $username = $data['username'];
    //     session_start();
    //     $_SESSION['id']=$id;
    //     $_SESSION['username']=$username;

        
    //     // $_SESSION['profile']=$profile;
    //     }else{
    //         mysqli_close($con);
    //         exit('passwordnomatch');
    //     }       
    // }
    $query1="INSERT INTO `record` VALUES (NULL,'$username',now())";
    $run1=mysqli_query($con,$query1);
    if($run){
        mysqli_close($con);
        echo "completed";
        
    }else{
        mysqli_close($con);
        exit('Record_Error');
    }
       
        }else{
            mysqli_close($con);
            exit('usernotfound');
        }
    }else{
        mysqli_close($con);
        exit('connectionerror');
    }    
