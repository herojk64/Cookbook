<?php 
session_start();

if(isset($_GET['search'])){
    $search=$_GET['search'];
    include_once('db.php');
    $query = "SELECT `header` FROM `recipe` WHERE `header` LIKE '%$search%'";

    $run = mysqli_query($con,$query);
    if($run){
        $value = [];
        while($data = mysqli_fetch_assoc($run)){
            $value[] = $data;
        }
        
       $val = json_encode($value);
       mysqli_close($con);
       echo $val;
        
        
    }else{
        mysqli_close($con);
        exit('connectionerror');
    }
}else{
    echo "<script>window.location.href='./#'</script>";
}




?>