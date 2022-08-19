<?php
$host="localhost";
$username="root";
$password="";
$dbname="cookbook";
$con = mysqli_connect($host,$username,$password,$dbname);
if(!$con){
    echo "Error ->".mysqli_connect_error();
    exit;
}
?>