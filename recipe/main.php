<main class="[ recipe ][ flex ][ flex_direction_column ]">
    <?php
if(isset($_GET['header'])){
    $header = $_GET['header'];
    include_once('../db.php');
    $query = "SELECT * FROM `recipe` WHERE `header` LIKE '$header'";
    $run = mysqli_query($con,$query);
    if($run){
        while($data = mysqli_fetch_assoc($run)){
            $ingredient = json_decode($data['ingredient']);
            
            echo "
            <div class='recipe_top_disp'>
                <span>
                <h1>".$data['header']."</h1>
                <p><b>Ingredient: </b>".count($ingredient)."</p>
                <p><b>Time: </b>".$data['rtime']."mins</p>
                
                </span>
                <span class='recipe_Img_container'>
                    <img src='../images/".$data['file']."'alt='Recipe Image'>
                </span>
                
            </div>
            <span class='recipe_details'><p>".
                $data['detail']."</p>
                </span>
            ";
        }
    }else{
        mysqli_close($con);
        exit('Connection Error');
    }
    mysqli_close($con);

}else{
    echo "<script>window.location.href='../#'</script>";
}
    
    ?>
</main>