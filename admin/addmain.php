<main class="[ admin_addnew ]">
<div class="[ admin_header_box ][ flex ] [ justify_content_Center ] [ justify_space_between ]">
  <h1>Dashboard</h1>
  <span>
      <button class="[ btns ]" onclick="adminView();">View</button>
      <button class="[ btns ]" onclick="adminAddnew();">Add New</button>
      <button class="[ btns ] [ log_btn ]" onclick="logOut();">Log out</button>
  </span>
</div>
<div>
<span class="adminForm">
    <select id="form_select" onchange="adminSelect();">
        <option value="none" disabled selected>Select</option>    
        <option value="Recipe">Recipe</option>
        <option value="Ingredient">Ingredient</option>
    </select>
</span>
<span class="[ adminformContainer ] [ flex ]">
    <form onsubmit="addRecipe(); return false;" class="[ admin_form_add ] [ admin_forms ][ flex ][ flex_direction_column ]" id="addRecipe" novalidate data-value="1" enctype="multipart/form-data">
        
       <h1>Add Recipe</h1>

       <input type="text" name="heading" id="recipeHeading" class="recipeHeading" placeholder="Enter Heading of Recipe">
       
        <select id="category" class="category">
            <?php
                include_once('../db.php');
                $query = "SELECT * FROM `category`";
                $run = mysqli_query($con , $query);
                if($run){
                    while($data = mysqli_fetch_assoc($run)){
                        echo "<option value='".$data['cid']."'>".$data['cat_name']."</option>";
                    }
                    mysqli_close($con);
                }
            ?>
        </select>

       <input type="number" min="5" name="time" id="time" class="time" placeholder="Enter Time to prepare in minutes">
       
    
        <div class="[ formInginput ][ flex ][ flex_direction_column ]">
       <input onkeydown="iSearch(this.value);" onkeyup="iSearch(this.value);" type="text" name="isearch" id="idsearch" placeholder="Enter Ingredient to add">
       <span id="idisp" class="idisp">

        </span>
       
        <span id="iSelected" class="iSelected">
        
        </span>
        
    </div>

    <input onchange="showImg(this.files[0])" type="file" name="picture" id="picture" class="picture">
            <img  src="" alt="dispicture" id="dispicture">
       <textarea name="rdetails" id="rdeatils" cols="30" rows="10" placeholder="Enter Details">

       </textarea>

        <button type="submit">Submit</button>
    </form>

    <form onsubmit="adminaddIngredient(); return false;" class="[ admin_ing_add ] [ admin_forms ][ flex ][ flex_direction_column ]" id="addIngredient" novalidate data-value="2">

        <h1>Add Ingredient</h1>
        
        <input type="text" name="iname" id="iname" placeholder="Enter Ingredient">
        <span>
            Continue: 
            <input type="radio" name="check" class="check" value="1">yes
            <input type="radio" name="check" class="check" value="2">no
        </span>

        
        <button type="submit">Submit</button>
 
    </form>
</span>
</div>
</main>