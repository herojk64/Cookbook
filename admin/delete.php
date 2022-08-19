<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['username'] != 'admin'){
        echo "<script>window.location.href = '../#'</script>";
    }
}else{
    echo "<script>window.location.href='../#'</script>";
}

$header = $_GET['header'];

include_once('../db.php');
$query = "DELETE FROM `recipe` WHERE `header` = '$header'";
$run = mysqli_query($con,$query);
if($run){
    mysqli_close($con);
    exit('deleted');
}else{
    mysqli_close($con);
    exit('deleteerror');
}

?>