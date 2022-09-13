<?php
$host="localhost";
$dbusername="root";
$password="";
$dbname="cookbook";
$con = mysqli_connect($host,$dbusername,$password,$dbname);
if(!$con){
    echo "Error ->".mysqli_connect_error();
    exit;
}
?>