<?php

session_start();
if(isset($_SESSION['username']) && isset($_GET['header'])){
 if($_SESSION['username']=='admin'){
    $defaultProfile = 'default.svg';
        $loginName = $_SESSION['username'];
        $loginPath = './dashboard.php';
 }else{
    echo "<script>window.location.href='../#'</script>";
 }
 }else{
    header("location:'./dashboard.php'");
 }


$header = $_GET['header'];
include_once('../db.php');
$query ="SELECT * FROM `recipe` WHERE `header` = '$header'";

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

    ?>
<main class="[ admin_addnew ]">
<div class="[ admin_header_box ][ flex ] [ justify_content_Center ] [ justify_space_between ]">

    <?php 
        
        $run = mysqli_query($con,$query);
        if($run){
        while($data = mysqli_fetch_assoc($run)){
            $value = $data;
        };
        }
    ?>

    <h1>Dashboard</h1>
  <span>
      <button class="[ btns ]" onclick="adminView();">View</button>
      <button class="[ btns ]" onclick="adminAddnew();">Add New</button>
      <button class="[ btns ] [ log_btn ]" onclick="logOut();">Log out</button>
  </span>
</div>
<div>

<span class="[ admin_update_container ] [ flex ]">
    <form onsubmit="updateRecipe(); return false;" class="[ admin_form_update ] [ admin_forms ][ flex ][ flex_direction_column ]" id="updateRecipe" novalidate data-value="1" enctype="multipart/form-data">
        
       <h1>Update Recipe</h1>

       <input type="text" name="heading" id="recipeHeading" class="recipeHeading" value="<?php echo $value['header']; ?>" placeholder="Enter Heading of Recipe">
       <input type="text" name ="cheading" id="checkHeading" value ='<?php echo $value['header'];?>' hidden>
        <select id="category" class="category">
            <?php
                
                $query1 = "SELECT * FROM `category`";
                $run1 = mysqli_query($con , $query1);
                if($run1){
                    while($data1 = mysqli_fetch_assoc($run1)){
                        if($value['cid'] == $data1['cid']){
                        echo "<option value='".$data1['cid']."'>".$data1['cat_name']."</option>";
                        break;}
                    }
                    while($data2 = mysqli_fetch_assoc($run1)){
                        if($value['cid'] != $data2['cid']){
                            echo "<option value='".$data2['cid']."'>".$data2['cat_name']."</option>";
                        }
                    }
                    
                }
                mysqli_close($con);
            ?>
        </select>

       <input type="number" min="5" name="time" id="time" class="time" value="<?php echo $value['rtime']; ?>" placeholder="Enter Time to prepare in minutes">
       
    
        <div class="[ formInginput ][ flex ][ flex_direction_column ]">
       <input onkeydown="iSearch(this.value);" onkeyup="iSearch(this.value);" type="text" name="isearch" id="idsearch" placeholder="Enter Ingredient to add">
       <span id="idisp" class="idisp">

        </span>
       
        <span id="iSelected" class="iSelected">
        <?php
            $ingredient =  json_decode($value['ingredient'],true);
            for($i=0;$i<count($ingredient);$i++){
                $sum = $i+1;
            echo "<span>
            <button type='button' value='".$ingredient[$i]['name']."' onclick='this.parentNode.remove()'>".$ingredient[$i]['name']."</button>
            <input type='number' min='1' id='ing".$sum."' value='".$ingredient[$i]['number']."'>
            </span>";
            }
        ?>
        </span>
        
    </div>

    <input onchange="showImg(this.files[0])" type="file" name="picture" id="picture" class="picture">
            <img  src="../images/<?php echo $value['file']; ?>" alt="dispicture" id="dispicture" style="display:block;">
       <textarea name="rdetails" id="rdeatils" cols="30" rows="10" placeholder="Enter Details">
<?php echo $value['detail']; ?>
       </textarea>

        <button type="submit">Submit</button>
    </form>
</span>
</div>
</main>

<script src="../js/script.js"></script>
</body>
</html>