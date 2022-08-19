<?php 

if(isset($_POST['email'])){
$email=$_POST['email'];
}else{
    header('location:"#"');
    exit('EmailError');
    
}
if(isset($_POST['password'])){
$pass=$_POST['password'];
}else{
    header('location:"#"');
    exit('PasswordError');
    
}


if($email == null || $email == "" || $pass == null || $pass == ""){

    exit('null');
}


include_once("../db.php");

$query = "SELECT * FROM `login` WHERE `email` = '$email'";

$run = mysqli_query($con,$query);

if($run){
    if(mysqli_num_rows($run) == 1){
    while($data = mysqli_fetch_assoc($run)){
        if(password_verify($pass,$data['password']) == 1){
        
        $id=$data['id'];
        $name = $data['fname']." ".$data['lname'];
        $username = $data['username'];
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['name']=$name;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        
        }else{
            mysqli_close($con);
            exit('nomatch');
        }       
    }
    $query1="INSERT INTO `record` VALUES (NULL,'$username',now())";
    $run1=mysqli_query($con,$query1);
    if($run){
        mysqli_close($con);
        echo "completed";
        
    }else{
        mysqli_close($con);
        exit('Record_Error');
    }
       
        }
    }else{
        mysqli_close($con);
        exit("usernotfound");
    }    


?>