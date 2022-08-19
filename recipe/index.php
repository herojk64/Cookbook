<?php
session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['username']== 'admin'){
        $profileName = $_SESSION['username'];
        $defaultProfile = "default.svg";
        $login="../admin/dashboard.php";
    }else{
    $profileName = $_SESSION['username'];
    $defaultProfile="default.svg";
    $login = '../login/#';
    }
}else{
    $defaultProfile="default.svg";
    $profileName = 'Login';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookBook</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery.js"></script>
</head>
<body>
    <?php
        include_once('./header.php');

        if(isset($_GET['search'])){
            $value = $_GET['search'];
            $query = "SELECT * FROM `recipe` WHERE `header` = '$value'";
        }else{
            $query = "SELECT * FROM `recipe`";
        }

        include_once('./main.php');
        include_once('./footer.php');
    ?>
<script src="../js/script.js"></script>
</body>
</html>