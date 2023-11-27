 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
    <div class="row py-5">
      <div class="col pb-4">

           <?php
              
          if(!isset($_GET['search']) or $_GET['search'] == null){
              header("location:index.php");
              }else{
                $search = $modal->validate($_GET['search']);
                $sql = "SELECT * from techtouch_post Where title like '%$search%' or body like '%$search%'";
                 $result = $modal->mysearch($sql);
                 if($result){
                 foreach ($result as $value){
         
        ?>

        <div class="post" style="overflow: hidden;">

          <a href="readpost.php?id=<?php echo $value['id']; ?>"><img src="images/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail"></a>

          <a href="readpost.php?id=<?php echo $value['id']; ?>" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);"><h2><?php echo $value['title']; ?></h2></a>

          <p><?php echo $modal->mygettime($value['date']); ?><span> <?php echo $value['author']; ?></span></p>

          <p><?php echo $value['lead']; ?></p>

          <a href="readpost.php?id=<?php echo $value['id']; ?>" class="btn btn-outline-success" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);">Read More</a>
              <hr> 
        </div>

      <?php } }else{
        echo "<div class='alert alert-warning fade show'>
        <button class='close' data-dismiss='alert'>&times;</button>
        Data does not match.</div>";
      } } ?>


        
      
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