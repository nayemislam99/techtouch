 <?php include"lib/header.php";   ?>
<!----navbar--->

<!----post--->

  <div class="container">
  	<div class="row py-5">
  		<div class="col-lg-8 pb-4">

        <?php
          $sql = "SELECT * from techtouch_post order by id DESC limit 4 ";
          $result = $modal->allselect($sql);

           if($result){
             foreach ($result as $value) {
               
          
        ?>

  			<div class="post" style="overflow: hidden;">

  				<a href="readpost.php?id=<?php echo $value['id']; ?>"><img src="nayem/<?php echo $value['images']; ?>" class="img-fluid img-thumbnail"></a>

  				<a href="readpost.php?id=<?php echo $value['id']; ?>" style="text-decoration: none;color:rgba(0, 0, 0, 0.7);"><h2><?php echo $value['title']; ?></h2></a>


  				<p><?php echo $modal->mygettime($value['date']); ?>
          <span>
            <a href="author.php?writter=<?php echo $value['author']; ?>"><?php echo $value['author']; ?></a>
          </span>
           </p>

  				<p><?php echo $value['lead']; ?></p>
  		  	<a href="readpost.php?id=<?php echo $value['id']; ?>" class="btn btn-outline-dark">Read More</a>
               <hr>
  			</div>
      <?php  } } ?>

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