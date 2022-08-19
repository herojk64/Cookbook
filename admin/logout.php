<?php

session_start();
if($_SESSION['username']=='admin'){
    session_unset();
    session_destroy();
    echo "<script>window.location.href='../#'</script>";
}else{
    
    echo "<script>alert('you are not admin');window.location.href='./#';</script>";
}

?>