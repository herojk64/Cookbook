<main class="[ search_result ][ flex ][ flex_direction_column ]">
<?php


include_once('../db.php');

$run = mysqli_query($con,$query);

if($run){
    while($data = mysqli_fetch_assoc($run)){
        echo "
        <div class='[ searched_values ][ flex ]' onclick='recipeEngine(this.children[1].children[0].getAttribute(\"data-value\"))'>
        <img src='../images/".$data['file']."' alt='recipe img'>
        <span>
        <h3 data-value='".$data['header']."'>".$data['header']."</h3>
        <p>".substr($data['detail'],0,80)."...</p>
        </span>
        </div>
        ";
    }
    mysqli_close($con);
}

?>
</main>