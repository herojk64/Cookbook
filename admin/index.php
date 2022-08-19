<?php 
    session_start();
    if(isset($_SESSION['username'])){
    if($_SESSION['username']== 'admin'){
        header('location:dashboard.php');
        $defaultProfile = 'default.svg';
        $loginName = $_SESSION['name'];
    }
    }else{
        $defaultProfile = 'default.svg';
        $loginName = 'Login';
        $loginPath = "../login/#";
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
        include_once('header.php');
    ?>
    <main class="[ login_main ] [ flex ]">
    <form onsubmit="adminCheck(); return false;" class="[ flex ] [ flex_direction_column ]" novalidate>

        <h1>Admin Login</h1>

        <p class="error_msg" id="error_msg">Error Message: Either email or password is incorrect.</p>
    <span class=" incont flex flex_direction_column">
        
        <span class="input_icon">
        
        <input type="text" name="username" id="username" class="username" placeholder="Enter your username">
        <img src="../images/email.svg" alt="email icon">
        </span>
        
        
        <span class="input_icon">
            
        <input type="password" name="password" id="password" class="password" placeholder="Enter your password">
        <img src="../images/password.svg" alt="eye icon">
        </span>
        

    </span>
        
        <span class="input_btns flex align_center justify_content_center">
          
            <button type="submit" class="LoginBtn" id="LoginBtn">Login</button>
        </span>
</form>
</main>
<?php
    include_once('./footer.php');
?>
<script src="../js/script.js"></script>
</body>
</html>