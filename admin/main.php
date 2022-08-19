<main class="[ admin_dashboard ] ">
<div class="[ admin_header_box ][ flex ] [ justify_content_Center ] [ justify_space_between ]">
  <h1>Dashboard</h1>
  <span>
      <button class="[ btns ]" onclick="adminView();">View</button>
      <button class="[ btns ]" onclick="adminAddnew();">Add New</button>
      <button class="[ btns ] [ log_btn ]" onclick="logOut();">Log out</button>
  </span>
</div>
<div class="admin_content_box">
    <?php

      include_once('../db.php');
      $query = "SELECT * FROM `recipe`";

      $query1="SELECT * FROM `category`";
      $run1 =mysqli_query($con,$query1);

      $run = mysqli_query($con,$query);
      if($run){
        
        while($data = mysqli_fetch_assoc($run)){
          if($run1){
            while($data1 = mysqli_fetch_assoc($run1)){
                if($data['cid'] == $data1['cid']){
                  $cat = $data1['cat_name'];
                  break;
                }
            }   
          }else{
            exit('error');
          }
          echo "
          <div class='[ admin_view_data ][ flex ]'>
          <img src = '../images/".$data['file']."' loading = 'lazy' class='view_data_img' alt='dataimg'>
          <h4 data-value='".$data['header']."'>".$data['header']."</h4>
          <h4>".$cat."</h4>
          <button class='data_edit_btn' onclick='editData(this.parentElement.children[1].getAttribute(\"data-value\"));'>Edit</button>
          <button class='data_delete_btn' onclick='deleteData(this.parentElement.children[1].getAttribute(\"data-value\"));'>Delete</button>
          </div>
          ";
        }
      }else{
        echo "Error";
      }
    
    ?>
</div>
</main>