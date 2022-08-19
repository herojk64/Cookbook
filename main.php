<main class="[ flex ] [ flex_direction_column ] [ align_center ] [ justify_content_center ] [ home_main ]">
    <div class="[ flex ] [ flex_direction_column ] [ align_center ] [ justify_content_center ] category">
        <h1>Category</h1>
        <p>Don't you know what you looking for?
            <br>
            Customize Your search for a perfect dish with search.
        </p>
        <div class="flex">
            <span onclick="redirCategory()"><img src="./images/breakfast.jpg" alt=""><h4>Breakfast</h4></span>
            <span onclick="redirCategory()"><img src="./images/lunch.jpg" alt=""><h4>Lunch</h4></span>
            <span onclick="redirCategory()"><img src="./images/dinner.jpg" alt=""><h4>Dinner</h4></span>
            <span onclick="redirCategory()"><img src="./images/bab.jpg" alt=""><h4>Beverage</h4></span>
            <span onclick="redirCategory()"><img src="./images/desert.jpg" alt=""><h4>Dessert</h4></span>
        </div>
    </div>
<?php 
        include_once('./db.php');
        $query = "SELECT * FROM `recipe`";
        $query1 = "SELECT `detail`,`header` FROM `recipe` WHERE `rid` = 2";

        $run1 = mysqli_query($con,$query1);
        $run2= mysqli_query($con,$query1);
        $run = mysqli_query($con,$query);
        ?>

    <div class="[ flex ] [ flex_direction_column ] [ align_center ] [ justify_content_center ] feature">
           <h1>Featured Recipe</h1> 
           <div class="feature_img_box">
               <span class="feature_inline_text">
                        <span>       
                        <h2>Perfect Start To</h2>
                        <h1>A Wonderful Day</h1>
                        
                           <?php
                           if($run1){
                               while($data =mysqli_fetch_assoc($run1)){
                                   echo "<p data-value='".$data['header']."'>".substr($data['detail'],0,70)."....</p>";
                               }
                             
                           }else{
                               echo "connetion error";
                           }
                           
                           ?>
                        
                        <button onclick="readMore(this.parentElement.children[2].getAttribute('data-value'));">Read more</button>
                        </span> 
                </span>
               <img loading="lazy" class="feature_img" src="./images/featured.jpg" alt="featured">
                
            </div>
                <span class="feature_extra">
                   
                   
                      <?php
                        if($run2){
                            while($data = mysqli_fetch_assoc($run2)){
                                echo "
                               <h2 data-value='".$data['header']."'>
                                    ".$data['header']."
                               </h2> 
                                <p>".substr($data['detail'],0,150)."....</p>";
                                
                            }
                        }else{
                            echo "connection error ";
                        }
                      ?>

                   
                    <a onclick="readMore(this.parentElement.children[0].getAttribute('data-value'))">Read More</a>
                </span>
    </div>


    <div class="[ flex ] [ flex_direction_column ] [ align_center ] [ justify_content_center ] [ recipe_section ]">
        <h1>Recipes</h1>

        <span class='recipe_box'>
        <?php
        
       

        if($run){
            while($data = mysqli_fetch_assoc($run)){
                echo "
                
                    <div class='[ recipe_holder ]' onclick='recipeBoxRedirect(this.children[1].getAttribute(\"data-value\"))'>
                    <img src='./images/".$data['file']."' alt='recipe image'>
                    <h4 data-value='".$data['header']."'>".$data['header']."</h4>
                    </div>
                ";
            }
            mysqli_close($con);
        }else{
            mysqli_close($con);
            echo "Connection error";
        }
        
        ?>
       
        </span> 
        <a href="#">LOAD MORE</a>
    </div>

</main>