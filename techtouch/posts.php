 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
    <div class="row py-5">
      <div class="col pb-4">

           <?php
          if(!isset($_GET['catagoryid']) || $_GET['catagoryid'] == null){
             header("location:index.php");
          }else{
          $id= (int) $_GET['catagoryid'];
          $sql = "SELECT * from techtouch_post Where cat_id=:id";
          $result = $modal->matchwithid($sql, $id);

           if($result){
             foreach ($result as $value) {
               
          
        ?>

        <div class="post" style="overflow: hidden;">

          <a href="readpost.php?id=<?php echo $value['id']; ?>"><img src="nayem/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail"></a>

          <a href="readpost.php?id=<?php echo $value['id']; ?>" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);"><h2><?php echo $value['title']; ?></h2></a>

          <p><?php echo $modal->mygettime($value['date']); ?><span> <?php echo $value['author']; ?></span></p>

          <p><?php echo $value['lead']; ?></p>

          <a href="readpost.php?id=<?php echo $value['id']; ?>" class="btn btn-outline-success" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);">Read More</a>
              <hr> 
        </div>

      <?php } }else{
        echo "<h4>No post are posted this catagory.";
      }
       
    } ?>


        
      
         <!--related post end-->



      </div>

      <!----sidebar--->
  
        <!--searach box end-->
             
             <!--Catagory box-->
                <?php include"lib/sidebar.php";   ?>
             <!----sidebar end div--->
             


           </div>

           <!----row end--->

      </div>
          <!----container end--->
    

<!----footer--->
 <?php include"lib/footer.php";   ?>
 <!----footer end--->