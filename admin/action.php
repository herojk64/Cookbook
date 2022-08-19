<?php
session_start();
if($_SESSION['username']!='admin'){
    echo "<script>window.location.href= '../#'</script>";
    exit();
}

?>
<?php 

if(isset($_POST['iname'])){
    
    $ingredient = $_POST['iname'];
    if($ingredient == '' || $ingredient == null){
        exit('null');
    }
    include_once('../db.php');
    $check = "SELECT * FROM `ingredient` WHERE `name` = '$ingredient'";
    $crun = mysqli_query($con,$check);
    if(mysqli_num_rows($crun) >0){
        mysqli_close($con);
        exit('exists');
    }
    
    $query="INSERT INTO `ingredient` VALUES (NULL,'$ingredient')";
    
    $run = mysqli_query($con,$query);
    if($run){
        mysqli_close($con);
        exit('icomplete');
    }else{
        mysqli_close($con);
        exit('ICF');//ingredient connection failed
    }

    }

?>
<?php

if(isset($_GET['isearch'])){
    $value = $_GET['isearch'];

    if($value == null || $value == 'null'){
        exit('null');
    }

    include_once('../db.php');

    $query = "SELECT * FROM `ingredient` WHERE `name` LIKE '%$value%'";
    $run = mysqli_query($con , $query);
    $data = array();
    if($run){
        while($temp = mysqli_fetch_array($run)){
            $data[] = $temp;
        }
        $ret = json_encode($data);
        mysqli_close($con);
        exit($ret);
    }else{
        mysqli_close($con);
        exit('Unsuccesfull');
    }

}

?>
<?php

if(isset($_POST['head'])){
    $heading = $_POST['head'];
    $category = $_POST['category'];
    $time = $_POST['time'];
    $ingredient = $_POST['ingredient'];
   
    $details = $_POST['detail'];

    if($heading == NULL || $heading == ''){
        exit('head');
    }
    
    if($category == NULL || $category == ''){
        exit('cat');
    }

    if($time == NULL || $time == ''){
        exit('time');
    }

    if($ingredient == NULL || $ingredient== ''){
        exit('ing');
    }

    if($details== NULL || $details == ''){
        exit('details');
    }



   
    
    include_once('../db.php');
    $query ="INSERT INTO `recipe` VALUES(NULL,$category,'$heading',$time,'$ingredient','$details',NULL)";
    $run = mysqli_query($con,$query);
    
    if($run){
        mysqli_close($con);
        exit('complete');
    }else{
        mysqli_close($con);
        exit('queryerror');
    }
}

?>
<?php

if(isset($_FILES['picture']['name'])){
    $imgName = $_FILES['picture']['name'];
    $path = "../images/$imgName";
    $temp = $_FILES['picture']['tmp_name'];
    $upload = move_uploaded_file($temp,$path);
    if($upload){
        include_once('../db.php');

        $query = "UPDATE `recipe` SET `file` = '$imgName' WHERE `file` IS NULL";
        $run = mysqli_query($con,$query);
        if($run){
            mysqli_close($con);
            exit('complete');
        }else{
            mysqli_close($con);
            exit('error');
        }
    
    }else{
        exit('Error');
    }
    
}

?>
<?php

if(isset($_POST['uhead'])){
    $heading = $_POST['uhead'];
    $category = $_POST['ucategory'];
    $time = $_POST['utime'];
    $ingredient = $_POST['uingredient'];
   
    $checkHeading = $_POST['chead'];

    $details = $_POST['udetail'];

    if($heading == NULL || $heading == ''){
        exit('head');
    }
    
    if($category == NULL || $category == ''){
        exit('cat');
    }

    if($time == NULL || $time == ''){
        exit('time');
    }

    if($ingredient == NULL || $ingredient== ''){
        exit('ing');
    }

    if($details== NULL || $details == ''){
        exit('details');
    }

    include_once('../db.php');
    
    if($_POST['ubool'] == 'true'){
    $query ="UPDATE `recipe` SET `cid`=$category,`header`='$heading',`rtime`=$time,`ingredient`='$ingredient',`detail`='$details',`file`=NULL WHERE `header` = '$checkHeading'";
    }
    
    if($_POST['ubool'] == 'false'){
        $query ="UPDATE `recipe` SET `cid`=$category,`header`='$heading',`rtime`=$time,`ingredient`='$ingredient',`detail`='$details' WHERE `header` = '$checkHeading'";
    }

    $run = mysqli_query($con,$query);
    
    if($run){
        mysqli_close($con);
        exit('complete');
    }else{
        mysqli_close($con);
        exit('queryerror');
    }
}


?>