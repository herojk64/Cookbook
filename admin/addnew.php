<?php

session_start();
if(isset($_SESSION['username'])){
 if($_SESSION['username']=='admin'){
    $defaultProfile = 'default.svg';
        $loginName = $_SESSION['username'];
        $loginPath = './dashboard.php';
 }else{
    header("location:'../#'");
 }
 }else{
    header("location:'../#'");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
    <script src="../js/jquery.js"></script>
</head>
<body>
    <?php 
include_once('./header.php');
include_once('./addmain.php');
    ?>


<script src="../js/script.js"></script>
</body>
</html>