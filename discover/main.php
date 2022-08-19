<main class="[ flex ] [ align_center ] [ flex_direction_column ] [ justify_content_center ] [ dis_main ]">
    <div class="dis_cover">
        <img src="../images/featured.jpg" alt="background image">
        <span class="[ flex ] [ flex_direction_column ] [ overlay ]">
            <h3>Discover the delight</h3>
            <h1>Food everybody craves</h1>
            <p>Lorem ipsum dolor sit amet 
                consectetur adipisicing elit.
                 Ad et veritatis labore sunt
                  quibusdam dolorum culpa voluptatem
                   repellendus maiores provident.</p>
        </span>
        <button type="button" onclick="windowScroll()">Scroll <img src="../images/Arrow.png" alt=""></button>
    </div>

    <div class="[ flex ] [ flex_direction_column ] [ align_center ] [ justify_content_center ] [ dis_menu_container ]">
            
            <?php
            include_once('../db.php');
            
            $query = "SELECT * FROM `category`";
            $query1= "SELECT * FROM `recipe`";
            $run1 = mysqli_query($con,$query1);
            $run= mysqli_query($con,$query);
            if($run){
                while($data = mysqli_fetch_assoc($run)){
                    echo "<span>
                    <h1>".$data['cat_name']."</h1>
                    <div class=\"dis_items\">";
                            if($run1){
                                while($data1 = mysqli_fetch_assoc($run1)){
                                    if($data['cid']==$data1['cid']){
                                        echo "
                
                                        <div class='[ recipe_holder_discover ]' onclick='recipeBoxRedirectdis(this.children[1].getAttribute(\"data-value\"))'>
                                        <img src='../images/".$data1['file']."' alt='recipe image'>
                                        <h4 data-value='".$data1['header']."'>".$data1['header']."</h4>
                                        </div>
                                    ";
                                    }
                                }
                            }
                    echo "</div>
                    </span>";
                }
            }
            ?>
           
    </div>
</main>