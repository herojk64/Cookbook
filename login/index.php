<?php
session_start();
if(isset($_SESSION['username'])){
    echo "<script>window.location.href='../#';</script>";
}else{
    $defaultProfile="default.svg";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Cookbook</title>
    <script src="../js/jquery.js"></script>
</head>
<body>
           <?php
           include_once('./header.php');
           include_once('./main.php');
           include_once('./footer.php');
           ?> 
<script src="../js/script.js"></script>
</body>
</html>